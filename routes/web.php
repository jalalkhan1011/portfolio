<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[FrontendController::class,'index']);
Route::resource('/contacts',ContactController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('/admin/profiles',ProfileController::class);//resource route
    Route::resource('/admin/skills',SkillController::class);
    Route::resource('/admin/projects',ProjectController::class);
    Route::resource('/admin/contacts',ContactController::class);
});

Route::get('{any}', function () {
    return view('admin/layouts/master');
})->where('any', '.*');
