<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BapModel extends Model
{
    public function bap(){
        return $this->belongsTo('App\Models\User');
    }
}
