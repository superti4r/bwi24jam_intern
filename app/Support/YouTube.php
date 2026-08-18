<?php

namespace App\Support;

class YouTube
{
    public static function embedUrl(?string $url): ?string
    {
        if (! $url) {
            return null;
        }

        $videoId = self::videoId($url);

        if (! $videoId) {
            return $url;
        }

        return 'https://www.youtube-nocookie.com/embed/'.$videoId.'?autoplay=1&mute=1&loop=1&playlist='.$videoId.'&controls=0&playsinline=1&rel=0&modestbranding=1';
    }

    private static function videoId(string $url): ?string
    {
        $parts = parse_url($url);
        $host = strtolower($parts['host'] ?? '');
        $path = trim($parts['path'] ?? '', '/');

        if ($host === 'youtu.be') {
            $candidate = explode('/', $path)[0] ?? '';
        } elseif (in_array($host, ['youtube.com', 'www.youtube.com', 'm.youtube.com', 'youtube-nocookie.com', 'www.youtube-nocookie.com'], true)) {
            parse_str($parts['query'] ?? '', $query);
            $candidate = $query['v'] ?? (str_starts_with($path, 'embed/') ? substr($path, 6) : '');
        } else {
            return null;
        }

        return preg_match('/^[A-Za-z0-9_-]{11}$/', $candidate) === 1 ? $candidate : null;
    }
}
