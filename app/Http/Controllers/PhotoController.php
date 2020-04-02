<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brewerie;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $user = $request->user();
        $userBrewery = Brewerie::where('user_id',$user->id)->first();

        $images = $userBrewery->getMedia();
        $publicUrl = $images[0]->getFullUrl();
        return $publicUrl;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = $request->user();

        $userBrewery = Brewerie::where('user_id',$user->id)->first();
        $userBrewery->addMedia($request->image)->toMediaCollection();
        //dd($userBrewery);
        $image = $request->file('image');
        //print_r($image);
        return $image->getClientOriginalName();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
