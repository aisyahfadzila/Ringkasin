<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>Test</title>
</head>

<body>
    <main>
        <article class="container w-[738px]">
            
            <!-- Modal toggle -->
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Toggle modal
            </button>

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center md:inset-0 h-[calc(100%-1rem)]">
                <div class="relative p-4 max-w-[512px] max-h-[654px]">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-[50px] dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center p-4 md:p-5 rounded-t self-center text-center justify-center">
                            <h3 class="text-[30px] font-bold text-black dark:text-white">
                                Masuk<br>Ringkasin
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 flex-col flex justify-center self-center">
                            <div class=" self-center">
                                <h2 class="mb-[12px] font-medium">Email</h2>
                                <x-input-form placeholder="Email" type="text" class="mb-[20px]"></x-input-form>
                                <h2 class="mb-[12px] font-medium">Password</h2>
                                <x-input-form placeholder="Password" type="text" class="w-[268px]"></x-input-form>
                                <div>
                                    <a href="#" class="hover:text-darkblue font-normal">Lupa Password?</a>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-center p-4 md:p-5 rounded-b">
                                <button data-modal-hide="default-modal" type="button"
                                    class="text-center bg-darkblue text-white hover:opacity-60 py-[12px] px-[10px] rounded-full w-[112px] font-bold text-[16px]">Masuk</button>
                                <p class="mt-[10px] font-medium">Belum punya akun?<a href="#"
                                        class="text-darkblue hover:opacity-60 font-semibold">Daftar sekarang</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </article>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
