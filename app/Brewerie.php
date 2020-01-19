<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brewerie extends Model
{
    protected $table = 'breweries';
    protected $fillable = array('name','claps');


    public function offers(){
        return $this->hasMany(Offer::class);
    }
}
