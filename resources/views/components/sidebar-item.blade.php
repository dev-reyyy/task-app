@props([
    'route' => null,
    'dropdown' => false,
    'items' => [],
    'icon' => '',
    'label' => ''
])

<li>
    @if(!$dropdown)
        <a href="{{ $route }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <div class="icon">
                {{ $icon }}
            </div>
            <span class="ms-3">
                {{ $label }}
            </span>
        </a>
    @else
        <button type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-{{ Str::slug($label) }}"
            data-collapse-toggle="dropdown-{{ Str::slug($label) }}">
            <div class="icon">
                {{ $icon }}
            </div>
            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                {{ $label }}
            </span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <ul id="dropdown-{{ Str::slug($label) }}" class="hidden py-2 space-y-2">
            @foreach($items as $sub)
                <li>
                    <a href="{{ $sub['route'] ?? '#' }}"
                       class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        {{ $sub['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</li>
