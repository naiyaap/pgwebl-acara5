<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'landingpage'])->name('home');

Route::get('/map', [PageController::class, 'peta'])
->middleware(['auth', 'verified'])
->name('peta');

Route::get('/tabel', [PageController::class, 'tabel'])->name('tabel');

//Points
Route::post('/store-points', [\App\Http\Controllers\PointsController::class, 'store'])
->name('points.store');

//Route untuk menghapus point berdasarkan ID
Route::delete('/delete-points/{id}', [\App\Http\Controllers\PointsController::class, 'destroy'])
->name('points.delete');

//Route untuk menampilkan form edit point berdasarkan ID
Route::get('/edit-point/{id}', [\App\Http\Controllers\PointsController::class, 'edit'])
->name('point.edit');

//Route untuk update point berdasarkan ID
Route::patch('/update-point/{id}', [\App\Http\Controllers\PointsController::class, 'update'])
->name('point.update');


//Polylines
Route::post('/store-polylines', [\App\Http\Controllers\PolylinesController::class, 'store'])
->name('polylines.store');

//Route untuk menghapus polylines berdasarkan ID
Route::delete('/delete-polylines/{id}', [\App\Http\Controllers\PolylinesController::class, 'destroy'])
->name('polylines.delete');

//Route untuk menampilkan form edit polylines berdasarkan ID
Route::get('/edit-polylines/{id}', [\App\Http\Controllers\PolylinesController::class, 'edit'])
->name('polylines.edit');

//Route untuk update polylines berdasarkan ID
Route::patch('/update-polylines/{id}', [\App\Http\Controllers\PolylinesController::class, 'update'])
->name('polylines.update');

//Polygons
Route::post('/store-polygons', [\App\Http\Controllers\PolygonsController::class, 'store'])
->name('polygons.store');

//Route untuk menghapus polygons berdasarkan ID
Route::delete('/delete-polygons/{id}', [\App\Http\Controllers\PolygonsController::class, 'destroy'])
->name('polygons.delete');

//Route untuk menampilkan form edit polygon berdasarkan ID
Route::get('/edit-polygon/{id}', [\App\Http\Controllers\PolygonsController::class, 'edit'])
->name('polygons.edit');

//Route untuk update polygon berdasarkan ID
Route::patch('/update-polygon/{id}', [\App\Http\Controllers\PolygonsController::class, 'update'])
->name('polygons.update');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
