<x-app-layout>
    <x-slot name="title">| Hasil Pencarian</x-slot>
    <!-- Content -->
    <div class="max-w-screen-xl ml-[12px] md:mx-auto my-5">
        <a href="{{ route('eksplor') }} " class="my-2"><span class="text-black">&#60;</span> Kembali ke Eksplor</a>
    </div>
    <div class="flex justify-center my-5">
        <div
            class="flex items-center w-full md:w-3/4 my-4 p-1 text-sm text-gray-900 border-[3px] border-darkblue rounded-xl">
            <form action="{{ route('search') }}" method="POST" class="w-full mx-auto flex justify-between items-center">
                @csrf
                <input type="text"
                    class="w-full p-0 text-base text-black border-transparent focus:border-transparent focus:ring-transparent"
                    name="key" placeholder="Cari judul, penulis, atau peringkas">
                <button type="submit">
                    <a href="#"
                        class="mr-6 hover:bg-blue-800 hover:duration-200 inline-block rounded-full px-1 py-1 bg-darkblue shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </button>
            </form>
        </div>
    </div>

    <article class="max-w-screen-xl mx-auto my-5 px-4">
        <p class="font-semibold md:text-2xl my-4">{{ $heading }}</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5">
            @if (count($summaries) === 0)
                <p>Hasil pencarian tidak ditemukan</p>
            @else
                @foreach ($summaries as $summary)
                    @php
                        if (empty($summary->summary_id)) {
                            $route = route('book.details', ['book_id' => $summary->book_id]);
                        } else {
                            $route = route('summary.details', ['book_id' => $summary->book_id, 'summary_id' => $summary->summary_id]);
                        }

                    @endphp
                    <x-vertical-card kelas='bg-red-400/50' source='{{ $summary->cover }}' href='{{ $route }}'>
                        <x-slot name="title">{{ $summary->title }}</x-slot>
                        <x-slot name="author">{{ $summary->fullname }}</x-slot>
                        <x-slot name="genre">{{ $summary->name }}</x-slot>
                    </x-vertical-card>
                @endforeach
            @endif
        </div>
    </article>
    <!-- Content -->
</x-app-layout>
