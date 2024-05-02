<!-- x-nav-link.blade.php -->
@props(['active' => false, 'icon' => null])

@php
    $classes = ($active ? 'text-pink-900 ' : 'text-teal-600 hover:text-pink-900 ') . 'flex items-center space-x-2 rounded-md px-3 py-2 text-sm font-medium';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} aria-current="{{ $active ? 'page' : 'false' }}">
    @if($icon)
        @svg($icon, 'h-5 w-5') <!-- Adjust the class for the SVG icon size as needed -->
    @endif
    <span>{{ $slot }}</span>
</a>
