<?php

namespace App\Models;

use App\Model\Token;
use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email','api_token', 'birth_date',
        'donation_last_date', 'phone', 'password', 'pin_code','city_id','blood_type_id' ,'activation');
    protected $hidden = ['api_token' , 'password','activation'];
    public function cites()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function blood_types()
    {
        return $this->belongsTo('App\Models\Blood_type');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function blood_type()
    {
        return $this->belongsToMany('App\Models\Blood_type');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}