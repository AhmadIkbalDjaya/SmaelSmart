<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use App\Models\Course_Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('addCourseMaterial',[
            "title" => "Tambah Materi",
            "course" => $course,
            "user_course" => Course_Student::get_user_course(),

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
        $validatedPost = $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf',
            'course_id' => 'required',
            'teacher_id' => 'required',
        ]);
        // dd($validatedPost);
        if($request->file('file')){
            $validatedPost['file'] = $request->file('file')->storeAs('files', $validatedPost['title']);
        }
        CourseMaterial::create($validatedPost);
        $course_id = $validatedPost['course_id'];
        return redirect("/course/$course_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(CourseMaterial $courseMaterial)
    {
        // $coba = Course::where('id', $courseMaterial->course->id)->first();
        // dd($coba);
        return view('view-material', [
            "title" => 'Materi ' . $courseMaterial->course->course_name,
            "user_course" => Course_Student::get_user_course(),
            "course" => Course::where('id', $courseMaterial->course->id)->first(),
            "material" => $courseMaterial 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseMaterial $courseMaterial)
    {
        Storage::delete($courseMaterial->file);
        CourseMaterial::destroy($courseMaterial->id);
        $course_id   = $courseMaterial->course_id;
        return redirect("/course/$course_id");
    }
}
