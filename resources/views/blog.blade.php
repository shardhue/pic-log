<x-layout>
    <div class="w-full h-auto bg-gray-500 shadow-md text-white p-7 mb-10 -mt-10 text-center">
        <a href="/blog/{{$user->id}}" class="hover:underline text-4xl">{{$user->username}}'s Blog</a>
    </div>
    
    <div class="flex flex-col gap-14 items-center mb-20">
        @foreach($posts as $post)
        <x-post :post='$post'></x-post>
        @endforeach
    </div>

    @if (auth()->user()?->id === $user->id)
    <x-create></x-create>
    @endif
</x-layout>