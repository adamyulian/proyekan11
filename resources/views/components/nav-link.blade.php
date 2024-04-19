@props(['active' => false])
<a class="{{ $active ? 'text-pink-900' : 'text-teal-600 hover:text-pink-900'}} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false'}}" {{ $attributes }}>
    {{ $slot }}</a>
