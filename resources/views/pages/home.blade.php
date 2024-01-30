@extends('layouts.master')


@section('main')
<!-- component -->

<div class="w-full h-screen overflow-hidden relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:left-0 before:z-10 before:opacity-30">
    <img src="https://wallpapercave.com/dwp1x/wp10761300.jpg" class="absolute top-0 left-0 min-h-full ob w-full" alt="">
    <div class="relative z-20 max-w-screen-lg mx-auto grid grid-cols-12 h-full items-center">
      <div class="col-span-6">
        <span class="uppercase text-white text-xs font-bold mb-2 block">WE ARE EXPERTS</span>
        <h1 class="text-white font-extrabold text-5xl mb-8">Finpoint provides Financial Consulting in different ways</h1>
        <p class="text-stone-100 text-base">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <button class="mt-8 text-white uppercase py-4 text-base font-light px-10 border border-white hover:bg-white hover:bg-opacity-10">Get started</button>
      </div>
    </div>
  </div>
  <div class="bg-[#f7d0b6] py-20">
    <div class="max-w-screen-lg mx-auto flex justify-between items-center">
      <div class="max-w-xl">
          <h2 class="font-black text-sky-950 text-3xl mb-4">En explorant ces recettes 100% marocaines, on découvre un univers de délices culinaires qui célèbrent la diversité et l'authenticité de cette cuisine envoûtante.</h2>
      </div>
      <img src="{{ asset('photos/ma.png') }}" alt="">
    </div>
  </div>

 

@endsection