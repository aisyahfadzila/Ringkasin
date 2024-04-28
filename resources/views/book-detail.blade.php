<x-app-layout>
    <x-slot name="title">| Details</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <!-- Informasi Buku & Rekomendasi-->
        <a href="{{ route('eksplor') }} " class="my-2"><span class="text-black">&#60;</span> Kembali ke Eksplor</a>
        <article class="flex my-4 w-full justify-between">
            <x-card-info-buku kelas='bg-blue-400/50' source='{{ $book->cover }}' alt='{{ $book->cover }}'>
                <x-slot name="title">{{ $book->title }}</x-slot>
                <x-slot name="author">{{ $book->author }}</x-slot>
                <x-slot name="pub_year">{{ $book->publication_year }}</x-slot>
                <x-slot name="isbn">{{ $book->isbn }}</x-slot>
                <x-slot name="genre">{{ $category->name }}</x-slot>
            </x-card-info-buku>
            <div
                class="hidden lg:block overflow-y-scroll h-56 bg-transparent border-2 border-active rounded-lg pt-3 pl-3 w-1/3">
                <p class="text-lg font-semibold">Dalam Kategori yang sama</p>
                @if (!$otherBooks->isEmpty())
                    @foreach ($otherBooks as $bookaside)
                        <x-book-recomend-aside kelas='bg-blue-400/50' bookId='{{ $bookaside->id }}'>
                            <x-slot name="title">{{ $bookaside->title }}</x-slot>
                        </x-book-recomend-aside>
                    @endforeach
                @else
                    <p>Tidak ada buku lain dalam kategori ini.</p>
                @endif
            </div>
        </article>
        <!-- Informasi Buku & Rekomendasi-->

        <!-- Sekilas Pandang dan List Penulis -->
        <article class="flex flex-col lg:flex-row my-4 lg:mt-10 w-full justify-between">
            @if (!empty($summary))
                <div class="block bg-book-card rounded-lg shadow w-full px-4 pt-5 pb-4 lg:mr-10 lg:w-[72%] break-all">
                    <h5 class="font-semibold text-lg md:text-lg lg:text-2xl mb-5">Sekilas Pandang</h5>
                    <p class="whitespace-normal line-clamp-6">{{ $summary->content }}</p>
                </div>
            @else
                <div
                    class="flex overflow-x-scroll my-2 lg:block lg:overflow-y-scroll lg:h-56 lg:bg-transparent lg:border-2 lg:border-active rounded-lg lg:pt-3 lg:pl-3 lg:w-1/3 lg:order-last space-x-2 lg:space-x-0">
                    @if (!$summaries->isEmpty())
                        @foreach ($summaries as $peringkas)
                            <x-list-peringkas bookId='{{ $peringkas->book_id }}' userId='{{ $peringkas->user_id }}'
                                sumId='{{ $peringkas->summary_id }}'>
                                <x-slot name="nama">{{ $peringkas->fullname }}</x-slot>
                            </x-list-peringkas>
                        @endforeach
                    @else
                        <p>Buku ini belum memiliki peringkas. <a href="{{ route('summary.header') }}"
                                class="hover:text-darkblue hover:font-semibold">Ringkas sekarang</a></p>
                    @endif
                </div>


                <div class="block bg-book-card rounded-lg shadow w-full px-4 pt-5 pb-4 lg:mr-10 break-all">
                    <h5 class="font-semibold text-lg md:text-lg lg:text-2xl mb-5">Sekilas Pandang</h5>
                    <p class="whitespace-normal line-clamp-6 topic-content">{{ $book->description }}
                    </p>
                </div>
            @endif
        </article>
        <!-- Sekilas Pandang dan List Penulis -->

        <!-- Button Lanjut Baca -->
        @if (!empty($summary))
            <article class="lg:w-3/4 flex justify-end">
                <a href="{{ route('summary.read', ['book_id' => $book->book_id, 'summary_id' => $summaries_id]) }}"id="lanjut-baca"
                    class="bg-read-btn rounded-full text-white font-semibold lg:font-bold text-sm lg:text-lg px-4 py-2 lg:mr-10 animate-zoom cursor-pointer">Lanjut
                    Baca</a>
            </article>
        @else
            <article class="lg:w-3/4 flex justify-end">
                <a href="" id="lanjut-baca"
                    class="bg-read-btn rounded-full text-white font-semibold lg:font-bold text-sm lg:text-lg px-4 py-2 lg:mr-10 animate-zoom cursor-pointer">Lanjut
                    Baca</a>
            </article>
            <script>
                if ($("#lanjut-baca").is(":visible")) {
                    $("#lanjut-baca").hide();
                }
            </script>
        @endif
        <!-- Button Lanjut Baca -->

        <!-- Rekomendasi Buku < lg -->
        <article class="lg:hidden mt-4">
            <h2 class="font-semibold text-lg">Dalam kategori yang sama</h2>
            <div class="flex overflow-x-scroll">
                @if (!$otherBooks->isEmpty())
                    @foreach ($otherBooks as $bookaside)
                        <x-book-recomend-bottom source="{{ $bookaside->cover }}" bookId='{{ $bookaside->id }}'>
                            <x-slot name="title">{{ $bookaside->title }}</x-slot>
                        </x-book-recomend-bottom>
                    @endforeach
                @else
                    <p>Tidak ada buku lain dalam kategori ini.</p>
                @endif
            </div>
        </article>
        <!-- Rekomendasi Buku < lg -->
    </section>
    <script>
        $(document).ready(function() {
            $('.peringkas').on('click', function() {
                var book_id = $(this).data('book-id');
                var user_id = $(this).data('user-id');
                var summary_id = $(this).data('summary-id');

                $('.peringkas').removeClass('border-2 border-darkblue');
                $(this).addClass('border-4 border-darkblue');


                $.ajax({
                    url: "{{ route('getCurrentRingkasan', ['book_id' => 'book_id', 'user_id' => 'user_id']) }}"
                        .replace('book_id', book_id).replace('user_id', user_id),
                    type: 'GET',
                    success: function(response) {
                        $('.topic-content').text(response.data.content);
                        $('#lanjut-baca').show(300);
                        $('#lanjut-baca').attr('href',
                            '{{ route('summary.read', ['book_id' => 'book_id', 'summary_id' => 'summary_id']) }}'
                            .replace('book_id', book_id).replace('summary_id',
                                summary_id));

                        console.log("Berhasil");
                        // console.log(summary_id);

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
        });
    </script>

</x-app-layout>
