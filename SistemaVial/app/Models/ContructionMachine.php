<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContructionMachine extends Model
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

    protected $table = 'construction_machines';


}
