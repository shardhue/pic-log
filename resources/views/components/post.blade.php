<div class="post border border-gray-300 bg-white shadow-md w-2/5 rounded-md overflow-hidden relative">

    <img class="w-full lg:h-96 md:h-52 h-20 object-cover" src="{{$post['image']}}" onerror="this.src='/no_image.png'">

    <div class="p-6">
        <div class="flex justify-between">

        <div>
            <p class="text-3xl font-bold">{{$post['title']}}</p>
            <p><a href="/blog/{{$post->User->id}}" class="hover:underline"><span class="font-bold">{{$post->User->username}}</span></a>
            <span class="text-gray-400">{{$post->created_at}}</span></p>
        </div>

        <div class="mt-2">
            @if (auth()->user()?->username === $post->User->username)
            <form action="/editpost/{{$post->id}}" method="GET">
                <button>Edit</button>
            </form>
            @endif
        </div>

        </div>
        
        <p class="whitespace-pre-line mt-4">{{$post['body']}}</p>
    </div>

</div>