<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user () {
        return $this->belongsTo(User::class);
    }
    public function claass(){
        return $this->hasOne(Claass::class);
    }
    public function course(){
        return $this->hasMany(Course::class);
    }
}
