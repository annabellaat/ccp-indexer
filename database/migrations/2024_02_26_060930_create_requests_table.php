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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('type_of_use')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('company')->nullable();
            $table->string('number')->nullable();
            $table->text('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_duration')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->unsignedInteger('entity_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
