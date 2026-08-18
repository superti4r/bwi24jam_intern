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
        Schema::create('website_information', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('hero_description');
            $table->string('hero_image')->nullable();
            $table->text('secondary_hero_title');
            $table->text('secondary_hero_description');
            $table->string('contact_email');
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_information');
    }
};
