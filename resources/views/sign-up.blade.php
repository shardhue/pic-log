<x-layout>

    <x-form>
        <x-slot:title>Sign Up</x-slot:title>
        <form class="w-2/6" action="/register" method="POST">
            @csrf
            <input name="email" type="text" placeholder="Email">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Password">
            <button class="bg-sky-500 text-white shadow-md">Register</button>
        </form>
        <p>Have an account? <a href="/login" class="text-sky-500 hover:underline">Log In!</a><p>
    </x-form>

</x-layout>