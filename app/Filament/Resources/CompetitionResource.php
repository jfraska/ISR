<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionResource\Pages;
use App\Models\Category;
use App\Models\Competition;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?int $navigationSort = 6;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('competition:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('competition:all')) {
            return static::getModel()::currentStatus('reviewing')->count() > 0 ? 'warning' : 'primary';
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count() > 0 ? 'warning' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 'full',
                    'md' => 6,
                ])
                    ->schema([
                        Section::make('Content')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 4,
                            ])
                            ->schema([
                                Split::make([
                                    TextInput::make('title')
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->required()
                                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                    TextInput::make('slug')
                                        ->readOnly()
                                        ->required()
                                        ->unique(Competition::class, 'slug', fn ($record) => $record),
                                ]),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->disabledOn('edit')
                                    ->required()
                                    ->live()
                                    ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Competition $Competition) => $query->where("model", $Competition->getMorphClass()),)
                                    ->suffixAction(
                                        Action::make('create_category')
                                            ->label('Create Category')
                                            ->icon('heroicon-m-plus')
                                            ->color('gray')
                                            ->form([
                                                Split::make([
                                                    TextInput::make('name')
                                                        ->required()
                                                        ->live(onBlur: true)
                                                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                    TextInput::make('slug')
                                                        ->readOnly()
                                                        ->required()
                                                        ->unique(Category::class, 'slug', fn ($record) => $record),
                                                ]),
                                                Hidden::make('model')
                                                    ->dehydrateStateUsing(fn (Competition $query) => $query->getMorphClass())
                                            ])
                                            ->action(function (array $data, Category $query) {
                                                $query->create($data);
                                            })->visible(auth()->user()->can('category:create'))
                                    ),

                                Select::make('sub_category')
                                    ->label('Sub Category')
                                    ->required()
                                    ->disabledOn('edit')
                                    ->visible(fn (Category $query, Get $get) => $query->where('parent_id', $get('category_id'))->exists())
                                    ->relationship(name: 'subCategories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Get $get) => $query->where('parent_id', $get('category_id'))
                                        ->whereNotNull('parent_id'),)
                                    ->suffixAction(
                                        Action::make('create_sub_category')
                                            ->label('Create Sub Category')
                                            ->icon('heroicon-m-plus')
                                            ->color('gray')
                                            ->form([
                                                Split::make([
                                                    TextInput::make('name')
                                                        ->required()
                                                        ->live(onBlur: true)
                                                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                                    TextInput::make('slug')
                                                        ->readOnly()
                                                        ->required()
                                                        ->unique(Category::class, 'slug', fn ($record) => $record),
                                                ]),
                                                Select::make('parent_id')
                                                    ->label('Category')
                                                    ->required()
                                                    ->options(fn (Competition $query): Collection => Category::query()
                                                        ->where("model", $query->getMorphClass())
                                                        ->pluck('name', 'id')),
                                            ])
                                            ->action(function (array $data, Category $query) {
                                                $query->create($data);
                                            })->visible(auth()->user()->can('category:create'))
                                    ),
                                TextInput::make('link')
                                    ->required()
                                    ->url()
                                    ->suffixIcon('heroicon-m-globe-alt'),
                                RichEditor::make('content')->required()
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id())->disabledOn('edit'),
                                Toggle::make('is_published')->label('Published')->onColor('success')->accepted(),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Thumbnail')
                                    ->required()
                                    ->image()
                                    ->maxSize(5120)
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->optimize('webp')
                                    ->imageEditor(),
                                DateTimePicker::make('published_at')
                                    ->seconds(false)
                                    ->disabled(),
                                TextInput::make('meta_description'),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('statuses.name')
                    ->label('Status')
                    ->collapsible(),
            ])
            ->groupingSettingsHidden()
            ->defaultGroup('statuses.name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->width(80),
                TextColumn::make('title')->limit(40)->searchable(),
                TextColumn::make('subCategories.name')->searchable()->label('Sub Category'),
                TextColumn::make('user.name')->label('Author'),
                TextColumn::make('link')->limit(10),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success')->disabled(fn (Competition $record): bool => !(auth()->user()->can('publish') || $record->user_id === Auth::id())),
                TextColumn::make('statuses.name')
                    ->label('Status')
                    ->badge()
                    ->icon(fn (string $state): string => match ($state) {
                        'draft' => 'heroicon-m-pencil',
                        'reviewing' => 'heroicon-m-clock',
                        'published' => 'heroicon-m-check-circle',
                        'rejected' => 'heroicon-m-exclamation-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Competition $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Competition $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Competition $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Competition $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Competition $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Competition $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('competition:delete'))
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}
