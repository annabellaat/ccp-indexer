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
        Schema::table('entities', function (Blueprint $table) {
            //
            $table->text('thumbnail')->nullable();
            $table->text('tag')->nullable();
            $table->text('producer_1')->nullable();
            $table->text('editor_2')->nullable();
            $table->text('parent_collection')->nullable();
            $table->text('child_collection')->nullable();
            $table->text('inventory')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entities', function (Blueprint $table) {
            //
        });
    }
};
