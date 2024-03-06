<?php

namespace App\Filament\Pages\Setting;

use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class OrganizationalProfile extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $title = 'organizational Profile';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'settings/organizational-profile';

    protected static string $view = 'filament.pages.setting.organizational-profile';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getIdentificationSection(),
                $this->getLocationDetailsSection(),
                $this->getLegalAndComplianceSection(),
            ])
            ->model($this->record)
            ->statePath('data')
            ->operation('edit');
    }
}
