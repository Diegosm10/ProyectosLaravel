<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Construction;

class Machine extends Model
{
    /** @use HasFactory<\Database\Factories\MachineFactory> */
    use HasFactory;

    protected $fillable = [
        'brand_model',
        'kilometers',
        'type_machine_id',
    ];

    public function constructions(){
        return $this->belongsToMany(Construction::class, 'construction_machines');
    }

    public function type_machines(){
        return $this->hasMany(TypeMachine::class);
    }

    public function maintenances(){
        return $this->belongsTo(Maintenance::class);
    }
}
