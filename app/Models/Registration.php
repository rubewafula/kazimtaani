<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $table = 'registration';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id', 'first_name',  'other_names', 'last_name'.
        'dob','gender', 'disabled', 'phone_number', 'national_id',
        'id_serial_number', 'district_of_birth', 'county', 'sub_county',
        'ward', 'village', 'residence', 'education', 'skill_level', 'preferred_job'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'dob' => 'datetime',

    ];
}
