<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Claass;
use App\Models\Teacher;
use App\Models\CourseMaterial;
use App\Models\Course_Student;
use Illuminate\Http\Request;

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
        Course::create($validated);
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
        $validated = $request->validate([
            "course_name" => 'required',
            "claass_id" => 'required',
            "teacher_id" => "required"
        ]);
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
        Course::destroy($course->id);
        return redirect('/course')->with('success', "Course berhasil di hapus");
    }
}
