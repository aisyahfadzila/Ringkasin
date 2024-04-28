<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Ringkasin - Landing</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.ico') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @vite('resources/css/app.css')
    <style>
        .gradient {
            background: linear-gradient(287deg, #A364C0 19.02%, #7985C5 49.74%, #DDD8E8 99.46%);
        }

        .gradient2 {
            background-image: linear-gradient(0deg,
                    rgba(255, 255, 255, 1) 20%,
                    rgba(225, 224, 255, 1) 70%);
            z-index: -2;
        }
    </style>
</head>

<body class="gradient">
    <!--Nav-->
    <nav id="header"
        class="fixed top-0 left-0 right-0 z-40 max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/SVGs/ringkasinLogo.svg') }}" class="h-16" alt="Ringkasin Logo" />
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white md:block hidden">Ringkasin</span>
        </a>
        <div class="flex space-x-[10px] items-center md:order-2">
            <ul class="flex items-center content-center font-bold">
                <li class="mr-3">
                    <button data-modal-target="login-modal" data-modal-toggle="login-modal" type="button"
                        class="rounded-lg border-2 border-darkblue px-2 md:px-5 py-2 font-bold text-darkblue shadow hover:bg-darkblue hover:text-white hover:duration-300 ease-out">Sign
                        In</button>
                </li>
                <li>
                    <a href="{{ url('register') }}"
                        class="hover:bg-white hover:text-black hover:duration-300 hover:border-white rounded-lg px-2 py-2 md:px-5 bg-darkblue text-white shadow ease-out border-2 border-darkblue">Sign
                        Up</a>
                </li>
            </ul>
            <button data-auto-close-bs="true" data-collapse-toggle="nav-links" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-darkblue "
                aria-controls="navbar-language" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="hidden w-full md:flex md:w-auto " id="nav-links">
            <ul
                class="block bg-white rounded-lg md:bg-transparent md:flex flex-col font-medium text-[24px] p-4 md:p-0 mt-4 md:space-x-8 lg:space-x-[100px] rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 shadow md:shadow-none border-2 border-darkblue">
                <li class="">
                    <a href="#section-2"
                        class="block py-2 px-3 text-black md:font-semibold hover:bg-gray-100 rounded md:bg-transparent md:hover:bg-transparent md:p-0 md:hover:text-active"
                        aria-current="page">Populer</a>
                </li>
                <li>
                    <a href="#section-3"
                        class="block py-2 px-3 md:p-0 text-black rounded md:font-semibold hover:bg-gray-100 md:hover:bg-transparent md:hover:text-active">FAQ</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="mx-auto h-screen w-full">
        <section class="bg-gradient flex flex-col justify-center h-full relative" id="section-1">
            <div class="max-w-screen-xl my-auto items-center justify-center mx-auto p-2">
                <article class="sm: px-[50px] xl:px-[10rem]">
                    <h1 class="font-bold text-3xl md:px-0 text-center md:text-5xl">
                        Informasi dalam genggamanmu tanpa menghabiskan waktu.
                    </h1>
                    <p class="text-black my-8 font-semibold text-xl md:text-[24px] md:px-[5rem] text-center">
                        Cari semua rangkuman yang ingin kamu
                        <span class="text-highlight">dapatkan</span>,
                        <span class="text-highlight">bagikan</span> dan temukan
                        <span class="italic">trend </span><span class="text-highlight">baru</span> setiap
                        minggunya.
                    </p>
                </article>
                <a href="{{ route('register') }}"
                    class="hover:bg-white hover:text-black bg-black text-white mx-auto rounded-lg md:px-8 py-2 md:py-4 w-[100px] md:w-[200px] font-bold shadow-lg hover:duration-200 hover:ease-in-out md:mx-0 ease-out flex justify-center">
                    Mulai
                </a>
            </div>
            <x-fake-wave id="section-2"></x-fake-wave>
            <x-wave color="#E1E0FF" addon="bottom-0 left-0 right-0 "></x-wave>
        </section>
        <section class="bg-lightpurple">
            <div
                class="max-w-screen-xl lg:flex md:justify-between mx-auto md:p-[32px] xl:p-[8px] ">
                <article class="pt-12 md:pt-0">
                    <x-heading-title class="lg:text-start mb-[35px] lg:pl-[22px]">Buku Terpopuler Minggu Ini</x-heading-title>
                    <ul class="flex gap-x-4 justify-center" id="book-card">
                        @if (!$books->isEmpty())
                            @foreach ($books as $book)
                                <li class="lg:w-1/2">
                                    <img src="{{ asset('storage') . '/' . $book->cover }}" alt="{{ $book->cover }}"
                                        class="rounded-lg w-[120px] h-[190px] lg:w-[140px] lg:h-[210px] shadow mx-auto">
                                    <p
                                        class="md:text-[18px] lg:text-[20px] xl:text-[26px] mt-[20px] text-center ">
                                        {{ $book->title }}</p>
                                </li>
                            @endforeach
                        @else
                            <p class="text-[16px]">Belum ada buku yang di Ringkas. <a href="{{ route('register') }}"
                                    class="hover:text-darkblue hover:font-semibold">Gabung sekarang!</a></p>
                        @endif
                    </ul>
                </article>
                <article class="md:mt-[60px] lg:mt-[0px]">
                    <x-heading-title class="mb-[35px] mt-8 md:mt-0">Peringkas Terpopuler Minggu Ini</x-heading-title>
                    <ul
                        class="mx-8 grid grid-cols-2 gap-y-4 md:gap-y-0 md:w-[75%] md:mx-auto lg:space-y-defaulty lg:block lg:mx-0 lg:w-full">
                        @if (!$users->isEmpty())
                            @foreach ($users as $name)
                                <li class="flex space-x-[30px] justify-start items-center w-full md:w-auto">
                                    <img src="{{ asset('storage') . '/' . $name->profile_logo }}" alt="profile-picture"
                                        class= "rounded-full w-[47.5px] h-[47.5px] xl:w-[57.5px] xl:h-[57.5px] object-cover">
                                    <p class="font-normal md:text-[18px] lg:text-[20px] xl:text-[26px]">
                                        {{ $name->fullname }}</p>
                                </li>
                            @endforeach
                        @else
                            <p class="text-[16px]">Belum ada user yang meringkas. <a href="{{ route('register') }}"
                                    class="hover:text-darkblue hover:font-semibold">Jadilah yang pertama!</a>
                            </p>
                        @endif
                    </ul>
                </article>
            </div>
        </section>
        <section class="gradient2 bg-lightpurple flex justify-center md:h-[75%] lg:h-full py-12 relative "
            id="section-3">
            <div class="md:container flex lg:justify-center lg:items-center w-full">
                <article class="space-y-defaulty px-4 md:px-0" x-data="{ selected: 0 }">
                    <x-heading-title class="text-center">Frequently Asked Question</x-heading-title>
                    <ul>
                        @foreach ($faqs as $index => $question)
                            <li class="md:w-[717px] bg-white rounded-e-lg rounded-s-lg shadow mt-4"
                                id="question-{{ $index + 1 }}">
                                <button class="flex justify-between w-full items-center" type="button"
                                    @click="selected !== {{ $index + 1 }} ? selected = {{ $index + 1 }} : selected = null">
                                    <p class="py-[15px] pl-[28px] text-[20px] break-words text-start">
                                        {{ $question }}</p>
                                    <img class="mr-8"
                                        :src="selected == {{ $index + 1 }} ? '{{ asset('assets/SVGs/arrow-up.svg') }}' :
                                            '{{ asset('assets/SVGs/arrow-down.svg') }}'">
                                </button>

                                <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                                    style="" x-ref="container{{ $index + 1 }}"
                                    x-bind:style="selected == {{ $index + 1 }} ? 'max-height: ' + $refs
                                        .container{{ $index + 1 }}.scrollHeight + 'px' : ''">
                                    <div class="p-6">
                                        <p>{{ $answers[$index] }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </article>
                {{-- <img class="md:absolute z-[99]" src="{{ asset('assets/SVGs/personFAQ.svg') }}" alt="vector"> --}}
            </div>
            <x-wave color="#E1E0FF" addon="bottom-0 left-0 right-0"></x-wave>
        </section>
        @include('layouts.footer')
    </main>
    @include('layouts.sign-in')
</body>

</html>
