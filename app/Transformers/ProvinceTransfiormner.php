<?php

namespace App\Transformers;

use App\Province;
use League\Fractal\TransformerAbstract;

use function PHPUnit\Framework\isEmpty;

class ProvinceTransfiormner extends TransformerAbstract
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

    public function transform(Province $province)
    {
        return [
            //
            'id' => (int)$province->id,
            'name' => (string) $province->name,
            'departments' => (object) $province->departments !=null ? $province->departments : null,
        ];
    }

    public static function originalAttributes($index){
        $attributes = [
            //
            'id' => 'id',
            'name' => 'name',
            'departments' => 'departments'
        ];

        return isset($attributes[$index]) ? $attributes[$index]:null;
    }
}
