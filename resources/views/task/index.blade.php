@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="flex justify-between mb-6">
        <h1 class="page-title">Manage Tasks</h1>
        <x-button href="#" variant="primary"
            data-modal-popup="true"
            data-link="{{ route('tasks.create') }}"
            data-modal-size="modal-md">
				Create Task
        </x-button>
    </div>

    <div class="w-full">    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Task Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $task->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ Str::limit($task->description, 60) ?? 'No description' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::title($task->status) }}
                            </td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    data-modal-popup="true"
                                    data-link="{{ route('tasks.edit', $task) }}"
                                    data-modal-size="modal-md">
                                    Edit
                                </a>
                                
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    data-modal-popup="true"
                                    data-link="{{ route('tasks.show', $task) }}"
                                    data-modal-size="modal-md">
                                    Show
                                </a>
                                
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>

                    @empty
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                            <th colspan="4" scope="row" class="px-6 py-4 text-center font-medium text-gray-400 whitespace-nowrap dark:text-gray-400">
                                No Tasks
                            </th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection