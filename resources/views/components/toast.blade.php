@props([
    'type' => 'success',
    'message' => '',
    'id' => null,
])

@php
    $types = [
        'success' => [
            'icon' => 'M13.707 8.707l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 011.414 1.414z',
            'textColor' => 'text-green-100',
            'bgIcon' => 'bg-green-800 dark:bg-green-800',
            'iconText' => 'dark:text-green-200',
        ],
        'error' => [
            'icon' => 'M13.707 12.207a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 10 6.293 7.707a1 1 0 111.414-1.414L10 8.586l2.293-2.293a1 1 0 011.414 1.414L11.414 10l2.293 2.293z',
            'textColor' => 'text-red-100',
            'bgIcon' => 'bg-red-800 dark:bg-red-800',
            'iconText' => 'dark:text-red-200',
        ],
        'warning' => [
            'icon' => 'M11 11a1 1 0 01-2 0V6a1 1 0 012 0v5zm-1 4a1 1 0 100-2 1 1 0 000 2z',
            'textColor' => 'text-orange-100',
            'bgIcon' => 'bg-orange-700 dark:bg-orange-700',
            'iconText' => 'dark:text-orange-200',
        ],
    ];
    $config = $types[$type];
    $toastId = $id ?? "toast-$type";
@endphp

<div id="{{ $toastId }}" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 {{ $config['textColor'] }} {{ $config['bgIcon'] }} rounded-lg {{ $config['iconText'] }}">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="{{ $config['icon'] }}"/>
        </svg>
        <span class="sr-only">{{ ucfirst($type) }} icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ $message }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#{{ $toastId }}" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
        </svg>
    </button>
</div>
