<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_information', function (Blueprint $table): void {
            $table->string('welcomer_video_url')->default('https://www.youtube-nocookie.com/embed/nrzB4km0pbw?autoplay=1&mute=1&loop=1&playlist=nrzB4km0pbw&controls=0&playsinline=1&rel=0&modestbranding=1');
            $table->string('welcomer_eyebrow')->default('A closer look');
            $table->string('welcomer_title')->default('Some stories are better seen in motion.');
            $table->string('welcomer_description', 1000)->default('A moving postcard from the places, objects, and people we keep returning to.');
            $table->string('welcomer_label')->default('Field Notes / Moving image');
        });
    }

    public function down(): void
    {
        Schema::table('website_information', function (Blueprint $table): void {
            $table->dropColumn([
                'welcomer_video_url',
                'welcomer_eyebrow',
                'welcomer_title',
                'welcomer_description',
                'welcomer_label',
            ]);
        });
    }
};
