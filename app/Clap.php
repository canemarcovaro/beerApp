<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clap extends Model
{
    protected $table = 'claps';
    protected $fillable = array('quantity');


    public function offers(){
        return $this->hasMany(Brewerie::class);
    }
}
