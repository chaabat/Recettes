@extends('layouts.master')

@section('recettes')




<div class=" flex items-center justify-center ">
    
    <div class="container mx-auto mx-auto p-4">
        
    <div class="rounded-t mb-6 px-4 py-3 border-0 bg-[#8b5e34] ">
        <div class="flex flex-wrap items-center text-white ">
            <div class="relative  w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-semibold text-base text-blueGray-700">Recettes</h3>
            </div>
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                <span data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                    <a href="#" id="add-button"
                        class="bg-[#ffedd8]  text-black text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Ajouter</a>
                </span>
            </div>
        </div>
    </div>
      {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
        
        @foreach ($recettes as $recette)
        <div class="bg-white rounded-lg border p-4">
            <img src="{{ asset('storage/photos/' . $recette->picture) }}" alt="{{ $recette->nomRecettes }}">
            <div class="px-1 py-4">
                <div class="font-bold text-xl mb-2">{{ $recette->nomRecettes }}</div>
                <div class="font-bold text-xl mb-2">{{ $recette->nomCategorie }}</div>

                <p class="text-gray-700 text-base">{{ $recette->description }}</p>
                <div class="flex justify-between">
                    <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update" data-category-id="{{ $recette->recettes }}">
                        <a href="#" class="text-blue-500 hover:text-blue-700 edit-category">Edit</a>
                    </span>
                    <form action="{{ route('recettes.delete', ['recette' => $recette->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    
        
      </div> --}}

      <div class="flex min-h-screen items-center justify-center flex-wrap">
        @foreach ($recettes as $recette)
            <div class="relative flex w-full max-w-[80%] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mb-8">
                <div class="relative m-0 w-1/2 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                    <img src="{{ asset('storage/photos/' . $recette->picture) }}" alt="{{ $recette->nomRecettes }}" class="w-full h-full object-cover">
                </div>
                <div class="p-6 w-1/2 flex flex-col justify-between">
                    <div>
                        <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                            {{-- {{ $categories->nomCategorie }}    --}}
                          </h6>
                        <h4 class="mb-2 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            {{ $recette->nomRecettes }}
                        </h4>
                        <p class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                            {{ $recette->description }}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update" data-category-id="{{ $recette->recettes }}">
                            <a href="#" class="text-blue-500 hover:text-blue-700 edit-category">Edit</a>
                        </span>
                        <form action="{{ route('recettes.delete', ['recette' => $recette->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    
    
 
  </div>

  
    

    

<!-- pop out form  -->

<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Recettes
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{route('recettes.save')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('post')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
                        <input type="text"  name="nomRecettes" id="nomRecettes"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Description</label>
                        <textarea cols="30" rows="10"   name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </textarea>
                    </div>
                        
                   
                    <select type="name" name="categorie_id" id="categorie_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-[375px] p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nomCategorie }}</option>
                                @endforeach
                            </select>
               
                    <div class="col-span-2">
                        <label for="logo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Picture</label>

                        <label
                            class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                            <div
                                class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">

                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                    <img class="has-mask h-36 object-center"
                                        src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                        alt="freepik image">
                                </div>
                                <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> Or select files
                                </p>
                            </div>
                            <input id="picture" name="picture" type="file" class="hidden">
                        </label>
                    </div>


                </div>
                <input type="submit" value="Create Recettes"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  
                
            </form>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
      
   
@endsection