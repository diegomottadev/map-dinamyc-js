<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Department;
use App\Province;
use Illuminate\Http\Request;

class CityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country, Province $province,Department $department)
    {
        //
        $cities = $department->cities;
        return $this->showAll($cities);

    }

    public function show(Country $country, Province $province,Department $department, City $city)
    {
        //
        return $this->showOne($city);
    }
}
