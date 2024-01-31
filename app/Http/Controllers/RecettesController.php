<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\recettes;
use Illuminate\Http\Request;

class RecettesController extends Controller
{
    public function index(){
        $recettes = Recettes::orderBy('id','desc')->get();
        $categories = Categorie::all();
        return view('pages.recettes',['recettes'=> $recettes, 'categories'=> $categories]);
       }

       public function create(){
        return view('pages.recettes');
     }
       
public function save(Request $request)
{
    $request->validate([
        'nomRecettes' => ['required', 'min:3'],
        'description' => ['required', 'min:10'],
        'categorie_id' => ['required', 'numeric'],
        'picture' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ]);

    $data = [
        'nomRecettes' => $request->input('nomRecettes'),
        'description' => $request->input('description'),
        'categorie_id' => $request->input('categorie_id'),
    ];

    // Check if a picture file was uploaded
    if ($request->hasFile('picture')) {
        $pictureName = time() . '.' . $request->file('picture')->getClientOriginalExtension();
        $request->file('picture')->storeAs('public/photos', $pictureName);
        $data['picture'] = $pictureName;
    }
    // dd($request->all());
    Recettes::create($data);

    return redirect()->route('recettes.index')->with('success', 'Recette created successfully!');
}

       public function edit(recettes $recettes){
        return view('pages.recettes',['recettes' =>$recettes]);
     }
  
     public function update(recettes $recettes,Request $request){
        $data = $request->validate([
           'nomRecettes' =>['required','min:3']
        ]);
      $recettes->update($data);
      return redirect(route('recettes.index'));
       
     }
  
  
     public function delete(recettes $recettes)
  {
      $recettes->delete();
      return redirect()->route('recettes.index')->with('success', 'recettes deleted successfully!');
     
  
  }
}


