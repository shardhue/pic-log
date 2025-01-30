<x-layout>

    <x-form>
        <x-slot:title>Edit Post</x-slot:title>
        <form class="w-3/6" action="/editpost/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Title" value="{{$post->title}}">
            <textarea name="body" rows="5" placeholder="Write Your Post...">{{$post->body}}</textarea>
            <input id="img-input" type="text" name="image" placeholder="Image URL" value="{{$post->image}}">
            <button class="bg-sky-500 text-white shadow-md">Save Changes</button>
        </form>
        <p>Image Preview:</p>
        <img id="pv-img" class="w-2/6 object-cover -mt-5 rounded-xl" src="{{$post->image}}" onerror="this.src='/no_image.png'">
        <form class="w-1/6 mr-auto" action="/deletepost/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white shadow-md">Delete Post</button>
        </form>
    </x-form>

<script>

const imgInput = document.getElementById("img-input");
const pvImg = document.getElementById("pv-img");

imgInput.addEventListener("change", (event) => {
    pvImg.src = imgInput.value;
});

</script>

</x-layout>