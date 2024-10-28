<div class="mt-14">
    <h1 class="mb-3 text-2xl font-bold">{{ $page_meta['title'] }}</h1>
    @if (Session::has('flash'))
        <x-alert class="mb-3" variant="{{ Session::get('flash')['type'] }}">{{ Session::get('flash')['message'] }}</x-alert>
    @endif
    <div class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column dark:bg-gray-900 md:flex-row md:space-y-0">
        <div>
            <a class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('transactions.create') }}" wire:navigate>Create Transaction</a>
        </div>
        <label class="sr-only" for="table-search">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 ps-10 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="table-search-users" type="text" wire:model.live="search" placeholder="Search Transaction">
        </div>
    </div>
    <div class="relative overflow-x-auto shadow sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Tgl Transaksi
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Produk
                    </th>
                    <th class="px-6 py-3" scope="col">
                        SKU Produk
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Jumlah
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Harga
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Potongan
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Total
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Tipe Transaksi
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">
                            {{ $transaction->transaction_date }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $transaction->product?->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->product?->sku }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->total_discount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $transaction->total - $transaction->total_discount }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($transaction->transaction_type == 'In')
                                <span class="me-2 rounded bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 dark:bg-green-900 dark:text-green-300">{{ $transaction->transaction_type }}</span>
                            @else
                                <span class="me-2 rounded bg-red-100 px-2.5 py-0.5 text-sm font-medium text-red-800 dark:bg-red-900 dark:text-red-300">{{ $transaction->transaction_type }}</span>
                            @endif
                        </td>
                        <td class="flex items-center px-6 py-4">
                            @if ($transaction->settled_by)
                                <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('transactions.edit', $transaction->id) }}" wire:navigate>Detail</a>
                            @else
                                <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('transactions.edit', $transaction->id) }}" wire:navigate>Edit</a>
                                <a class="font-medium text-red-600 ms-3 hover:underline dark:text-red-500" href="javascript:void(0)" wire:click="delete({{ $transaction->id }})">Remove</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <td class="w-full py-4 text-sm text-center text-gray-400 dark:text-gray-500" colspan="100%">Data not found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $transactions->links() }}
    </div>

    <div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0" id="delete-modal" tabindex="-1" wire:ignore>
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button
                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    id="close-modal" type="button" aria-label="Close modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center md:p-5">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this transaction?</h3>
                    <button class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800"
                        type="button" wire:click="confirmDelete">
                        Yes, I'm sure
                    </button>
                    <button
                        class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                        id="close-modal" type="button">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        const $targetEl = document.getElementById('delete-modal');

        let modal
        if ($targetEl) {
            modal = new Modal($targetEl);
        }

        $wire.on('openDeleteModal', (event) => {
            modal.show()
        })

        $wire.on('closeDeleteModal', (event) => {
            modal.hide()
        })

        const btnCloseModal = document.querySelectorAll('#close-modal')
        btnCloseModal.forEach(el => {
            el.addEventListener('click', () => {
                modal.hide()
            })
        })
    </script>
@endscript
