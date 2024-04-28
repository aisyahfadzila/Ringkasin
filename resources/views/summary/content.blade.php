<x-app-layout>
    <x-slot name="title">| Detail Ringkasan</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <a href="{{ route('perpustakaan') }} " class="my-2 px-2 hover:bg-gray-100 hover:rounded-md">&#60; Kembali ke
            Perpustakaan</a>

        <article class="flex flex-col w-full">
            <div
                class="flex flex-col my-4 gap-8 text-center md:text-left self-center justify-center items-center lg:justify-normal lg:items-start bg-book-card rounded-lg shadow md:flex-row p-4 grow border w-full lg:w-1/2">
                <img class="rounded-t-lg h-48 w-40 md:rounded-none md:rounded-s-lg p-3 lg:ml-4"
                    src="{{ asset('storage') . '/' . $book->cover }}" alt="Gambar cover buku">

                <div class="flex flex-col h-36 md:my-auto">
                    <h5 class="text-[20px] font-semibold text-gray-900 mb-auto">{{ $book->title }}</h5>
                    <div class="leading-3">
                        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">{{ $book->author }}</p>
                        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">{{ $book->total_page }} halaman
                        </p>
                        <p class="mb-3 font-regular text-gray-700 dark:text-gray-400">Terbit
                            {{ $book->publication_year }}</p>
                        @if ($summary_status === 'draft')
                            <p class=" text-gray-500">Belum dikirim</p>
                        @else
                            <p class="text-green-500">Terkirim</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-4 items-end lg:mr-80">
                <button type="submit"
                    class=" bg-red-600 hover:bg-red-500 hover:text-white text-white rounded-lg py-1 px-8 font-bold shadow-lg hover:duration-200 hover:ease-in-out lg:mx-0 ease-out">
                    <a href="{{ route('summary.delete', ['book_id' => $book_id, 'summary_id' => $summary_id]) }}">
                        Hapus
                    </a>
                </button>

                <button type="submit"
                    class=" bg-darkblue text-white hover:opacity-70 rounded-lg py-1 px-8 font-bold shadow-lg hover:duration-200 hover:ease-in-out lg:mx-0 ease-out">
                    @if ($summary_status === 'draft')
                        <a
                            href="{{ route('summary.published', ['book_id' => $book_id, 'summary_id' => $summary_id]) }}">
                            Publish
                        </a>
                    @else
                        <a href="{{ route('summary.draft', ['book_id' => $book_id, 'summary_id' => $summary_id]) }}">
                            Rubah menjadi Draft
                        </a>
                    @endif
                </button>
            </div>
        </article>
    </section>
    <section class="m-4">
        <article class="flex flex-col items-center">
            <button type="submit"
                class=" bg-book-card mx-auto w-full lg:w-1/2 text-left rounded-lg p-2 font-medium shadow-md hover:duration-200 hover:ease-in-out lg:mx-0 ease-out my-4">
                <a href="{{ route('summary.input', ['book_id' => $book_id, 'summary_id' => $summary_id]) }}"
                    class="flex items-center text-gray-600 hover:text-gray-800"><span
                        class="material-symbols-outlined">add</span>Tambah Topik
                </a>
            </button>

            @if (empty($topics))
                <p>Ayo tambahkan topic pertamamu!</p>
            @else
                @foreach ($topics as $topic)
                    <div
                        class=" bg-book-card rounded-lg flex py-2 px-4 my-2 justify-between items-center shadow-md w-full lg:w-1/2">
                        <p>{{ $topic['title'] }}</p>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('summary.edit', ['book_id' => $book_id, 'summary_id' => $summary_id, 'topic_id' => $topic['id']]) }}"
                                class="hover:duration-200 inline-block rounded-full px-1 py-1 hover:bg-blue-700 bg-darkblue shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"
                                    class="w-6 h-6">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg>
                            </a>
                            <a href="{{ route('topic.delete', ['topic_id' => $topic['id']]) }}"
                                class=" bg-red-600 hover:bg-red-800 inline-block rounded-full px-1 py-1 h-8"><span
                                    class="material-symbols-outlined text-white">delete</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif


        </article>
    </section>
</x-app-layout>
