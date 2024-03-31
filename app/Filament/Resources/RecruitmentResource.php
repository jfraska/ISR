<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecruitmentResource\Pages;
use App\Filament\Resources\RecruitmentResource\RelationManagers;
use App\Models\Category;
use App\Models\Recruitment;
use App\Models\SubCategory;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RecruitmentResource extends Resource
{
    protected static ?string $model = Recruitment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                        Section::make('Content')->schema([
                            Split::make([
                                TextInput::make('title')
                                    ->live(onBlur: true)
                                    ->required()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->readOnly()
                                    ->required()
                                    ->unique(Recruitment::class, 'slug', fn ($record) => $record),
                            ]),
                            Select::make('category')
                                ->disabledOn('edit')
                                ->required()
                                ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Recruitment $recruitment) => $query->where("model", $recruitment->getMorphClass()),)
                                ->suffixAction(
                                    Action::make('create')
                                        ->label('Create Category')
                                        ->icon('heroicon-m-plus')
                                        ->color('gray')
                                        ->form([
                                            TextInput::make('name')
                                                ->filled()
                                                ->required(),
                                            Hidden::make('model')
                                                ->dehydrateStateUsing(fn (Recruitment $query) => $query->getMorphClass())
                                        ])
                                        ->action(function (array $data, Category $query) {
                                            $query->create($data);
                                        })->visible(auth()->user()->can('category:create'))
                                ),
                            RichEditor::make('content')
                                ->disableToolbarButtons([
                                    'attachFiles'
                                ])->required(),
                        ])->columnSpan(4),

                        Section::make('Meta')->schema([
                            Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                            Toggle::make('is_published')->label('Published')->onColor('success'),
                            SpatieMediaLibraryFileUpload::make('image')
                                ->label('Thumbnail')
                                ->required()
                                ->image()
                                ->maxSize(1024)
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('16:9')
                                ->optimize('webp')
                                ->imageEditor(),
                            DateTimePicker::make('published_at'),
                            TextInput::make('meta_description'),
                        ])->columnSpan(2),
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
                TextColumn::make('title')->searchable(),
                TextColumn::make('categories.name')->label('Category'),
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
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    })->alignment(Alignment::Center),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('published')
                    ->label('Publish')
                    ->action(fn (Recruitment $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Recruitment $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Recruitment $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Recruitment $record): bool => $record->status === "draft" || $record->status === "rejected"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Recruitment $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Recruitment $record): bool => auth()->user()->can('publish') && $record->status === "published" || $record->status === "reviewing"),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('recruitment:delete'))
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
            'index' => Pages\ListRecruitment::route('/'),
            'create' => Pages\CreateRecruitment::route('/create'),
            'edit' => Pages\EditRecruitment::route('/{record}/edit'),
        ];
    }
}
