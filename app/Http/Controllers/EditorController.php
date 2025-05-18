<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index () {
        $post = Post::all();
        // @dd($post);

        return view('form.form', compact('post'));
    }

    public function store (Request $request) {
        $data = $request->validate([
            'text_content' => 'required|string'
        ]);

        Post::create($data);

        return redirect()->route('editor.index');
    }
}
