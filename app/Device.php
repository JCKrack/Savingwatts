<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    public function measurements()
    {
    	return $this->hasMany('App\Measurement');
    }
}
