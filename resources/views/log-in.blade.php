<x-layout>

    <x-form>
        <x-slot:title>Log In</x-slot:title>
        <form class="w-2/6" action="/login" method="POST">
            @csrf
            <input name="loginusername" type="text" placeholder="Username">
            <input name="loginpassword" type="password" placeholder="Password">
            <button class="bg-sky-500 text-white shadow-md">Log In</button>
        </form>
        <p>Don't have an account? <a href="/signup" class="text-sky-500 hover:underline">Sign up!</a><p>
    </x-form>

</x-layout>