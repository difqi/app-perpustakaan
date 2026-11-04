@if ($paginator->hasPages())
    <div class="custom-pagination">

        @if ($paginator->onFirstPage())
            <span class="page-btn disabled">
                &laquo; Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-btn">
                &laquo; Sebelumnya
            </a>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="page-btn current">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" class="page-btn">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-btn">
                Berikutnya &raquo;
            </a>
        @else
            <span class="page-btn disabled">
                Berikutnya &raquo;
            </span>
        @endif

    </div>
@endif
