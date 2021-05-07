<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class MapController extends ApiController
{
    //

    public function edit(Address $address){

        return view('edit',compact('address'));
    }

    public function store(Request $request){

        $rules = [
            'country' =>'required',
            'province' =>'required',
            'department' =>'required',
            'city' =>'required',
            'street' =>'required',
            'number' =>'required',
        ];
        $this->validate($request,$rules);

        $address = Address::create([
            'country_id' => $request->get('country'),
            'province_id'=>$request->get('province'),
            'department_id'=>$request->get('department'),
            'city_id'=>$request->get('city'),
            'street'=>$request->get('street'),
            'number'=>$request->get('number'),
            'dpto'=>$request->get('dpto'),
            'floor'=> $request->get('floor'),
            'latitud'=>$request->get('lat'),
            'longitud'=>$request->get('lon')
        ]);

        return $this->showOne($address);
    }


    public function update(Request $request, Address $address){


            $address->country_id= $request->get('country');
            $address->province_id=$request->get('province');
            $address->department_id=$request->get('department');
            $address->city_id=$request->get('city');
            $address->street=$request->get('street');
            $address->number=$request->get('number');
            $address->dpto=$request->get('dpto');
            $address->floor= $request->get('floor');
            $address->latitud=$request->get('lat');
            $address->longitud=$request->get('lon');
            $address->save();
            return $this->showOne($address);
    }

    public function show(Address $address){
        return $this->showOne($address);
    }
}
