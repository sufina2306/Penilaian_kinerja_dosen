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
        Schema::create('rencanprilakus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pelayanan')->nullable();
            $table->string('akuntable')->nullable();
            $table->string('kompeten')->nullable();
            $table->string('harmonis')->nullable();
            $table->string('loyal')->nullable();
            $table->string('adaptif')->nullable();
            $table->string('kolaboratif')->nullable();

            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencanprilakus');
    }
};
