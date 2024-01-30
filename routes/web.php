<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\RecettesController;
use Illuminate\Http\Request; 
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

Route::get('/',[homeController::class,'index'] );

Route::get('/categories',[CategoriesController::class,'index'])->name('categories.index');
//create
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoriesController::class,'save'])->name('categories.save');
//update

Route::get('/categories/{categorie}/edit',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/{categorie}/update',[CategoriesController::class,'update'])->name('categories.update');

//delete
Route::delete('/categories/{categorie}/delete',[CategoriesController::class,'delete'])->name('categories.delete');















