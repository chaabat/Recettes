@extends('layouts.master')
@section('searchRec')
@if ($recettes->isEmpty())
<p>No results found for "{{ $results }}".</p>
@else
<h1>Search Results for "{{ $results }}"</h1>
<div class="flex min-h-screen items-center justify-center flex-wrap">
    @foreach ($recettes as $recette)
        <div class="relative flex w-full max-w-[80%] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mb-8">
            <div class="relative m-0 w-1/2 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                <img src="{{ asset('storage/photos/' . $recette->picture) }}" alt="{{ $recette->nomRecettes }}" class="w-full h-full object-cover">
            </div>
            <div class="p-6 w-1/2 flex flex-col justify-between">
                <div>
                    <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                        Categorie : {{ $recette->category->nomCategorie }}   
                      </h6>
                    <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        {{ $recette->nomRecettes }}
                    </h4>
                    <p class="mb-2 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                        {{ $recette->description }}
                    </p>
                   
                </div>
                <div class="flex justify-between">
                    <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update">
                        <a href="{{ route('recettes.edit', ['recette' => $recette]) }}" class="text-blue-500 hover:text-blue-700 edit-category"><img src="{{ asset('photos/editer.png') }}" class="h-8 w-8"></a>
                    </span>
                    <form action="{{ route('recettes.delete', ['recette' => $recette->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-500 hover:text-red-700"><img src="{{ asset('photos/supprimer.png') }}" class="h-8 w-8"></button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif

@endsection