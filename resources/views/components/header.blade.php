<nav class="bg-transparent">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
            <div class="flex-shrink-0">
            <img class="w-8 h-8" src="{{ asset('images/proyekan_new.svg') }}" alt="Proyekan Logo">
            </div>
            <div class="hidden md:block">
            <div class="flex items-baseline ml-10 space-x-4">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('posts')">Stories</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">Tentang Kami</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Hubungi Sekarang!</x-nav-link>
            </div>
            </div>
        </div>
        <div class="hidden md:block">
            <div class="flex items-center ml-4 md:ml-6">
            <div class="relative ml-3">
                <x-nav-link href="/admin" >Log In <span aria-hidden="true">&rarr;</span></x-nav-link>
            </div>
            </div>
        </div>
        <div class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/posts" :active="request()->is('posts')">Stories</x-nav-link>
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>
        </div>
        <div class="flex -mr-2 md:hidden">
            <!-- Mobile menu button -->

            <div class="relative ml-3">
                <x-nav-link href="/admin" >Log In <span aria-hidden="true">&rarr;</span></x-nav-link>
            </div>
        </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->

</nav>
