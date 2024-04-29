<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public $latestPosts;

    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        $latestPosts = Post::take(3)->latest()->get();
        return view('home', ['latestPosts' => $latestPosts]);
    }
}
