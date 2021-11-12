<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{


    public $table= 'activity_log';

    public function causer()
    {
        return  $this->belongsTo(User::class,'causer_id');
    }
}
