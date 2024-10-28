<div class="mt-14">
    <h1 class="mb-3 text-2xl font-bold">{{ $page_meta['title'] }}</h1>
    <div class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column dark:bg-gray-900 md:flex-row md:space-y-0">
        <div></div>
        <label class="sr-only" for="table-search">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input
                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 ps-10 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                id="table-search-users" type="text" wire:model.live="search" placeholder="Search Guest Book">
        </div>
    </div>
    <div class="relative overflow-x-auto shadow sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Nama
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Email
                    </th>
                    <th class="px-6 py-3" scope="col">
                        HP / Telp
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Subject
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Pesan
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guest_books as $guest_book)
                    <tr class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" scope="row">
                            {{ $guest_book->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $guest_book->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $guest_book->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $guest_book->subject }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $guest_book->message }}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="{{ route('guest_books.show', $guest_book->id) }}" wire:navigate>Detail</a>
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
        {{ $guest_books->links() }}
    </div>
</div>
