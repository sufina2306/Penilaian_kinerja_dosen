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
        Schema::create('rencanautamas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pengajaran')->nullable(); // Menjadikan kolom pengajaran nullable
            $table->string('penelitian')->nullable(); // Menjadikan kolom penelitian nullable
            $table->string('pengabdian')->nullable(); // Menjadikan kolom pengabdian nullable
            $table->string('rps')->nullable(); // Menjadikan kolom rps nullable
            $table->string('bimbingan_skripsi')->nullable(); // Menjadikan kolom bimbingan_skripsi nullable
            $table->string('bimbingan_kp')->nullable(); // Menjadikan kolom bimbingan_kp nullable
            $table->string('bimbingan_dosen_wali')->nullable(); // Menjadikan kolom bimbingan_dosen_wali nullable
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencanautamas');
    }
};
