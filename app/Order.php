<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =[];

    public function customer()
    {
      return $this->belongsTo(Customer::class);
  
    }

    public function products()
    {
      return $this->belongsToMany(Product::class,'order_details')->withTimestamps()->withPivot('quantity');
    }

    public function getIdFormat()
    {
      $id = md5($this->attributes['id'] . $this->attributes['created_at'] );
      return $id;
    }
    
}