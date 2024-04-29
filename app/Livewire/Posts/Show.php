<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;


class Show extends Component
{
    public $post;
    public $latestPosts;

    public function mount($postId)
    {
        $this->post = Post::find($postId);
        $this->latestPosts = Post::take(3)->latest()->get();
    }

    public function render()
    {
        return view('livewire.posts.show', [
            'latestPosts' => $this->latestPosts,
        ]);
    }
}
