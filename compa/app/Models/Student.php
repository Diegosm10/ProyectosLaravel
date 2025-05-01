<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Carrer;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','last_name', 'name', 'dni', 'birthdate'];

    public function grant(){
        return $this->hasMany(Grant::class, 'student_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }
}
