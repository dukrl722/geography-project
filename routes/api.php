<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\GeoDataController;
use Illuminate\Support\Facades\Route;

Route::get('/states/{code}/cities', [GeoDataController::class, '']);
