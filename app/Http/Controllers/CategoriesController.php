<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index()
    {

        $categorie = Categorie::all();
        return view('pages.categories', ['categorie' => $categorie]);
    }


    public function create()
    {
        return view('pages.categories');
    }

    public function save(Request $request)
    {

        $request->validate([
            'nomCategorie' => ['required', 'min:3'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);


        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $pictureName);
            $data['picture'] = $pictureName;
        }


        $data['nomCategorie'] = $request->nomCategorie;
        Categorie::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }





    public function edit(Categorie $categorie)
    {
        return view('pages.updateCat', ['categorie' => $categorie]);
    }

    public function update(Categorie $categorie, Request $request)
    {
        $data = $request->validate([
            'nomCategorie' => ['required', 'min:3'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $oldPicture = $categorie->picture;

        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->storeAs('public/photos', $pictureName);
            $data['picture'] = $pictureName;
        }

        $categorie->update($data);

        if ($request->hasFile('picture')) {
            Storage::delete('public/photos/' . $oldPicture);
        }

        return redirect()->route('categories.index');
    }



    public function delete(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
