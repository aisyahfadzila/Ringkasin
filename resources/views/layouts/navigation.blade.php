<!doctype html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ringkasin</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @vite('resources/css/app.css')
    <!--Tailwind Custom Forms - use to standardise form fields - https://github.com/tailwindcss/custom-forms-->
</head>

<body class="font-sans">
    <!--Nav-->
    <nav class="bg-navpurple dark:bg-gray-900" id="navbar">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="{{ route('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/SVGs/ringkasinLogo.svg') }}" class="h-16" alt="Ringkasin Logo" />
                <span
                    class="self-center text-xl lg:text-2xl font-semibold whitespace-nowrap dark:text-white">Ringkasin</span>
            </a>
            <div class="flex items-center lg:order-2 space-x-1 lg:space-x-0 rtl:space-x-reverse">
                @unless (request()->routeIs('eksplor', 'summary.header', 'summary.content'))
                    <ul class="hidden lg:flex end-0">
                        <li class="mr-10">
                            <a href="{{ route('eksplor') }}"
                                class="hover:bg-blue-800 hover:duration-200 inline-block rounded-full px-1 py-1 bg-darkblue shadow-lg"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                                        clip-rule="evenodd" />
                                </svg></a>
                        </li>
                        <li class="mr-12">
                            <a href="{{ route('summary.header') }}"
                                class="hover:bg-blue-800 hover:duration-200 inline-block rounded-full px-1 py-1 bg-darkblue shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                    <path
                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                @endunless
                <button type="button" id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                    class="inline-flex items-center font-semibold justify-center px-2 lg:px-4 py-2 text-xs lg:text-sm border-2 border-darkblue rounded-full text-black">
                    {{ Auth::user()->username }}
                    <x-arrow-down-profile></x-arrow-down-profile>
                </button>
                <!-- Dropdown -->
                <div id="dropdownInformation"
                    class="z-40 hidden bg-profile divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 bg-photo text-sm text-white">
                        <img src="@if (empty(Auth::user()->profile_logo)) {{ asset('/assets/profilePictures/default-user.jpg') }}
                        @else {{ asset('storage') . '/' . Auth::user()->profile_logo }} @endif"
                            alt="Foto
                            Profil"
                            class="h-32 w-32 mx-2 py-4 px-4 rounded-full items-center object-cover">
                            <p class="text-center font-medium">{{ Auth::user()->fullname }}</p>
                    </div>
                    <ul class="py-2 text-sm font-medium text-white" aria-labelledby="dropdownInformationButton">
                        <li>
                            <a href="{{ route('statistik') }}"
                                class="flex px-4 py-2 hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:hover:text-white items-center"><span
                                    class="material-symbols-outlined mr-2">monitoring</span>Statistik Saya</a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}"
                                class="flex px-4 py-2 hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:hover:text-white items-center"><span
                                    class="material-symbols-outlined mr-2">settings</span>Pengaturan</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="{{ route('logout') }}"
                            class="flex  px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white items-center"><span
                                class="material-symbols-outlined mr-2">logout</span>Keluar</a>
                    </div>
                </div>
                <button data-collapse-toggle="navbar-language" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-language" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-language">
                <ul
                    class="flex flex-col font-medium text:sm lg:text-[24px] p-4 lg:p-0 mt-4 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 dark:bg-gray-800 lg:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block py-2 px-3 text-gray-900 lg:bg-transparent lg:p-0 lg:hover:text-active {{ request()->routeIs('dashboard') ? 'lg:text-active bg-active text-white rounded' : '' }}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('eksplor') }}"
                            class="block py-2 px-3 text-gray-900 lg:bg-transparent lg:p-0 lg:hover:text-active {{ request()->routeIs('eksplor') ? 'lg:text-active bg-active text-white rounded' : '' }}">Eksplor</a>
                    </li>
                    <li>
                        <a href="{{ route('perpustakaan') }}"
                            class="block py-2 px-3 text-gray-900 lg:bg-transparent lg:p-0 lg:hover:text-active {{ request()->routeIs('perpustakaan') ? 'lg:text-active bg-active text-white rounded' : '' }}">Perpustakaan</a>
                    </li>
                    <li class="lg:hidden">
                        <a href="{{ route('eksplor') }}"
                            class="block py-2 px-3 lg:hidden text-gray-900 rounded hover:bg-gray-100 ">Search</a>
                    </li>
                    <li class="lg:hidden">
                        <a href="{{ route('summary.header') }}"
                            class="block py-2 px-3 lg:hidden text-gray-900 rounded hover:bg-gray-100 dark:text-white ">Write
                            Summary</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
