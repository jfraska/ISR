<?php

namespace App\Filament\Resources\AgendaResource\Pages;

use App\Filament\Resources\AgendaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;

    protected function afterCreate(): void
    {
        $this->record->is_published ?  $this->record->setStatus('reviewing') : $this->record->setStatus('draft');
    }
}