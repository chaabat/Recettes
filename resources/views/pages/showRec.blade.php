@extends('layouts.master')
@section('showRec')
<div class="flex min-h-screen items-center justify-center flex-wrap">
   
        <div class="relative flex w-full max-w-[80%] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mb-8">
            <div class="relative m-0 w-1/2 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                <img src="{{ asset('storage/photos/' . $recette->picture) }}" alt="{{ $recette->nomRecettes }}" class="w-full h-full object-cover">
            </div>
            <div class="p-6 w-1/2 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between">
                    <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-[#8b5e34] antialiased">
                        Categorie : {{ $recette->category->nomCategorie }}   
                      </h6>
                      <span class="flex items-center text-green-500">
                        <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v4c0 .3.1.5.3.7l3 3a1 1 0 0 0 1.4-1.4L13 11.6V8Z" clip-rule="evenodd"/>
                          </svg>
                          
                        {{ $recette->created_at }}
                    </span>
                      </div>
                    <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        {{ $recette->nomRecettes }}
                    </h4>
                    <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                        {!! nl2br(e($recette->description)) !!}
                    </p>
                </div>
                <div class="flex justify-between">
                    <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update">
                        <a href="{{route('recettes.edit', ['recette'=>$recette])}}" class="text-blue-500 hover:text-blue-700 edit-category"><img src="{{ asset('photos/editer.png') }}" class="h-8 w-8"></a>
                    </span>
                    <form action="{{ route('recettes.delete', ['recette' => $recette->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-500 hover:text-red-700"><img src="{{ asset('photos/supprimer.png') }}" class="h-8 w-8"></button>
                    </form>
                </div>
            </div>
        </div>
</div>




</div>
    
@endsection