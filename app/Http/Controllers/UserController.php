<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\User;
use App\Models\Student;
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
        return view('user', [
            "title" => "Manage User",
            "users" => User::whereNot('id', '1')->get(),
        ]);
    }


    public function show(User $user) {
        if($user->level == 3){
            $profile = $user->student;
        }elseif($user->level == 2){
            $profile = $user->teacher;
        }
        return view('detail-user', [
            "title" => "Detail " . $profile->user->name,
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
            'username' => 'required|max:255|unique:users',
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
        return redirect('/user')->with('success', 'User Baru Berhasil Ditambahkan');
    }


    public function edit(User $user)
    {
        if($user->level == 3){
            $profile = $user->student;
        }elseif($user->level == 2){
            $profile = $user->teacher;
        }
        return view('edit-user', [
            "title" => "Edit User ".$profile->user->name,
            "profile" => $profile,
        ]);
    }


    public function update(Request $request){
        // dd($request["username"]);
        // $username = $request["username"];
        // dd($username);
        $validated = $request->validate([
            // 'username' => Rule::unique('users', 'username')->ignore($request->user_id), //ignore id rownya saja bukan nilai yang di ignore
            'username' => ['required', Rule::unique('users', 'username')->ignore($request->user_id)], //ignore id rownya saja bukan nilai yang di ignore

            // 'username' => Rule::unique('users')->where(fn ($query) => $query->where('username' ,$username)),
            // 'username' => ['required', Rule::unique('users', 'username')->ignore($request->usernameOld)],
            // 'username' => 'required|max:255',
            // 'username' => "unique:users,username,$username",
            'password' => '',
            'name' => 'required|max:255',
            'level' => 'required|in:2,3',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:10,12',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);
        // dd($validated["username"]);
        // $teacher_id = Teacher::where('user_id', $request->user_id)->pluck('id')->first();
        // dd($teacher_id);
        // $student_id = Student::where('user_id', $request->user_id)->first()->pluck('id');
        // dd($student_id);

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
        // dd($request->user_id);
        // dd($validated['level']);
        // dd($request->user_level);
        User::where('id', $request->user_id)->update($update_user);

        if($request->user_level == 3){
            if($validated['level'] != $request->user_level){
                // Teacher create & dan hapus data student berdasarka id
                Teacher::create($update_profile);
                Student::destroy($request->user_level);
            }
            else{
                // ambil id student berdasarkan user id
                // $student_id = $user->student->id;
                $student_id = Student::where('user_id', $request->user_id)->pluck('id')->first();
                // Student update
                Student::where('id', $student_id)->update($update_profile);
            }
        }elseif($request->user_level == 2){
            if($validated['level'] != $request->user_level){
                // Student create
                Student::create($update_profile);
                Teacher::destroy($request->user_level);
            }
            else{
                // $teacher_id = Teacher::where('user_id', $request->user_id)->first()->pluck('id');
                $teacher_id = Teacher::where('user_id', $request->user_id)->pluck('id')->first();
    
                // Teacher update
                Teacher::where('id', $teacher_id)->update($update_profile);
            }
        }
        // if($validated['level'] != $request->user_level){
        // }

        // dd($validated['password']);
        return redirect('/user');
    }


    public function destroy(User $user){
        // dd($user->level);
        // if ($user->level == 3) {
        //     $student_id = Student::where('user_id', $user->id)->pluck('id')->first();
        //     // dd($student_id);
        // } else {
        //     $teacher_id = Teacher::where('user_id', $user->id)->pluck('id')->first();
        //     dd($teacher_id);
        // }
        
        User::destroy($user->id);
        return redirect('/user')->with('success', 'User Berhasil di Hapus');
    }
}
