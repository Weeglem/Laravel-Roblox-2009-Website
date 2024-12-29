@extends('Website.Templates.PageView')

@section('Content')

<div id="ItemContainer" >
    <div id="Item" style="float: none; margin:0 auto;">
        <h2>{{$ItemData->name}}</h2>

        <div id="Details">

            <div id="Summary">
                <h3>ROBLOX Place</h3>

                <div id="Creator" class="Creator">
                    <div class="Avatar">
                        <a id="ctl00_cphRoblox_AvatarImage" title="builderman" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?ID=156" style="display:inline-block;cursor:pointer;">
                            <img src="{{asset("img/Placeholder/AvatarFriends.png")}}" border="0" alt="builderman" blankurl="http://t6.roblox.com:80/blank-100x100.gif">
                        </a>
                    </div>
                    Creator: <a id="ctl00_cphRoblox_CreatorHyperLink" href="{{$ItemOwner->username}}">{{$ItemOwner->username}}</a>
                </div>

                <div id="LastUpdate">Updated: {{$ItemData->LastUpdated()}}</div>
                <div id="Favorited">Favorited: {{$ItemData->favorites_count}} times</div>
                <div id="ctl00_cphRoblox_VisitedPanel" class="Visited">Visited: 0 times</div>
                <div id="ctl00_cphRoblox_DescriptionPanel">
                    <div id="DescriptionLabel">Description:</div>
                    <div id="Description">{{$ItemData->about}}</div>
                </div>

                @if(!$EditMode)
                <div id="ReportAbuse">
                    <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
                        <span class="AbuseIcon">
                            <a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="#">
                                <img src="{{asset("img/abuse.png")}}" alt="Report Abuse" border="0">
                            </a>
                        </span>
                        <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="#">Report Abuse</a></span>
                    </div>
                </div>
                @endif
            </div>

            <div id="Thumbnail_Place">
                <a id="ctl00_cphRoblox_AssetThumbnailImage_Place" style="display:inline-block;cursor:pointer;">
                    <img src="{{asset("img/Placeholder/ThumbnailGameBig.png")}}" border="0" alt="Game Thumbnail">
                </a>
            </div>
            <div id="Actions_Place">

                @if($Favorited == true)
                    <a id="FavoriteThisButton">Remove from Favorites</a>
                @else
                    <a id="FavoriteThisButton">Favorite</a>
                @endif
            </div>
            <div id="ctl00_cphRoblox_PlayGames" class="PlayGames">
                <div style="text-align: center; margin: 1em 5px;">




                   {{--https://www.youtube.com/watch?v=PPibM6VkI7Y --}}

                    <!--Public access-->
                    @if($GameAccess == 0)
                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_Public" style="display:inline;">
                        <img id="ctl00_cphRoblox_PlaceAccessIndicator_iPublic" src="{{asset("img/public.png")}}" alt="Public" border="0">
                        &nbsp;Public
                    </span>
                    @endif

                    <!--Locked friend-->
                    @if($GameAccess == 1)
                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyLocked" style="display: inline">
                        <img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Locked" src="{{asset("img/locked.png")}}" alt="Locked" border="0">
                        &nbsp;Friends-only
                    </span>
                    @endif

                    <!--Locked friend with access-->
                    @if($GameAccess == 2)
                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyUnlocked" style="display: inline">
                        <img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Unlocked" src="{{asset("img/unlocked.png")}}" alt="Unlocked" border="0">
                        &nbsp;Friends-only: You have access
                    </span>
                    @endif


                    @if($ItemConfig->is_copylocked == 1)
                        <img id="ctl00_cphRoblox_CopyLockedIcon" src="{{asset("img/CopyLocked.png")}}" alt="CopyLocked" border="0">Copy Protection: CopyLocked
                    @else
                        <img id="ctl00_cphRoblox_CopySharedIcon" src="{{asset("img/Shared.png")}}" alt="Shared" border="0">Copy Protection: Shared
                    @endif

                </div>

            <div id="ctl00_cphRoblox_VisitButtons_ClientInstaller_Panel1" class="modalPopup" style="display: none">
        </div>




        <div id="ctl00_cphRoblox_VisitButtons_FancyButtons">
            @if($GameAccess == 0 || $GameAccess == 2)
            <div id="ctl00_cphRoblox_VisitButtons_VisitMPButton2" style="display: inline; width: 10px;">
                <input type="image" name="ctl00$cphRoblox$VisitButtons$MultiplayerVisitButtonB" id="ctl00_cphRoblox_VisitButtons_MultiplayerVisitButtonB" class="ImageButton" src="{{asset("img/buttons/Play.png")}}" alt="Visit Online" onclick="return Roblox.Client.WaitForRoblox(function() { window.location = &#39;/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d515406&#39; });" border="3">
            </div>
            @endif


            @if($ItemData->game_uncopylocked)
                <div id="ctl00_cphRoblox_VisitButtons_VisitButton2" style="display: inline; width: 10px;">
                    <input type="image" name="ctl00$cphRoblox$VisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_VisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/PlaySolo.png")}}" alt="Visit Solo" onclick="javascript:ROBLOX_GameLaunch_PlaySolo({{$ItemData->id}})" border="3">
                </div>
            @endif
        </div>
    </div>

    @if($EditMode)
    <div id="Configuration">
        <a href="{{route("editItem_page",["id" => $ItemData->id])}}">Configure this Game</a>
    </div>
    @endif

    <div style="clear: both;"></div>


</div>

<div style="margin: 10px; width: 703px;">

    <!--Tabs-->
    <div class="ajax__tab_xp ajax__tab_container ajax__tab_default" id="ctl00_cphRoblox_TabbedInfo">
        <div id="ctl00_cphRoblox_TabbedInfo_header" class="ajax__tab_header" style="line-height: 0;">

            <!--Switch-->
            <span id="ctl00_SampleContent_Tabs_Panel1_tab" >
                    <span class="ajax__tab_outer">
                        <span class="ajax__tab_inner">
                            <span class="ajax__tab_tab" id="Commentary"><h3>Commentary</h3></span>
                        </span>
                    </span>
            </span>


            <!--Switch-->
            <span id="ctl00_SampleContent_Tabs_Panel1_tab" >
                    <span class="ajax__tab_outer">
                        <span class="ajax__tab_inner">
                            <span class="ajax__tab_tab" id="Games"><h3>Games</h3></span>
                        </span>
                    </span>
                </span>



        </div>

        <div id="ctl00_cphRoblox_TabbedInfo_body" class="ajax__tab_body">
            <!--Move to CSS-->
            <!--Running Servers-->

            @include("Website.Items.GameRunningServers")
            @include("Website.Items.ItemComments")
            {{--

        --}}
        </div>
</div>

</div>

<div class="Ads_WideSkyscraper">

</div>

<div style="clear: both;"></div>

<div id="ctl00_cphRoblox_ItemPurchasePopupPanel" class="modalPopup" style="display: none">
    <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel"></div>
</div>

<input type="hidden" name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1">
<input type="hidden" name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2">
<input type="hidden" name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3">
<input type="number" name="ItemIDBox" id="ItemIDBox" value="{{$ItemData->id}}" readonly="true" style="display: none" >
</div>

@endsection
