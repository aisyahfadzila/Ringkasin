    @if ($paginator->hasPages())
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="cursor-pointer p-3 text-md font-medium text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                aria-hidden="true">
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="cursor-pointer p-3 text-md font-medium text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700"
                aria-hidden="true">&#60;
                Sebelumnya
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="cursor-pointer p-3 text-md font-medium mr-4 text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700">Selanjutnya
                &#62;
            </a>
        @else
            <a href="{{ route('perpustakaan') }}" rel="next"
                class="cursor-pointer p-3 text-md font-medium mr-4 text-gray-500 rounded-lg hover:bg-darkblue hover:text-white hover:duration-300">Selesai
            </a>
        @endif
    @else
        <a class="cursor-pointer p-3 text-md font-medium text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-700"
            aria-hidden="true">
        </a>
        <a href="{{ route('perpustakaan') }}" rel="next"
            class="cursor-pointer p-3 text-md font-medium mr-4 text-gray-500 rounded-lg hover:bg-darkblue hover:text-white hover:duration-300">Selesai
        </a>
    @endif
