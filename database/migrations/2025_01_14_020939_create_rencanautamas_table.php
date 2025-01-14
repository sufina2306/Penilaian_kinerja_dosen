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
            $table->unsignedBigInteger('user_id'); // Foreign key to associate with dosen
            $table->string('akuntable'); // Score for Accountability
            $table->string('kompeten'); // Score for Competence
            $table->string('harmonis'); // Score for Harmony
            $table->string('loyal'); // Score for Loyalty
            $table->string('adaptif'); // Score for Adaptability
            $table->string('kolaboratif'); // Score for Collaboration
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
