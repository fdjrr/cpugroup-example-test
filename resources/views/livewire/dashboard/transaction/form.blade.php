<div class="mt-14">
    <h1 class="mb-3 text-2xl font-bold">{{ $page_meta['title'] }}</h1>
    @if (Session::has('flash'))
        <x-alert class="mb-4" variant="{{ Session::get('flash')['type'] }}">{{ Session::get('flash')['message'] }}</x-alert>
    @endif
    <div class="rounded border bg-white p-4 shadow">
        <form wire:submit.prevent="{{ $page_meta['form']['action'] }}">
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="transaction_date">Tanggal Transaksi</label>
                <div class="relative" wire:ignore>
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        type="text" wire:model="form.transaction_date" placeholder="Select date" x-init="$el = new Datepicker($el, {
                            format: 'yyyy-mm-dd',
                        })" x-on:change-date.camel="$wire.set('form.transaction_date', $event.target.value)">
                </div>
                @error('form.transaction_date')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="product_id">Produk</label>
                <select
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="product_id" wire:model="form.product_id" wire:change="selectProduct">
                    <option selected>Pilih Produk</option>
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @empty
                    @endforelse
                </select>
                @error('form.product_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="quantity">Jumlah Produk</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="quantity" type="number" wire:model="form.quantity" placeholder="Jumlah Produk" />
                @error('form.quantity')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="price">Harga Produk</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="price" type="number" wire:model="form.price" placeholder="Harga Produk" />
                @error('form.price')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="description">Tipe Transaksi</label>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="flex items-center rounded border border-gray-200 ps-4 dark:border-gray-700">
                        <input class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" id="bordered-radio-1"
                            type="radio" value="In" wire:model="form.transaction_type">
                        <label class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300" for="bordered-radio-1">Pembelian</label>
                    </div>
                    <div class="flex items-center rounded border border-gray-200 ps-4 dark:border-gray-700">
                        <input class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" id="bordered-radio-2"
                            type="radio" value="Out" wire:model="form.transaction_type">
                        <label class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300" for="bordered-radio-2">Penjualan</label>
                    </div>
                </div>
                @error('form.transaction_type')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="description">Catatan</label>
                <textarea
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="message" rows="4" wire:model="form.description" placeholder="Catatan"></textarea>
                @error('form.description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <a class="w-auto rounded-lg border bg-white px-5 py-2.5 text-center text-sm font-medium" href="{{ route('transactions.index') }}" wire:navigate>Cancel</a>
                <button
                    class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
