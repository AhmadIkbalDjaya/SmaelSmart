<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function course(){
        return $this->belongTo(Course::class);
    }
    public function student(){
        return $this->belongTo(Student::class);
    }
}