<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = array('name','detail');


    public function brewerie(){
        return $this->belongsTo(Breweries::class);
    }
}
