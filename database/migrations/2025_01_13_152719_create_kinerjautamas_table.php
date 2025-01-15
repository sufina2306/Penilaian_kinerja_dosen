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
        Schema::create('kinerjautamas', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('user_id'); // Foreign key to associate with dosen
            $table->string('pengajaran')->nullable(); // Pengajaran
            $table->string('penelitian')->nullable(); // Penelitian
            $table->string('pengabdian')->nullable(); // Pengabdian
            $table->string('rps')->nullable(); // RPS
            $table->string('bimbingan_skripsi')->nullable(); // Bimbingan Skripsi
            $table->string('bimbingan_kp')->nullable(); // Bimbingan KP
            $table->string('bimbingan_dosen_wali')->nullable(); // Bimbingan Dosen Wali
            $table->timestamps(); 
    
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
  
    }
        public function down(): void
    {
        Schema::dropIfExists('kinerjautamas');
    }

};
