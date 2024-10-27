<div class="container p-4 mx-auto my-10 lg:p-0">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">Cabang & Depo</h1>
    <form class="mx-auto sm:max-w-sm">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="regions">Wilayah</label>
        <select
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            id="regions" wire:model.live="region">
            <option value="">Pilih Wilayah</option>
            @forelse ($regions as $region)
                <option value="{{ $region->name }}">{{ $region->name }}</option>
            @empty
            @endforelse
        </select>
    </form>

    <div class="grid gap-3 mt-4 sm:grid-cols-4">
        @forelse ($this->branches as $branch)
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
                <a href="{{ $branch->gmaps_link }}" target="_blank">
                    <img class="rounded-t-lg" src="{{ $branch->image_url }}" alt="{{ $branch->name }}" />
                </a>
                <div class="p-5">
                    <a href="{{ $branch->gmaps_link }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $branch->name }}</h5>
                    </a>
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:divide-gray-700 dark:text-white">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Telepon</dt>
                            <dd class="text-lg font-semibold">{{ $branch->phone }}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Fax</dt>
                            <dd class="text-lg font-semibold">{{ $branch->fax }}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Email</dt>
                            <dd class="text-lg font-semibold">{{ $branch->email }}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 dark:text-gray-400 md:text-lg">Alamat</dt>
                            <dd class="text-lg font-semibold">{{ $branch->address }}</dd>
                        </div>
                    </dl>
                    <div class="mt-4 text-center">
                        <a class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button" href="{{ $branch->gmaps_link }}" target="_blank">
                            <svg class="w-5 h-5 text-white me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Google Maps
                        </a>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>

</div>
