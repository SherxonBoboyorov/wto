@if ($paginator->hasPages())

    <ul class="news__pagination">
        @if ($paginator->onFirstPage())
            <li>
                <a href="#!" class="news__pagination__next disabled">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="news__pagination__next">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a href="#" class="news__pagination__link active">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="news__pagination__link">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="news__pagination__next">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </li>
        @else
            <li>
                <a href="#" class="news__pagination__next disabled" aria-disabled="true"
                    aria-label="@lang('pagination.next')">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </li>
        @endif

    </ul>
@endif
