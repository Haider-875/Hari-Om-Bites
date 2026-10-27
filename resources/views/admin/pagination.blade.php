@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-3 w-100 py-1">
        <!-- Results Counter -->
        <div class="text-ink-60" style="font-size: 11.5px;">
            @if ($paginator->total() > 0)
                <span>Showing</span>
                <span class="fw-semibold text-ink">{{ $paginator->firstItem() }}</span>
                <span>to</span>
                <span class="fw-semibold text-ink">{{ $paginator->lastItem() }}</span>
                <span>of</span>
                <span class="fw-semibold text-ink">{{ $paginator->total() }}</span>
                <span>results</span>
            @endif
        </div>

        <!-- Page Switchers -->
        <div class="d-inline-flex align-items-center gap-1.5 flex-wrap justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="admin-page-btn admin-page-disabled" aria-disabled="true" aria-label="Previous">
                    <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Prev</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="admin-page-btn" aria-label="Previous">
                    <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span>Prev</span>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="admin-page-dots">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="admin-page-num admin-page-active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="admin-page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="admin-page-btn" aria-label="Next">
                    <span>Next</span>
                    <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <span class="admin-page-btn admin-page-disabled" aria-disabled="true" aria-label="Next">
                    <span>Next</span>
                    <svg style="width: 0.85rem; height: 0.85rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            @endif
        </div>
    </nav>
@endif
