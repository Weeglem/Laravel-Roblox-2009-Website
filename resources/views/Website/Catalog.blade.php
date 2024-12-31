@extends('Website.Templates.PageView')
@section("Content")
    <div id="CatalogContainer">
        <form method="get" id="SearchBar" class="SearchBar">
            <span class="SearchBox">
                <input name="SearchTextBox" type="text" maxlength="100" value="{{$UserSearch_Name}}" class="TextBox">
                <input type="text" name="m" id="m" value="{{$UserSearch_Browse}}" style="display: none" readonly="true">
                <input type="text" name="c" id="c" value="{{$UserSearch_Category}}" style="display: none" readonly="true">
                <input type="text" name="t" id="t" value="{{$UserSearch_Time}}" style="display: none" readonly="true">
           </span>
            <span class="SearchButton"><input type="submit" value="Search" id="ctl00_cphRoblox_rbxCatalog_SearchButton"></span>

            <span class="SearchLinks">
                @if(!is_null($UserSearch_Name))
                <sup><a href="Catalog.aspx?m={{$UserSearch_Browse}}&c={{$UserSearch_Category}}&t={{$UserSearch_Time}}">Reset</a></sup>
                @endif
            </span>


        </form>
        <div class="DisplayFilters">
            <h2>Catalog</h2>
            <div id="BrowseMode">
                <h4>Browse</h4>

                <ul>
                @foreach($Available_BrowseTags as $BrowseOption)
                        {{-- TODO: REVIEW THIS CODE, array key shit  --}}
                        @php($ArrKey = array_keys($Available_BrowseTags,$BrowseOption)[0])
                        <li>
                            <a href="Catalog.aspx?m={{$ArrKey}}&c={{$UserSearch_Category}}&t={{$UserSearch_Time}}">

                                @if($ArrKey == $UserSearch_Browse)
                                    <img id="ctl00_cphRoblox_rbxCatalog_BrowseModePublicDomainBullet" class="GamesBullet" src="{{asset("img/games_bullet.png")}}" border="0">
                                    <b>{{$BrowseOption[0]}}</b>
                                @else
                                    {{$BrowseOption[0]}}
                                @endif
                            </a>
                        </li>
                @endforeach
                </ul>

            </div>
            <div id="Category">
                <h4>Category</h4>
                <ul>
                    @foreach($Available_CategoryTags as $BrowseOption)
                        {{-- TODO: REVIEW THIS CODE, array key shit  --}}
                        @php($ArrKey = array_keys($Available_CategoryTags,$BrowseOption)[0])
                        <li>
                            <a href="Catalog.aspx?m={{$UserSearch_Browse}}&c={{$ArrKey}}&t={{$UserSearch_Time}}">

                                @if($ArrKey == $UserSearch_Category)
                                    <img id="ctl00_cphRoblox_rbxCatalog_BrowseModePublicDomainBullet" class="GamesBullet" src="{{asset("img/games_bullet.png")}}" border="0">
                                    <b>{{$BrowseOption[1]}}</b>
                                @else
                                    {{$BrowseOption[1]}}
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div id="ctl00_cphRoblox_rbxCatalog_Timespan">
                <h4>Time</h4>
                <ul>
                    @foreach($Available_TimeTags as $BrowseOption)
                        {{-- TODO: REVIEW THIS CODE, array key shit  --}}
                        @php($ArrKey = array_keys($Available_TimeTags,$BrowseOption)[0])
                        <li>
                            <a href="Catalog.aspx?m={{$UserSearch_Browse}}&c={{$UserSearch_Category}}&t={{$ArrKey}}">

                                @if($ArrKey == $UserSearch_Time)
                                    <img id="ctl00_cphRoblox_rbxCatalog_BrowseModePublicDomainBullet" class="GamesBullet" src="{{asset("img/games_bullet.png")}}" border="0">
                                    <b>{{$BrowseOption[0]}}</b>
                                @else
                                    {{$BrowseOption[0]}}
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="Assets">
            <span id="ctl00_cphRoblox_rbxCatalog_AssetsDisplaySetLabel" class="AssetsDisplaySet">
                {{$SearchBrowse}} {{$SearchName}}, {{$SearchTime}}
            </span>

            <div id="ctl00_cphRoblox_rbxCatalog_HeaderPagerPanel" class="HeaderPager">

                @if($ItemsData->currentPage() > 1)
                    <a id="ctl00_cphRoblox_rbxCatalog_FooterPagerHyperLink_Next" href="{{$ItemsData->previousPageUrl()}}"><< Back</a>
                @endif

                @if($ItemsData->currentPage() > 1 || $ItemsData->hasMorePages())
                    <span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Page 1 of {{$ItemsData->LastPage()}}</span>
                @endif

                @if($ItemsData->hasMorePages())
                    <a id="ctl00_cphRoblox_rbxCatalog_FooterPagerHyperLink_Next" href="{{$ItemsData->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                @endif

            </div>

            @if($ItemsData->total() > 0)
            <table id="ctl00_cphRoblox_rbxCatalog_AssetsDataList" cellspacing="0" align="Center" border="0" width="735">
                <tr>
                @foreach($ItemsData as $Item)
                    @if($loop->index % 5 == 0)
                        </tr><tr>
                    @endif

                    <td valign="top">
                        <div class="Asset">
                            <div class="AssetThumbnail">
                                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetThumbnailHyperLink" title="Bloxxer" href="#" style="display:inline-block;cursor:pointer;">
                                    <img src="./Roblox - Catalog_files/8e81e75e3d62529ba15e2032e0a38a0c" border="0" alt="Bloxxer" blankurl="http://t6.roblox.com:80/blank-120x120.gif">
                                </a>
                            </div>
                            <div class="AssetDetails">
                                <div class="AssetName">
                                    <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_AssetNameHyperLink" href="901182635/http://www.roblox.com/Item.aspx?ID=1028595">{{$Item->name}}{{$Item->id}}</a>
                                </div>

                                {{$Item->type}}

                                <div class="AssetLastUpdate">
                                    <span class="Label">Updated:</span>
                                    <span class="Detail">{{$Item->LastUpdated()}}</span>
                                </div>

                                <div class="AssetCreator">
                                    <span class="Label">Creator:</span> <span class="Detail">
                                        <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl00_CreatorHyperLink" href="#">
                                            {{$Item->Owner->username}}
                                        </a>
                                    </span>
                                </div>

                                <div class="AssetsSold">
                                    <span class="Label">Number Sold:</span>
                                    <span class="Detail">{{$Item->total_purchases_count}}</span>
                                </div>

                                <div class="AssetFavorites">
                                    <span class="Label">Favorited:</span>
                                    <span class="Detail">{{$Item->favorites_count}}</span>
                                </div>

                                @if($Item->Config->buy_with_ticket == 1)
                                <div class="AssetPrice">
                                    <span class="PriceInTickets">Tx: {{$Item->Config->price_ticket}}</span>
                                </div>
                                @endif


                                @if($Item->Config->buy_with_robux == 1)
                                <div class="AssetPrice">
                                    <span class="PriceInRobux">Rx: {{$Item->Config->price_robux}}</span>
                                </div>
                                @endif

                                @if($Item->Config->buy_with_free == 1)
                                    <div class="AssetPrice">
                                        <span class="PriceInRobux" style="color:blue">Free</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </td>

                @endforeach
            </table>
            @else
                <br><p>No items were found.</p>
            @endif


            <div id="ctl00_cphRoblox_rbxCatalog_FooterPagerPanel" class="HeaderPager">

                @if($ItemsData->currentPage() > 1)
                    <a id="ctl00_cphRoblox_rbxCatalog_FooterPagerHyperLink_Next" href="{{$ItemsData->previousPageUrl()}}"><< Back</a>
                @endif

                @if($ItemsData->currentPage() > 1 || $ItemsData->hasMorePages())
                    <span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Page 1 of {{$ItemsData->LastPage()}}</span>
                @endif

                @if($ItemsData->hasMorePages())
                    <a id="ctl00_cphRoblox_rbxCatalog_FooterPagerHyperLink_Next" href="{{$ItemsData->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                @endif
            </div>

        </div>
        <div style="clear: both;">
        </div>

    </div>
@endsection
