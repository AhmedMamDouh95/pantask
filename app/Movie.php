<?php

namespace App;
use App\Set;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function set(){
    return	$this->belongsTo(Set::class);
    }
}
