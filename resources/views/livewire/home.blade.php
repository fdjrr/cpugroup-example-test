<div class="my-10">
    <div class="my-4">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">News & Events</h1>
        <div class="flex flex-wrap justify-center gap-4">
            @forelse ($posts as $post)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ route('home.posts.show', $post->slug) }}" wire:navigate>
                        <img class="rounded-t-lg" src="{{ $post->image_url }}" alt="{{ $post->title }}" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('home.posts.show', $post->slug) }}" wire:navigate>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($post->content, 100) }}</p>
                        <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            href="{{ route('home.posts.show', $post->slug) }}" wire:navigate>
                            Read more
                            <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="my-4">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">Produk Kami</h1>
        <div class="grid grid-cols-4 gap-2 px-10">
            @forelse ($categories as $category)
                <a href="{{ route('home.products.index', ['category_id' => $category->id]) }}">
                    <img class="w-full border rounded hover:shadow" src="{{ $category->image_url }}" alt="{{ $category->name }}">
                </a>
            @empty
            @endforelse
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
