<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user () {
        return $this->hasOne(User::class);
    }
    public function course_student(){
        return $this->hasMany(Course_Student::class);
    }
}
