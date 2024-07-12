<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('studentName', 200);
            $table->string('studentImage', 200)->nullable();
            $table->string('address');
            $table->integer('uid')->unique()->nullable();
            $table->integer('contactNo')->unique();
            $table->integer('institution_id');
            $table->integer('operator_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
