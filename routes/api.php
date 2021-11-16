<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;

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











Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});

Route::post('registracija', [UserController::class,'register']);
Route::post('prisijungimas', [UserController::class,'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('mechanikas', [UserController::class, 'getAuthenticatedUser']);
    //Route::get('manoProfilis', [UserController::class, 'userProfile']);
    ///api/gidai
    Route::get('gidai', [api::class, 'giduList']);
    Route::post('gidai', [api::class, 'addGidas']);

    //api/gidai/1
    Route::get('gidai/{gido_id}', [api::class, 'getGidas']);
    Route::put('gidai/{gido_id}', [api::class, 'updateGidas']);
    Route::delete('gidai/{gido_id}', [api::class, 'deleteGidas']);

    //api/automobiliai
    Route::get('automobiliai', [api::class, 'automobiliuList']);
    Route::post('automobiliai', [api::class, 'addAutomobilis']);

    //api/automobiliai/1
    Route::get('automobiliai/{automobilio_id}', [api::class, 'getAutomobilis']);
    Route::put('automobiliai/{automobilio_id}', [api::class, 'updateAutomobilis']);
    Route::delete('automobiliai/{automobilio_id}', [api::class, 'deleteAutomobilis']);

    //api/mechanikai
    Route::get('mechanikai', [api::class, 'mechanikuList']);
    //Route::post('mechanikai', [api::class, 'addMechanikas']);

    //api/mechanikai/1
    Route::get('mechanikai/{mechaniko_id}', [api::class, 'getMechanikas']);
    Route::put('mechanikai/{mechaniko_id}', [api::class, 'updateMechanikas']);
    Route::delete('mechanikai/{mechaniko_id}', [api::class, 'deleteMechanikas']);

    Route::get('mechanikai/{mechaniko_id}/gidai', [api::class, 'getMechanikasGidai']);

    Route::get('problemos', [api::class, 'problemuList']);
    Route::post('problemos', [api::class, 'addProblema']);

    //api/problemos/1
    Route::get('problemos/{problemos_id}', [api::class, 'getProblema']);
    Route::put('problemos/{problemos_id}', [api::class, 'updateProblema']);
    Route::delete('problemos/{problemos_id}', [api::class, 'deleteProblema']);

    Route::get('simptomai', [api::class, 'simoptomuList']);
    Route::post('simptomai', [api::class, 'addSimptomas']);

    //api/problemos/1
    Route::get('simptomai/{simptomo_id}', [api::class, 'getSimptomas']);
    Route::put('simptomai/{simptomo_id}', [api::class, 'updateSimptomas']);
    Route::delete('simptomai/{simptomo_id}', [api::class, 'deleteSimptomas']);
    });
