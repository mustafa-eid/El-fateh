<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PerviousWorkController;

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



//Route::post('create/Pervious_work',[PerviousWorkController::class,'CreatePreviousWork']);
//Route::put('edit/Pervious_work',[PerviousWorkController::class,'EditPreviousWork']);
//Route::delete('delete/Pervious_work',[PerviousWorkController::class,'DeletePreviousWork']);