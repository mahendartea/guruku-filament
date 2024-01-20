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
        Schema::create('guidances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('lecturer_id')->references('id')->on('lecturers')->cascadeOnDelete();
            $table->string('judul', 100)->nullable()->default('text');
            $table->text('description')->nullable()->default('text');
            $table->tinyInteger('pertemuan')->nullable();
            $table->date('tanggal_bimbingan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // delete foregn key
        Schema::table('guidances', function (Blueprint $table) {
            $table->dropForeign('guidances_student_id_foreign');
            $table->dropForeign('guidances_lecturer_id_foreign');
        });
        Schema::dropIfExists('guidances');
    }
};
