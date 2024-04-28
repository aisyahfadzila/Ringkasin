<div class="flex flex-col bg-book-card rounded-lg shadow lg:flex-row w-full lg:mr-10">
    <div class="h-fit rounded-t-lg lg:rounded-none lg:rounded-l-lg {{ $kelas }}">
        <img class="mx-auto rounded-xl h-32 md:h-56 p-3 lg:p-8" src="{{ asset('storage'). '/' . $source  }}"
            alt="{{ $alt }}">
    </div>
    <div class="flex-col flex h-26 p-3 lg:py-5 text-center lg:text-left">
        <h5 class="flex flex-col justify-between text-lg md:text-xl lg:text-3xl font-semibold tracking-tight text-gray-900 break-all">
            {{ $title }}
        </h5>
        <p class="line-clamp-1 mb-auto lg:text-lg font-regular text-gray-700">{{ $author }}</p>
        <p class="font-regular text-gray-700 break-all">Terbit : {{ $pub_year }}</p>
        <p class="font-regular text-gray-700 break-all">ISBN : {{ $isbn }}</p>
        <p class="font-regular text-gray-700 break-all"><b>Kategori</b> : {{ $genre }}</p>
    </div>
</div>
