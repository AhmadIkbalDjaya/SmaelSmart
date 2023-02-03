<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Announcement;
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
        // announcment
        Announcement::create([
            'title' => 'Pengumuman Libur',
            'content' => 'Besok Hari Minggu Sekolah Libur',
            'expire_date' => '2023-01-31',
        ]);
        Announcement::create([
            'title' => 'Pengumuman Kerja Bakti',
            'content' => 'Besok Semua membawa sapu untuk membersihkan sekolah',
            'expire_date' => '2023-02-1',
        ]);
        
        // user
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'name'=>'Admin',
            'level' => 1,
        ]);
        User::create([
            'username' => '4100',
            'password' => bcrypt('password'),
            'name'=> 'Suharman Syah Aliah',
            'level' => 2,
        ]);
        User::create([
            'username' => '0031',
            'password' => bcrypt('password'),
            'name'=>'Ahmad Ikbal Djaya',
            'level' => 3,
        ]);
        User::create([
            'username' => '6100',
            'password' => bcrypt('password'),
            'name'=>'Fahrul Rasyid',
            'level' => 2,
        ]);
        User::create([
            'username' => '1200',
            'password' => bcrypt('password'),
            'name'=>'Atira Abdi',
            'level' => 2,
        ]);
        User::create([
            'username' => '0011',
            'password' => bcrypt('password'),
            'name'=>'Erron Lie',
            'level' => 3,
        ]);
        User::create([
            'username' => '0088',
            'password' => bcrypt('password'),
            'name'=>'Azhim Luthfi',
            'level' => 3,
        ]);
        User::create([
            'username' => '0042',
            'password' => bcrypt('password'),
            'name'=>'Alfitrah Arima',
            'level' => 3,
        ]);

        // claass
        Claass::create([
            'class_name' => 'XII Al-Khawarizmi',
            'homeroom_teacher_id' => 1,
            'major' => 'ipa',
        ]);
        Claass::create([
            'class_name' => 'XII Charles Darwin',
            'homeroom_teacher_id' => 2,
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
            'claass_id' => 1,
        ]);
        Student::create([
            'user_id' => 6,
            'email' => 'erron@gmail.com',
            'phone' => '081241250245',
            'gender' => 'Laki-laki',
            'claass_id' => 2,
        ]);
        Student::create([
            'user_id' => 7,
            'email' => 'azhim@gmail.com',
            'phone' => '081241250245',
            'gender' => 'Laki-laki',
            'claass_id' => 1,
        ]);
        Student::create([
            'user_id' => 8,
            'email' => 'fifi@gmail.com',
            'phone' => '081241250245',
            'gender' => 'Perempuan',
            'claass_id' => 1,
        ]);

        // // course
        // Course::create([
        //     'claass_id' => 1,
        //     'course_name' => 'Fisika',
        //     'teacher_id' => 1,
        // ]);
        // Course::create([
        //     'claass_id' => 1,
        //     'course_name' => 'Bahasa Inggris',
        //     'teacher_id' => 2,
        // ]);
        // Course::create([
        //     'claass_id' => 1,
        //     'course_name' => 'Seni Budaya',
        //     'teacher_id' => 3,
        // ]);

        // // course_student
        // Course_Student::create([
        //     'course_id' => 1,
        //     'student_id' => 1,
        // ]);
        // Course_Student::create([
        //     'course_id' => 1,
        //     'student_id' => 3,
        // ]);
        // Course_Student::create([
        //     'course_id' => 1,
        //     'student_id' => 4,
        // ]);
        // Course_Student::create([
        //     'course_id' => 2,
        //     'student_id' => 1,
        // ]);
        // Course_Student::create([
        //     'course_id' => 2,
        //     'student_id' => 3,
        // ]);
        // Course_Student::create([
        //     'course_id' => 3,
        //     'student_id' => 1,
        // ]);
        // Course_Student::create([
        //     'course_id' => 3,
        //     'student_id' => 2,
        // ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
