<?php

namespace App;

use App\Transformers\DeparmentTransfiormner;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = 'departments';

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    protected $fillable = ['id', 'name','province_id'];

    public $transformer = DeparmentTransfiormner::class;

    public function cities(){
        return $this->hasMany(City::class);
    }
}
