<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
//Route::prefix('team')->group(function () {
//    Route::controller(\App\Http\Controllers\API\V1\TeamController::class)->group(function () {
//        Route::get('/','index')->name('team');
//        Route::post('/store', 'store')->name('team.store');
//        Route::get('/create', 'create')->name('team.create');
//        Route::get('/{team}','show')->name('team.show');
//        Route::put('/{team}','update')->name('team.update');
//        Route::delete('/{team}','destroy');
//        Route::get('/edit/{team}','edit')->name('team.edit');
//    });
//
//});
////Route::resource('team', \App\Http\Controllers\API\V1\TeamController::class);
//
//Route::get('team/players/{team}', [\App\Http\Controllers\API\V1\TeamController::class, 'showPlayers'])->name('team.players');
////Route::resource('players', \App\Http\Controllers\API\V1\PlayerController::class);
//
//Route::prefix('players')->group(function () {
//    Route::controller(\App\Http\Controllers\API\V1\PlayerController::class)->group(function () {
//        Route::post('/store', 'store')->name('players.store');
//        Route::get('/create', 'create')->name('players.create');
//        Route::get('/{player}','show')->name('players.show');
//        Route::put('/{player}','update')->name('players.update');
//        Route::delete('/{player}','destroy')->name('players.destroy');
//        Route::get('/edit/{player}','edit')->name('players.edit');
//    });
//
//});
//
