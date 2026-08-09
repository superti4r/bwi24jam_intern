<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\WeatherService;
use App\DTOs\WeatherData;
use Carbon\Carbon;

class Weather extends Component
{
    public ?WeatherData $weather;
    public string $currentDate;

    public function __construct(WeatherService $weatherService)
    {
        $this->weather = $weatherService->get('Banyuwangi');
        
        Carbon::setLocale('id');
        $this->currentDate = Carbon::now()->translatedFormat('l, d F Y');
    }

    public function render(): View|Closure|string
    {
        return view('components.app.weather');
    }
}