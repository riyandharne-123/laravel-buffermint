<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('jobs', 'App\Http\Controllers\JobController');
Route::resource('applications', 'App\Http\Controllers\ApplicationController');
Route::post('/jobs/filter',[App\Http\Controllers\JobController::class, 'filter']);