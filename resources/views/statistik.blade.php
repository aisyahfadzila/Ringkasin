<x-app-layout>
    <!-- Section Bacaan -->
    <section class="max-w-screen-xl mx-auto px-2 flex flex-col px-8">
        <div class="max-w-screen-xl ml-[12px] my-5">
            <a href="{{ route('eksplor') }} " class="my-2"><span class="text-black">&#60;</span> Kembali ke Eksplor</a>
        </div>
        <article class="my-4">
            <p class="font-semibold text-3xl my-4">Statistik saya</p>
            @if (!$summaries->isEmpty())
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-x-8">
                    @foreach ($summaries as $summary)
                        <x-card-book-balance kelas='bg-red-50' source='{{ $summary->cover }}'>
                            <x-slot name="title">{{ $summary->title }}</x-slot>
                            <x-slot name="reader">{{ $summary->visits ?? 0 }}</x-slot>
                        </x-card-book-balance>
                    @endforeach
                </div>
            @else
                <p class="text-[16px]">Anda belum meringkas buku. <a href='{{ route('summary.header') }}'
                        class="hover:font-semibold hover:text-darkblue">Ringkas sekarang</a></p>
            @endif
        </article>
    </section>
    <!-- Section Bacaan -->
</x-app-layout>
