<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-50">

    @auth
    <p>Welcome!</p>
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

</body>
</html>