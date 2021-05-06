<?php

namespace App\Http\Controllers;

use App\Country;
use App\Department;
use App\Province;

class DeparmentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country, Province $province)
    {
        //
        $department = $province->departments;
        return $this->showAll($department);

    }

    public function show(Country $country, Province $province,Department $department)
    {
        //
        return $this->showOne($department);
    }

}
