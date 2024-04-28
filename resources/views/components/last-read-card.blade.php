<a href="{{ route('summary.details', ['book_id' => $bookId, 'summary_id' => $sumId]) }}" class="historyCard flex flex-col bg-book-card rounded-lg shadow lg:flex-row hover:bg-gray-100 p-2 md:p-5">
    <img class="rounded-xl w-32 h-36 md:w-44 md:h-48 md:rounded-xl p-2 md:p-2" src="{{ asset('storage'). '/' . $source  }}" alt={{ $alt }}>
    <div class="flex flex-col justify-between md:break-words">
        <h5 class="mb-2 text-base md:mt-2 md:text-[20px] font-semibold tracking-tight text-gray-900">{{ $title }}</h5>
        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">{{ $author }}</p>
        <p class="mt-auto mb-3 font-regular text-gray-700 ">{{ $peringkas }}</p>
    </div>
</a>
