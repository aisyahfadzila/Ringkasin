<x-app-layout>
    <x-slot name="title">| Eksplor</x-slot>
    <!-- <a href="{{ route('search') }}"> kesini </a> -->
    <!-- Write Button -->
    <div class="w-full bg-lightpurple">
        <div class="max-w-screen-xl mx-auto py-4 flex justify-between px-4 items-center">
            <p class="font-medium md:text-[18px]">Mulai tulis rangkumanmu</p>
            <a href="{{ route('summary.header') }}"
                class="bg-darkblue rounded-lg text-white font-bold md:text-lg hover:opacity-90 px-2 py-1 tracking-tight">Mulai
                Tulis</a>
        </div>
    </div>
    <!-- Write Button -->

    <!-- Content -->
    <div class="max-w-screen-xl mx-auto py-6 px-4">
        <!-- Search Bar -->
        <div class="flex justify-center">
            <div
                class="flex items-center w-full md:w-3/4 my-4 p-1 text-sm text-gray-900 border-[3px] border-darkblue rounded-xl">
                <form action="{{ route('search') }}" method="POST"
                    class="w-full mx-auto flex justify-between items-center">
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
        <!-- Search Bar -->

        <!-- Kategori -->
        <section class="my-5">
            <p class="font-semibold text-2xl mb-5">Kategori</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-20">
                @foreach ($categories as $category)
                    <div>
                        <x-categories href="{{ route('summary.category', ['category_id' => $category->id]) }}">
                            <x-slot name="categories">{{ $category->name }}</x-slot>
                        </x-categories>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Kategori -->

        <!-- Ringkasan -->
        <section class="my-5">
            <p class="font-semibold text-2xl mb-5" id="section-buku">Buku</p>
            @if (!empty($books))
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-5 md:gap-x-12 md:gap-y-5">
                    @foreach ($books as $book)
                        @php
                            $route = route('book.details', ['book_id' => $book->id]);
                        @endphp
                        <x-vertical-card href='{{ $route }}' kelas='bg-blue-400/50'
                            source='{{ $book->cover }}'>
                            <x-slot name="title">{{ $book->title }}</x-slot>
                            <x-slot name="author">{{ $book->author }}</x-slot>
                            <x-slot name="genre">{{ $book->category }}</x-slot>
                        </x-vertical-card>
                    @endforeach
                </div>
            @else
                <div class="text-[16px]">Belum ada buku saat ini. <a href="{{ route('addbook') }}"
                        class="hover:font-semibold hover:text-darkblue">Tambahkan Buku</a></div>
            @endif
            <div class="flex justify-end">
                <button type="button" id="showBtn"
                    class="text-gray-900 bg-white border border-indicator-dark focus:outline-none hover:bg-gray-100 focus:ring-8 focus:ring-gray-200 font-medium rounded-xl text-sm px-5 py-1 my-4 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tampilkan
                    lebih banyak
                </button>
            </div>
        </section>
        <!-- Ringkasan -->

        <!-- Peringkas Terpopuler -->
        <section class="my-5">
            <p class="font-semibold text-2xl mb-5">Peringkas Terpopuler</p>
            @if (!empty($popularAuthors))
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-20 gap-y-4">
                    @foreach ($popularAuthors as $author)
                        <a href="{{ route('summary.user', ['user_id' => $author->id]) }}">
                            <div class="flex space-x-[20px] items-center break-all md:break-words">
                                <x-profile-picture src='{{ $author->profile_logo }}'></x-profile-picture>
                                <x-user-name>{{ $author->fullname }}</x-user-name>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-[16px]">Belum ada peringkas saat ini. <a href="{{ route('summary.header') }}"
                        class="hover:font-semibold hover:text-darkblue">Jadi yang pertama</a></div>
            @endif
        </section>
        <!-- Peringkas Terpopuler -->
    </div>
    <!-- Content -->
    <script>
        $(document).ready(function() {
            $('.bookCard:gt(7)').hide();
            $('#showBtn').click(function() {
                $('.bookCard').show();
                $(this).hide();
            });

            var urlParams = new URLSearchParams(window.location.search);
            var section = urlParams.get('section');

            // If the 'section' query parameter is present, scroll to the section
            if (section) {
                $('html, body').animate({
                    scrollTop: $('#' + section).offset().top
                }, 'slow');
            }

            if (window.location.search.indexOf('section') > -1) {
                var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
                window.history.replaceState({}, document.title, newURL);
            }
        });
    </script>
</x-app-layout>
