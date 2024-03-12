<?php

namespace App\Filament\Resources\RecruitmentsResource\Pages;

use App\Filament\Resources\RecruitmentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecruitments extends EditRecord
{
    protected static string $resource = RecruitmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
