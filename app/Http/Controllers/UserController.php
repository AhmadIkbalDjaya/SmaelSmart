<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            "user" => $user,
            "profile" => $profile,
        ]);
    }
}
