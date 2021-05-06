<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    //
    use SoftDeletes;

    protected $table = 'addresses';

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    protected $fillable = ['id', 'country_id', 'province_id', 'department_id', 'city_id','street','number','dpto', 'floor' ,'latitud','longitud'];

}
