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


/********************************HOME*****************************************/

Route::get('/',[homeController::class,'index'] );

Route::get('/updateCat', [CategoriesController::class, 'updatecat']);


/********************************CATEGORIES*****************************************/

Route::get('/categories',[CategoriesController::class,'index'])->name('categories.index');

//create categories
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoriesController::class,'save'])->name('categories.save');

//update categories
Route::get('/categories/{categorie}/edit',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/{categorie}/update',[CategoriesController::class,'update'])->name('categories.update');

//delete categories
Route::delete('/categories/{categorie}/delete',[CategoriesController::class,'delete'])->name('categories.delete');


/************************************RECETTES****************************************/

Route::get('/recettes',[RecettesController::class,'index'] );

//create recettes
Route::get('/recettes',[RecettesController::class,'index'])->name('recettes.index');
Route::get('/recettes/create',[RecettesController::class,'index'])->name('recettes.create');
Route::post('/recettes',[RecettesController::class,'save'])->name('recettes.save');


//update recettes
Route::get('/recettes/edit',[RecettesController::class,'edit'])->name('recettes.edit');
Route::put('/recettes/update',[RecettesController::class,'update'])->name('recettes.update');

//delete categories
Route::delete('/recettes/{recette}/delete',[RecettesController::class,'delete'])->name('recettes.delete'); 














