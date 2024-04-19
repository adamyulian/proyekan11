<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::take(3)->latest()->get();
        return view('home', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }
}
