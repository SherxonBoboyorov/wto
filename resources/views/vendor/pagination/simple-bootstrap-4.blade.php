@if ($paginator->hasPages())
    <nav>
        <div class="center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="pagination" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </div>
            @else
                {{-- <li class=""> --}}
                    <a class="prev" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                {{-- </li> --}}
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.next')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
