{{--Inherit from User Page--}}
@php
    //ADD SUPORT FOR {USERNAME}`s Thing, Or "MY"
    if($MyProfile == 1)
    {
        $DisplayUsername = "You haven't bought or created any items of this type.";
    }else{
        $DisplayUsername = $ProfileUsername." has not bought any catalog items for this type.";
    }
@endphp

@if($MyProfile == 1)
<div>
    <div id="ctl00_cphRoblox_rbxUserAssetsPane_HeaderPagerPanel" class="HeaderPager">
        <a id="ctl00_cphRoblox_rbxUserAssetsPane_CatalogHyperLink" href="{{route("CatalogPage",["m" => "ForSale","c" => $AssetTypeData->id])}}">Shop</a>&nbsp;&nbsp;&nbsp;
        @if($AssetTypeData->user_editor_access == 1)
            <a id="Roblox_Creator_ThisItem" href="{{route("ContentBuilderPage",["Type" => $SearchType])}}">Create</a>&nbsp;&nbsp;&nbsp;
        @endif
    </div>
</div>
@endif

<table id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList" cellspacing="0" border="0">
    <tbody>

    @if(count($Items) > 0)
    @foreach($Items as $Item)
        @if($loop->index % 5 == 0)
            </tr><tr>
        @endif
        <td class="Asset" valign="top">
            <div style="padding:5px">
                <div class="AssetThumbnail">
                    {{--Item.aspx?ID=2264398&amp;UserAssetID=3972783"--}}
                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink" title="{{$Item->name}}" href="{{route("Asset_Page",["ID" => $Item->id])}}" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080608231214im_/http://t1.roblox.com:80/490182ba74bad7086dda0e975a217444" border="0" alt="The Crown of Warlords" blankurl="http://t6.roblox.com:80/blank-110x110.gif"></a>
                </div>
                <div class="AssetDetails">
                    <div class="AssetName">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink" href="{{route("Asset_Page",["ID" => $Item->id])}}">{{$Item->name}}</a></div>
                    <div class="AssetCreator">
                        <span class="Label">Creator:</span>
                        <a id="AssetCreatorHyperLink" href="{{route("ProfilePage",["ID" => $Item->owner_id])}}">{{$Item->owner->username}}</a></span>
                    </div>

                    @if($Item->config->on_sale == 1)

                        @if($Item->config->buy_with_robux == 1)
                            <div class="AssetPrice">
                                <span class="PriceInRobux">R$: {{$Item->config->price_robux}}</span>
                            </div>
                        @endif

                        @if($Item->config->buy_with_ticket == 1)
                            <div class="AssetPrice">
                                <span class="PriceInTickets">Tix: {{$Item->config->price_ticket}}</span>
                            </div>
                        @endif

                        @if($Item->config->buy_with_free == 1)
                                <div class="AssetPrice">
                                    <span class="PriceInTickets" style="color:blue">Free</span>
                                </div>
                         @endif

                    @endif
                </div>
            </div>
        </td>
    @endforeach

    @else
    <div id="InventoryNoResults" style="text-align: center">
         <p>{{$DisplayUsername}} </p>
    </div>
   @endif
    </tbody>
</table>


@if(count($Items) > 0)
<div id="ctl00_cphRoblox_rbxUserAssetsPane_FooterPagerPanel" class="FooterPager">
    {{-- TODO: CUSTOM PAGINATION LIKNED TO JS--}}
    {{--TODO IF NULL SYSTME CRASHES--}}

    @if($Items->currentPage() > 1)
        <a id="Inventory_Back" href="javascript:inventoryPrev()"><< Back</a>
    @endif

    <span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Page 1 of {{$Items->LastPage()}}</span>


    @if($Items->hasMorePages())
        <a id="Inventory_Next" href="javascript:inventoryNext()">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
    @endif
</div>
@endif
</div>

