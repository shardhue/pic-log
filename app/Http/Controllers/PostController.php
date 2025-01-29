<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function CreatePost (Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['image'] = strip_tags($incomingFields['image']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }

    public function EditPost (Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            return view('edit-post', ['post' => $post]);
        }

        return redirect('/');
    }

    public function SavePost (Post $post, Request $request) {
        if (auth()->user()->id === $post['user_id']) {
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image' => 'required'
            ]);
    
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);
            $incomingFields['image'] = strip_tags($incomingFields['image']);
    
            $post->update($incomingFields);
        }

        return redirect('/');
    }

    public function DeletePost (Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }

        return redirect('/');
    }
}
