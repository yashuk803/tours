<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected  $table = 'images_tours';
    function tours(){
        return $this->belongsTo('App\Models\Tour');
    }
}
