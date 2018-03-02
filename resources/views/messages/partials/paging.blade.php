@if($paginator->count() > 0)1 @else 0 @endif -{{$paginator->count()}}/{{$paginator->total()}}

    <div class="btn-group">

        @if ($paginator->onFirstPage())
            <a rel="prev" class="btn btn-default btn-sm disabled"><i class="fa fa-chevron-left"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-default btn-sm">
                <i class="fa fa-chevron-left"></i>
            </a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-default btn-sm">
                <i class="fa fa-chevron-right"></i>
            </a>
        @else
            <a rel="next" class="btn btn-default btn-sm disabled"><i class="fa fa-chevron-right"></i></a>
        @endif
    </div>

