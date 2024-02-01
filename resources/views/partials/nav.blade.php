<!-- component -->
<nav class=" bg-[#8b5e34] w-full flex relative justify-between items-center mx-auto px-8 h-20">
    <!-- logo -->
    <div class="">
        <img {{ asset('photos/logo.jpg') }} class="h-16 w-8" alt="">

    </div>

   

    <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            {{-- <form action="{{ route('recettes.search') }}" method="GET"> --}}
                <input type="text" name="query" placeholder="Search Recettes...">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
    <!-- end search bar -->

    <!-- login -->
    <div class="flex-initial">
      <div class="flex justify-end items-center relative">
       
        <div class="flex mr-4 items-center">
          <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="/">
            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Home</div>
          </a>
          <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="recettes">
            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Recettes</div>
          </a>
          <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="categories">
            <div class="flex items-center relative cursor-pointer whitespace-nowrap">Categories</div>
          </a>
        
        </div>

        <div class="block">
            <div class="inline relative">
                <button type="button" class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                    <div class="pl-1">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;"
                        >
                            <g fill="none" fill-rule="nonzero">
                                <path d="m2 16h28"></path>
                                <path d="m2 24h28"></path>
                                <path d="m2 8h28"></path>
                            </g>
                        </svg>
                    </div>

                    <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                        <svg
                            viewBox="0 0 32 32"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                            role="presentation"
                            focusable="false"
                            style="display: block; height: 100%; width: 100%; fill: currentcolor;"
                        >
                            <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
      </div>
    </div>
    <!-- end login -->
</nav>