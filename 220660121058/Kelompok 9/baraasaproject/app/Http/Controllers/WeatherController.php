<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Kota default jika tidak ada input
        $city = $request->query('city', 'Jakarta');

        // URL API OpenWeatherMap
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

        // Panggil API
        $response = Http::get($url);

        // Jika API berhasil diakses
        if ($response->successful()) {
            $weatherData = $response->json();
            return view('weather', ['weather' => $weatherData, 'city' => $city]);
        } else {
            return view('weather', ['error' => 'Tidak dapat mengambil data cuaca.']);
        }
    }
}
