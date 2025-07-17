<nav class="bg-white border-gray-200 px-4 lg:px-24 py-2.5 dark:bg-gray-800">
	<div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
		<a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
			{{-- Light mode logo --}}
			<img src="{{ asset('images/dev_dot_rey_logo_dark.png') }}"
				class="h-10 block dark:hidden"
				alt="Logo Light">

			{{-- Dark mode logo --}}
			<img src="{{ asset('images/dev_dot_rey_logo_light.png') }}"
				class="h-10 hidden dark:block"
				alt="Logo Dark">
				
			{{-- Text after logo --}}
			{{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
		</a>

		<div class="flex items-center lg:order-2">
			<x-button href="{{ route('login') }}" variant="secondary" class="me-2">
				Log In
			</x-button>

			<x-button href="{{ route('register') }}" variant="primary">
				Get Started
			</x-button>

			{{-- Mobile Menu --}}
			{{-- <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
			</button> --}}
		</div>

		{{-- Navbar Items --}}
		{{-- <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
			<ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
				<li>
					<x-navbar-item href="/" :active="request()->is('/')">Home</x-navbar-item>
				</li>
				<li>
					<x-navbar-item href="/about" :active="request()->is('about')">About</x-navbar-item>
				</li>
				<li>
					<x-navbar-item href="/services" :active="request()->is('services')">Services</x-navbar-item>
				</li>
				<li>
					<x-navbar-item href="/contact" :active="request()->is('contact')">Contact</x-navbar-item>
				</li>
			</ul>
		</div> --}}
	</div>
</nav>