<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claass extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function teacher(){
        return $this->hasOne(Teacher::class);
    }
    public function course(){
        return $this->hasMany(Course::class);
    }
}
