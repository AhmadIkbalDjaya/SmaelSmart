<?php

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->foreignIdFor(Teacher::class)->constrained();
            $table->foreignIdFor(Course::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_materials');
    }
};
