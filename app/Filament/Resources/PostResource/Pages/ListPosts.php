<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected static string $view = 'filament.resources.posts.pages.list-posts';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Article' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'Article')),
            'News' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'News')),
            'Mini Blog' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'Mini Blog')),
        ];
    }
}
