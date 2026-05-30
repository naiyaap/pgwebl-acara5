<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// GeoJSON API
Route::get('/points', [App\Http\Controllers\ApiController::class, 'geojson_points']) -> name('geojson.points');

Route::get('/point/{id}', [App\Http\Controllers\ApiController::class, 'geojson_point']) -> name('geojson.point');

Route::get('/polylines', [App\Http\Controllers\ApiController::class, 'geojson_polylines']) -> name('geojson.polylines');

Route::get('/polyline/{id}', [App\Http\Controllers\ApiController::class, 'geojson_polyline']) -> name('geojson.polyline');

Route::get('/polygons', [App\Http\Controllers\ApiController::class, 'geojson_polygons']) -> name('geojson.polygons');

Route::get('/polygon/{id}', [App\Http\Controllers\ApiController::class, 'geojson_polygon']) -> name('geojson.polygon');
