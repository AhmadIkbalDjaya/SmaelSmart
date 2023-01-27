<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course_Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // user
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'name'=>'Admin',
            'level' => 1,
        ]);
        User::create([
            'username' => 'suha',
            'password' => bcrypt('password'),
            'name'=> 'Suharman Syah Aliah',
            'level' => 2,
        ]);
        User::create([
            'username' => 'ikbal',
            'password' => bcrypt('password'),
            'name'=>'Ahmad Ikbal Djaya',
            'level' => 3,
        ]);
        User::create([
            'username' => 'fahrul',
            'password' => bcrypt('password'),
            'name'=>'Fahrul Rasyid',
            'level' => 2,
        ]);
        User::create([
            'username' => 'atira',
            'password' => bcrypt('password'),
            'name'=>'Atira Abdi',
            'level' => 2,
        ]);

        // claass
        Claass::create([
            'class_name' => 'XII Al-Khawarizmi',
            'homeroom_teacher_id' => 1,
            'major' => 'ipa',
        ]);

        // teacher
        Teacher::create([
            'user_id' => 2,
            'email' => 'suharman@gmail.com',
            'phone' => '081234567891',
            'gender' => 'Laki-laki',
        ]);
        Teacher::create([
            'user_id' => 4,
            'email' => 'fahrul@gmail.com',
            'phone' => '081234567892',
            'gender' => 'Laki-laki',
        ]);
        Teacher::create([
            'user_id' => 5,
            'email' => 'atira@gmail.com',
            'phone' => '081234567881',
            'gender' => 'Perempuan',
        ]);

        // student
        Student::create([
            'user_id' => 3,
            'email' => 'IkbalDjaya@gmail.com',
            'phone' => '081241250245',
            'gender' => 'Laki-laki',
        ]);

        // course
        Course::create([
            'claass_id' => 1,
            'course_name' => 'Fisika',
            'teacher_id' => 1,
        ]);
        Course::create([
            'claass_id' => 1,
            'course_name' => 'Bahasa Inggris',
            'teacher_id' => 2,
        ]);
        Course::create([
            'claass_id' => 1,
            'course_name' => 'Seni Budaya',
            'teacher_id' => 3,
        ]);

        // course_student
        Course_Student::create([
            'course_id' => 1,
            'student_id' => 1,
        ]);
        Course_Student::create([
            'course_id' => 2,
            'student_id' => 1,
        ]);
        Course_Student::create([
            'course_id' => 3,
            'student_id' => 1,
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
