<div class="mt-14">
    <h1 class="mb-3 text-2xl font-bold">{{ $page_meta['title'] }}</h1>
    @if (Session::has('flash'))
        <x-alert class="mb-3" variant="{{ Session::get('flash')['type'] }}">{{ Session::get('flash')['message'] }}</x-alert>
    @endif
    <div class="p-4 bg-white border rounded shadow">
        <form wire:submit.prevent="{{ $page_meta['form']['action'] }}">
            @if ($image && $isUploaded)
                <img class="mb-3 w-[300px]" src="{{ $image->temporaryUrl() }}" alt="">
            @else
                @if ($product->id)
                    <img class="mb-3 w-[300px]" src="{{ asset($product->image_url) }}" alt="{{ $product->image }}">
                @endif
            @endif
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image"><span class="text-red-500 me-1">*</span>Gambar Produk</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                    id="image" type="file" wire:model="image" placeholder="Gambar Produk" />
                @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name"><span class="text-red-500 me-1">*</span>Nama Produk</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="name" type="text" wire:model="form.name" placeholder="Nama Produk" />
                @error('form.name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="category_id"><span class="text-red-500 me-1">*</span>Kategori</label>
                <select
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="category_id" wire:model="form.category_id">
                    <option selected>Pilih Kategori</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('form.category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="supplier_id"><span class="text-red-500 me-1">*</span>Supplier</label>
                <select
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="supplier_id" wire:model="form.supplier_id">
                    <option selected>Pilih Supplier</option>
                    @forelse ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('form.supplier_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="sku"><span class="text-red-500 me-1">*</span>SKU Produk</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="sku" type="text" wire:model="form.sku" placeholder="SKU Produk" />
                @error('form.sku')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            @if ($product->id)
                <div class="mb-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="quantity">Stok</label>
                    <input
                        class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        id="quantity" type="text" wire:model="form.quantity" placeholder="Stok" disabled />
                </div>
            @endif
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="price"><span class="text-red-500 me-1">*</span>Harga Produk</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="price" type="number" wire:model="form.price" placeholder="Harga Produk" />
                @error('form.price')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="description"><span class="text-red-500 me-1">*</span>Deskripsi Produk</label>
                <textarea
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="message" rows="4" wire:model="form.description" placeholder="Deskripsi Produk"></textarea>
                @error('form.description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <a class="w-auto rounded-lg border bg-white px-5 py-2.5 text-center text-sm font-medium" href="{{ route('products.index') }}" wire:navigate>Cancel</a>
                <button
                    class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
