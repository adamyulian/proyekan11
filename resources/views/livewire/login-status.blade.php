<div>
    <div>
        @if($loggedIn)
            <x-nav-link href="/admin">Dasbor <span aria-hidden="true">&rarr;</span></x-nav-link>
        @else
            <x-nav-link href="/admin">Masuk Disini <span aria-hidden="true">&rarr;</span></x-nav-link>
        @endif
    </div>
</div>
