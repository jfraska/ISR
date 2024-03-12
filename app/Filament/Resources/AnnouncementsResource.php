<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementsResource\Pages;
use App\Filament\Resources\AnnouncementsResource\RelationManagers;
use App\Models\Announcements;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AnnouncementsResource extends Resource
{
    protected static ?string $model = Announcements::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Content')->schema([
                    TextInput::make('title')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->required()
                        ->unique(Announcements::class, 'slug', fn ($record) => $record),
                    RichEditor::make('content')->required(),
                    Checkbox::make('is_published'),
                    Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                    ])->columns(2),

                    Section::make('Meta')->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                        ->label('Thumbnail')
                        ->image()
                        ->optimize('webp')
                        ->imageEditor(),
                        DateTimePicker::make('published_at')->nullable(),
                        Checkbox::make('is_featured'),
                        TextInput::make('meta_description'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug')->searchable(),
                CheckboxColumn::make('is_featured'),
                CheckboxColumn::make('is_published'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncements::route('/create'),
            'edit' => Pages\EditAnnouncements::route('/{record}/edit'),
        ];
    }
}
