<?php

namespace App\Models;

use App\Support\YouTube;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'hero_description',
    'hero_image',
    'secondary_hero_title',
    'secondary_hero_description',
    'contact_email',
    'facebook_url',
    'instagram_url',
    'x_url',
    'youtube_url',
    'welcomer_video_url',
    'welcomer_eyebrow',
    'welcomer_title',
    'welcomer_description',
    'welcomer_label',
])]
class WebsiteInformation extends Model
{
    use HasUuids;

    /**
     * Get the default public website content for the singleton record.
     *
     * @return array<string, string|null>
     */
    public static function defaultAttributes(): array
    {
        return [
            'hero_description' => 'Saben sunar srengenge tangi ring wetan, iku tondone kene diwenehi kesempatan anyar kanggo ngubah nasib, mulo ojo gelem kalah ambi keadaan lan tetep maju butarep.',
            'hero_image' => 'images/bwi24jam_hero.webp',
            'secondary_hero_title' => '"Urip tah dinikmati, sing usah dipikir abot."',
            'secondary_hero_description' => 'Ingin kerja sama & berkontribusi?',
            'contact_email' => 'redaksi@bwi24jam.co.id',
            'facebook_url' => null,
            'instagram_url' => null,
            'x_url' => null,
            'youtube_url' => null,
            'welcomer_video_url' => 'https://www.youtube-nocookie.com/embed/nrzB4km0pbw?autoplay=1&mute=1&loop=1&playlist=nrzB4km0pbw&controls=0&playsinline=1&rel=0&modestbranding=1',
            'welcomer_eyebrow' => 'A closer look',
            'welcomer_title' => 'Some stories are better seen in motion.',
            'welcomer_description' => 'A moving postcard from the places, objects, and people we keep returning to.',
            'welcomer_label' => 'Field Notes / Moving image',
        ];
    }

    public function getHeroImageUrlAttribute(): string
    {
        return str_starts_with((string) $this->hero_image, 'images/')
            ? asset($this->hero_image)
            : Storage::disk('public')->url($this->hero_image);
    }

    public function getWelcomerVideoEmbedUrlAttribute(): ?string
    {
        return YouTube::embedUrl($this->welcomer_video_url);
    }
}
