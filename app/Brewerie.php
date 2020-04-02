<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Brewerie extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $table = 'breweries';
    protected $fillable = array('name','claps');


    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
      
}
