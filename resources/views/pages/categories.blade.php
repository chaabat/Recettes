@extends('layouts.master')

@section('cate')

<div class="w-full xl:w-10/12 px-4 mx-auto mt-8">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-[#8b5e34] ">
        <div class="flex flex-wrap items-center text-white ">
            <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                <h3 class="font-bold text-base text-blueGray-700">Categories</h3>
            </div>
            <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                <span data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                    <a href="#" id="add-button"
                        class="bg-[#ffedd8] text-black text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Ajouter</a>
                </span>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-screen-xl px-4 w-full mt-12 mb-12">
        <div class="grid w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categorie as $cate)
            <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                <div class="h-auto overflow-hidden">
                    <div class="h-44 overflow-hidden relative">
                        <img src="{{ asset('storage/photos/' . $cate->picture) }}" alt="{{ $cate->nomCategorie }}">
                    </div>
                </div>
                <div class="bg-white py-4 px-3">
                    <h1 class="text-3xl text-black text-center mb-2 font-bold">{{ $cate->nomCategorie }}</h1>
                    <div class="flex justify-between">
                        
                        <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update">
                            <a href="{{route('categories.edit', ['categorie'=>$cate])}}" class="text-blue-500 hover:text-blue-700 edit-category"><img src="{{ asset('photos/editer.png') }}" class="h-8 w-8"></a>
                        </span>
                        
                        
                        <form action="{{ route('categories.delete', ['categorie'=>$cate]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500 hover:text-red-700"><img src="{{ asset('photos/supprimer.png') }}" class="h-8 w-8"></button>
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
                    Add Categorie
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

            <form action="{{route('categories.save')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('post')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text"  name="nomCategorie" id="nomCategorie"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
               
                    <div class="col-span-2">
                        <label for="logo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture</label>

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
                <input type="submit" value="Create Categorie"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  
                
            </form>
        </div>
    </div>
</div>

{{-- UPDATE --}}
{{-- <div id="crud-modal-update" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Categorie
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal-update">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="{{ route('categories.update', ['categorie' => $cate->id]) }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
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
    </div>
</div> --}}



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


    
@endsection





