<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\Course;

class HomeController extends Controller
{
    public function index() {
        // $course_student_id = Course_Student::where('student_id', Auth::user()->student->id)->get()->pluck('course_id');
        // $user_course_id = Course_Student::get_courseId_user();
        // $user_course = Course::whereIn('id', $user_course_id)->get();

        // dd($course);
        // return view('home');
        return view('home', [
            "user_course" => Course_Student::get_user_course(),
        ]);
    }
}
