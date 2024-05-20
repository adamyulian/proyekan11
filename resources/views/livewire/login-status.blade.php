<div>
    <div>
        @if($loggedIn)
            <x-nav-link href="/admin" wire:navigate>Dasbor <span aria-hidden="true">&rarr;</span></x-nav-link>
        @else
            <x-nav-link href="/admin" wire:navigate>Masuk Disini <span aria-hidden="true">&rarr;</span></x-nav-link>
        @endif
    </div>
</div>
