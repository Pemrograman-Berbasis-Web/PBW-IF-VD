<?php

# Auth routes
require __DIR__ . '/auth.php';

# Public routes
require __DIR__ . '/permission/public.php';

# Administrator routes
require __DIR__ . '/permission/administrator.php';
use App\Http\Controllers\WeatherController;

Route::get('/weather', [WeatherController::class, 'index']);
