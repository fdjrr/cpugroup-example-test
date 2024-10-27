<div class="container p-4 mx-auto my-10 lg:p-0">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 dark:text-white">Contact Us</h1>
    <h1 class="mb-3 text-2xl font-semibold text-center">Tinggalkan Pesan Anda</h1>
    @if (Session::has('flash'))
        <x-alert class="mx-auto mb-3 sm:w-[750px]" variant="{{ Session::get('flash')['type'] }}">{{ Session::get('flash')['message'] }}</x-alert>
    @endif
    <div class="mx-auto rounded border bg-white p-4 shadow sm:w-[750px]">
        <form wire:submit.prevent="{{ $page_meta['form']['action'] }}">
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Nama</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="name" type="text" wire:model="form.name" placeholder="Nama" />
                @error('form.name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="email" type="email" wire:model="form.email" placeholder="Email" />
                @error('form.email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="phone">HP / Telp</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="phone" type="text" wire:model="form.phone" placeholder="HP / Telp" />
                @error('form.phone')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="subject">Subject</label>
                <input
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="subject" type="text" wire:model="form.subject" placeholder="Subject" />
                @error('form.subject')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="message">Pesan</label>
                <textarea
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="message" rows="4" wire:model="form.message" placeholder="Pesan"></textarea>
                @error('form.message')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <button
                    class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
