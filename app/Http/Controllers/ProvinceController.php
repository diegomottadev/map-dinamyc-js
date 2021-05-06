<?php

namespace App\Http\Controllers;

use App\Country;
use App\Province;

class ProvinceController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
    {
        //
        $provinces = $country->provinces;
        return $this->showAll($provinces);

    }

    public function show(Country $country, Province $province)
    {
        //
        return $this->showOne($province);
    }

}
