<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_type extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('type');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\Models\Donation_request');
    }

    public function client()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}