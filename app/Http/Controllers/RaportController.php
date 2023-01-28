<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_Student;

class RaportController extends Controller
{
    public function index() {
        return view('raport', [
            "title" => "Raport",
            "user_course" => Course_Student::get_user_course(),
        ]);
    }
}
