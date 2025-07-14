<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\GeoDataController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('v1.')->group(function () {
    Route::get('/states/{code}/cities', [GeoDataController::class, 'index'])->name('state.cities.index');
});
