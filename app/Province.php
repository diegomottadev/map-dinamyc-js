<?php

namespace App;

use App\Transformers\ProvinceTransfiormner;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'provinces';

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    protected $fillable = ['id', 'name','country_id'];

    public $transformer = ProvinceTransfiormner::class;

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
