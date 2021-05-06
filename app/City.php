<?php

namespace App;

use App\Transformers\CityTransfiormner;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'cities';

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    protected $fillable = ['id', 'name','department_id'];

    public $transformer = CityTransfiormner::class;
}
