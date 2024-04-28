<x-guest-layout>
    <form id="register" method="POST" action="{{ route('register') }} " class="w-full lg:w-1/2 lg:ml-12 flex flex-col px-10 py-4">
        @csrf
        <div class="font-semibold text-3xl text-center my-4">
            <p>Bergabung dengan <br>Ringkasin</p>
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Userame -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="off" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="cpassword" :value="__('Confirm Password')" />

            <x-text-input id="cpassword" class="block mt-1 w-full" type="password" name="cpassword" required
                autocomplete="off" />

            <x-input-error :messages="$errors->get('cpassword')" class="mt-2" />
            <span id='message'></span>
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            <x-primary-button class="font-semibold my-6 px-4">
                {{ __('Daftar') }}
            </x-primary-button>

            <a data-modal-target="login-modal" data-modal-toggle="login-modal" type="button"
                class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover:cursor-pointer">Sudah punya akun? <span class="hover:text-darkblue">Masuk</span>
            </a>
        </div>
    </form>
    <div class="hidden lg:block">
        <img src="{{ asset('assets/SVGs/bg-register.svg') }}" class="min-h-screen object-cover"
            alt="Background Register" />
    </div>

    <x-popup-card id='regist-success'>
        <img src="{{ asset('/assets/SVGs/account-created.svg') }}" class="mb-10">
        <p class="font-medium">Akun berhasil dibuat</p>
    </x-popup-card>
    @include('layouts.sign-in');
    <script>
        $(document).ready(function() {
            $("#register").on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        var nextUrl = "{{ route('/') }}";
                        if (response.status == 'success') {
                            $('#regist-success').slideDown(500);

                            setTimeout(function() {
                                $('#regist-success').slideUp();
                                location.assign(nextUrl);
                            }, 1500);
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
    <script>
        $(document).ready(function() {
            $('#cpassword').on('keyup', function() {
                if ($('#password').val() != $('#cpassword').val()) {
                    $('#message').show();
                    $('#message').html('Password tidak sama!').css('color', 'red');
                } else {
                    $('#message').hide();
                }
            });
        });
    </script>
</x-guest-layout>
