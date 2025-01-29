<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function Register (Request $request) {
        $incomingFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'password' => ['required', 'min:8', 'max:50']
        ]);
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function LogIn (Request $request) {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function LogOut () {
        auth()->logout();
        return redirect('/');
    }

    public function ViewBlog() {
        $posts = [];
        if (auth()->check()) {
            $posts = auth()->user()->UsersPosts()->latest()->get();
        }
        return view('my-blog', ['posts' => $posts]);
    }
}
