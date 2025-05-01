<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['student_id', 'name', 'amount', 'start_date', 'end_date'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
