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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_number')->nullable();
            $table->boolean('is_active')->default(false);
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('entity_id')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });

        \App\Models\Banner::create([
            'banner_number' => 'Banner 1',
            'is_active' => true,
            'title' => '',
            'description' => '',
            'image' => 'banner-images\/Banner-0.png'
        ]);
        \App\Models\Banner::create([
            'banner_number' => 'Banner 2',
            'is_active' => true,
            'title' => '',
            'description' => '',
            'entity_id' => 3,
            'image' => 'banner-images\/Banner-1.png'
        ]);
        \App\Models\Banner::create([
            'banner_number' => 'Banner 3',
            'is_active' => true,
            'title' => '',
            'description' => '',
            'entity_id' => 27,
            'image' => 'banner-images\/Banner-2.png'
        ]);
        \App\Models\Banner::create([
            'banner_number' => 'Banner 4',
            'is_active' => true,
            'title' => '',
            'description' => '',
            'entity_id' => 18,
            'image' => 'banner-images\/Banner-3.png'
        ]);
        \App\Models\Banner::create([
            'banner_number' => 'Banner 5',
            'is_active' => true,
            'title' => '',
            'description' => '',
            'entity_id' => 16,
            'image' => 'banner-images\/Banner-4.png'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
