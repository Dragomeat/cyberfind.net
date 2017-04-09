@if ($paginator->hasPages())
    <div class="c_news-pagination">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <div class="c_news-prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Предыдущая</a>
            </div>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="c_news-next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">Следующая</a>
            </div>
        @endif
    </div>
@endif
