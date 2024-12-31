@extends('Website.Templates.PageView')

@section('Content')
<div id="ItemContainer" style="width: 725px; margin:0 auto; border:1px solid black;">
    <h2>{{$ItemData->name}}</h2>
    <div id="Item" style="width: auto; float:none; padding:10px; border:none;">
        <div id="Thumbnail">
            <a id="ctl00_cphRoblox_AssetThumbnailImage" title="Im with stupid shirt" onclick="javascript:__doPostBack('ctl00$cphRoblox$AssetThumbnailImage','')" style="display:inline-block;height:250px;width:250px;cursor:pointer;"><img src="http://t7.roblox.com:80/Shirt-250x250-2cc79d725bc13e25bcbb337506062131.Png" border="0" id="img" alt="Im with stupid shirt"></a>
        </div>

        <div id="Summary">
            <h3>ROBLOX {{ucfirst($ItemData->type)}}</h3>

            @if($OwnedItem == true)
                <p>You already own this item</p>
            @else
                @if($ItemConfig->on_sale == 1)

                @if($ItemConfig->price_free == 1)

                    {{-- Render free Item Button --}}
                    <div id="ctl00_cphRoblox_PublicDomainPurchasePanel">
                        <div id="PublicDomainPurchase">
                            <div id="PricePublicDomain">Free</div>
                            <div id="BuyForFree">
                                <a id="PurchaseFreeButton" class="Button" href="#">Take one</a>
                            </div>
                        </div>
                    </div>

                @else

                    {{-- Render Buy buttons  --}}

                    @if($ItemConfig->price_robux > 0)
                        <div id="ctl00_cphRoblox_RobuxPurchasePanel">
                            <div id="RobuxPurchase">
                                <div id="PriceInRobux">R$: {{$ItemConfig->price_robux}}</div>
                                <div id="BuyWithRobux">
                                    <a id="PurchaseWithRobuxButton" class="Button" href="#">Buy with R$</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($ItemConfig->price_ticket > 0)
                        <div id="ctl00_cphRoblox_TicketsPurchasePanel">
                            <div id="TicketsPurchase">
                                <div id="PriceInTickets">Tx: {{$ItemConfig->price_ticket}}</div>
                                <div id="BuyWithTickets">
                                    <a id="PurchaseWithTicketsButton" class="Button" href="#">Buy with Tx</a>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif

            @endif

            @endif
            <div id="Creator">
                <div class="Avatar">
                    <a id="ctl00_cphRoblox_AvatarImage" title="clockwork" href="/web/20080805100901/http://www.roblox.com/User.aspx?ID=19358" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080805100901im_/http://t7.roblox.com:80/09656fe0be8b334427dc51c29d4752ae" border="0" alt="clockwork" blankurl="http://t6.roblox.com:80/blank-100x100.gif"></a>
                </div>
                Created by: <a id="ctl00_cphRoblox_CreatorHyperLink" href="#">{{ $ItemOwner->username }}</a>
            </div>


            <div id="LastUpdate">Updated: {{$ItemData->LastUpdated()}}</div>
            <div id="FavoritedLabel">Favorited: <span id="FavoritesCount">{{$ItemData->favorites_count}}</span> times</div>
            <div id="ctl00_cphRoblox_DescriptionPanel">
                <div id="DescriptionLabel">Description:</div>
                <div id="Description">{{$ItemData->about}}</div>
            </div>
            <p></p>

            @if(!$EditMode)
                <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
                    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/AssetVersion.aspx?ID=295070&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d1294770"><img src="{{asset("img/abuse.png")}}" alt="Report Abuse" style="border-width:0px;"></a></span>
                    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/AssetVersion.aspx?ID=295070&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d1294770">Report Abuse</a></span>
                </div>
            @endif

            <p></p>
        </div>

        <div id="Actions">
            @if($Favorited == true)
                <a id="FavoriteThisButton" href="#">Remove from Favorites</a>
            @else
                <a id="FavoriteThisButton" href="#">Favorite</a>
            @endif
        </div>

    <!--User settings for item-->

    @if($EditMode)
    <div id="Configuration">
        <a href="{{route("Asset_Edit",["ID" => $ItemData->id])}}">Configure this {{ucfirst($ItemData->type)}}</a>
    </div>
    @endif

   <!--END User settings for item-->

    <div style="clear: both;"></div>


    <div  class="ajax__tab_xp ajax__tab_container ajax__tab_default" id="ctl00_cphRoblox_TabbedInfo">

        <div id="ctl00_cphRoblox_TabbedInfo_header" class="ajax__tab_header" style="line-height: 0;">

                <!--Switch-->
                <span id="ctl00_SampleContent_Tabs_Panel1_tab">
                    <span class="ajax__tab_outer">
                        <span class="ajax__tab_inner">
                            <span class="ajax__tab_tab" id="Commentary">
                                <h3>Commentary</h3>
                            </span>
                        </span>
                    </span>
                </span>
            </div>


        <div id="ctl00_cphRoblox_TabbedInfo_body" class="ajax__tab_body">
            @include("Website.Items.ItemComments")
        </div>
    </div>

</div>


<input type="number" name="ItemIDBox" id="ItemIDBox" value="{{$ItemData->id}}" readonly="true" style="display: none" >
    <script src="{{asset("js/Web_Catalog_BuyItemController.js")}}"></script>
</div>

@endsection

@push("Extra_Views")
    @include("Website.Templates.BuyItem")
@endpush
