<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $table = 'supplies';
    protected $primaryKey = 'sp_id';
    protected $fillable = [
        'sp_type',
        'sp_manufacturer',
        'sp_name',
        'sp_lotno',
        'sp_expdate',
        'sp_billingcode',
        'sp_notes',
        'sp_active',
        'sp_groups',
        'sp_insertby',
        'close',
        'status'
    ];
    public function supplyGroup()
    {
        return $this->belongsTo(SupplyGroup::class, 'sp_type', 'spg_id');
    }

}
