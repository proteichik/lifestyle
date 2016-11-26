@if ($paginator->hasPages())
    <nav aria-label="simple-pager">
        <ul class="pager">
             {{--Previous Page Link--}}
            @if ($paginator->onFirstPage())
                <li class="previous disabled">
                    {{--<span aria-hidden="true"> &laquo; </span>--}}
                    {{--<i class="fa fa-backward" aria-hidden="true"></i>--}}
                </li>
            @else
                <li class="previous"><a href="{{ $paginator->previousPageUrl() }}">
                        {{--<span aria-hidden="true">&laquo;</span>--}}
                        <i class="fa fa-arrow-left fa-2x" style="color: #c34c21" aria-hidden="true"></i>
                    </a>
                </li>
            @endif

             {{--Next Page Link--}}
            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}">
                        {{--<span aria-hidden="true"> &raquo; </span>--}}
                        <i class="fa fa-arrow-right fa-2x" style="color: #c34c21" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li class="next disabled">
                    {{--<span aria-hidden="true"> &raquo; </span>--}}
                    {{--<i class="fa fa-forward" aria-hidden="true"></i>--}}
                </li>
            @endif
        </ul>
    </nav>
@endif
