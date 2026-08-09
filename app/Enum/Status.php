<?php

namespace App\Enum;

enum Status: string
{
    case ARCHIVED = "Archived";
    case DRAFT = "Draft";
    case PUBLISHED = "Published";

    public function label(): string
    {
        return match ($this) {
            self::ARCHIVED => 'Arsip',
            self::DRAFT => 'Draf',
            self::PUBLISHED => 'Terbit',
        };
    }
}
