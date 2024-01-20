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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('nidn')->unsigned();
            $table->string('name', 50)->nullable();
            $table->string('prodi', 50)->nullable();
            $table->string('keahlian', 100)->nullable()->default('text');
            $table->foreignId('institution_id')->constrained('institutions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropForeign(['institution_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('lecturers');
    }
};
