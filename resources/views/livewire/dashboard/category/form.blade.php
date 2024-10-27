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
                @if ($category->id)
                    <img class="mb-3 w-[300px]" src="{{ asset($category->image_url) }}" alt="{{ $category->image }}">
                @endif
            @endif
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image"><span class="text-red-500 me-1">*</span>Gambar Kategori</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                    id="image" type="file" wire:model="image" placeholder="Gambar Kategori" />
                @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name"><span class="text-red-500 me-1">*</span>Nama Kategori</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="name" type="text" wire:model="form.name" placeholder="Nama Kategori" />
                @error('form.name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="description"><span class="text-red-500 me-1">*</span>Deskripsi Kategori</label>
                <textarea
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="message" rows="4" wire:model="form.description" placeholder="Deskripsi Kategori"></textarea>
                @error('form.description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <a class="w-auto rounded-lg border bg-white px-5 py-2.5 text-center text-sm font-medium" href="{{ route('categories.index') }}" wire:navigate>Cancel</a>
                <button
                    class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
