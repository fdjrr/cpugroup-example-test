<div class="my-10">
    <div class="my-4">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">News & Events</h1>
        <div class="flex flex-wrap justify-center gap-4">
            <x-card />
            <x-card />
            <x-card />
        </div>
    </div>
    <div class="my-4">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">Produk Kami</h1>
        <div class="grid grid-cols-4 gap-2 px-10">
            <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/aki.webp') }}" alt="">
            <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/ban.webp') }}" alt="">
            <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/oil.webp') }}" alt="">
            <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/sparepart.webp') }}" alt="">
        </div>
    </div>
    <div class="my-4">
        <div class="text-center">
            <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Belanja Sekarang</h5>
            <p class="w-1/2 mx-auto font-normal text-center text-gray-700 dark:text-gray-400">
                Temukan Promo Menarik Di Marketplace Kesayangan Kamu. Bisa Pilih Pengiriman Instant, Regular dan Self Pickup Kamu juga bisa pilih Pickup and Install untuk
                pemasangan
                langsung
                di Toko
            </p>
            <div class="grid grid-cols-3 gap-2 px-10 mt-4">
                <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/capella-lazada.jpg') }}" alt="">
                <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/capella-tokopedia.jpg') }}" alt="">
                <img class="w-full border rounded hover:shadow" src="{{ asset('assets/img/capella-blibli.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="my-4">
        <div class="text-center">
            <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Our Product Brands</h5>
            <p class="w-1/2 mx-auto font-normal text-center text-gray-700 dark:text-gray-400">
                Distributor Sparepart Mobil dan Sepeda Motor Resmi Untuk Produk dari Brand Autopart Terbaik
            </p>
            <div class="flex flex-wrap items-center justify-center gap-2 px-10 mt-4">
                <img class="w-1/2" src="{{ asset('assets/img/partner.webp') }}" alt="">
                <img class="w-1/2" src="{{ asset('assets/img/partner1.webp') }}" alt="">
            </div>
        </div>
    </div>
</div>
