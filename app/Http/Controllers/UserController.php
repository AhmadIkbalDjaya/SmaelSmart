<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Models\Course_Student;

class UserController extends Controller
{
    public function profile(User $user){
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

    public function create(){
        return view('user-add', [
            "title" => "Tambah User",
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:8|max:255',
            'name' => 'required|max:255',
            'level' => 'required|in:2,3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $new_user = [
            'username' => $validated['username'],
            'password' => $validated['password'],
            'name' => $validated['name'],
            'level' => $validated['level'],
        ];
        
        $user = User::create($new_user);
        // $profile = ['user_id'=>$user->id];
        $profile = [
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'user_id'=>$user->id
        ];

        if($validated['level'] == 3){
            Student::create($profile);
        }elseif($validated['level'] == 2){
            Teacher::create($profile);
        }
        return redirect('/');
    }

}
