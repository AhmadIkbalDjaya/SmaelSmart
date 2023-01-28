<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_Student;

class ControlCardController extends Controller
{
    public function index() {
        return view('control-card', [
            "title" => "Kartu Kontrol",
            "user_course" => Course_Student::get_user_course(),
        ]);
    }
}
