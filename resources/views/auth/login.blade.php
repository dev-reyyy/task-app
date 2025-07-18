@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
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
                        Sign in to your account
                    </h1>
                    
                    <form class="space-y-4 md:space-y-6" action="{{ route('login.authenticate') }}" method="post">
                        @csrf
                                                
                        <x-form.input type="email" label="Your email" name="email" placeholder="name@company.com" required/>

                        <x-form.input type="password" label="Password" name="password" placeholder="••••••••" required/>

                        {{-- Remember Me & Forgot Password--}}
                        {{-- <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>

                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div> --}}
                        
                        <x-button type="submit" variant="primary" class="w-full">
                            Log in
                        </x-button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection