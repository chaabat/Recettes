@extends('layouts.master')

@section('updateCat')

<!-- component -->
@foreach ($categorie as $cate)
<div class="flex min-h-screen items-center justify-center bg-white dark:bg-gray-950 p-12">
    <form action="{{ route('categories.update', ['categorie' => $cate ->id]) }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
        @csrf
        @method('PUT')
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="nomCategorie" id="nomCategorie" value="{{ $cate->nomCategorie }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div>
            <div class="col-span-2">
                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture</label>
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                        <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                            <img class="has-mask h-36 object-center" src="{{ asset('storage/photos/' . $cate->picture) }}" alt="{{ $cate->nomCategorie }}">
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> Or select files</p>
                    </div>
                    <input id="picture" name="picture" type="file" class="hidden">
                </label>
            </div>
        </div>
        <input type="submit" value="Update Categorie" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    </form>
    
  </div>
@endforeach
    
@endsection