<?php

use Illuminate\Support\Facades\Route;
use App\Models\Map;

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
    $mapPoints = Map::where('moderated', true)->get();
    return view('pages.home', ['mapPoints' => $mapPoints]);
});

Route::get('/add', function () {
    return view('pages/add');
});

Route::post('/add/process', 'App\Http\Controllers\AddMapPointToModerateListController@index');

//Route::get('/admin', function () {
//    return view('pages.admin');
//});

Route::get('/about', function () {
    return view('pages.about');
});
