<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class userCounty extends Model
{

    protected $table = 'user_county';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'county'
    ];

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [

    ];
}
