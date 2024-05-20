<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;


class Show extends Component
{
    public $post;
    public $latestPosts;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->firstOrFail();
        $this->latestPosts = Post::take(3)->latest()->get();
    }

    public function render()
    {
        return view('livewire.posts.show', [
            'latestPosts' => $this->latestPosts,
        ]);
    }
}
