<div class="container p-4 mx-auto my-10 md:p-0">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">Product</h1>
    <form class="mx-auto sm:w-[500px]">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="search">Cari Produk</label>
        <div class="space-y-4 md:flex md:space-x-4 md:space-y-0">
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="search" type="text" placeholder="Cari Produk" wire:model.live="search" />
            <select
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="categories" wire:model.live="category_id">
                <option value="">Pilih Kategori</option>
                @forelse ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </form>

    <div class="grid grid-cols-1 gap-3 mt-4 sm:grid-cols-3 lg:grid-cols-4">
        @forelse ($products as $product)
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
                <img class="p-8 rounded-t-lg" src="{{ $product->image_url }}" alt="{{ $product->name }}" />
                <div class="px-5 pb-5">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                    <p>{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ Number::currency($product->price, 'IDR', 'id') }}</span>
                        <button
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            wire:click="selectProduct({{ $product->id }})">Detail</button>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>

    @if ($products)
        <div class="mb-4">
            {{ $products->links() }}
        </div>
    @endif

    <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0" id="product-modal" aria-hidden="true" tabindex="-1" wire:ignore>
        <div class="relative w-full max-w-2xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal body -->
                <div class="flex flex-col items-center justify-center p-4 md:p-5">
                    <img class="w-full sm:w-1/2" id="product-image" src="" alt="" />
                    <div class="text-center">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white" id="product-name"></h5>
                        <p id="product-description"></p>
                        <div class="my-3">
                            <span class="rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300" id="product-sku"></span>
                        </div>
                    </div>
                    <span class="text-3xl font-bold text-gray-900 dark:text-white" id="product-price"></span>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('openProductModal', (event) => {
            const {
                product
            } = event

            const productImage = document.getElementById('product-image')
            const productName = document.getElementById('product-name')
            const productDescription = document.getElementById('product-description')
            const productSku = document.getElementById('product-sku')
            const productPrice = document.getElementById('product-price')

            productImage.src = product.image_url
            productName.textContent = product.name
            productDescription.textContent = product.description
            productSku.textContent = product.sku
            productPrice.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(product.price)

            const $targetEl = document.getElementById('product-modal');

            const modal = new Modal($targetEl);

            modal.show()
        })
    </script>
@endscript
