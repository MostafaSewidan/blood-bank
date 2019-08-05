<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
    public function client()
    {
        return $this->hasManyThrough(Client::class , City::class);
    }
    public function donations()
    {
        return $this->hasManyThrough(Donation_request::class , City::class);
    }

}