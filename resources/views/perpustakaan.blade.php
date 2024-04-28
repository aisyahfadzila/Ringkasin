<x-app-layout>
    <x-slot name="title">| Perpustakaan</x-slot>

    <!-- Section Bacaan -->
    <section class="max-w-screen-xl mx-auto px-2 mb-10">
        <div class="flex justify-between md:mb-3 md:pt-3">
            <p class="font-medium sm:text-2xl">Bacaanmu</p>
            <button
                class="hidden sm:block bg-darkblue rounded-full text-white font-bold md:text-sm hover:opacity-80 px-2 py-1 md:px-4">
                <a href="{{ route('eksplor') }}">Tambah</a>
            </button>
            <a href="{{ route('eksplor') }}" class="sm:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 hover:rounded-full hover:border-slate-200 hover:border-2">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        @if (!empty($sumsRead))
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-8 xl:gap-x-10 gap-y-4 my-2">
                @foreach ($sumsRead as $sumRead)
                    @php
                        $route = route('summary.details', ['book_id' => $sumRead->book_id, 'summary_id' => $sumRead->summary_id]);
                    @endphp
                    <x-vertical-card unique='1' href='{{ $route }}' kelas='bg-red-50'
                        source='{{ $sumRead->cover }}'>
                        <x-slot name="title">{{ $sumRead->title }}</x-slot>
                        <x-slot name="author">{{ $sumRead->fullname }}</x-slot>
                        <x-slot name="genre">{{ $sumRead->category }}</x-slot>
                    </x-vertical-card>
                @endforeach

            </div>
        @else
            <div class="text-[16px]">Anda belum mulai membaca ringkasan. <a
                    href="{{ route('eksplor') }}?section=section-buku"
                    class="hover:font-semibold hover:text-darkblue">Baca
                    sekarang</a></div>
        @endif
    </section>
    <!-- Section Bacaan -->

    <!-- Section Ringkasan -->
    <section class="max-w-screen-xl mx-auto px-2">
        <div class="flex justify-between md:mb-3 md:pt-3">
            <p class="font-medium sm:text-2xl">Ringkasanmu</p>
            <button
                class="hidden sm:block bg-darkblue rounded-full text-white font-bold md:text-sm hover:opacity-80 px-2 py-1 md:px-4">
                <a href="{{ route('summary.header') }}">Tambah</a>
            </button>
            <a href="{{ route('summary.header') }}" class="sm:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6 hover:rounded-full hover:border-slate-200 hover:border-2">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        @if (!$summaries->isEmpty())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-8 xl:gap-x-10 gap-y-4 my-2">
                @foreach ($summaries as $summary)
                    @php
                        $route = route('summary.content', ['book_id' => $summary->book_id, 'summary_id' => $summary->summary_id]);
                    @endphp
                    <x-vertical-card href='{{ $route  }}' unique='2' kelas='bg-red-50' source='{{ $summary->cover }}'>
                        <x-slot name="title">{{ $summary->title }}</x-slot>
                        <x-slot name="author">{{ $summary->fullname }}</x-slot>
                        <x-slot name="genre">{{ $summary->category }}</x-slot>
                    </x-vertical-card>
                @endforeach
            </div>
        @else
            <div class="text-[16px]">Anda belum memiliki ringkasan saat ini. <a href='{{ route('summary.header') }}'
                    class="hover:font-semibold hover:text-darkblue">Ringkas sekarang</a></div>
        @endif

    </section>
    <!-- Section Ringkasan -->
    <script>
        $(document).ready(function() {
            $('.bookCard1:gt(4)').hide();
            $('.bookCard2:gt(4)').hide();
            $('#showHistory').click(function() {
                $('.bookCard1').show();
                $(this).hide();
            });
            $('#showSummary').click(function() {
                $('.bookCard2').show();
                $(this).hide();
            });
        });
    </script>
</x-app-layout>
