<?php

namespace App\Transformers;

use App\Address;
use League\Fractal\TransformerAbstract;

class AddressTransformer extends TransformerAbstract
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


    public function transform(Address $address)
    {
        return [
            //
            'id' => (int)$address->id,
            'country'=> (int) $address->country_id,
            'province'=>(int) $address->province_id,
            'department'=> (int)$address->department_id,
            'city'=> (int)$address->city_id,
            'street'=> (string) $address->street,
            'number'=> (string) $address->number,
            'dpto'=> (string)$address->dpto,
            'floor'=> (string)$address->floor,
            'latitud'=> (float)$address->latitud,
            'longitud'=>(float) $address->longitud,
        ];
    }

    public static function originalAttributes($index){
        $attributes = [
            //
            'id' => 'id' ,
            'country'=> 'country',
            'province'=> 'province',
            'department'=> 'department',
            'city'=> 'city',
            'street'=> 'street',
            'number'=> 'number',
            'dpto'=> 'dpto',
            'floor'=> 'floor',
            'latitud'=> 'latitud',
            'longitud'=> 'longitud',
        ];

        return isset($attributes[$index]) ? $attributes[$index]:null;
    }
}
