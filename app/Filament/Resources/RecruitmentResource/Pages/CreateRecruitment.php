<?php

namespace App\Filament\Resources\RecruitmentResource\Pages;

use App\Filament\Resources\RecruitmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateRecruitment extends CreateRecord
{
    protected static string $resource = RecruitmentResource::class;

    protected function afterCreate(): void
    {
        $this->record->is_published ?  $this->record->setStatus('reviewing') : $this->record->setStatus('draft');
    }
}
