<?php

namespace App\Filament\Pages\Setting;

use App\Models\OrganizationalProfile as ModelsOrganizationalProfile;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class OrganizationalProfile extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $title = 'Organizational';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'settings/organizational';

    protected static string $view = 'filament.pages.setting.organizational-profile';

    public ?array $data = [];

    #[Locked]
    public ?ModelsOrganizationalProfile $record = null;

    protected function getSavedNotification(): Notification
    {
        return Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getIdentificationSection(),
                $this->getVisiMisiSection(),
                $this->getStructureSection(),
            ])
            ->model($this->record)
            // ->statePath('data')
            // ->operation('edit')
        ;
    }

    protected function getIdentificationSection(): Component
    {
        return Section::make('UKM Profile')
            ->schema([
                ComponentsBuilder::make('profile')
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
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->minItems(2)
                    ->maxItems(6)
                    ->collapsed(),
            ])->columns();
    }

    protected function getVisiMisiSection(): Component
    {
        return Section::make('Vision and Mission')
            ->schema([
                ComponentsBuilder::make('visi_misi')
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
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->minItems(2)
                    ->maxItems(6)
                    ->collapsed(),
            ])->columns();
    }

    protected function getStructureSection(): Component
    {
        return Section::make('Structure')
            ->schema([
                ComponentsBuilder::make('structure')
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
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->minItems(2)
                    ->maxItems(6)
                    ->collapsed(),
            ])->columns();
    }

    /**
     * @return array<Action | ActionGroup>
     */
    public function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
            ->submit('save')
            ->keyBindings(['mod+s']);
    }
}
