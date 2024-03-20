<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadResource\Pages;
use App\Filament\Resources\DownloadResource\RelationManagers;
use App\Models\Category;
use App\Models\Download;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                        Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('Title')
                                    ->schema([
                                        Split::make([
                                            TextInput::make('title')
                                                ->live(onBlur: true)
                                                ->required()
                                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                                            TextInput::make('slug')
                                                ->readOnly()
                                                ->required()
                                                ->unique(Download::class, 'slug', fn ($record) => $record),
                                        ]),
                                        Select::make('category')
                                            ->label('Category')
                                            ->required()
                                            ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Download $download) => $query->where("model", $download->getMorphClass()),)
                                            ->suffixAction(
                                                Action::make('create')
                                                    ->label('Create Category')
                                                    ->icon('heroicon-m-plus')
                                                    ->color('gray')
                                                    ->form([
                                                        TextInput::make('name')
                                                            ->required(),
                                                        Hidden::make('model')
                                                            ->dehydrateStateUsing(fn (Download $query) => $query->getMorphClass())
                                                    ])
                                                    ->action(function (array $data, Category $query) {
                                                        $query->create($data);
                                                    })->visible(auth()->user()->can('category:create'))
                                            ),
                                    ]),

                                Tabs\Tab::make('Content')
                                    ->schema([
                                        ComponentsBuilder::make('content')
                                            ->hiddenLabel()
                                            ->blocks([
                                                ComponentsBuilder\Block::make('heading')
                                                    ->schema([
                                                        TextInput::make('content')
                                                            ->autocapitalize('words')
                                                            ->required(),
                                                        Select::make('level')
                                                            ->options([
                                                                'h1' => 'Heading 1',
                                                                'h2' => 'Heading 2',
                                                                'h3' => 'Heading 3',
                                                            ])
                                                            ->required(),
                                                    ])
                                                    ->label(function (?array $state): string {
                                                        if ($state === null) {
                                                            return 'Heading';
                                                        }

                                                        return $state['content'] ?? 'Untitled heading';
                                                    })
                                                    ->icon('heroicon-o-bookmark')
                                                    ->columns(2),
                                                ComponentsBuilder\Block::make('paragraph')
                                                    ->schema([
                                                        RichEditor::make('content')
                                                            ->label('Paragraph')
                                                            ->disableToolbarButtons([
                                                                'attachFiles',
                                                                'h2',
                                                                'h3'
                                                            ])
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-m-bars-3-bottom-left'),
                                                ComponentsBuilder\Block::make('image')
                                                    ->schema([
                                                        SpatieMediaLibraryFileUpload::make('image')
                                                            ->label('Image')
                                                            ->image()
                                                            ->optimize('webp')
                                                            ->imageEditor()
                                                            ->downloadable()
                                                            ->required(),
                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-o-photo'),
                                                ComponentsBuilder\Block::make('attachments')
                                                    ->schema([
                                                        SpatieMediaLibraryFileUpload::make('attachments')
                                                            ->multiple()
                                                            ->downloadable()
                                                            ->openable()
                                                            ->maxFiles(3)
                                                            ->required(),
                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                    ])
                                                    ->icon('heroicon-o-document-text'),
                                            ])
                                            ->blockNumbers(false)
                                            ->minItems(2)
                                            ->maxItems(6)
                                            ->collapsed(),
                                    ]),
                            ])->columnSpan(4),

                        Section::make('Meta')->schema([
                            Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                            Toggle::make('is_published')->label('Published')->onColor('success'),
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
                Group::make('statuses.name')->label('Status')->getTitleFromRecordUsing(fn (Download $record): string => ucfirst($record->status))->collapsible(),
            ])
            ->groupingSettingsHidden()
            ->defaultGroup('statuses.name')
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('categories.name')->searchable()->label('Category'),
                TextColumn::make('user.name')->label('Author'),
                TextColumn::make('published_at'),
                TextColumn::make('status')
                    ->state(
                        fn (Download $record) => $record->status
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
                //
            ])
            ->actions([
                Tables\Actions\Action::make('publish')
                    ->label(fn (Download $record) => $record->status === "published" ? "Reject" : "Publish")
                    ->action(function (Download $record) {
                        if ($record->status === "published") {
                            $record->statuses()->update(['name' => 'rejected']);
                        } elseif ($record->status === "reviewing") {
                            $record->statuses()->update(['name' => 'published']);
                            $record->update(['published_at' => Carbon::now()]);
                        }
                    })
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->icon(fn (Download $record) => $record->status === "published" ? "heroicon-m-cloud-arrow-down" : "heroicon-m-cloud-arrow-up")
                    ->color(fn (Download $record) => $record->status === "published" ? "danger" : "success")
                    ->visible(fn (Download $record): bool => auth()->user()->can('publish') && $record->status !== "draft"),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('Download:delete'))
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
            'index' => Pages\ListDownloads::route('/'),
            'create' => Pages\CreateDownload::route('/create'),
            'edit' => Pages\EditDownload::route('/{record}/edit'),
        ];
    }
}
