<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;

class LoginStatus extends Component
{
    public $loggedIn = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->loggedIn = true;
        }
    }

    public function updateLoginStatus()
    {
        $this->loggedIn = true;
    }

    public function render()
    {
        return view('livewire.login-status');
    }
}
