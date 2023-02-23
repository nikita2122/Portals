<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'age_range',
        'denomination',
        'diocese',
        'church',
        'home',
        'state',
        'country',
        'education',
        'occupation',
        'enter_education',
        'talent_category',
        'physical',
        'preferred_accommodation',
        'transport_mode',
        'passport_photo',
        'is_printed',
        'unique_idn',
        'join_workforce',
        'workforce',
        'join_prayer',
        'prayer_day',
        'prayer_time',
        'group',
        'subgroup',
        'microgroup',
        'hostel',
    ];
}
