<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\Course;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index() {
        // return view('home');
        if (Auth::user()->level == 3) {
            $user_course = Course_Student::get_student_course();
        } elseif(Auth::user()->level == 2){
            $user_course = Course_Student::get_teacher_course();
        } else {
            $user_course =  null;
        }
        
        return view('home', [
            "user_course" => $user_course,
        ]);
    }
}
