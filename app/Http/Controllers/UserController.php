<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Student;
use App\Models\Claass;
use App\Models\Teacher;
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


    public function index () {
        return view('user.index', [
            "title" => "Manage User",
            "users" => User::whereNot('id', '1')->orderBy('created_at', 'desc')->get(),
        ]);
    }


    public function show(User $user) {
        if($user->level == 3){
            $profile = $user->student;
        }elseif($user->level == 2){
            $profile = $user->teacher;
        }
        return view('user.show', [
            "title" => "Detail " . $profile->user->name,
            "profile" => $profile,
        ]);
    }


    public function create(){
        return view('user.create', [
            "title" => "Tambah User",
            "claasses" => Claass::all(),
        ]);
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'name' => 'required|max:255',
            'level' => 'required|in:2,3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'claass_id' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $new_user = [
            'username' => $validated['username'],
            'password' => $validated['password'],
            'name' => $validated['name'],
            'level' => $validated['level'],
        ];
        
        $user = User::create($new_user);
        $profile = [
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
            'user_id'=>$user->id
        ];

        if($validated['level'] == 3){
            $profile['claass_id'] = $validated['claass_id'];
            Student::create($profile);
        }elseif($validated['level'] == 2){
            Teacher::create($profile);
        }
        return redirect('/user')->with('success', 'User Baru Berhasil Ditambahkan');
    }


    public function edit(User $user)
    {
        if($user->level == 3){
            $profile = $user->student;
        }elseif($user->level == 2){
            $profile = $user->teacher;
        }
        return view('user.edit', [
            "title" => "Edit User ".$profile->user->name,
            "profile" => $profile,
            "claasses" => Claass::all(),
        ]);
    }


    public function update(Request $request){
        $validated = $request->validate([
            'username' => "required|unique:users,username,$request->user_id",
            'password' => '',
            'name' => 'required|max:255',
            'level' => 'required|in:2,3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'claass_id' => '',
        ]);

        if(!$request->password){
            $validated['password'] = $request->passwordOld;
        }else{
            $validated['password'] = Hash::make($validated['password']);
        }
        $update_user = [
            'username' => $validated['username'],
            'password' => $validated['password'],
            'name' => $validated['name'],
            'level' => $validated['level'],
        ];
        $update_profile = [
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'gender' => $validated['gender'],
        ];
        User::where('id', $request->user_id)->update($update_user);

        if($request->user_level == 3){
            if($validated['level'] != $request->user_level){
                // Teacher create & dan hapus data student berdasarka id
                $update_profile['user_id'] = $request->user_id;
                // dd($request->user_id);
                Student::destroy($request->student_id);
                Teacher::create($update_profile);
            }
            else{
                // ambil id student berdasarkan user id
                // $student_id = $user->student->id;
                $student_id = Student::where('user_id', $request->user_id)->pluck('id')->first();
                // Student update
                $update_profile['claass_id'] = $validated['claass_id'];
                Student::where('id', $student_id)->update($update_profile);
            }
        }elseif($request->user_level == 2){
            if($validated['level'] != $request->user_level){
                // Student create
                $update_profile['claass_id'] = $validated['claass_id'];
                $update_profile['user_id'] = $request->user_id;
                Teacher::destroy($request->teacher_id);
                Student::create($update_profile);
            }
            else{
                // $teacher_id = Teacher::where('user_id', $request->user_id)->first()->pluck('id');
                $teacher_id = Teacher::where('user_id', $request->user_id)->pluck('id')->first();
    
                // Teacher update
                Teacher::where('id', $teacher_id)->update($update_profile);
            }
        }

        return redirect('/user');
    }


    public function destroy(User $user){
        User::destroy($user->id);
        return redirect('/user')->with('success', 'User Berhasil di Hapus');
    }
}
