<?php

namespace App\Filament\Pages\Setting;

use App\Models\Organizational;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;

use function Filament\authorize;

class General extends Page
{
    use HasPageSidebar;

    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'filament.pages.setting.general';

    protected static ?string $navigationGroup = 'Settings';

    public ?array $data = [];

    #[Locked]
    public ?Organizational $record = null;

    public static function sidebar(): FilamentPageSidebar
    {
        return FilamentPageSidebar::make()
            ->setTitle('General Settings')
            ->setNavigationItems([
                PageNavigationItem::make('General')
                    ->translateLabel()
                    ->url(General::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(General::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Contact')
                    ->translateLabel()
                    ->url(Contact::getUrl())
                    ->isActiveWhen(function () {
                        return request()->routeIs(Contact::getRouteName());
                    })
                    ->visible(true),
            ]);
    }

    public function mount(): void
    {
        $this->record = Organizational::firstOrNew([
            'title' => 'General',
            'slug' => 'general',
        ]);

        abort_unless(static::canView($this->record), 404);

        $this->fillForm();
    }

    public function fillForm(): void
    {
        $data = $this->record->attributesToArray();

        $this->form->fill($data);
    }


    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $this->handleRecordUpdate($this->record, $data);
        } catch (Halt $exception) {
            return;
        }

        $this->getSavedNotification()->send();
    }

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
                Hidden::make('user_id')->dehydrateStateUsing(fn ($state) => Auth::id()),
                Builder::make('content')
                    ->hiddenLabel()
                    ->required()
                    ->blocks([
                        Builder\Block::make('activity')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('thumbnail')
                                    ->image()
                                    ->maxSize(1024)
                                    ->optimize('webp')
                                    ->imageEditor()
                                    ->required(),
                                TextInput::make('description')
                                    ->required(),
                            ])
                            ->icon('heroicon-o-flag'),
                    ])
                    ->addActionLabel('Add a new content')
                    ->columnSpanFull()
                    ->blockNumbers(false)
                    ->reorderable(false)
            ])
            ->model($this->record)
            ->statePath('data')
            ->operation('edit');
    }

    protected function handleRecordUpdate(Organizational $record, array $data): Organizational
    {
        $record->fill($data);

        $record->save();

        return $record;
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

    public static function canView(Model $record): bool
    {
        try {
            return authorize('update', $record)->allowed();
        } catch (AuthorizationException $exception) {
            return $exception->toResponse()->allowed();
        }
    }
}