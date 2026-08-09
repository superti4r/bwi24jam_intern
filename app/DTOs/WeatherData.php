<?php

namespace App\DTOs;

class WeatherData
{
    public function __construct(
        public readonly string $location,
        public readonly int $temperature,
        public readonly string $description,
        public readonly string $iconType
    ) {}
}