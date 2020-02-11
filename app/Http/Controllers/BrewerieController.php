<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewerie;
use App\Clap;

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
        return "ERROR: SOLO PUEDE CREAR UNA CERCERIA POR CUENTA.";
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

        $user = $request->user();
        $brewery = $this->get($id);
       
        if($user->id != $brewery->user_id){
         return "ERROR: No puede modificar cerveceria de distinto dueño.";
        }
        $brewery->fill($request->all())->save();

        return $brewery; 
    }

    public function addClapToBrewery($id, Request $request){
        
        $brewery = $this->get($id);
        $breweryClaps = $brewery->claps;
        $brewery->claps = $breweryClaps + 1;
        $brewery->save();
        
        return $brewery;
       

    }
    public function getBestBreweries(){

        $breweries = Brewerie::all();
        $breweries = $breweries->sortByDesc('claps');
        return $breweries;
    }
}
