@extends('layouts.master')

@section('cate')
<div class="flex items-center justify-center p-12">
   
    <div class="mx-auto w-full max-w-[550px] bg-white">
   
      <form  class="py-6 px-9" action="{{route('categories.save')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-5">
          <label
            for="Categorie"
            class="mb-5 block text-xl font-semibold text-black"
          >
            Categorie Name
          </label>
          <input
            type="text"
            name="nomCategorie"
            id="nomCategorie"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
          />
        </div>
  
        <div class="mb-6 pt-4">
          <label class="mb-5 block text-xl font-semibold text-black">
            Upload File
          </label>
  
          <div class="mb-8">
            <input type="file" name="file" id="file" class="sr-only" />
            <label
              for="file"
              class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center"
            >
              <div>
                <span class="mb-2 block text-xl font-semibold text-black">
                  Drop files here
                </span>
                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                  Or
                </span>
                <span
                  class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-black"
                >
                  Browse
                </span>
              </div>
            </label>
          </div>
  
  
        <div>
          <input type="submit" value="Create Categorie"
            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
          >
           
        </div>
      </form>
    </div>
  </div>
    
@endsection

{{-- @section('editcat')
<h2>modifier une categorie</h2>
<form action="{{route('categories.update',['categorie'=>$categorie])}}" method="post">
    @csrf
    @method('put')

    <label for="name categorie"></label>
    <input type="text" name="nomCategorie" value={{$categorie->nomCategorie}} required>
    <input type="submit" value="create categorie">
</form>
    
@endsection --}}



