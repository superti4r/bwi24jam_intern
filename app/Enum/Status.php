<?php

namespace App\Enum;

enum Status: string
{
    case PUBLISHED = 'published';
    case WAITING = 'waiting';
    case ARCHIVED = 'archived';
}
