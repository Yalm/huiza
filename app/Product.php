<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];

    public function category()
    {
      return $this->belongsTo(Category::class);
  
    }

    public function scopeSearchProduct($query,$name) 
    {
      return $query->with('category')->where('name' ,'LIKE', "%$name%");
    }

    public function orders()
    {
      return $this->belongsToMany(Order::class, 'order_details')->withTimestamps();
  
    }

}
