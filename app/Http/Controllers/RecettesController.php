<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Recette;
use Illuminate\Http\Request;

class RecettesController extends Controller
{
    public function index(){
        $recettes = Recette::orderBy('id','desc')->get();
        $categories = Categorie::all();
        return view('pages.recettes',['recettes'=> $recettes, 'categories'=> $categories]);
    }

    public function create(){
        return view('pages.create_recette'); // Assuming you have a blade file for creating recettes
    }

    public function save(Request $request){
        $data = $request->validate([
            'nomRecettes' => ['required', 'min:3'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required', 'min:10'],
            'categorie_id' => ['required', 'numeric']
        ]);
        
        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $pictureName); 
            $data['picture'] = $pictureName;
        }

        Recette::create($data);

        return redirect()->route('recettes.index')->with('success', 'Recette created successfully!');
    }

    public function edit(Recette $recette){
        return view('pages.edit_recette',['recette' =>$recette]); // Assuming you have a blade file for editing recettes
    }
  
    public function update(Recette $recette, Request $request){
        $data = $request->validate([
            'nomRecettes' =>['required','min:3'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required', 'min:10'],
            'categorie_id' => ['required', 'numeric']
        ]);

        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $pictureName); 
            $data['picture'] = $pictureName;
        }

        $recette->update($data);
        return redirect()->route('recettes.index')->with('success', 'Recette updated successfully!');
    }

    public function delete(Recette $recette){
        $recette->delete();
        return redirect()->route('recettes.index')->with('success', 'Recette deleted successfully!');
    }
}
