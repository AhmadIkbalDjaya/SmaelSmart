<?php

use App\Models\Course;
use App\Models\Student;
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
        Schema::create('control_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Student::class)->constrained()->onDelete('cascade');
            $table->boolean('daily_test')->default(0);
            $table->boolean('assignment')->default(0);
            $table->boolean('recitation')->default(0);
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
        Schema::dropIfExists('control_cards');
    }
};
