<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pic Log</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="/main.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="header w-full h-auto bg-sky-500 shadow-md text-white p-3 mb-10 grid grid-cols-3 items-center">
        <div class="text-2xl text-center col-start-2">
            <a href="/" class="hover:underline">Pic Log</a>
        </div>
        <div class="flex justify-end gap-2 text-black">
            @auth
            <form action="{{ url('blog/' . auth()->user()->id) }}" method="GET">
                <button>{{auth()->user()->username}}'s Blog</button>
            </form>
            <form action="/logout" method="POST">
                @csrf
                <button>Log Out</button>
            </form>

            @else
            <form action="/login" method="GET">
                <button>Log In</button>
            </form>
            <form action="/signup" method="GET">
                <button>Sign Up</button>
            </form>

            @endauth
        </div>
    </div>

    {{$slot}}

</body>
</html>