<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionMachines extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'reason_for_the_end',
        'km_traveled',
        'construction_id',
        'machine_id',  
    ];

      public function construction()
    {
        return $this->belongsTo(Construction::class, 'construction_id');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id');
    }

    public function maintenances()
    {
    return $this->hasMany(Maintenance::class, 'machine_id', 'machine_id');
    }

}
