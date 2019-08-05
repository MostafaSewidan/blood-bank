<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation_request extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'age', 'bags_number', 'hospital_name', 'hospital_address', 'detail',
        'city_id','blood_type_id','phone');

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function governorates()
    {
        return $this->hasManyThrough( Governorate::class ,City::class );
    }


    public function blood_types()
    {
        return $this->belongsTo('App\Models\Blood_type');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}