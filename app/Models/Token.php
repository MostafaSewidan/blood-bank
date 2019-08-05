<?php

namespace App\Model;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected  $table = 'tokens';
    public $timestamps = true;
    protected $fillable = array('client_id', 'token' , 'is_read');

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
