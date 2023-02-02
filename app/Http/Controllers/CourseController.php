<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CourseMaterial;
use App\Models\Course_Student;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Claass;


class CourseController extends Controller
{
    public function userCourse(Course $course) {
        return view('userCourse', [
            "title" => "Course $course->course_name",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
            "materials" => $course->courseMaterial,
            "tasks" => $course->task,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course.index', [
            "title" => "Course",
            "courses" => Course::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create', [
            "title" => "Buat Course baru",
            "claasses" => Claass::all(),
            "teachers" => Teacher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "course_name" => 'required',
            "claass_id" => 'required',
            "teacher_id" => "required"
        ]);
        $course = Course::create($validated);

        // ambil semua id student yang memiliki claass_id yg sama dengan yang barusan dibuat
        $students_id = Student::where('claass_id', $request->claass_id)->pluck('id');
        // masukkan semua id student ke dalam tabel course_student dengan claass id yang baru dibuat
        foreach($students_id as $student_id){
            Course_Student::create([
                "course_id" => $course->id,
                "student_id" => $student_id,
            ]);
        }
        return redirect('/course')->with('success', "Course Behasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit', [
            "title" => "Edit Course",
            "course" => $course,
            "claasses" => Claass::all(),
            "teachers" => Teacher::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // dd($request->claass_id_old);
        $validated = $request->validate([
            "course_name" => 'required',
            "claass_id" => 'required',
            "teacher_id" => "required"
        ]);
        if($validated["claass_id"] != $request->claass_id_old){
            // dd("Tidak Sama");
            // ambil semua id student yang memiliki claass_id yg sama dengan claass_id yang lama
            $students_id = Student::where('claass_id', $request->claass_id_old)->pluck('id');
            // dd($students_id);
            // hapus semua id student dari table course_student yang memiliki old claass_id
            foreach ($students_id as $student_id) {
                Course_Student::where('course_id', $course->id)->where('student_id', $student_id)->delete();
            }
            // dd('Cek DB');

            // ambil semua id student yang memiliki claass_id terbaru
            $new_students_id = Student::where('claass_id', $request->claass_id)->pluck('id');
            // masukkan id student ke tabel course_student dengan claass_id terbaru
            foreach($new_students_id as $student_id){
                Course_Student::create([
                    "course_id" => $course->id,
                    "student_id" => $student_id,
                ]);
            }
        }
        // else{
        //     // dd("Sama");
        // }
        Course::where('id', $course->id)->update($validated);


        return redirect('/course')->with('success', 'Course berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        // ambil student id yang memiliki claas yang sama dengan claass course
        $students_id = Student::where('claass_id', $course->claass_id)->pluck('id');
        // hapus semua id student yang memili course_id course yang mau di hapus
        foreach ($students_id as $student_id) {
            Course_Student::where('course_id', $course->id)->where('student_id', $student_id)->delete();
        }
        Course::destroy($course->id);
        return redirect('/course')->with('success', "Course berhasil di hapus");
    }
}
