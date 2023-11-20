<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Assetmanage;
use App\Http\Controllers\Categorymanage;
use App\Http\Middleware\adminmiddleware;
use GuzzleHttp\Middleware;

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
//For asset


Route::post('/sendasset',[Assetmanage::class,'sendasset']);
Route::get('/show',[Assetmanage::class,'show']);
Route::get('/add',[Assetmanage::class,'add']);
Route::get('/editasset/{id}',[Assetmanage::class,'edit']);
Route::post('/update',[Assetmanage::class,'update']);
//Route for delete
Route::get('/delasset/{id}',[Assetmanage::class,'delete']);
Route::get('/barchart',[Assetmanage::class,'index1']);



//For Category
Route::get('/addcat',[Categorymanage::class,'addcat']);
// For Add category
Route::post('/sendcat',[Categorymanage::class,'sendcat']);
// For show category details
Route::get('/showcat',[Categorymanage::class,'show']);
// For Delete category
Route::get('/delcat/{id}',[Categorymanage::class,'delete']);
//open for Edit table page 
Route::get('/edit/{id}',[Categorymanage::class,'edit']);
//For Edit
Route::post('/updatecat',[Categorymanage::class,'updatecat']);



//For Pie chart
Route::get('/piechart',[Categorymanage::class,'index']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
