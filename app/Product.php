<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
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
	
	public static function top7Product($f1,$f2)
	{
		return DB::table('order_details')
		->join('products', 'order_details.product_id', '=', 'products.id')
		->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('product_id','products.name','products.description', DB::raw('sum(quantity) as TotalQuantity') )
		->whereBetween('orders.created_at', [$f1, $f2])
		->groupBy('product_id','products.name','products.description')
        ->orderBy(DB::raw('sum(quantity)'), 'desc')
        ->take(7)
        ->get();
	}

}
