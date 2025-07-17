@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                {{-- Light mode logo --}}
                <img src="{{ asset('images/dev_dot_rey_logo_dark.png') }}"
                    class="h-10 block dark:hidden"
                    alt="Logo Light">

                {{-- Dark mode logo --}}
                <img src="{{ asset('images/dev_dot_rey_logo_light.png') }}"
                    class="h-10 hidden dark:block"
                    alt="Logo Dark">
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register.store') }}" method="POST">
                        @csrf

                        <x-form.input type="text" label="Name" name="name" placeholder="Juan Dela Cruz" required/>
                        
                        <x-form.input type="text" label="Username" name="username" placeholder="enter your username" required/>
                        
                        <x-form.input type="email" label="You email" name="email" placeholder="name@company.com" required/>

                        <x-form.input type="password" label="Password" name="password" placeholder="••••••••" required/>
                        
                        <x-form.input type="password" label="Confirm password" name="password_confirmation" placeholder="••••••••" required/>
                        
                        <x-button type="submit" variant="primary" class="w-full">
                            Create an account
                        </x-button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection