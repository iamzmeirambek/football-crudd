<?php

use App\Http\Controllers\API\V1\StorageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\HandbookStatusController;
use App\Http\Controllers\API\V1\ApplicationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('api')->group(function () {
   Route::prefix('v1')->group(function () {
          Route::prefix('post')->group(function () {
         Route::controller(PostController::class)->group(function () {
             Route::get('/', 'index');
             Route::get('/{post}', 'show');
             Route::post('/store', 'store');
             Route::put('/edit/{post}', 'update');
             Route::delete('/delete/{post}', 'destroy');
         });
     });
       Route::prefix('application')->group(function () {
           Route::controller(ApplicationController::class)->group(function () {
               Route::get('/', 'index');
               Route::get('/{application}', 'show');
               Route::post('/store', 'store');
               Route::put('/edit/{application}', 'update');
               Route::delete('/delete/{application}', 'destroy');
           });
       });
      Route::prefix('handbookStatus')->group(function (){
          Route::controller(HandbookStatusController::class)->group(function (){
              Route::get('/', 'index');
              Route::get('/{handbookStatus}', 'show');
              Route::post('/store', 'store');
              Route::put('/edit/{handbookStatus}', 'update');
              Route::delete('/delete/{handbookStatus}', 'destroy');
          });
      });
      Route::prefix('storage')->group(function (){
          Route::controller(StorageController::class)->group(function (){
              Route::post('/upload','upload');
          });
          Route::get('/test', function (){
              $model = \App\Models\StorageM::query()->find(3);
              return env('APP_URL') . \Illuminate\Support\Facades\Storage::url($model->path);
          });
      });
   });
});
