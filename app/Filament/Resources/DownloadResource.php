<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadResource\Pages;
use App\Models\Category;
use App\Models\Download;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    protected static ?int $navigationSort = 8;

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->can('download:all')) {
            return static::getModel()::currentStatus('reviewing')->count();
        }

        return static::getModel()::currentStatus('draft')->where("user_id", Auth::id())->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        if (auth()->user()->can('download:all')) {
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
                        Tabs::make('Tabs')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 4,
                            ])
                            ->tabs([
                                Tabs\Tab::make('Title')
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
                                                ->unique(Download::class, 'slug', fn ($record) => $record),
                                        ]),
                                        Select::make('category')
                                            ->required()
                                            ->disabledOn('edit')
                                            ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Download $download) => $query->where("model", $download->getMorphClass()),)
                                            ->suffixAction(
                                                Action::make('create')
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

                                                        return $state['level'] ?? 'Untitled heading';
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
                                                        FileUpload::make('url')
                                                            ->label('Image')
                                                            ->image()
                                                            ->optimize('webp')
                                                            ->imageEditor()
                                                            ->maxSize(5120)
                                                            ->downloadable()
                                                            ->required(),
                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-o-photo'),
                                                ComponentsBuilder\Block::make('attachments')
                                                    ->schema([
                                                        FileUpload::make('url')
                                                            ->multiple()
                                                            ->downloadable()
                                                            ->maxFiles(3)
                                                            ->maxSize(2048)
                                                            ->required(),
                                                        TextInput::make('desc')
                                                            ->label('description')
                                                    ])
                                                    ->icon('heroicon-o-document-text'),
                                            ])
                                            ->blockNumbers(false)
                                            ->maxItems(6)
                                            ->collapsed(),
                                    ]),
                            ]),

                        Section::make('Meta')
                            ->columnSpan([
                                'default' => 'full',
                                'md' => 2,
                            ])
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                                Toggle::make('is_published')->label('Published')->onColor('success'),
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
                TextColumn::make('title')->limit(50)->searchable(),
                TextColumn::make('categories.name')->searchable()->label('Category'),
                TextColumn::make('user.name')->label('Author'),
                ToggleColumn::make('is_published')->label('Publish')->onColor('success')->disabled(fn (Download $record) => $record->user_id !== auth()->id() || !auth()->user()->can('post:all')),
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
                //
            ])
            ->actions([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\Action::make('publish')
                    ->action(fn (Download $record) => $record->updateStatus('reviewing'))
                    ->requiresConfirmation()
                    ->button()
                    ->icon("heroicon-m-cloud-arrow-up")
                    ->size(ActionSize::Small)
                    ->color("primary")
                    ->visible(fn (Download $record): bool => ($record->status === "draft" || $record->status === "rejected") && $record->user->id === Auth::id()),
                Tables\Actions\Action::make('accept')
                    ->action(fn (Download $record) => $record->updateStatus('published'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("success")
                    ->visible(fn (Download $record): bool => auth()->user()->can('publish') && $record->status === "reviewing"),
                Tables\Actions\Action::make('reject')
                    ->action(fn (Download $record) => $record->updateStatus('rejected'))
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->color("danger")
                    ->visible(fn (Download $record): bool => auth()->user()->can('publish') && ($record->status === "published" || $record->status === "reviewing")),
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
