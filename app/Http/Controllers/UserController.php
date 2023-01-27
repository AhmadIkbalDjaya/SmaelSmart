<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course_Student;

class UserController extends Controller
{
    public function index(User $user){
        if($user->level == 3){
            $profile = $user->student;
        }elseif($user->level == 2){
            $profile = $user->teacher;
        }
        return view('profile', [
            "title" => "Profile $user->name",
            "user_course" => Course_Student::get_user_course(),
            "profile" => $profile,
        ]);
    }
}
