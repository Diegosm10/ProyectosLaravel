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
        return $this->belongsTo(TypeMachine::class, 'type_machine_id', 'id');
    }

    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }
}
