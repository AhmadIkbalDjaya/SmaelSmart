<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claasses', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->foreignId('homeroom_teacher_id');
            $table->enum('major', ['ipa', 'ips']);
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
        Schema::dropIfExists('claasses');
    }
};
