@if ($paginator->hasPages())
        @if (!$paginator->onFirstPage())
            <a id="PagerHyperLink" href="{{$paginator->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back</a>
        @endif

        <span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Page {{$paginator->currentPage()}} of {{$paginator->LastPage()}}</span>

        @if($paginator->hasMorePages())
            <a id="PagerHyperLink" href="{{$paginator->nextPageUrl()}}">Next <span class="NavigationIndicators">>></span></a>
        @endif
@endif
