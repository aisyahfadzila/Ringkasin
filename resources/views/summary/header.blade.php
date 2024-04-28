<x-app-layout>
    <x-slot name="title">| Pilih Buku</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <a href="{{ route('perpustakaan') }}" class="my-2"><span class="text-black">&#60;</span> Kembali ke
            Perpustakaan</a>
        <form action="{{ route('summary.header') }}" method="post" id="tambah-ringkasan"
            class="mx-auto w-full max-w-lg flex flex-col justify-center">
            @csrf
            <div class="flex flex-col my-4">
                <label for="title" class="w-full text-lg font-medium">Judul Buku</label>
                <select name="book-id" class="rounded-lg my-2 border-gray-400 border-2" required>
                    @foreach ($books as $title => $id)
                        <option value="{{ $id }}" data-book-id="{{ $id }}">{{ $title }}
                        </option>
                    @endforeach
                </select>
                <p>Judul yang kamu cari tidak ada? <a href="{{ route('addbook') }}"
                        class="hover:text-darkblue hover:font-semibold">Tambahkan
                        disini</a></p>
            </div>

            @if (!empty($user->profile_logo))
                <button type="submit"
                    class="bg-darkblue text-white font-bold text-lg rounded-lg py-1 px-2 w-fit self-center">
                    Tambah Ringkasan
                </button>
            @else
                <p>Anda belum menambahkan foto profil! <a href="{{ route('profile') }}"
                        class="hover:text-darkblue hover:font-semibold">Tambahkan disini</a></p>
            @endif
        </form>
    </section>
    <script>
        $(document).ready(function() {
            $("#tambah-ringkasan").on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var nextUrl =
                        "{{ route('summary.content', ['book_id' => 'bookId', 'summary_id' => 'sumId']) }}"
                        .replace('bookId', response.book_id).replace('sumId', response.sum_id);
                        if (response.status == 'success') {
                            location.assign(nextUrl);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</x-app-layout>
