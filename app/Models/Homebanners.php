<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class Homebanners extends Model
{
    use Sushi;

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'description',
        // Add other fields you want to allow mass assignment on
    ];

    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        //API
        $homebanners = Http::get('http://candid_website.bagas.be-laravue.s2.fabindonesia.tech/api/about-us')->json();
        // dd($homebanners);
        //filtering some attributes
        $homebanners = Arr::map($homebanners['data'], function ($item) {
            return Arr::only(
                $item,
                [
                    'id',
                    'title',
                    'description',
                    'banner',
                    // 'name',
                    // 'frame_id'
                ]
            );
        });
        // dd($homebanners);

        return $homebanners;
    }
}
