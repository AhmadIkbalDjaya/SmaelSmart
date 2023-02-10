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
        return view('material.create',[
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
            $validatedPost['file'] = $request->file('file')->storeAs('files', time());
            // $validatedPost['file'] = $request->file('file')->store('files');
        }
        CourseMaterial::create($validatedPost);
        $course_id = $validatedPost['course_id'];
        return redirect("/userCourse/$course_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, CourseMaterial $material)
    {
        // $coba = Course::where('id', $material->course->id)->first();
        // dd($coba);
        // dd($material->course);
        return view('material.show', [
            "title" => 'Materi ' . $material->course->course_name,
            "user_course" => Course_Student::get_user_course(),
            "course" => Course::where('id', $material->course->id)->first(),
            "material" => $material 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, CourseMaterial $material)
    {
        return view('material.edit',[
            "title" => "Edit Materi",
            "course" => $course,
            "user_course" => Course_Student::get_user_course(),
            "material" => $material,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, CourseMaterial $material)
    {
        // dd($request->file_old);
        $validated = $request->validate([
            'title' => 'required',
            'file' => 'mimes:pdf',
        ]);
        if($request->file('file')){
            // dd('ada file baru');
            Storage::delete($material->file);
            $validated['file'] = $request->file('file')->storeAs('files', time());
            CourseMaterial::where('id', $material->id)->update($validated);
        }
        elseif($request->file == null){
            // dd('tidak ada file baru');
            $validated["file"] = $request->file_old;
            CourseMaterial::where('id', $material->id)->update($validated);
        }
        return redirect("/userCourse/$course->id/material/$material->id")->with('success', "Materi berhasil di edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, CourseMaterial $material)
    {
        // dd($material);
        Storage::delete($material->file);
        CourseMaterial::destroy($material->id);
        $course_id   = $material->course_id;
        return redirect("/userCourse/$course_id");
    }
}
