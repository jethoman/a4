<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     public function orders()
     {
         return $this->belongToMany('App\Order')->withTimestamps();
     }
}
