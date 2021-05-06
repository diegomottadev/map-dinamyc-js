<?php

namespace App\Transformers;

use App\City;
use League\Fractal\TransformerAbstract;

class CityTransfiormner extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];


    public function transform(City $city)
    {
        return [
            //
            'id' => (int)$city->id,
            'name' => (string) $city->name,

        ];
    }

    public static function originalAttributes($index){
        $attributes = [
            //
            'id' => 'id',
            'name' => 'name',

        ];

        return isset($attributes[$index]) ? $attributes[$index]:null;
    }
}
