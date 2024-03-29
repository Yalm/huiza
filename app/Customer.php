<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function verifyCustomer()
    {
        return $this->hasOne(VerifyCustomer::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
  
    }

    public function document()
    {
      return $this->belongsTo(Document::class);
  
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }

    public function verifiedData()
    {
        if($this->attributes['surnames'] == null ||
        $this->attributes['phone'] == null ||
        $this->attributes['document_number'] == null)
        {
            return false;
        }
        return true;
    }
}
