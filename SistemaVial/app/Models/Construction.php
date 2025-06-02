<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    /** @use HasFactory<\Database\Factories\ConstructionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'province_id',
    ];

    public function machines(){
        return $this->belongsToMany(Machine::class, 'construction_machines');
    }

    public function constructionMachines()
    {
    return $this->hasMany(ConstructionMachines::class, 'construction_id');  
    }

    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
