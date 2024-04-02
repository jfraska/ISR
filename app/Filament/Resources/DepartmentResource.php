<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\RelationManagers;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('Content')
                                    ->schema([
                                        Split::make([
                                            TextInput::make('title')
                                                ->live(onBlur: true)
                                                ->required()
                                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                            TextInput::make('slug')
                                                ->readOnly()
                                                ->required()
                                                ->unique(Department::class, 'slug', fn ($record) => $record),
                                        ]),
                                        RichEditor::make('content')
                                            ->disableToolbarButtons([
                                                'attachFiles'
                                            ])->required()
                                    ]),
                                Tabs\Tab::make('Member')
                                    ->schema([
                                        Repeater::make('member')
                                            ->hiddenLabel()
                                            ->required()
                                            ->schema([
                                                Select::make('role')
                                                    ->options([
                                                        'kepala' => 'Kepala Departemen',
                                                        'wakil' => 'Wakil Departemen',
                                                        'staf' => 'Staf',
                                                    ])
                                                    ->required(),
                                                TextInput::make('name')->required(),
                                            ])
                                            ->columns(2)
                                    ]),
                            ])->columnSpan(4),

                        Section::make('Meta')
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Thumbnail')
                                    ->required()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->maxSize(1024)
                                    ->optimize('webp')
                                    ->imageEditor(),
                                TextInput::make('periode')
                                    ->dehydrateStateUsing(function (): string {
                                        $currentYear = Carbon::now()->year;
                                        return ($currentYear - 1) . '/' . $currentYear;
                                    }),
                                DateTimePicker::make('published_at')
                                    ->readOnly()
                                    ->dehydrateStateUsing(fn () => Carbon::now()),
                                TextInput::make('meta_description'),
                            ])->columnSpan(2),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('Kepala')
                    ->state(
                        fn (Department $record) => $record->member[0]['name']
                    ),
                TextColumn::make('periode'),
                TextColumn::make('published_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDepartment::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
