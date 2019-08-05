<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = ['title' , 'body' , 'donation_request_id'];

    public function donation_requests()
    {
        return $this->belongsTo('App\Models\Donation_request');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}