<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    public static function get_user_course(){
        $user_course_id = Course_Student::where('student_id', Auth::user()->student->id)->get()->pluck('course_id');
        return Course::whereIn('id', $user_course_id)->get();
    }
}
