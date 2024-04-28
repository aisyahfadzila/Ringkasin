@php
    $titles = [];
@endphp
@foreach ($topic_title as $title)
    @php
        $titles[] = $title;
    @endphp
@endforeach
@if ($paginator->hasPages())
    {{-- Array Of Links --}}
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @php
                    $currentPage = $paginator->currentPage() - 1;
                @endphp
                @if ($page == $paginator->currentPage())
                    <span aria-current="page">
                        <span
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-active cursor-default leading-5">{{ $titles[$currentPage] }}</span>
                    </span>
                @else
                    <a href="{{ $url }}"
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white hover:text-active transition ease-in-out duration-150"
                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                        {{ $titles[$page - 1] }}
                    </a>
                @endif
            @endforeach
        @endif
    @endforeach
@else
    <span aria-current="page">
        <span
            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-active cursor-default leading-5">{{ $titles[0] }}</span>
    </span>
@endif
