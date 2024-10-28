@use(Carbon\Carbon)
@use(App\Models\Category)

@php
    $categories = Category::query()->orderBy('name')->get();
@endphp

<footer class="bg-white dark:bg-gray-900">
    <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="{{ route('home') }}" wire:navigate>
                    <img class="h-8 me-3" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="{{ config('app.name') }}" />
                </a>
                <p class="text-sm sm:w-1/2">Distributor dan Supplier Sparepart / Suku Cadang Mobil dan Sepeda Motor. Distributor Resmi Aki GS Astra, Apsira Part, Denso, Accelera, Kayaba, Incoe, Evalube</p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-6">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Links</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('home.branches.index') }}" wire:navigate>Cabang & Depo</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('about') }}" wire:navigate>About Us</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="{{ route('contact') }}" wire:navigate>Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Product</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        @forelse ($categories as $category)
                            <li class="mb-4">
                                <a class="hover:underline" href="{{ route('home.products.index', ['category_id' => $category->id]) }}" wire:navigate>{{ $category->name }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Social Media</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="javascript:void(0)">Facebook</a>
                        </li>
                        <li>
                            <a class="hover:underline" href="javascript:void(0)">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© {{ Carbon::now()->format('Y') }} <a class="hover:underline" href="{{ route('home') }}" wire:navigate>Capella Patria Utama</a>. Distributor Resmi Sparepart
                Mobil dan
                Sepeda Motor
            </span>
        </div>
    </div>
</footer>
