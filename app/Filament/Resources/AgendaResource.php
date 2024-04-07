<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
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
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                        Section::make('Content')->schema([
                            Split::make([
                                TextInput::make('title')
                                    ->autocapitalize('words')
                                    ->live(onBlur: true)
                                    ->required()
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->readOnly()
                                    ->required()
                                    ->unique(Agenda::class, 'slug', fn ($record) => $record),
                            ]),
                            Select::make('bg_color')
                                ->label('Theme')
                                ->options([
                                    'blue' => 'Blue',
                                    'red' => 'Red',
                                    'yellow' => 'Yellow',
                                    'green' => 'Green',
                                    'purple' => 'Purple',
                                ])
                                ->required(),
                            DatePicker::make('date')
                                ->disabledDates(fn (Agenda $query): array => $query->pluck('date', 'id')->get())
                                ->required(),
                            RichEditor::make('content')
                                ->disableToolbarButtons([
                                    'attachFiles'
                                ])->required()
                        ])->columnSpan(4),

                        Section::make('Meta')->schema([
                            Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                            Toggle::make('is_published')->label('Published')->onColor('success'),
                            SpatieMediaLibraryFileUpload::make('image')
                                ->label('Thumbnail')
                                ->image()
                                ->maxSize(1024)
                                ->imageResizeMode('cover')
                                ->imageCropAspectRatio('16:9')
                                ->optimize('webp')
                                ->imageEditor(),
                            DateTimePicker::make('published_at')
                                ->disabled(),
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
                TextColumn::make('title')->searchable(),
                TextColumn::make('user.name')->label('Author'),
                ColorColumn::make('bg_color')->label('Theme'),
                TextColumn::make('date'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success'),
                TextColumn::make('status')
                    ->state(
                        fn (Agenda $record) => $record->status
                    )
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
                Tables\Actions\Action::make('published')
                    ->label('Publish')
                    ->action(fn (Agenda $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Agenda $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Agenda $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Agenda $record): bool => $record->status === "draft" || $record->status === "rejected"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Agenda $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Agenda $record): bool => auth()->user()->can('publish') && $record->status === "published" || $record->status === "reviewing"),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('Agenda:delete'))
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
            'index' => Pages\ListAgenda::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
