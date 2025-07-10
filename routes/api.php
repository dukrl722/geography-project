<?php

use App\Http\Controllers\V1\GeoDataController;
use Illuminate\Support\Facades\Route;

Route::get('/states/{code}/cities', [GeoDataController::class, '']);
