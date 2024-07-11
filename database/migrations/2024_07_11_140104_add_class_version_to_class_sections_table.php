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
        Schema::table('class_sections', function (Blueprint $table) {
            $table->string('class_shift')->nullable()->after('sectionName');
            $table->string('class_version')->nullable()->after('class_shift');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_sections', function (Blueprint $table) {
            $table->dropColumn('class_shift');
            $table->dropColumn('class_version');
        });
    }
};
