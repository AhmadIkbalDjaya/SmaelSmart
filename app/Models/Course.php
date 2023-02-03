<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function claass() {
        return $this->belongsTo(Claass::class);
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function course_student(){
        return $this->hasMany(Course_Student::class);
    }
    public function courseMaterial(){
        return $this->hasMany(CourseMaterial::class);
    }
    public function task(){
        return $this->hasMany(Task::class);
    }
    public function score () {
        return $this->hasMany(Score::class);
    }
}
