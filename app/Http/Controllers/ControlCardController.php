<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\ControlCard;
use App\Models\Course;

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
        return view('control-card.student', [
            "title" => "Kartu Kontrol",
            "user_course" => Course_Student::get_user_course(),
            "control_courses" => ControlCard::where('student_id', Auth::user()->student->id)->get(),
            "status" => $status,
        ]);
    }

    public function inputControlCard () {
        return view('control-card.input-ControlCard', [
            "title" => "Kartu kontrol",
            "user_course" => Course_Student::get_user_course(),
        ]);
    }

    public function inputControlCardEdit(Course $course) {
        return view('control-card.input-controlCard-edit', [
            "title" => "Update Status kartu Kontrol",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
            "control_cards" => ControlCard::where('course_id', $course->id)->get(),
        ]);
    }

    public function inputControlCardUpdate(Request $request, Course $course, ControlCard $controlCard){
        // dd($request);
        $validated = $request->validate([
            "daily_test" => '',
            "assignment" => '',
            "recitation" => '',
        ]);
        // dd($validated);
        ControlCard::where('id', $controlCard->id)->update($validated);
        return redirect("/inputControlCard/$course->id/edit")->with('success', 'Data kartu Kontrol Berhasil di Update');
    }
}
