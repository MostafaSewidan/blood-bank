<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'sms_title', 'sms_body' ,'client_id');

    public function clients()
    {
        return $this->belongsTo('App\Models\Client');
    }

}