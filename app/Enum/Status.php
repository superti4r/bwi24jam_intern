<?php

namespace App\Enum;

enum Status: string
{
    case ARCHIVED = "Archived";
    case DRAFT = "Draft";
    case PUBLISHED = "Published";
}
