<?php

namespace App;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded =[];

    public function order()
    {
      return $this->belongsTo(Order::class);
  
	}

	public function user()
    {
      return $this->belongsTo(User::class);
  
    }

	public function getCreatedAtAttribute($date)
	{
		return new Date($date);
	}

	public function formatDate()
	{
		$date = $this->created_at->format('d F \,\ Y \a\ \\l\\a\\s h:i:a');
		return $date;
	}

}
