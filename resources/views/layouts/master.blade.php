    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>
    <body class="bg-[#ffedd8]">
        @include('partials.nav')

<main>
    @yield('main')
    @yield('cate')
    @yield('recettes') 
    @yield('updateCat') 

     

  




</main>

            @include('partials.footer')
          
        
    </body>
    </html>