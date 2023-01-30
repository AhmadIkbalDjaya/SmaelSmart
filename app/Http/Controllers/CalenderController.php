<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\Announcement;

class CalenderController extends Controller
{
    public function index() {
        return view('calender', [
            "title" => 'Calender',
            "user_course" => Course_Student::get_user_course(),
            "active_announcement" => Announcement::getAnnouncement(),
        ]);
    }
}
