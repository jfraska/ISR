<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompetition extends CreateRecord
{
    protected static string $resource = CompetitionResource::class;

    protected function afterCreate(): void
    {
        $this->record->is_published ?  $this->record->setStatus('reviewing') : $this->record->setStatus('draft');
    }
}
