<x-app-layout>
    <script>
        function openFileInput() {
            document.getElementById('fileInput').click();
            console.log("halo");
            displayFileName();
        }

        function displayFileName() {
            const fileInput = document.getElementById('fileInput');
            const profileLogo = document.getElementById('profile-logo');

            if (fileInput.files.length > 0) {
                const selectedFileName = fileInput.files[0].name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    profileLogo.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                profileLogo.src = "{{ asset('/assets/profilePictures/default-user.jpg') }}";
            }
        }
    </script>
    <section class="max-w-screen-xl mx-auto p-4">
        <form method="POST" action="{{ route('user.edit') }}" class="flex flex-col mt-8 w-full"
            enctype="multipart/form-data">
            @csrf
            <!-- Foto Profile -->
            <div class="flex flex-col justify-center items-center">
                <img id="profile-logo" class="w-36 h-36 rounded-full object-cover"
                    src="@if (empty($user->profile_logo)) {{ asset('/assets/profilePictures/default-user.jpg') }}
                 @else {{ asset('storage') . '/' . $user->profile_logo }} @endif"
                    alt="Avatar Anda">
                <input type="file" id="fileInput" class="hidden" name="logo" accept="image/*" required
                    onchange="displayFileName()">
                <x-primary-button onclick="openFileInput()" class="px-4 my-4 text-sm">EDIT
                    FOTO</x-primary-button>
            </div>

            <div class="flex flex-col md:mx-laptop my-4">
                <h2 class="font-semibold">DATA DIRI</h2>

                <x-input-label for="fullname" :value="__('Nama Lengkap')" class="mt-4 mb-2 text-base" />
                <x-text-input id="fullname" class="block mt-1 w-full border-gray-300" type="text" name="fullname"
                    :value="old('fullname')" autocomplete="fullname" value="{{ $user->fullname }}" />

                <x-input-label for="username" :value="__('Username')" class="mt-4 mb-2 text-base" />
                <x-text-input id="username" class="block mt-1 w-full border-gray-300" type="text" name="username"
                    :value="old('username')" autocomplete="username" value="{{ $user->username }}" />

                <x-input-label for="email" :value="__('Email')" class="mt-4 mb-2 text-base" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300" type="email" name="email"
                    :value="old('email')" autocomplete="email" value="{{ $user->email }}" />

                <x-primary-button type="submit"
                    class="px-4 my-4 font-semibold text-[15px] w-32">SIMPAN</x-primary-button>
            </div>

        </form>
        <div class="flex flex-col md:mx-laptop my-4">
            <h2 class="font-semibold">HAPUS AKUN</h2>
            <p>Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus
                akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan.</p>

            <a href="{{ route('user.delete') }}">
                <x-primary-button type="submit"
                    class="px-4 my-4 font-semibold text-[15px] w-32 bg-red-600">HAPUS</x-primary-button>
            </a>
        </div>
    </section>
</x-app-layout>
