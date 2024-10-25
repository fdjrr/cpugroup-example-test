@use(Carbon\Carbon)

<footer class="bg-white dark:bg-gray-900">
    <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="https://flowbite.com/">
                    <img class="h-8 me-3" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="FlowBite Logo" />
                </a>
                <p class="w-1/2 text-sm">Distributor dan Supplier Sparepart / Suku Cadang Mobil dan Sepeda Motor. Distributor Resmi Aki GS Astra, Apsira Part, Denso, Accelera, Kayaba, Incoe, Evalube</p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-6">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Links</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="https://flowbite.com/">Cabang & Depo</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://tailwindcss.com/">About Us</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://tailwindcss.com/">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://tailwindcss.com/">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Product</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="https://github.com/themesberg/flowbite">Aki</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://discord.gg/4eeurUVvTy">Ban</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://discord.gg/4eeurUVvTy">Sparepart</a>
                        </li>
                        <li class="mb-4">
                            <a class="hover:underline" href="https://discord.gg/4eeurUVvTy">Oli</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Social Media</h2>
                    <ul class="font-medium text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:underline" href="#">Facebook</a>
                        </li>
                        <li>
                            <a class="hover:underline" href="#">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© {{ Carbon::now()->format('Y') }} <a class="hover:underline" href="https://flowbite.com/">Capella Patria Utama</a>. Distributor Resmi Sparepart Mobil dan
                Sepeda Motor
            </span>
        </div>
    </div>
</footer>
