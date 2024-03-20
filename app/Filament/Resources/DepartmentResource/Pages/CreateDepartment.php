<?php

namespace App\Filament\Resources\DepartmentResource\Pages;

use App\Filament\Resources\DepartmentResource;
use App\Models\Department;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateDepartment extends CreateRecord
{

    // use CreateRecord\Concerns\HasWizard;

    protected static string $resource = DepartmentResource::class;

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
    //                         ->unique(Department::class, 'slug', fn ($record) => $record),
    //                 ]),
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
    //         Step::make('Structure')
    //             ->schema([
    //                 Repeater::make('member')
    //                     ->hiddenLabel()
    //                     ->schema([
    //                         TextInput::make('name')->required(),
    //                         Select::make('role')
    //                             ->options([
    //                                 'member' => 'Member',
    //                                 'administrator' => 'Administrator',
    //                                 'owner' => 'Owner',
    //                             ])
    //                             ->required(),
    //                     ])
    //                     ->columns(2)
    //             ]),
    //         Step::make('Meta')
    //             ->schema([
    //                 Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
    //                 TextInput::make('meta_description'),
    //             ]),
    //     ];
    // }
}
