<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Course_Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request; 

class TaskController extends Controller
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
        return view('task.create', [
            "title" => "Tambah Tugas",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
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
        // dd($request);
        $validated = $request->validate([
            "name" => "required|min:5|max:255",
            "description" => 'required:min:5',
            "file" => "",
            "due_date" => "required|date",
            "course_id" => "required",
        ]);
        // $validated["course_id"] = $
        // dd($validated);
        if($request->file('file')){
            $validated['file'] = $request->file('file')->store('task');
        }
        Task::create($validated);
        $courseId = $request->course_id;
        return redirect("/course/$courseId");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Task $task)
    {
        // dd('berhasil');
        return view('task.show', [
            "title" => "Detail Tugas",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
            "task" => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Task $task)
    {
        return view('task.edit', [
            "title" => "Edit Tugas",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
            "task" => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Task $task)
    {
        $validated = $request->validate([
            "name" => "required|min:5|max:255",
            "description" => 'required:min:5',
            "file" => "",
            "due_date" => "required|date",
        ]);
        if($request->file('file')){
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validated['file'] = $request->file('file')->store('task');
        }
        Task::where('id', $task->id)->update($validated);
        return redirect("/course/$course->id/task/$task->id");
        dd($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Task $task)
    {
        if($task->file){
            Storage::delete($task->file);
        }
        Task::destroy($task->id);
        return redirect("/course/$course->id");
    }
}
