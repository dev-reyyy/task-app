<!-- Modal content -->
<div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
    <!-- Modal header -->
    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Task Preview
        </h3>
        <button type="button" data-modal-close class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
    <!-- Modal body -->
    <div class="p-6 space-y-6">
        <div class="data-container">
            <span class="data-label">Task Title</span>
            <p class="data-content">{{ $task->title }}</p>
        </div>
        <div class="data-container">        
            <span class="data-label">Description</span>
            <p class="data-content">{{ $task->description  ?? 'No Description'}}</p>
        </div>
        <div class="data-container">        
            <span class="data-label">Status</span>
            <p class="data-content">{{ Str::title($task->status) }}</p>
        </div>
    </div>
</div>