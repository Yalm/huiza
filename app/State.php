<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $guarded =[];
	
    public function orders()
    {
      return $this->hasMany(Order::class);
  
    }
}
