<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    public function getAll(){
       
        $breweries = Brewerie::all();
        return $breweries;
    }

    public function add(Request $request){
    $brewery = Brewerie::create($request->all());
    return $brewery;
    }

    public function get($id){
    $brewery = Brewerie::find($id);
    return $brewery;
    }

    public function edit($id,Request $request){
        
        $brewery = $this->get($id);
        $brewery->fill($request->all()->save());
        return $brewery; 
    }
}
