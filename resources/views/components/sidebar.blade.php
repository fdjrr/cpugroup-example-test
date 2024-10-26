<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden"
                    data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" type="button" aria-controls="logo-sidebar">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a class="flex ms-2 md:me-24" href="{{ route('dashboard') }}" wire:navigate>
                    <img class="h-8 me-3" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="FlowBite Logo" />
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" data-dropdown-toggle="dropdown-user" type="button" aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:divide-gray-600 dark:bg-gray-700" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" href="#" role="menuitem">Profile</a>
                            </li>
                            <li>
                                @livewire('logout')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 dark:border-gray-700 dark:bg-gray-800 sm:translate-x-0" id="logo-sidebar" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('dashboard') }}" wire:navigate>
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('transactions.index') }}" wire:navigate>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="ms-3">Transaksi</span>
                </a>
            </li>
            <li>
                <button class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" data-collapse-toggle="dropdown-example" type="button"
                    aria-controls="dropdown-example">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 21">
                        <path
                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="flex-1 text-left ms-3 whitespace-nowrap rtl:text-right">Master Data</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul class="hidden py-2 space-y-2" id="dropdown-example">
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('categories.index') }}"
                            wire:navigate>Category</a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('suppliers.index') }}"
                            wire:navigate>Supplier</a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('products.index') }}"
                            wire:navigate>Product</a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('posts.index') }}" wire:navigate>Post</a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('branches.index') }}"
                            wire:navigate>Branch</a>
                    </li>
                    <li>
                        <a class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" href="{{ route('guest_books.index') }}"
                            wire:navigate>Guest
                            Book</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
