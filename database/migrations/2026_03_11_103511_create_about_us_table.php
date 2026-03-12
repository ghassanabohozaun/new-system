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
        Schema::create('about_us', function (Blueprint $blueprint) {
            $blueprint->id();
            
            // Vision Section
            $blueprint->json('vision_title')->nullable();
            $blueprint->json('vision_description')->nullable();
            $blueprint->json('vision_list')->nullable();
            $blueprint->string('vision_image')->nullable();

            // Mission Section
            $blueprint->json('mission_title')->nullable();
            $blueprint->json('mission_description')->nullable();
            $blueprint->string('mission_image')->nullable();
            $blueprint->string('stat_1_value')->nullable();
            $blueprint->json('stat_1_label')->nullable();
            $blueprint->string('stat_2_value')->nullable();
            $blueprint->json('stat_2_label')->nullable();

            // Why Us Section
            $blueprint->json('why_us_title')->nullable();
            $blueprint->json('why_us_description')->nullable();
            $blueprint->string('why_us_image')->nullable();
            $blueprint->json('feature_1_title')->nullable();
            $blueprint->json('feature_1_description')->nullable();
            $blueprint->string('feature_1_icon')->default('bi-stars');
            $blueprint->json('feature_2_title')->nullable();
            $blueprint->json('feature_2_description')->nullable();
            $blueprint->string('feature_2_icon')->default('bi-shield-check');

            // Timeline
            $blueprint->json('timeline')->nullable();

            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
