<x-app-layout>
    <x-slot name="title">| Tambah Buku</x-slot>
    <section class="max-w-screen-xl mx-auto p-4">
        <a href="{{ route('summary.header') }}" class="my-2"><span class="text-black">&#60;</span> Kembali ke menulis ringkasan</a>
        <form action="{{ route('book.metadata') }}" method="post" class="flex flex-col justify-evenly md:mx-laptop box-border h-3/6"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mt-4">
                <label for="title" class="w-full text-lg font-medium">Judul Buku</label>
                <x-text-input placeholder="Masukkan judul buku disini" type="text" name="title"
                    class="rounded-lg my-2 border-gray-400 border-2" required />
                @error('title')
                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="author" class="w-full text-lg font-medium">Penulis</label>
                <x-text-input placeholder="Masukkan penulis disini" type="text" name="author"
                    class="rounded-lg my-2 border-gray-400 border-2" required />
                @error('author')
                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="total-page" class="w-full text-lg font-medium">Jumlah Halaman</label>
                <x-text-input placeholder="Masukkan jumlah halaman disini" type="text" name="total-page"
                    class="rounded-lg my-2 border-gray-400 border-2" required />
                @error('total-page')
                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="publication-year" class="w-full text-lg font-medium">Tahun Terbit</label>
                <x-text-input placeholder="Masukkan tahun terbit disini" type="text" name="publication-year"
                    class="rounded-lg my-2 border-gray-400 border-2" required />
                @error('publication-year')
                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="isbn" class="w-full text-lg font-medium">ISBN</label>
                <x-text-input placeholder="Masukkan ISBN disini" type="text" name="isbn"
                    class="rounded-lg my-2 border-gray-400 border-2" required />
                @error('isbn')
                <div class="alert alert-danger text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label for="cover" class="w-full text-lg font-medium">Cover Buku</label>
                <input type="file" name="cover" accept="image/*" required>
            </div>

            <div class="flex flex-col mt-4">
                <label for="category" class="w-full text-lg font-medium">Kategori</label>
                <select name="category" class="rounded-lg my-2 border-gray-400 border-2">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mt-4">
                <label for="description" class="w-full text-lg font-medium">Deskripsi Singkat</label>
                <textarea placeholder="Masukkan deskripsi disini" type="text" name="description"
                    class="rounded-lg my-2 border-gray-400 border-2 w-full container h-laptop" required /></textarea>
                    @error('description')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit"
                class="bg-[#3c2d89] hover:bg-[#190482] hover:text-white text-white mx-auto w-48 rounded-lg p-2 font-bold shadow-lg hover:duration-200 hover:ease-in-out lg:mx-0 ease-out my-4">
                Tambah Buku
            </button>
        </form>
    </section>
</x-app-layout>
