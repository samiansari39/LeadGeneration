<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentGroup extends Model
{
    protected $primaryKey = 'eqg_id';
    protected $table = 'equipment_groups';
    protected $fillable = [
        'eqg_name',
        'eqg_active',
        'eqg_insertby',
        'close',
        'status',
    ];
}
