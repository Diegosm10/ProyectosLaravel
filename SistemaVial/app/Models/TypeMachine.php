<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMachine extends Model
{
    
    protected $fillable = [
        'name',
        'kilometers_maintenance'
    ];

    public function machines(){
        return $this->hasMany(Machine::class);
    }
}

