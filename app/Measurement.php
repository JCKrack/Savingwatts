<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $table = 'measurements';
    public function Device()
    {
    	return $this->belongTo('App\Device');
    }
}
