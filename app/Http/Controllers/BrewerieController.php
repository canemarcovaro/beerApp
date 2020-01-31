<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewerie;

class BrewerieController extends Controller
{
    public function getAll(){
       
        $breweries = Brewerie::all();
        return $breweries;
    }

    public function add(Request $request){

    $user = $request->user();

    $userBrewery = Brewerie::where('user_id',$user->id)->first();
    
    if($userBrewery){
        dd("ERROR: SOLO PUEDE CREAR UNA CERCERIA POR CUENTA.");
     }
   
    $brewery = new Brewerie;
    $brewery->name = $request->name;
    $brewery->user_id = $user->id;
    $brewery->claps  = 0;
    $brewery->save();

    return $brewery;

    }

    public function get($id){
    $brewery = Brewerie::find($id);
    return $brewery;
    }

    public function edit($id,Request $request){
        
        $brewery = $this->get($id);
        $brewery->fill($request->all())->save();
        return $brewery; 
    }
}
