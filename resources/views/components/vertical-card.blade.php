<a href="{{ $href ?? '' }}"
    class="bookCard{{ $unique ?? '' }} h-fit hover:bg-gray-100 bg-book-card border my-2 border-gray-200 rounded-lg items-center justify-center shadow">
    <div class="h-fit rounded-t-lg {{ $kelas }}">
        <img class="mx-auto rounded-xl h-28 md:h-32 md:rounded-xl p-2"
            src="{{ asset('storage') . '/' . $source }}" alt="Cover Buku">
    </div>
    <div class="flex-col flex h-[120px] p-3 text-center">
        <h5 class="flex flex-col justify-between text-lg md:text-xl font-medium tracking-tight text-gray-900 break-all">
            @php
            if(strlen($title) > 10) {
            $title = substr($title, 0, 10) . '...';
            }
            @endphp
            {{ $title }}
        </h5>
        <p class="line-clamp-1 font-regular text-gray-700">{{ $author }}</p>
        <p class="font-regular mt-5 text-gray-700 break-all">{{ $genre }}</p>
    </div>
</a>
