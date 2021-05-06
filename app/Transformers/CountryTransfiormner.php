<?php

namespace App\Transformers;

use App\Country;
use League\Fractal\TransformerAbstract;

use function PHPUnit\Framework\isEmpty;

class CountryTransfiormner extends TransformerAbstract
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

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Country $country)
    {
        return [
            //
            'id' => (int)$country->id,
            'name' => (string) $country->name,
            'provinces' => (object) $country->provinces!= null ?  $country->provinces: null,
        ];
    }

    public static function originalAttributes($index){
        $attributes = [
            //
            'id' => 'id',
            'name' => 'name',
            'provinces' => 'provinces'
        ];

        return isset($attributes[$index]) ? $attributes[$index]:null;
    }
}
