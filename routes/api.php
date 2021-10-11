<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api;

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

//http://127.0.0.1:8000/api/gidai
Route::get('gidai', [api::class, 'giduList']);
Route::post('gidai', [api::class, 'addGidas']);

//http://127.0.0.1:8000/api/gidai/1
Route::get('gidai/{gido_id}', [api::class, 'getGidas']);
Route::put('gidai/{gido_id}', [api::class, 'updateGidas']);
Route::delete('gidai/{gido_id}', [api::class, 'deleteGidas']);



//http://127.0.0.1:8000/api/automobiliai
Route::get('automobiliai', [api::class, 'automobiliuList']);
Route::post('automobiliai', [api::class, 'addAutomobilis']);

//http://127.0.0.1:8000/api/automobiliai/1
Route::get('automobiliai/{automobilio_id}', [api::class, 'getAutomobilis']);
Route::put('automobiliai/{automobilio_id}', [api::class, 'updateAutomobilis']);
Route::delete('automobiliai/{automobilio_id}', [api::class, 'deleteAutomobilis']);



//http://127.0.0.1:8000/api/mechanikai
Route::get('mechanikai', [api::class, 'mechanikuList']);
Route::post('mechanikai', [api::class, 'addMechanikas']);

//http://127.0.0.1:8000/api/mechanikai/1
Route::get('mechanikai/{mechaniko_id}', [api::class, 'getMechanikas']);
Route::put('mechanikai/{mechaniko_id}', [api::class, 'updateMechanikas']);
Route::delete('mechanikai/{mechaniko_id}', [api::class, 'deleteMechanikas']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});