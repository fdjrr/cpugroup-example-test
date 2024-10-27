<div class="container p-4 mx-auto my-10 lg:p-0">
    <div class="mx-auto flex flex-col items-center justify-center sm:w-[500px]">
        <img class="object-cove4 mb-5 w-[350px] rounded" src="{{ $post->image_url }}" alt="{{ $post->title }}">
        <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
        <p class="mb-5 font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>
        <a class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            href="{{ route('home.posts.index') }}" wire:navigate>Kembali</a>
    </div>
</div>
