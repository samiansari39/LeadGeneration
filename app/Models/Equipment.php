<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $primaryKey = 'eq_id';
    protected $table = 'equipments';
    protected $fillable = [
        'eq_type',
        'eq_manufacturer',
        'eq_name',
        'eq_serial',
        'eq_lastservice',
        'eq_nextservice',
        'eq_billingcode',
        'eq_notes',
        'eq_active',
        'eq_insertby',
        'close',
        'status',
    ];

    public function equipmentGroup()
    {
        return $this->belongsTo(EquipmentGroup::class, 'eq_type', 'eqg_id');
    }
}
