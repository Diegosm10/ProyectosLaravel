<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'date',
        'description',
        'kilometers_maintenance',
        'machine_id',
    ];

    public function machines(){
        return $this->hasMany(Machine::class);
    }
}
