<x-layout>

    <div class="flex flex-col gap-14 items-center mb-20">
        @foreach($posts as $post)
        <x-post :post='$post'></x-post>
        @endforeach
    </div>

    <x-create></x-create>

</x-layout>