<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\Toggle;
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
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Grouping\Group;
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

    // protected static ?string $navigationLabel = 'Pojok Ilmiah';
    // protected static ?string $navigationGroup = 'Pojok Ilmiah';

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
                                                ->unique(Post::class, 'slug', fn ($record) => $record),
                                        ]),
                                        Select::make('category')
                                            ->options(Post::CATEGORY)
                                            ->required(),
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
                                                            ->required(),
                                                        TextInput::make('alt')
                                                            ->label('Alt text')
                                                            ->required(),
                                                    ])
                                                    ->icon('heroicon-o-photo'),
                                            ])
                                            ->blockNumbers(false)
                                            ->minItems(2)
                                            ->maxItems(6)
                                            ->collapsed(),
                                    ]),
                            ])->columnSpan(4),

                        Section::make('Meta')
                            ->schema([
                                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                                Split::make([
                                    Toggle::make('is_published')->label('Published')->onColor('success'),
                                    Toggle::make('is_featured')->label('Featured'),
                                ]),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->label('Thumbnail')
                                    ->image()
                                    ->multiple()
                                    ->minFiles(1)
                                    ->maxFiles(3)
                                    ->optimize('webp')
                                    ->imageEditor(),
                                Select::make('tags')
                                    ->multiple()
                                    ->relationship('tags', 'title'),
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
                Group::make('statuses.name')->label('Status')->getTitleFromRecordUsing(fn (Post $record): string => ucfirst($record->status))->collapsible(),
            ])
            ->groupingSettingsHidden()
            ->defaultGroup('statuses.name')
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')->square()->alignment(Alignment::Center),
                TextColumn::make('title')->searchable(),
                TextColumn::make('user.name')->label('Author')->searchable(),
                ToggleColumn::make('is_published')->label('Published')->onColor('success')->alignment(Alignment::Center)->disabled(fn (Post $record) => $record->status === "published" ? false : true),
                TextColumn::make('status')
                    ->state(
                        fn (Post $record) => $record->status
                    )
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    })->alignment(Alignment::Center),
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
                Tables\Actions\Action::make('publish')
                    ->label(fn (Post $record) => $record->status === "published" ? "Reject" : "Publish")
                    ->action(function (Post $record) {
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
                    ->icon(fn (Post $record) => $record->status === "published" ? "heroicon-m-cloud-arrow-down" : "heroicon-m-cloud-arrow-up")
                    ->color(fn (Post $record) => $record->status === "published" ? "danger" : "success")
                    ->visible(auth()->user()->can('publish')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->visible(auth()->user()->can('post:delete'))
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
