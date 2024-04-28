<x-app-layout>
    <x-slot name="title">| Beranda</x-slot>
    <div class="py-2 md:py-5">
        <div class="max-w-screen-xl mx-auto p-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <!-- Carousel -->
                <div id="indicators-carousel" class="relative max-w-screen-xl mx-auto mb-8" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-20 overflow-hidden rounded-lg md:h-60 mt-3 mb-4 md:mb-0">
                        <!-- Item 1 -->
                        <div class="duration-700 ease-in-out" data-carousel-item="active">
                            <img src="{{ asset('/assets/SVGs/carousel.svg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 2 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('/assets/SVGs/carousel-2.svg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                        <!-- Item 3 -->
                        <div class=" duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('/assets/SVGs/carousel-3.svg') }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="..." />
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-40 flex -translate-x-1/2 space-x-3 bottom-2 md:bottom-12 left-1/2">
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full bg-indicator-light"
                            aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full bg-indicator-dark"
                            aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-2 h-2 md:w-3 md:h-3 rounded-full bg-indicator-dark"
                            aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    </div>
                </div>
                <div class="mx-auto">
                    <!-- Ringkasan Terakhir Dibaca -->
                    <div>
                        <h2 class="font-semibold text-lg md:text-[30px] my-3">Terakhir Dibaca</h2>
                        @if (!empty($sumsRead))
                            <div class="grid grid-cols-3 gap-4">
                                @foreach ($sumsRead as $summary)
                                    <x-last-read-card bookId='{{ $summary->book_id }}'
                                        sumId='{{ $summary->summary_id }}' source='{{ $summary->cover }}'
                                        alt='{{ $summary->cover }}'>
                                        <x-slot name="title">{{ $summary->title }}</x-slot>
                                        <x-slot name="author">{{ $summary->author }}</x-slot>
                                        <x-slot name="peringkas">{{ $summary->fullname }}</x-slot>
                                    </x-last-read-card>
                                @endforeach
                            </div>
                        @else
                            <div class="text-[16px]">Anda belum memiliki riwayat bacaan.</div>
                        @endif
                        <div class="flex justify-end mt-6">
                            <button type="button" id="showBtnHistory"
                                class="mt-auto text-gray-900 bg-white border border-indicator-dark focus:outline-none hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 font-medium rounded-xl text-sm px-5 py-1 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tampilkan
                                semua</button>
                        </div>
                    </div>
                    <h2 class="font-semibold text-lg md:text-[30px] mb-4 mt-16">Ringkasan Terpopuler Minggu Ini</h2>
                    @if (!$populars->isEmpty())
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8">
                            @foreach ($populars as $popular)
                                @php
                                    $route = route('summary.details', ['book_id' => $popular->book_id, 'summary_id' => $popular->summary_id]);
                                @endphp
                                <x-vertical-card href='{{ $route }}' kelas='bg-blue-400/50'
                                    source='{{ $popular->cover }}'>
                                    <x-slot name="title">{{ $popular->title }}</x-slot>
                                    <x-slot name="author">{{ $popular->fullname }}</x-slot>
                                    <x-slot name="genre">{{ $popular->category }}</x-slot>
                                </x-vertical-card>
                            @endforeach
                        </div>
                    @else
                        <div class="text-[16px]">Belum ada ringkasan yang populer. <a
                                href="{{ route('eksplor') }}?section=section-buku"
                                class="hover:text-darkblue hover:font-semibold">Baca sekarang</a></div>
                    @endif
                    <div class="flex justify-end">
                        <button type="button" id="showBtnPopular"
                            class="text-gray-900 bg-white border border-indicator-dark focus:outline-none hover:bg-gray-100 focus:ring-8 focus:ring-gray-200 font-medium rounded-xl text-sm px-5 py-1 my-4 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tampilkan
                            semua</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.historyCard:gt(2)').hide();
                $('.bookCard:gt(3)').hide();
                $('#showBtnHistory').click(function() {
                    $('.historyCard').show();
                    $(this).hide();
                });
                $('#showBtnPopular').click(function() {
                    $('.bookCard').show();
                    $(this).hide();
                });
            });
        </script>
</x-app-layout>
