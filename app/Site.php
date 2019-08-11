<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $fillable = ['id', 'site_name', 'description', 'site_status', 'account_id', 'created_at', 'updated_at'];
}
