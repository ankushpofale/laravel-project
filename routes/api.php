<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\authcontroller;
use App\Http\Controllers\NewcustomersController;
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

Route::controller(NewcustomersController::class)->group(function(){

    
    Route::middleware('auth:sanctum')->get('newcustomer','index');
    Route::middleware('auth:sanctum')->post('new','create');
    Route::middleware('auth:sanctum')->put('update/{id}','update');
    Route::middleware('auth:sanctum')->put('search','search');

 });
 
Route::controller(authcontroller::class)->group(function(){
    Route::post('login', 'login');
    Route::post('register','register');
   /*  Route::post('migrate','migrate'); */
    
 });
 