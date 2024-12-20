<?php

namespace App\Filament\Resources\HomebannersResource\Pages;

use App\Filament\Resources\HomebannersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomebanners extends EditRecord
{
    protected static string $resource = HomebannersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
