<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_Student;

class CalenderController extends Controller
{
    public function index() {
        return view('calender', [
            "title" => 'Calender',
            "user_course" => Course_Student::get_user_course(),
        ]);
    }
}
