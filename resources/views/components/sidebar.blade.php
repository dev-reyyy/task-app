<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">     
        {{-- Logo --}}
        <a href="#" class="flex justify-center items-center ps-2.5 mb-5">
            {{-- Light mode logo --}}
            <img src="{{ asset('images/dev_dot_rey_logo_dark.png') }}"
                class="h-9 me-3 sm:h-10 block dark:hidden"
                alt="Logo Light">

            {{-- Dark mode logo --}}
            <img src="{{ asset('images/dev_dot_rey_logo_light.png') }}"
                class="h-9 me-3 sm:h-10 hidden dark:block"
                alt="Logo Dark">
        </a>

        <ul class="space-y-2 font-medium">
            
            <li>
                <x-sidebar-item route="{{ route('dashboard.main') }}">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                    </x-slot:icon>

                    <x-slot:label>
                        Dashboard
                    </x-slot:label>
                </x-sidebar-item>
            </li>
            
            <li>
                <x-sidebar-item route="{{ route('tasks.index') }}">
                    <x-slot:icon>
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg>
                    </x-slot:icon>

                    <x-slot:label>
                        Tasks
                    </x-slot:label>
                </x-sidebar-item>
            </li>
        </ul>
    </div>
</aside>