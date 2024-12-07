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
        Schema::table('document_files', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('file')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_files', function (Blueprint $table) {
            //
        });
    }
};
