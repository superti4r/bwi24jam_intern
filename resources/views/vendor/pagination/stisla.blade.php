@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <ul class="pagination mt-6">
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span class="pagination__button" aria-hidden="true" aria-disabled="true">
                        <x-icons.chevron-left class="w-4 h-4" />
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination__button"
                        aria-label="{{ __('pagination.previous') }}">
                        <x-icons.chevron-left class="w-4 h-4" />
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="pagination__ellipsis">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="pagination__button" data-state="active" aria-current="page">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="pagination__button">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination__button"
                        aria-label="{{ __('pagination.next') }}">
                        <x-icons.chevron-right class="w-4 h-4" />
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span class="pagination__button" aria-hidden="true" aria-disabled="true">
                        <x-icons.chevron-right class="w-4 h-4" />
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif