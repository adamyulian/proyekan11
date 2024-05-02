<div>
    <div>
        @if($loggedIn)
            <x-nav-link href="/admin">Dashboard <span aria-hidden="true">&rarr;</span></x-nav-link>
        @else
            <x-nav-link href="/admin">Log In <span aria-hidden="true">&rarr;</span></x-nav-link>
        @endif
    </div>
</div>
