<style>

.pagination li{
    list-style-type: none;
    float: left;
    margin-left: 2.5rem;
}
.pagination li span {
    color: #000;
}
.pagination li a {
    color: #000;
    text-decoration: none;
}
.pagination{
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}
.pagination>.disabled {
    opacity: 0.3 !important;
}
</style>
@if ($paginator->hasPages())

<ul class="pagination">
    @if ($paginator->onFirstPage())

    <li style="transform: rotate(180deg)"><img src="{{ asset('resources/images/pagination_arrow.svg') }}"></li>

    @else

    <li style="transform: rotate(180deg)"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><img src="{{ asset('resources/images/pagination_arrow.svg') }}"></a></li>

    @endif
    @foreach ($elements as $element)
    @if (is_string($element))

    <li><span>{{ $element }}</span></li>

    @endif
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())

    <li class="active"><span>{{ $page }}</span></li>

    @else

    <li class="disabled"><a class="pag" href="{{ $url }}">{{ $page }}</a></li>

    @endif
    @endforeach
    @endif
    @endforeach
    @if ($paginator->hasMorePages())

    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><img src="{{ asset('resources/images/pagination_arrow.svg') }}"></a></li>

    @else

    <li><img src="{{ asset('resources/images/pagination_arrow.svg') }}"></li>

    @endif
</ul>


@endif
