@use(App\Models\Category)

@php
    $categories = Category::query()->orderBy('name')->get();
@endphp

<nav class="relative z-50 bg-white border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a class="flex items-center space-x-3 rtl:space-x-reverse" href="{{ route('home') }}" wire:navigate>
            <img class="h-8" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="{{ config('app.name') }}" />
        </a>
        <button
            class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
            data-collapse-toggle="navbar-dropdown" type="button" aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 md:dark:bg-gray-900">
                <li>
                    <x-nav-link href="{{ route('home') }}" :active="Route::is('home')" wire:navigate>Home</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('about') }}" :active="Route::is('about')" wire:navigate>About Us</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('home.posts.index') }}" :active="Route::is('home.posts.*')" wire:navigate>News & Events</x-nav-link>
                </li>
                <li>
                    <x-dropdown-toggle id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" :active="Route::is('home.products.*')">Product</x-dropdown-toggle>
                    <!-- Dropdown menu -->
                    <div class="z-10 hidden font-normal bg-white rounded-lg shadow w-44 dark:bg-gray-700" id="dropdownNavbar">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            @forelse ($categories as $category)
                                <li>
                                    <x-dropdown-link href="{{ route('home.products.index', ['category_id' => $category->id]) }}" wire:navigate>{{ $category->name }}</x-dropdown-link>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </li>
                <li>
                    <x-nav-link href="{{ route('home.branches.index') }}" :active="Route::is('home.branches.*')" wire:navigate>Cabang & Depo</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{ route('contact') }}" :active="Route::is('contact')" wire:navigate>Contact Us</x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
