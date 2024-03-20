<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Category;
use App\Models\SubCategory;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    // use CreateRecord\Concerns\HasWizard;

    protected static string $resource = PostResource::class;

    protected function afterCreate(): void
    {
        $this->record->setStatus('reviewing');
    }

    // public function getSteps(): array
    // {
    //     return [
    //         Step::make('Title')
    //             ->schema([
    //                 Split::make([
    //                     TextInput::make('title')
    //                         ->live(onBlur: true)
    //                         ->required()
    //                         ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str::slug($state))),
    //                     TextInput::make('slug')
    //                         ->readOnly()
    //                         ->required()
    //                         ->unique(Post::class, 'slug', fn ($record) => $record),
    //                 ]),
    //                 Select::make('category')
    //                     ->required()
    //                     ->live()
    //                     ->options(fn (Post $query): Collection => Category::query()
    //                         ->where("model", $query->getMorphClass())
    //                         ->pluck('name', 'id'))
    //                     ->suffixAction(
    //                         Action::make('create')
    //                             ->label('Create Category')
    //                             ->icon('heroicon-m-plus')
    //                             ->color('gray')
    //                             ->form([
    //                                 TextInput::make('name')
    //                                     ->required(),
    //                                 Hidden::make('model')
    //                                     ->dehydrateStateUsing(fn (Post $query) => $query->getMorphClass())
    //                             ])
    //                             ->action(function (array $data, Category $query) {
    //                                 $query->create($data);
    //                             })->visible(auth()->user()->can('category:create'))
    //                     ),

    //                 // Select::make('sub_category')
    //                 //     ->required()
    //                 //     ->options(fn (Get $get): Collection => Category::query()
    //                 //         ->where('parent_id', $get('category'))
    //                 //         ->whereNotNull('parent_id')
    //                 //         ->pluck('name', 'id'))
    //                 //     ->suffixAction(
    //                 //         Action::make('create')
    //                 //             ->label('Create Sub Category')
    //                 //             ->icon('heroicon-m-plus')
    //                 //             ->color('gray')
    //                 //             ->form([
    //                 //                 TextInput::make('name')
    //                 //                     ->required(),
    //                 //                 Select::make('parent_id')
    //                 //                     ->label('Category')
    //                 //                     ->required()
    //                 //                     ->options(fn (Post $query): Collection => Category::query()
    //                 //                         ->where("model", $query->getMorphClass())
    //                 //                         ->pluck('name', 'id')),
    //                 //             ])
    //                 //             ->action(function (array $data, Category $query) {
    //                 //                 $query->create($data);
    //                 //             })->visible(auth()->user()->can('category:create'))
    //                 //     ),
    //             ]),
    //         Step::make('Content')
    //             ->schema([
    //                 Builder::make('content')
    //                     ->hiddenLabel()
    //                     ->blocks([
    //                         Builder\Block::make('heading')
    //                             ->schema([
    //                                 TextInput::make('content')

    //                                     ->required(),
    //                                 Select::make('level')
    //                                     ->options([
    //                                         'h1' => 'Heading 1',
    //                                         'h2' => 'Heading 2',
    //                                         'h3' => 'Heading 3',
    //                                     ])
    //                                     ->required(),
    //                             ])
    //                             ->label(function (?array $state): string {
    //                                 if ($state === null) {
    //                                     return 'Heading';
    //                                 }

    //                                 return $state['content'] ?? 'Untitled heading';
    //                             })
    //                             ->icon('heroicon-o-bookmark')
    //                             ->columns(2),
    //                         Builder\Block::make('paragraph')
    //                             ->schema([
    //                                 RichEditor::make('content')
    //                                     ->label('Paragraph')
    //                                     ->disableToolbarButtons([
    //                                         'attachFiles',
    //                                         'h2',
    //                                         'h3'
    //                                     ])
    //                                     ->required(),
    //                             ])
    //                             ->icon('heroicon-m-bars-3-bottom-left'),
    //                         Builder\Block::make('image')
    //                             ->schema([
    //                                 SpatieMediaLibraryFileUpload::make('image')
    //                                     ->label('Image')
    //                                     ->image()
    //                                     ->optimize('webp')
    //                                     ->imageEditor()
    //                                     ->required(),
    //                                 TextInput::make('alt')
    //                                     ->label('Alt text')
    //                                     ->required(),
    //                             ])
    //                             ->icon('heroicon-o-photo'),
    //                     ])
    //                     ->blockNumbers(false)
    //                     ->minItems(2)
    //                     ->maxItems(6)
    //                     ->collapsed(),
    //             ]),
    //         Step::make('Meta')
    //             ->schema([
    //                 SpatieMediaLibraryFileUpload::make('image')
    //                     ->label('Thumbnail')
    //                     ->image()
    //                     ->multiple()
    //                     ->minFiles(1)
    //                     ->maxFiles(3)
    //                     ->optimize('webp')
    //                     ->imageEditor(),
    //                 Hidden::make('user_id')->dehydrateStateUsing(fn () => Auth::id()),
    //                 Select::make('tags')
    //                     ->multiple()
    //                     ->relationship('tags', 'title'),
    //                 TextInput::make('meta_description'),
    //             ]),
    //     ];
    // }
}
