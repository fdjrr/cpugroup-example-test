<div class="relative w-full" id="default-carousel" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{ asset('assets/img/slider1.webp') }}" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{ asset('assets/img/slider2.webp') }}" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2" src="{{ asset('assets/img/slider3.webp') }}" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
        <button class="w-3 h-3 rounded-full" data-carousel-slide-to="0" type="button" aria-current="true" aria-label="Slide 1"></button>
        <button class="w-3 h-3 rounded-full" data-carousel-slide-to="1" type="button" aria-current="false" aria-label="Slide 2"></button>
        <button class="w-3 h-3 rounded-full" data-carousel-slide-to="2" type="button" aria-current="false" aria-label="Slide 3"></button>
    </div>
    <!-- Slider controls -->
    <button class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group start-0 focus:outline-none" data-carousel-prev type="button">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="w-4 h-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group end-0 focus:outline-none" data-carousel-next type="button">
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="w-4 h-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
