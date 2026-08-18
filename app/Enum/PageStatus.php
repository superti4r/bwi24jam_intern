<?php

namespace App\Enum;

enum PageStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
}
