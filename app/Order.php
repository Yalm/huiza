<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\OrderNotification;
use Illuminate\Notifications\Notifiable;

use Jenssegers\Date\Date;
use DB;
use  Illuminate\Support\Collection as Collection;

class Order extends Model
{
	use Notifiable;

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
		$parameter =[
            'id' => $this->attributes['id'],
        ];
		$parameter= Crypt::encrypt($parameter);
	
      	//$id = md5($this->attributes['id'] . $this->attributes['created_at'] );
      return $parameter;
    }
    
    public function getTotalPrice() 
    {
      return $this->products->sum(function($product) 
      {
        return $product->pivot->quantity * $product->price;
      });
    }

    public function state()
    {
      return $this->belongsTo(State::class);
  
    }
    public function getColorState()
    {
		switch ($this->attributes['state_id'] ) 
		{
			case 1:
				return 'state_red';
				break;
			case 2:
				return 'state_green';
				break;
			case 3:
				return 'state_yellow';
				break;
			case 4:
				return 'state_blue';
				break;
			default:
				echo "state_error";
		}

	}
	
	public function notes()
    {
      return $this->hasMany(Note::class);
	}
	
	public function sendOrderNotification($order)
    {
        $this->notify(new OrderNotification($order));
    }
	
	
	public function getCreatedAtAttribute($date)
	{
		return new Date($date);
	}

	public static function topCustomer($f1,$f2)
	{
		return DB::table('orders')
		->join('customers', 'customers.id', '=', 'orders.customer_id')
		->select('customers.name','customers.surnames','customers.email',DB::raw('count(customer_id) as purchases'))
		->where('state_id','=','2')
		->whereBetween('orders.created_at', [$f1,  $f2])		
		->groupBy('customer_id','customers.name','customers.surnames','customers.email')
		->orderBy(DB::raw('count(customer_id)'), 'desc')
		->take(9)		
		->get();
	}

	public static function purchases($f1,$f2)
	{
		$orders =  DB::table('orders')
		->join('customers', 'customers.id', '=', 'orders.customer_id')
		->select('orders.id')
		->where('state_id','=','2')
		->whereBetween('orders.created_at', [$f1,  $f2])		
		->get();

		$popular= [];
		foreach($orders as $order)
		{
			array_push($popular,Order::find($order->id));
		}
		$collection = Collection::make($popular);

		return $collection;
	}
}
