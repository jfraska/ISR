<?php

namespace App\Filament\Pages\Setting;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class OrganizationalProfile extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $title = 'Organizational Profile';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'settings/organizational-profile';

    protected static string $view = 'filament.pages.setting.organizational-profile';

    // #[Locked]
    // public ?CompanyProfileModel $record = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getIdentificationSection(),
                // $this->getLocationDetailsSection(),
                // $this->getLegalAndComplianceSection(),
            ])
            // ->model($this->record)
            // ->statePath('data')
            ->operation('edit');
    }

    protected function getIdentificationSection(): Component
    {
        return Section::make('Identification')
            ->schema([
                Group::make()
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            // ->localizeLabel()
                            ->maxLength(255)
                            ->required(),
                        TextInput::make('phone_number')
                            ->tel()
                            ->nullable()
                            // ->localizeLabel(),
                    ])->columns(1),
                FileUpload::make('logo')
                    ->openable()
                    ->maxSize(2048)
                    // ->localizeLabel()
                    ->visibility('public')
                    ->disk('public')
                    ->directory('logos/company')
                    ->imageResizeMode('contain')
                    ->imageCropAspectRatio('1:1')
                    ->panelAspectRatio('1:1')
                    ->panelLayout('compact')
                    ->removeUploadedFileButtonPosition('center bottom')
                    ->uploadButtonPosition('center bottom')
                    ->uploadProgressIndicatorPosition('center bottom')
                    ->getUploadedFileNameForStorageUsing(
                        static fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend(Auth::user()->currentCompany->id . '_'),
                    )
                    ->extraAttributes(['class' => 'w-32 h-32'])
                    ->acceptedFileTypes(['image/png', 'image/jpeg']),
            ])->columns();
    }


}
