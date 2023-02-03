<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Score;
use App\Models\Course;
use App\Models\Student;
use App\Models\Course_Student;

class RaportController extends Controller
{
    public function studentRaport(){
        $scores = Score::where('student_id', Auth::user()->student->id)->get();

        $just_scores = Score::where('student_id', Auth::user()->student->id)->pluck('score');
        $total = 0;
        $total_course = 0;
        foreach ($just_scores as $s) {
            $total += $s;
            $total_course++;
        }
        if ($total_course != 0) {
            $average_score = $total / $total_course;
        } else {
            $average_score = 0;
        }
        
        
        // dd($total_course, $average_score);
        return view('raport.student', [
            "title" => "Raport",
            "user_course" => Course_Student::get_user_course(),
            "scores" => $scores,
            "averange_score" => $average_score,
            "total_course" => $total_course,
        ]);
    }

    public function inputScore() {
        return view('raport.input-score', [
            "title" => "Input Nilai",
            "user_course" => Course_Student::get_user_course(),
        ]);
    }

    public function inputScoreEdit(Course $course) {
        // ambil row score berdasaarkan course_id
        // $scores = Score::where('course_id', $course->id)->get();
        return view('raport.input-score-edit', [
            "title" => "Input Nilai $course->course_name",
            "user_course" => Course_Student::get_user_course(),
            "course" => $course,
            "scores" => Score::where('course_id', $course->id)->get(),
        ]);
    }

    public function inputScoreUpdate(Request $request, Course $course, Score $score){
        $validated = $request->validate([
            "score" => ''
        ]);
        // dd($validated["score"]);
        Score::where('id', $score->id)->update($validated);
        return redirect("/inputScore/$course->id/edit")->with('success', 'Nilai berhasil di update');
    }
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
