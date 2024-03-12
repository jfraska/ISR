<?php

namespace App\Filament\Resources\RecruitmentsResource\Pages;

use App\Filament\Resources\RecruitmentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecruitments extends ListRecords
{
    protected static string $resource = RecruitmentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
