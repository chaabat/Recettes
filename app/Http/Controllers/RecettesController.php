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

    
    $data['nomRecettes'] = $request->nomRecettes;
    Recettes::create($data);

    return redirect()->route('recettes.index')->with('success', 'recettes created successfully!');
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


