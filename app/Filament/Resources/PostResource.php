<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-m-pencil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Content')->schema([
                        TextInput::make('title')->live()->required()->minLength(1)->maxLength(150)
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($operation === 'edit') {
                                return;
                            }

                            $set('slug', Str::slug($state));
                        }),
                        TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord: true)->maxLength(150),
                        RichEditor::make('content')->required(),
                        Checkbox::make('is_published'),
                        Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                        ])->columns(2),
                        Section::make('Meta')->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                            ->image()
                            ->optimize('webp')
                            ->imageEditor(),
                            DateTimePicker::make('published_at')->nullable(),
                            Checkbox::make('is_featured'),
                            Select::make('categories')
                                        ->multiple()
                                        ->relationship('categories','title'),
                        TextInput::make('meta_description'),
                    ]),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\CheckboxColumn::make('is_featured'),
                Tables\Columns\CheckboxColumn::make('is_published'),
                Tables\Columns\TextColumn::make('categories.title')->searchable()->badge()
            ])
            ->filters([
                Tables\Filters\Filter::make('is_featured')
                    ->label('Featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
                Tables\Filters\Filter::make('is_published')
                    ->label('Published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Tables\Filters\SelectFilter::make('categories')
                    ->multiple()
                    ->relationship('categories', 'title'),
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
