<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App_setting extends Model 
{

    protected $table = 'app_settings';
    public $timestamps = true;
    protected $fillable = array('about_app', 'phone', 'email', 'facebook_link', 'twitter_link', 'youtube_link', 'instagram_link', 'whats_app', 'googleplus_link');

}