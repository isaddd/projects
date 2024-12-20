<?php

namespace App\Filament\Resources\HomebannersResource\Pages;

use App\Filament\Resources\HomebannersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomebanners extends ListRecords
{
    protected static string $resource = HomebannersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
