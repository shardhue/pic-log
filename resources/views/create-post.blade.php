<x-layout>

    <x-form>
        <x-slot:title>Create Post</x-slot:title>
        <form class="w-3/6" action="/createpost" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title">
            <textarea name="body" rows="5" placeholder="Write Your Post..."></textarea>
            <input id="img-input" type="text" name="image" placeholder="Image URL">
            <button class="bg-sky-500 text-white shadow-md">Post</button>
        </form>
        <p>Image Preview:</p>
        <img id="pv-img" class="w-2/6 object-cover -mt-5 rounded-xl" src="" onerror="this.src='/no_image.png'">
    </x-form>

<script>

const imgInput = document.getElementById("img-input");
const pvImg = document.getElementById("pv-img");

imgInput.addEventListener("change", (event) => {
    pvImg.src = imgInput.value;
});

</script>

</x-layout>