<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $primaryKey = 'st_id';

    public $timestamps = true;

    protected $fillable = [
        'st_name',
        'st_first_name',
        'st_middle_name',
        'st_last_name',
        'st_phone',
        'anesthesiologist',
        'cardiologist',
        'crna',
        'family_md',
        'perfusionist',
        'physician_assistant',
        'surgeon',
        'st_active',
        'st_groups',
        'st_insertby',
        'close',
        'status'
    ];

}
