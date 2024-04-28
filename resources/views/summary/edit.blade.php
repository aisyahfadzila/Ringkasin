<x-app-layout>
    <x-slot name="title">| Edit Ringkasan</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <a href="{{ route('summary.content', ['summary_id' => $book_id, 'book_id' => $summary_id]) }} "
            class="my-2 px-2 hover:bg-gray-100 hover:rounded-md">&#60; Kembali ke memilih buku</a>
        <form method="POST" action="{{ route('topic.edit',
                ['topic_id' => $topic_id, 'summary_id' => $summary_id, 'book_id' => $book_id]) }}"
            class="flex flex-col md:flex-row my-4 w-full">
            @csrf
            <div class="border-2 rounded-lg flex flex-col w-full mx-4 p-4">
                <x-input-label for="title" class="hidden">Judul</x-input-label>
                <input type="text" name="title"
                    class="text-center my-2 text-lg font-medium text-lg outline-none border-transparent border-b-gray-800 py-2"
                    value="{{ $title }}">
                <label for="content" class="hidden">Konten</label>
                <textarea name="content" id=""
                    class="border-none min-h-screen indent-defaultx">{{ $content }}</textarea>
            </div>

            <div class="">
                <button type="submit"
                    class=" bg-darkblue hover:opacity-70 text-white w-48 rounded-full p-2 font-bold shadow-lg hover:duration-200 hover:ease-in-out lg:mx-0 ease-out">
                    Edit Ringkasan
                </button>
            </div>

        </form>
    </section>

</x-app-layout>
