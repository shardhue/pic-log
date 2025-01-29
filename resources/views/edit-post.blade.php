<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <form action="/editpost/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Title" value="{{$post->title}}">
        <textarea name="body" rows="5" placeholder="Write Your Post...">{{$post->body}}</textarea>
        <input type="text" name="image" placeholder="Image URL" value="{{$post->image}}">
        <button>Save Changes</button>
    </form>
</body>
</html>