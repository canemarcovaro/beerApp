<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Brewerie;

class OfferController extends Controller
{
    public function getAll(){
       
        $offers = Offer::all();
        return $offers;
    }

    public function add(Request $request){
    
    $user = $request->user();
    
    $brewery = Brewerie::where('user_id',$user->id)->first();
    
    $offer = new Offer;
    $offer->name = $request->name;
    $offer->detail = $request->detail;
    $offer->brewery_id=$brewery->id;
    $offer->save();

    return $offer;

    }

    public function get($id){
    $offer = Offer::find($id);
    return $offer;
    }

    public function edit($id,Request $request){
        
        $offer = $this->get($id);
        $offer->fill($request->all())->save();
        return $offer;
    }
}
