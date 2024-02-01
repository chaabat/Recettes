<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RecettesController extends Controller
{
    public function index(){
        $recettes = Recette::orderBy('id','desc')->get();
        $categories = Categorie::all();
        return view('pages.recettes',['recettes'=> $recettes, 'categories'=> $categories]);
    }

   //  public function updateRec()
   //  {

   //      $recette = Recette::all();
   //      return view('pages.updateRec', ['recette' => $recette]);
   //  }

    public function create(){
        return view('pages.index'); 
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
  
      return redirect()->route('recettes.index');
  }
  

 

    public function edit(Recette $recette){
        $categories = Categorie::all();
        return view('pages.updateRec', ['recette' => $recette, 'categories' => $categories]); 
    }
    
  
    public function update(Recette $recette, Request $request){
        $data = $request->validate([
            'nomRecettes' =>['required','min:3'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required', 'min:10'],
            'categorie_id' => ['required', 'numeric']
        ]);
        $oldPicture = $recette->picture;

        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $pictureName); 
            $data['picture'] = $pictureName;
        }

        $recette->update($data);
        if ($request->hasFile('picture')) {
         Storage::delete('public/photos/' . $oldPicture);
     }
        return redirect()->route('recettes.index')->with('success', 'Recette updated successfully!');
    }

    public function delete(Recette $recette){
        $recette->delete();
        return redirect()->route('recettes.index')->with('success', 'Recette deleted successfully!');
    }


    public function search(Request $request)
    {
        $results = $request->input('results');
        
        $recettes = Recette::where('nomRecettes', 'like', "%$results%")
                            ->orWhere('description', 'like', "%$results%")
                            ->orWhereHas('category', function ($query) use ($results) {
                                $query->where('nomCategorie', 'like', "%$results%");
                            })
                            ->get();
        
        $categories = Categorie::all();
        
        return view('pages.search', compact('recettes', 'results', 'categories'));
    }
    
    
}
