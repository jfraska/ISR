<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementResource\Pages;
use App\Models\Achievement;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('achievement:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('achievement:all')) {
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
                                        ->unique(Achievement::class, 'slug', fn ($record) => $record),
                                ]),
                                RichEditor::make('content')
                                    ->disableToolbarButtons([
                                        'attachFiles'
                                    ])->required()
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                                Toggle::make('is_published')->label('Published')->onColor('success'),
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
                                    ->seconds(false),
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
                TextColumn::make('title')->limit(50)->searchable(),
                TextColumn::make('user.name')->label('Author'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success'),
                TextColumn::make('statuses.name')
                    ->label('Status')
                    ->badge()
                    ->icon(fn (string $state): string => match ($state) {
                        'draft' => 'heroicon-m-pencil',
                        'reviewing' => 'heroicon-m-clock',
                        'published' => 'heroicon-m-check-circle',
                        'rejected' => 'heroicon-m-exclamation-circle',
                    })
                    ->badge()
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
                    ->action(fn (Achievement $record) => $record->statuses()->update([
                        'name' => 'reviewing',
                    ]))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Achievement $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Achievement $record) => $record->statuses()->update([
                        'name' => 'published',
                    ]))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Achievement $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Achievement $record) => $record->statuses()->update([
                        'name' => 'rejected',
                    ]))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Achievement $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('achievement:delete'))
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
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}
