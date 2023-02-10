<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_Student;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('announcement.index', [
            "title" => "Pengumuman",
            "user_course" => Course_Student::get_user_course(),
            "announcements" => Announcement::orderBy('expire_date', 'desc')->get(),
            "active_announcement" => Announcement::getAnnouncement(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcement.create', [
            "title" => "Tambah pengumuman",
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
        $validated = $request->validate([
            "title" => 'required|max:255',
            "content" => 'required|max:255',
            "expire_date" => 'required|date',
        ]);
        Announcement::create($validated);
        return redirect('/announcement')->with('success', 'Pengumuman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcement.show', [
            "title" => "Detail Pengumuman",
            "user_course" => Course_Student::get_user_course(),
            "announcement" => $announcement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', [
            "title" => "Edit Pengumuman",
            "user_course" => Course_Student::get_user_course(),
            "announcement" => $announcement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            "title" => 'required|max:255',
            "content" => 'required|max:255',
            "expire_date" => 'required|date',
        ]);
        Announcement::where('id', $announcement->id)->update($validated);
        return redirect('/announcement')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        Announcement::destroy($announcement->id);
        return redirect('/announcement')->with('success', "Pengumuman Berhasil Dihapus");
    }
}
