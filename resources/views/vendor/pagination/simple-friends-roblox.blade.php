@if ($paginator->hasPages())

        <span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Pages:</span>

        @if (!$paginator->onFirstPage())
            <a id="PagerHyperLink" href="{{$paginator->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back</a>
        @endif

        @if($paginator->hasMorePages())
            <a id="PagerHyperLink" href="{{$paginator->nextPageUrl()}}">Next <span class="NavigationIndicators">>></span></a>
        @endif
@endif
