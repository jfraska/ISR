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
                                ->required()
                                ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Recruitment $recruitment) => $query->where("model", $recruitment->getMorphClass()),)
                                ->suffixAction(
                                    Action::make('create')
                                        ->label('Create Category')
                                        ->icon('heroicon-m-plus')
                                        ->color('gray')
                                        ->form([
                                            TextInput::make('name')
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
                                ->optimize('webp')
                                ->imageEditor(),
                            TextInput::make('meta_description'),
                        ])->columnSpan(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->square()->alignment(Alignment::Center),
                TextColumn::make('title')->searchable(),
                TextColumn::make('categories.name'),
                TextColumn::make('user.name')->label('Author'),
                ToggleColumn::make('is_published')->label('Published')->onColor('success')->alignment(Alignment::Center),
                TextColumn::make('status')
                    ->state(
                        fn (Recruitment $record) => $record->status
                    )
                    ->badge()
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
                Tables\Actions\Action::make('publish')
                    ->label(fn (Recruitment $record) => $record->status === "published" ? "Reject" : "Publish")
                    ->action(function (Recruitment $record) {
                        if ($record->status === "published") {
                            $record->statuses()->update(['name' => 'rejected']);
                        } else {
                            $record->statuses()->update(['name' => 'published']);
                            $record->update(['published_at' => Carbon::now()]);
                        }
                    })
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->icon(fn (Recruitment $record) => $record->status === "published" ? "heroicon-m-cloud-arrow-down" : "heroicon-m-cloud-arrow-up")
                    ->color(fn (Recruitment $record) => $record->status === "published" ? "danger" : "success")
                    ->visible(auth()->user()->can('publish')),
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
