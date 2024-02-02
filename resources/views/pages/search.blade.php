@extends('layouts.master')
@section('searchRec')
@if ($recettes->isEmpty())
<!-- component -->
<div class=" w-full px-16 md:px-0 h-screen flex items-center justify-center">
    <div class=" border border-gray-200 flex flex-col items-center justify-center px-4 md:px-8 lg:px-24 py-8 rounded-lg shadow-2xl">
        <p class="text-6xl md:text-7xl lg:text-9xl font-bold tracking-wider text-[#8b5e34]">"{{ $results }}"</p>
        <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-black mt-4">No results found </p>
        <a href="recettes" class="flex items-center space-x-2 bg-[#8b5e34] text-gray-100 px-4 py-2 mt-6 rounded transition duration-150" title="Return Home">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
            </svg>
            <span>Return Home</span>
        </a>
    </div>
</div>
@else

<div class="w-full xl:w-10/12 px-4 mx-auto mt-8">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-[#8b5e34] ">
        <div class="flex flex-wrap items-center text-white ">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-bold text-base text-blueGray-700">Search Results for "{{ $results }}"</h3>
            </div>
        </div>
    </div>

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
                        {!! nl2br(e($recette->description)) !!}

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