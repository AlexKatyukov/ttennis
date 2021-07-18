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

//НЕБЕЗОПАСНО: запуск мирграций по /api/migrun
//Route::get('migrun', function () {
//    $exitCode = Artisan::call('migrate:refresh', [
//        '--force' => 'foo'
//    ]);
//
//    return response()->json(['message' => $exitCode]);
//});
