<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pic Log</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-50">

    @auth

    <p>{{auth()->user()->username}}</p>
    <form action="/blog" method="GET">
        <button>View Blog</button>
    </form>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>

    <form action="/createpost" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <textarea name="body" rows="5" placeholder="Write Your Post..."></textarea>
        <input type="text" name="image" placeholder="Image URL">
        <button>Post</button>
    </form>
        
    @else

    <form action="/register" method="POST">
        @csrf
        <input name="email" type="text" placeholder="Email">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <button>Register</button>
    </form>

    <form action="/login" method="POST">
        @csrf
        <input name="loginusername" type="text" placeholder="Username">
        <input name="loginpassword" type="password" placeholder="Password">
        <button>Login</button>
    </form>
        
    @endauth

    @foreach($posts as $post)
        <div class="border border-black">
            <p>{{$post['title']}}</p>
            <p>{{$post->User->username}}</p>
            <p>{{$post['body']}}</p>
            <img class="w-80" src="{{$post['image']}}">
            @if (auth()->user()?->username === $post->User->username)
            <form action="/editpost/{{$post->id}}" method="GET">
                <button>Edit</button>
            </form>
            <form action="/deletepost/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            @endif
        </div>
    @endforeach

</body>
</html>