<?php

namespace App\Filament\Resources\CompetitionResource\Pages;

use App\Filament\Resources\CompetitionResource;
use App\Models\Category;
use App\Models\Competition;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCompetitions extends ListRecords
{
    protected static string $resource = CompetitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [];
        $post = new Competition;
        $categories = Category::query()->where('model', $post->getMorphClass())->pluck('name', 'id');

        foreach ($categories as $id => $category) {
            $tabs[$category] = Tab::make($category)
                ->modifyQueryUsing(function (Builder $query) use ($id) {
                    return $query->where('category_id', $id);
                });
        }

        return $tabs;
    }
}
