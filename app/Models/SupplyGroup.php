<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplyGroup extends Model
{
    protected $primaryKey = 'spg_id';
    protected $table = 'supply_groups';
    protected $fillable = [
        'spg_name',
        'spg_active',
        'spg_insertby',
        'close',
        'status',
    ];
}
