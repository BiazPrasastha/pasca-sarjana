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
        Schema::create('document_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->timestamp('timestamp');
            $table->string('location');
            $table->enum('status', ['pending', 'accept', 'decline']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_tests');
    }
};
