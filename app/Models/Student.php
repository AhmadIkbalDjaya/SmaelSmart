<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user () {
        return $this->belongsTo(User::class);
    }
    public function claass () {
        return $this->belongsTo(Claass::class);
    }
    public function course_student(){
        return $this->hasMany(Course_Student::class);
    }
    public function score() {
        return $this->hasMany(Score::class);
    }
    public function controlCard(){
        return $this->hasMany(controlCard::class);
    }
}
