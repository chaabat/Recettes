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

   public function save(Request $request)
   {
       // Validate the request
       $request->validate([
           'nomCategorie' => ['required', 'min:3'],
           'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           // other validation rules
       ]);
   
       // Store the picture
       if ($request->hasFile('picture')) {
           $pictureName = time() . '.' . $request->picture->extension();
           $request->picture->storeAs('public/photos', $pictureName); // Store in storage/app/public/photos
           $data['picture'] = $pictureName;
       }
   
       // Save the category data
       $data['nomCategorie'] = $request->nomCategorie;
       Categorie::create($data);
   
       return redirect()->route('categories.index')->with('success', 'Category created successfully!');
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



//    public function store(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
//         // other validation rules
//     ]);

//     // Store the picture
//     if ($request->hasFile('picture')) {
//         $pictureName = time() . '.' . $request->picture->extension();
//         $request->picture->storeAs('public/photos', $pictureName);
//         $data['picture'] = $pictureName;
//     }

//     // Create new record in the database
//     Categorie::create($data);

//     return redirect()->route('route.name')->with('success', 'Record created successfully!');
// }

}
