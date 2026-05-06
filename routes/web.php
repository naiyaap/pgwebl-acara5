<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/map', [PageController::class, 'peta'])->name('peta');

Route::get('/tabel', [PageController::class, 'tabel'])->name('tabel');

//Points
Route::post('/store-points', [\App\Http\Controllers\PointsController::class, 'store'])
->name('points.store');

Route::delete('/delete-points/{id}', [\App\Http\Controllers\PointsController::class, 'destroy'])
->name('points.delete');

//Polylines
Route::post('/store-polylines', [\App\Http\Controllers\PolylinesController::class, 'store'])
->name('polylines.store');

Route::delete('/delete-polylines/{id}', [\App\Http\Controllers\PolylinesController::class, 'destroy'])
->name('polylines.delete');

//Polygons
Route::post('/store-polygons', [\App\Http\Controllers\PolygonsController::class, 'store'])
->name('polygons.store');

Route::delete('/delete-polygons/{id}', [\App\Http\Controllers\PolygonsController::class, 'destroy'])
->name('polygons.delete');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
