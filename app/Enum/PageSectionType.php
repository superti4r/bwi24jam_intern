<?php

namespace App\Enum;

enum PageSectionType: string
{
    case HERO = 'hero';
    case SECONDARY_HERO = 'secondary_hero';
    case CONTENT = 'content';
    case MEDIA = 'media';

    public function label(): string
    {
        return match ($this) {
            self::HERO => 'Bagian pembuka',
            self::SECONDARY_HERO => 'Bagian sorotan',
            self::CONTENT => 'Teks berformat',
            self::MEDIA => 'Gambar atau video',
        };
    }
}
