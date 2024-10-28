<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>lvl up!</title>
    </head>
    <body class="font-mono">
        <header class="w-2/5 mx-auto pt-4">
            <h1 class="text-3xl font-bold text-center">lvl <span class="text-2xl relative bottom-3 ml-1">u</span><span class="text-2xl relative bottom-2">p</span></h1>
            <p class="text-center text-sm">Reviews more epic than your last boss battle!</p>
        </header>
        <p class="text-center py-6">~-~-~-~-~-~-~-~-~-~-~</p>
        <section class="w-2/5 mx-auto">
            @yield('content')
        </section>
    </body>
</html>
