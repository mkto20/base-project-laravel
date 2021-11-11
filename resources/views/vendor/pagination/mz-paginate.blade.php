<div class="row">
    @if ($paginator->hasPages())
    <div class="col s12 m5 paginationRow">
        <p>Mostrando de {{$paginator->firstItem()}} a {{$paginator->lastItem()}} de {{ $paginator->total() }} Registros
        </p>
    </div>
    <div class="col s12 m7">
        <ul class="pagination right" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a aria-hidden="true">&lsaquo;</a>
            </li>
            @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="active light-blue darken-3" style="border: 1px solid #111;" aria-current="page">
                <a>{{ $page }}</a>
            </li>
            @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
            @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a aria-hidden="true">&rsaquo;</a>
            </li>
            @endif
        </ul>
    </div>
    @endif
</div>
