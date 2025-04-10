<div>
    <div>
        @if($loggedIn)
            <x-nav-link href="/admin" wire:navigate>Dashboard <span aria-hidden="true">&rarr;</span></x-nav-link>
        @else
            <x-nav-link href="/admin" wire:navigate>Log In <span aria-hidden="true">&rarr;</span></x-nav-link>
        @endif
    </div>
</div>
