<?php

namespace App\Filament\Resources\HomebannersResource\Pages;

use App\Filament\Resources\HomebannersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use App\Models\Homebanners;

class CreateHomebanners extends CreateRecord
{
    protected static string $resource = HomebannersResource::class;

    protected function handleRecordCreation(array $homebanners): Model
    {
        // $homebanners = new Homebanners([
        //     'title' => $homebanners['title'],
        //     'description' => $homebanners['description'],
        // ]);
        // // Your logic here .......
        Http::post('http://candid_website.bagas.be-laravue.s2.fabindonesia.tech/api/about-us', $homebanners);
        //reutn $model

        // dd(json_encode($homebanners));
        return static::getModel()::create($homebanners);

    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
