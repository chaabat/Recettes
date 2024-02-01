@extends('layouts.master')

@section('updateRec')

<div class="flex min-h-screen items-center justify-center bg-[#ffedd8] dark:bg-gray-950 p-12" style="width: 80%; margin-left: auto; margin-right: auto;">

    <form action="{{ route('recettes.update', ['recette' => $recette]) }}" method="post" enctype="multipart/form-data" class="p-4 md:p-5">
        @csrf
        @method('put')
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
                <input type="text" name="nomRecettes" id="nomRecettes"  value="{{$recette->nomRecettes }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Description</label>
                <textarea cols="30" rows="10" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $recette->description }}</textarea>
            </div>
            <div class="col-span-2">
                <label for="categorie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Category</label>
                <select name="categorie_id" id="categorie_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $categorie->id == $recette->categorie_id ? 'selected' : '' }}>{{ $categorie->nomCategorie }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2">
                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Picture</label>
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                            <img class="has-mask h-36 object-center" src="{{ asset('storage/photos/' . $recette->picture) }}" >
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> Or select files</p>
                    </div>
                    <input id="picture" name="picture" type="file" class="hidden">
                </label>
            </div>
        </div>
        <input type="submit" value="Update Recettes" class="text-white inline-flex items-center bg-[#8b5e34]  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    </form>
</div>

@endsection
