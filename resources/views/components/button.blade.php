@props(['type' => 'button', 'variant' => 'primary', 'href' => null])

@if ($href)
    {{-- Button Link --}}
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "btn btn-{$variant}"]) }}>
        {{ $slot }}
    </a>
@else
    {{-- Button --}}
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "btn btn-{$variant}"]) }}>
        {{ $slot }}
    </button>
@endif