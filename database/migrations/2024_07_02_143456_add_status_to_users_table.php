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
        Schema::table('users', function (Blueprint $table) {
            $table->string('contact')->nullable()->after('email');
            $table->string('shortname')->nullable()->after('contact');
            $table->string('EIIN')->nullable()->after('shortname');
            $table->integer('status')->after('EIIN')->default(0);
            $table->string('logo')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('contact');
            $table->dropColumn('status');
            $table->dropColumn('shortname');
            $table->dropColumn('EIIN');
        });
    }
};
