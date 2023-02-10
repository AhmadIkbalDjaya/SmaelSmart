<?php

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
        Schema::create('claasses', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->foreignIdFor(Teacher::class);
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
