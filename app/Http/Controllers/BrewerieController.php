<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewerie;
use App\Clap;
use Illuminate\Support\Facades\DB;

class BrewerieController extends Controller
{
    public function getAll(){
       
        

      $breweries =  Brewerie::join('claps', 'breweries.id', '=', 'claps.brewery_id')->select('breweries.name','breweries.id','breweries.lat','breweries.lon',DB::raw("count(claps.id) as clapsCuantity"))->groupBy('breweries.id')->get();
        
    /*  $photo = $breweries[0]->getMedia();
     return  $img = $photo[0]->getFullUrl();*/
      
        for ($i=0; $i <$breweries->count(); $i++) {

          for ($j=0; $j <$breweries[$i]->getMedia()->count(); $j++) { 
           $imgUrl = $breweries[$i]["media"][$j]->getFullUrl();
           //dd($breweries[$i]["media"][0]["id"]);

           $breweries[$i]["media"][$j]["imgUrl"] = $imgUrl;
           
          }
        }

        return $breweries; 
    }

    public function add(Request $request){

    $user = $request->user();

    $userBrewery = Brewerie::where('user_id',$user->id)->first();
    
    if($userBrewery){
        return "ERROR: SOLO PUEDE CREAR UNA CERVECERIA POR CUENTA.";
     }
   
    $brewery = new Brewerie;
    $brewery->name = $request->name;
    $brewery->user_id = $user->id;
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

    public function addClapToBrewery(Request $request){
        
     // dd($request->brewery_id);
       
        $clap = Clap::firstOrCreate(['user_id' => $request->user()->id, 'brewery_id'=> $request->brewery_id]);
        
      

        $quantityClaps = Clap::where('brewery_id', '=',$request->brewery_id)->count();
        return $quantityClaps;


    
       

    }
    public function deleteClapToBrewery(Request $request,$id){
        
        // dd($request->brewery_id);
        $brewery = Clap::where([
            ['user_id', '=', $request->user()->id],
            ['brewery_id', '=', $id],
        ])->delete();


       
           
         
   
           $quantityClaps = Clap::where('brewery_id', '=',$id)->count();
           return $quantityClaps;
   
   
       
          
   
       }

    public function getBestBreweries(){

        $breweries = Brewerie::all();
        $breweries = $breweries->sortByDesc('claps');
        return $breweries;
    }

  
}
