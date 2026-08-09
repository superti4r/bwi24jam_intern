<?php

namespace App\Services;

use App\DTOs\WeatherData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Throwable;

class WeatherService
{
    private const CACHE_TTL = 60;

    public function get(string $city): ?WeatherData
    {
        $cacheKey = 'weather_api_' . strtolower(str_replace(' ', '_', $city));

        $cachedData = Cache::remember($cacheKey, now()->addMinutes(self::CACHE_TTL), function () use ($city): ?array {
            return $this->fetch($city);
        });

        if (!$cachedData) {
            return null;
        }

        return new WeatherData(
            location: $cachedData['name'] ?? $city,
            temperature: (int) round($cachedData['main']['temp'] ?? 0),
            description: ucwords($cachedData['weather'][0]['description'] ?? 'Tidak Diketahui'),
            iconType: $this->icons($cachedData['weather'][0]['icon'] ?? '')
        );
    }

    private function fetch(string $city): ?array
    {
        try {
            $response = Http::timeout(5)
                ->retry(2, 100)
                ->get('https://api.openweathermap.org/data/2.5/weather', [
                    'q' => $city,
                    'appid' => config('services.openweathermap.key'),
                    'units' => 'metric',
                    'lang' => 'id'
                ]);

            if ($response->failed()) {
                Log::warning("Gagal mengambil data cuaca untuk kota: {$city}. Status: {$response->status()}");
                return null;
            }

            return $response->json();

        } catch (Throwable $e) {
            Log::error("Gagal mengambil data cuaca untuk kota: {$city}. Error: " . $e->getMessage());
            return null;
        }
    }

    private function icons(string $iconCode): string
    {
        if (empty($iconCode)) {
            return 'cloud';
        }

        return match (true) {
            str_contains($iconCode, '01') => 'sun',
            str_contains($iconCode, '02'),
            str_contains($iconCode, '03'),
            str_contains($iconCode, '04') => 'cloud-sun',
            str_contains($iconCode, '09'),
            str_contains($iconCode, '10') => 'cloud-rain',
            str_contains($iconCode, '11') => 'cloud-lightning',
            default => 'cloud',
        };
    }
}