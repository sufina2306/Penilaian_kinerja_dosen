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
        Schema::create('pengajuan_rencanas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencanprilaku_id');
            $table->unsignedBigInteger('rencanautama_id');
            $table->string('status'); 
            $table->string('tanggal_pengajuan'); 
            $table->timestamps();

            $table->foreign('rencanprilaku_id')->references('id')->on('rencanprilakus')->onDelete('cascade');
            $table->foreign('rencanautama_id')->references('id')->on('rencanautamas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_rencanas');
    }
};
