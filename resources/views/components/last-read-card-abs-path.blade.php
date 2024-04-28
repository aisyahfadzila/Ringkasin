<a href="#"
    class="flex flex-col items-center bg-book-card rounded-lg shadow md:flex-row  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4">
    <img class="rounded-t-lg md:h-30 md:w-40 md:rounded-none md:rounded-s-lg p-3" src="{{ $source }}" alt="">
    <div class="flex flex-col justify-between leading-normal">
        <h5 class="mb-2 text-[20px] font-semibold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">{{ $author }}</p>
        <br><br>
        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">{{ $peringkas }}</p>
    </div>
</a>