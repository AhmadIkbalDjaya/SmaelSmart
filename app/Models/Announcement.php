<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getAnnouncement(){
        $last_announcement = Announcement::latest()->pluck('expire_date')->first();
        if(strtotime($last_announcement) > time()){
            return $announcement = Announcement::latest()->first();
        }else{
            return $announcement = 'none';
        }
    }
}
