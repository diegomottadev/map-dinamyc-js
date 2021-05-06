<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends ApiController
{
    public function index()
    {
        //
        $countries = Country::all();
        return $this->showAll($countries);

    }

    public function show(Country $country)
    {
        //
        return $this->showOne($country);
    }
}
