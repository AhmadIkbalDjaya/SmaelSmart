<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course_Student;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            "title" => "Smael Smart",
            "user_course" => Course_Student::get_user_course(),
            "active_announcement" => Announcement::getAnnouncement(),
        ]);
    }
}
