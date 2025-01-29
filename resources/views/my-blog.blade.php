<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @foreach($posts as $post)
        <div class="border border-black">
            <p>{{$post['title']}}</p>
            <p>{{$post->User->username}}</p>
            <p>{{$post['body']}}</p>
            <img class="w-80" src="{{$post['image']}}">
            <form action="/editpost/{{$post->id}}" method="GET">
                <button>Edit</button>
            </form>
            <form action="/deletepost/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
    @endforeach
</body>
</html>