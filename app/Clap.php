<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clap extends Model
{
    protected $table = 'claps';
    protected $fillable = array('brewery_id','user_id');


    public function offers(){
        return $this->hasMany(Brewerie::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
