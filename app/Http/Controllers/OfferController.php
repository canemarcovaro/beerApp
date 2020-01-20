<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    public function getAll(){
       
        $offers = Offer::all();
        return $offers;
    }

    public function add(Request $request){
    $offer = Offer::create($request->all());
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
