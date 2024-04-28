 <!--Nav-->
 <nav id="header" class="bg-transparent fixed top-0 left-0 right-0 z-40">
    <div class="container 2xl:px-laptop mx-auto flex items-center justify-between">
        <a class="flex items-center font-bold hover:no-underline lg:flex-shrink-0 lg:text-2xl" href="#section-1">
            <span class="w-logo"><x-application-logo /></span>
            <h2 class="text-black pl-4">Ringkasin</h2>
        </a>
        <ul class="flex font-semibold text-[22px] space-x-[120px] py-4">
            <x-nav-list>
                <a href="#section-2">Populer</a>
            </x-nav-list>
            <x-nav-list>
                <a href="#section-3">FAQ</a>
            </x-nav-list>
            <x-nav-list>
                <a href="#section-4">Hubungi</a>
            </x-nav-list>
        </ul>
        <ul class="lg:flex lg:items-center content-center font-bold">
            <li class="mr-3">
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                    class="rounded-lg border-2 border-darkblue px-5 py-2 font-bold text-darkblue shadow">Sign
                    In</button>
            </li>
            <li class="">
                <a class="hover:bg-white hover:text-black hover:duration-200 inline-block rounded-lg px-5 py-2 bg-darkblue text-white shadow ease-out"
                    href="#">Sign Up</a>
            </li>
        </ul>

        {{--
    <div class="block pr-4 lg:hidden">
      <button
        id="nav-toggle"
        class="text-gray-500 border-gray-600 hover:text-gray-800 hover:border-green-500 flex appearance-none items-center rounded border px-3 py-2 focus:outline-none"
      >
        <svg
          class="fill-current h-3 w-3"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
      </button>
    </div>
    --}}

    </div>
</nav>
