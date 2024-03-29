<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Api;
use Telegram\Bot\Traits\Telegram;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/community/index', [CommunityController::class, 'index'])->name('community.index');

    Route::get('/area/create', [AreaController::class, 'createStateOrCity'])->name('area.create');
    Route::get('/area/index', [AreaController::class, 'areaList'])->name('area.index');

    Route::post('/area/city/store', [AreaController::class, 'cityStore'])->name('area.city.store');
    Route::post('/area/state/store', [AreaController::class, 'stateStore'])->name('area.state.store');

});

Route::post('/'.env('TELEGRAM_BOT_TOKEN').'/webhookHandler', function () {
    Log::debug('webhookHandler hit');
    $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    $updates = $telegram->commandsHandler(true);
    Log::debug(print_r($updates, true));

});
