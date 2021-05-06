<?php

namespace App\Transformers;

use App\Department;
use League\Fractal\TransformerAbstract;

use function PHPUnit\Framework\isEmpty;

class DeparmentTransfiormner extends TransformerAbstract
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
    public function transform(Department $department)
    {
        return [
            //
            'id' => (int)$department->id,
            'name' => (string) $department->name,
            'cities' => (object) $department->cities != null ?  $department->cities : null
        ];
    }

    public static function originalAttributes($index){
        $attributes = [
            //
            'id' => 'id',
            'name' => 'name',
            'cities' => 'cities'
        ];

        return isset($attributes[$index]) ? $attributes[$index]:null;
    }
}
