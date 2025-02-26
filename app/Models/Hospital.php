<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $primaryKey = 'hos_id';
    protected $fillable = [
        'hos_name',
        'zip_code',
        'region',
        'national_pro_id',
        'active',
        'hos_insertby',
        'close',
        'status',
    ];
}
