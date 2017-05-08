<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items() {
		
		return $this->hasMany('App\Item');
	}
    public function accounts()
    {
        return $this->belongToMany('App\Account')->withTimestamps();
    }
}
