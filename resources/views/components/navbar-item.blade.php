@props([
    'href' => '#',
    'active' => false,
])

<a 
    href="{{ $href }}" 
    {{ $attributes->class([
        'nav-item',
        'nav-item-active' => $active,
    ]) }}
>
    {{ $slot }}
</a>
