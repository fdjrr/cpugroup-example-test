<nav class="relative z-50 bg-white border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a class="flex items-center space-x-3 rtl:space-x-reverse" href="{{ route('home') }}" wire:navigate>
            <img class="h-8" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="Flowbite Logo" />
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
                    <a class="block px-3 py-2 text-white bg-blue-700 rounded dark:bg-blue-600 md:bg-transparent md:p-0 md:text-blue-700 md:dark:bg-transparent md:dark:text-blue-500" href="{{ route('home') }}" aria-current="page"
                        wire:navigate>Home</a>
                </li>
                <li>
                    <a class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        href="{{ route('about') }}" aria-current="page" wire:navigate>About Us</a>
                </li>
                <li>
                    <a class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        href="{{ route('home.posts.index') }}" aria-current="page" wire:navigate>News</a>
                </li>
                <li>
                    <button
                        class="flex items-center justify-between w-full px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:text-white md:w-auto md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar">Product <svg class="ms-2.5 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div class="z-10 hidden font-normal bg-white rounded-lg shadow w-44 dark:bg-gray-700" id="dropdownNavbar">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ route('products', [
                                        'category_id' => 1,
                                    ]) }}" wire:navigate>Aki</a>
                            </li>
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ route('products', [
                                        'category_id' => 2,
                                    ]) }}" wire:navigate>Ban</a>
                            </li>
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ route('products', [
                                        'category_id' => 3,
                                    ]) }}" wire:navigate>Sparepart</a>
                            </li>
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    href="{{ route('products', [
                                        'category_id' => 4,
                                    ]) }}" wire:navigate>Oil</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        href="{{ route('branches') }}" wire:navigate>Cabang & Depo</a>
                </li>
                <li>
                    <a class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        href="{{ route('contact') }}" wire:navigate>Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
