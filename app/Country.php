<?php

namespace App;

use App\Transformers\CountryTransfiormner;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'countries';

    protected $dates = ['created_at', 'updated_at','deleted_at'];

    protected $fillable = ['id', 'name'];


    public $transformer = CountryTransfiormner::class;

    public function provinces(){
        return $this->hasMany(Province::class);
    }
}
