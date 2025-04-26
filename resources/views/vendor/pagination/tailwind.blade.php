@if ($paginator->hasPages())
    <nav class="flex items-center justify-center">
        <ul class="flex flex-row space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">
                    <span>&laquo; Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 bg-white border border-gray-300 hover:bg-gray-100 rounded">
                        &laquo; Previous
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-2 bg-gray-200 text-gray-500 rounded">{{ $element }}</li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-2 bg-indigo-600 text-white rounded">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-2 bg-white border border-gray-300 hover:bg-gray-100 rounded">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 bg-white border border-gray-300 hover:bg-gray-100 rounded">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li class="px-3 py-2 bg-gray-200 text-gray-500 cursor-not-allowed rounded">
                    <span>Next &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif