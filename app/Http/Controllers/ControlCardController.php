<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\ControlCard;

class ControlCardController extends Controller
{
    public function index() {
        $control_courses = ControlCard::where('student_id', Auth::user()->student->id)->get();
        $status = 1;
        foreach($control_courses as $control_course){
            if($control_course->daily_test == 0 || $control_course->assignment == 0 || $control_course->recitation == 0){
                $status = 0;
                break;
            }
        }
        return view('control-card', [
            "title" => "Kartu Kontrol",
            "user_course" => Course_Student::get_user_course(),
            "control_courses" => ControlCard::where('student_id', Auth::user()->student->id)->get(),
            "status" => $status,
        ]);
    }
}
