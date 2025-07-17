<!-- Modal content -->
<form class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700" action="{{ route('tasks.store') }}" method="POST">
    @csrf
    
    <!-- Modal header -->
    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 border-gray-200">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Create Task
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
        <x-form.input type="text" label="Task Title" name="title" placeholder="Title" required/>
        
        <x-form.input name="description" type="textarea" label="Description" placeholder="Type here..." rows="5"/>

        <x-form.input
            name="status"
            type="select"
            label="Status"
            :options="['not started' => 'Not Started', 'ongoing' => 'Ongoing', 'complete' => 'Complete']"
        />
    </div>
    <!-- Modal footer -->
    <div class="flex justify-end items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
        <div>
            <x-button type="submit" variant="primary" class="w-full">
                Create
            </x-button>
        </div>
    </div>
</form>