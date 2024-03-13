<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    // protected static ?string $label = 'Pojok Ilmiah';

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-m-pencil';

    protected static ?string $navigationLabel = 'Pojok Ilmiah';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Title')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->required()
                                ->unique(Post::class, 'slug', fn ($record) => $record),
                            Select::make('category')
                                ->options(Post::CATEGORY)
                                ->required(),
                        ]),
                    Wizard\Step::make('Content')
                        ->schema([
                            RichEditor::make('content')->required(),
                            Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                        ]),
                    Wizard\Step::make('Meta')
                        ->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->label('Thumbnail')
                                ->image()
                                ->multiple()
                                ->optimize('webp')
                                ->imageEditor(),
                            DateTimePicker::make('published_at')
                                ->default(now())
                                ->minDate(now())
                                ->maxDate(Carbon::now()->addDays(30)),
                            Select::make('tags')
                                ->multiple()
                                ->relationship('tags', 'title'),
                            TextInput::make('meta_description'),
                        ]),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->square(),
                TextColumn::make('title')->searchable(),
                ToggleColumn::make('is_featured')->label('Featured'),
                ToggleColumn::make('is_published')->label('Published'),
                TextColumn::make('published_at'),
                TextColumn::make('tags.title')->searchable()->badge()
            ])
            ->filters([
                Tables\Filters\Filter::make('is_featured')
                    ->label('Featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
                Tables\Filters\Filter::make('is_published')
                    ->label('Published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Tables\Filters\SelectFilter::make('tags')
                    ->multiple()
                    ->relationship('tags', 'title'),
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
