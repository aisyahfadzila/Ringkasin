<!-- Main modal -->
<div id="login-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center md:inset-0 h-[calc(100%-1rem)]">
    <div class="relative p-4 max-w-[512px] max-h-[654px]">
        <!-- Modal content -->
        <div class="relative bg-white rounded-[50px] dark:bg-gray-700 animate-zoom">
            <!-- Modal header -->
            <div class="flex items-center p-4 md:p-5 rounded-t self-center text-center justify-center">
                <h3 class="text-[30px] font-bold text-black dark:text-white">
                    Masuk<br>Ringkasin
                </h3>
            </div>
            <!-- Modal body -->
            <form action="{{ route('login') }}" method="post" id="login">
                @csrf
                <div class="p-4 md:p-5 flex-col flex justify-center self-center">
                    <div class=" self-center">
                        <h2 class="mb-[12px] font-medium">Email</h2>
                        <x-input-form placeholder="email" name="email" type="email" class="mb-[20px]"></x-input-form>
                        <h2 class="mb-[12px] font-medium">Password</h2>
                        <x-input-form placeholder="password" name="password" type="password"
                            class="w-[268px]"></x-input-form>
                    </div>
                    <div class="flex flex-col justify-center items-center p-4 md:p-5 rounded-b">
                        <button type="submit"
                            class="text-center bg-darkblue text-white hover:opacity-60 py-[8px] px-[10px] rounded-full w-[112px] font-bold text-[16px]">
                            Masuk
                        </button>
                        <p class="mt-[10px] font-medium">Belum punya akun?<a href="{{ route('register') }}"
                                class="text-darkblue hover:opacity-60 font-semibold">Daftar sekarang</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<x-popup-card id='loginsuccess'>
    <img src="{{ asset('/assets/SVGs/login-success.svg') }}" class="mb-10">
    <p class="font-medium">Halo, <span id="username"></span></p>
</x-popup-card>

<script>
    $(document).ready(function() {
        $("#login").on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    var dashboardUrl = "{{ route('dashboard') }}";
                    if (response.status == 'success') {
                        $('#username').html(response.username);
                        $('#loginsuccess').slideDown(500);

                        setTimeout(function() {
                                $('#loginsuccess').slideUp();
                                // window.location.href = '/ringkasin/public/';
                                location.assign(dashboardUrl);
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
