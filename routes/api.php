<?php

use App\Http\Controllers\Front\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\OutcomeController;
use App\Http\Controllers\Front\RequirementController;

Route::post('/register', [App\Http\Controllers\Front\AccountController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Front\AccountController::class, 'authonticate']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/meta-data', [CourseController::class, 'metaData']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::get('/courses', [CourseController::class, 'index']);
});




/// outcome routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/outcomes', [OutcomeController::class, 'store']);
    Route::get('/outcomes', [OutcomeController::class, 'index']);
    Route::get('/outcomes/{id}', [OutcomeController::class, 'show']);
    Route::put('/outcomes/{id}', [OutcomeController::class, 'update']);
    Route::delete('/outcomes/{id}', [OutcomeController::class, 'destroy']);
});


/// requirement routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/requirements', [RequirementController::class, 'store']);
    Route::get('/requirements', [RequirementController::class, 'index']);
    Route::get('/requirements/{id}', [RequirementController::class, 'show']);
    Route::put('/requirements/{id}', [RequirementController::class, 'update']);
    Route::delete('/requirements/{id}', [RequirementController::class, 'destroy']);
});