<div class="pt:mt-0 mx-auto flex flex-col items-center justify-center px-6 pt-8 dark:bg-gray-900 md:h-screen">
    <a class="mb-8 flex items-center justify-center text-2xl font-semibold dark:text-white lg:mb-10" href="{{ route('home') }}">
        <img class="mr-4 h-8" src="{{ asset('assets/img/logo-gt-dark.png') }}" alt="FlowBite Logo">
    </a>
    <div class="w-full max-w-xl space-y-8 rounded-lg bg-white p-6 shadow dark:bg-gray-800 sm:p-8">
        <form class="space-y-6" wire:submit.prevent="{{ $page_meta['form']['action'] }}">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="email">Your email</label>
                <input class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                    id="email" type="email" wire:model="form.email" placeholder="name@company.com" />
                @error('form.email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="password">Your password</label>
                <input class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                    id="password" type="password" wire:model="form.password" placeholder="••••••••" />
                @error('form.password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex h-5 items-center">
                        <input
                            class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                            id="remember" type="checkbox" wire:model="form.remember_me" />
                    </div>
                    <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="remember">Remember me</label>
                </div>
            </div>
            <button
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="submit">Login to your account</button>
        </form>
    </div>

</div>
