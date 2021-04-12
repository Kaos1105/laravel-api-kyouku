@if ($paginator->hasPages())
    <ul class="pager text-md-right" style="padding: 0 2rem;">
        <li class="d-inline-block">
            検索件数 {{$paginator->total()}}件 {{1 + 20*($paginator->currentPage() - 1)}} -
            {{(20*$paginator->currentPage() > $paginator->total()) ? $paginator->total() : 20*$paginator->currentPage()}}
            件　
        </li>
        <li class="d-inline-block"><a href="{{ $paginator->url(1)	 }}" rel="prev">最初へ</a></li>

        @if ($paginator->onFirstPage())
            <li class="d-inline-block disabled"><span>前へ</span></li>
        @else
            <li class="d-inline-block"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">前へ</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled d-inline-block"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active d-inline-block"><span>{{ $page }}</span></li>
                    @else
                        <li class="d-inline-block"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="d-inline-block"><a href="{{ $paginator->nextPageUrl() }}" rel="next">次へ</a></li>
        @else
            <li class="disabled d-inline-block"><span>次へ</span></li>
        @endif

        <li class="d-inline-block"><a
                    href="{{ $paginator->url((int) ceil($paginator->total() / $paginator->perPage()))}}"
                    rel="prev">最後ヘ</a></li>
    </ul>
@endif