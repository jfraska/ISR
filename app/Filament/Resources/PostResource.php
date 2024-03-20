<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
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
use Filament\Forms\Get;
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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    // protected static ?string $label = 'Pojok Ilmiah';

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-m-pencil';

    // protected static ?string $navigationLabel = 'Pojok Ilmiah';
    // protected static ?string $navigationGroup = 'Pojok Ilmiah';

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

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
                                        Select::make('category_id')
                                            ->label('Category')
                                            ->required()
                                            ->live()
                                            ->relationship(name: 'categories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Post $post) => $query->where("model", $post->getMorphClass()),)
                                            ->suffixAction(
                                                Action::make('create')
                                                    ->label('Create Category')
                                                    ->icon('heroicon-m-plus')
                                                    ->color('gray')
                                                    ->form([
                                                        TextInput::make('name')
                                                            ->required(),
                                                        Hidden::make('model')
                                                            ->dehydrateStateUsing(fn (Post $query) => $query->getMorphClass())
                                                    ])
                                                    ->action(function (array $data, Category $query) {
                                                        $query->create($data);
                                                    })->visible(auth()->user()->can('category:create'))
                                            ),

                                        Select::make('sub_category')
                                            ->label('Sub Category')
                                            ->required()
                                            ->relationship(name: 'subCategories', titleAttribute: 'name', modifyQueryUsing: fn (Builder $query, Get $get) => $query->where('parent_id', $get('category_id'))
                                                ->whereNotNull('parent_id'),)
                                            ->suffixAction(
                                                Action::make('create')
                                                    ->label('Create Sub Category')
                                                    ->icon('heroicon-m-plus')
                                                    ->color('gray')
                                                    ->form([
                                                        TextInput::make('name')
                                                            ->required(),
                                                        Select::make('parent_id')
                                                            ->label('Category')
                                                            ->required()
                                                            ->options(fn (Post $query): Collection => Category::query()
                                                                ->where("model", $query->getMorphClass())
                                                                ->pluck('name', 'id')),
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
                                    ->required()
                                    ->image()
                                    ->imageResizeMode('cover')
                                    ->imageCropAspectRatio('16:9')
                                    ->multiple()
                                    ->minFiles(1)
                                    ->maxFiles(3)
                                    ->optimize('webp')
                                    ->imageEditor(),
                                Select::make('tags')
                                    ->multiple()
                                    ->searchable()
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
                SpatieMediaLibraryImageColumn::make('thumbnail')->width(80),
                TextColumn::make('title')->searchable(),
                TextColumn::make('subCategories.name')->searchable()->label('Sub Category'),
                TextColumn::make('user.name')->label('Author'),
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
                        } elseif ($record->status === "reviewing") {
                            $record->statuses()->update(['name' => 'published']);
                            $record->update(['published_at' => Carbon::now()]);
                        }
                    })
                    ->requiresConfirmation()
                    ->button()
                    ->size(ActionSize::Small)
                    ->icon(fn (Post $record) => $record->status === "published" ? "heroicon-m-cloud-arrow-down" : "heroicon-m-cloud-arrow-up")
                    ->color(fn (Post $record) => $record->status === "published" ? "danger" : "success")
                    ->visible(fn (Post $record): bool => auth()->user()->can('publish') && $record->status !== "draft"),
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
