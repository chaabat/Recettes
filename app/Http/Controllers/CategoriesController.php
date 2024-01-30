<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   public function index(){
      $categorie = Categorie::all();
    return view('pages.categories',['categorie' =>$categorie]);
   }




   public function create(){
      return view('pages.categories');
   }

   public function save(Request $request){
      $data = $request->validate([
         'nomCategorie' =>['required','min:3']
      ]);
    Categorie::create($data);
    return redirect(route('categories.index'));
     
   }

   public function edit(Categorie $categorie){
      return view('pages.categories',['categorie' =>$categorie]);
   }

   public function update(Categorie $categorie,Request $request){
      $data = $request->validate([
         'nomCategorie' =>['required','min:3']
      ]);
    $categorie->update($data);
    return redirect(route('categories.index'));
     
   }

   public function delete(Categorie $categorie){
$categorie->delete();
    return redirect(route('categories.index'));
   }
}
