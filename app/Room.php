<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['id', 'room_name', 'description', 'site_id', 'created_at', 'updated_at'];
}
