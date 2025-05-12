<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $filiable = [
        'name',
    ];

    public function constructions(){
        return $this->belongsTo(Construction::class);
    }
}
