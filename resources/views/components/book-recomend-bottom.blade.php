<a href="{{ route('book.details', ['book_id' => $bookId]) }}"
    class=" hover:bg-gray-100 m-2 rounded-lg items-center justify-center w-1/4 flex-shrink-0">
    <div class="h-fit rounded-t-lg">
        <img class="mx-auto rounded-xl h-28 md:rounded-none md:rounded-s-lg p-2" src="{{ asset('storage') . '/' . $source }}"
            alt="Cover Buku">
    </div>
    <div class="flex-col flex h-26 p-3 text-center">
        <h5 class="flex flex-col justify-between text-lg md:text-xl font-medium tracking-tight text-gray-900 break-words whitespace-normal">
            {{ $title }}
        </h5>
    </div>
</a>
