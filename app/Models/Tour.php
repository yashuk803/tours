<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected  $table = 'tours';
    function images(){
        return $this->hasMany('App\Models\Image', 'tours_id');
    }


}
