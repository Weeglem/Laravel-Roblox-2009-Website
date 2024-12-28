@extends('Website.Templates.PageView')

@section('Content')


{{--FOR ALTERNATIVES --}}
@php
    //ADD SUPORT FOR {USERNAME}`s Thing, Or "MY"
    if($MyProfile == true)
    {
        $DisplayUsername = "My";
    }else{
        $DisplayUsername = substr($UserData->username,-1) == "s" ? $UserData->username."' " : $UserData->username."'s ";
    }

@endphp


<div id="UserContainer">
    <div id="LeftBank">
        <!--User page-->
        <div id="ProfilePane">
            <table width="100%" bgcolor="lightsteelblue" cellpadding="6" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <span id="ctl00_cphRoblox_rbxUserPane_lUserName" class="Title">{{$UserData->username}}</span><br>
                            <span id="ctl00_cphRoblox_rbxUserPane_lUserOnlineStatus" class="UserOfflineMessage">[ Offline ]</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!--User Card-->
                            <span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL">{{$DisplayUsername}} ROBLOX:</span><br>
                            <a id="ctl00_cphRoblox_rbxUserPane_hlUserRobloxURL" href="#">http://www.roblox.com/User.aspx?ID={{$UserData->id}}</a><br>
                            <br>
                            <div style="left: 0px; float: left; position: relative; top: 0px">
                                <a id="ctl00_cphRoblox_rbxUserPane_Image1" disabled="disabled" title="ROBLOX">
                                    <img src="{{asset("img/Placeholder/AvatarProfile.png")}}" border="0" alt="ROBLOX" blankurl="http://t7.roblox.com:80/blank-180x220.gif"></a><br>
                                <div id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
                                    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseIconHyperLink" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/AbuseReport/UserProfile.aspx?userID=1&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1"><img src="{{asset("img/abuse.png")}}" alt="Report Abuse" border="0"></a></span>
                                    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseTextHyperLink" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/AbuseReport/UserProfile.aspx?userID=1&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1">Report Abuse</a></span>
                                </div>
                            </div>

                        <!--User Editor-->
                        @if($MyProfile == true)
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_UpgradesHyperLink" href="My/AccountUpgrades/Manage.aspx">Upgrades</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyRobux" href="My/AccountBalance.aspx">Account Balance</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyInbox" href="My/Inbox.aspx">Inbox</a>&nbsp;</p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyAvatar" href="My/Character.aspx">Change Character</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_Edit" href="My/Profile.aspx">Edit Profile</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_View" href="{{route("Users_Profile_Page",["ID"=>$UserData->id])}}">View Profile</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="My/InviteAFriend.aspx">Share ROBLOX</a></p>
                        @else
                            <!--User Actions-->
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="#">Send Friend Request</a></p>
                            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="#">Send Message</a></p>
                            <p><span id="ctl00_cphRoblox_rbxUserPane_rbxPublicUser_lBlurb">{{$UserData->about}}</span></p>
                        @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Badges-->
        <div id="UserBadgesPane">
            <div id="UserBadges">

                <h4><a id="ctl00_cphRoblox_rbxUserBadgesPane_hlHeader" href="#">Badges</a></h4>
                <table id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges" cellspacing="0" align="Center" border="0">
                    @if(count($UserBadges) > 0)
                    <tbody>
                        {{--Draw Badge Cut line--}}
                        @if($UserBadge_Actual % 4 == 0)
                            </tr><tr>
                        @endif

                            {{--Draw Badges--}}
                            @foreach ($UserBadges as $Badge)

                                {{--Group Items hack--}}
                                @if($loop->index % 4 == 0)
                                </tr><tr>
                                @endif


                                <td>
                                    <!--Single badge-->
                                    <div class="Badge">
                                        <!--Image-->
                                        <div class="BadgeImage">
                                            <a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_hlHeader" href="#">
                                                <img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_iBadge" src="#" alt="{{$Badge->badges->name}}" height="75" border="0">
                                            </a>
                                        </div>
                                        <!--Name-->
                                        <div class="BadgeLabel">
                                            <a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_HyperLink1" href="#">{{$Badge->badges->name}}</a>
                                        </div>
                                    </div>
                                </td>

                                {{--ADD TO Cut line--}}
                                @php
                                    $UserBadge_Actual++
                                @endphp

                            @endforeach
                    </tbody>
                @else
                    <p>{{$UserData->username}} does not have any  Roblox badges.</p>
                @endif
                </table>
            </div>
        </div>

        <!--UserStats-->
        <div id="UserStatisticsPane">
            <div id="UserStatistics">
                <h4>Statistics</h4>
                <!--Friends-->
                <div class="Statistic">
                    <div class="Label"><acronym title="The number of this user&#39;s friends.">Friends</acronym>:</div>
                    <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">14,883 (1,865 last week)</span></div>
                </div>
                <!--Forum posts-->
                <div class="Statistic">
                    <div class="Label"><acronym title="The number of posts this user has made to the ROBLOX forum.">Forum Posts</acronym>:</div>
                    <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lForumPostsStatistics">72</span></div>
                </div>
                <!--Profile views-->
                <div class="Statistic">
                    <div class="Label"><acronym title="The number of times this user&#39;s profile has been viewed.">Profile Views</acronym>:</div>
                    <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lProfileViewsStatistics">677,050 (32,904 last week)</span></div>
                </div>
                <!--Place visits-->
                <div class="Statistic">
                    <div class="Label"><acronym title="The number of times this user&#39;s place has been visited.">Place Visits</acronym>:</div>
                    <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lPlaceVisitsStatistics">220,850 (9,041 last week)</span></div>
                </div>
                <!--Kills-->
                <div class="Statistic">
                    <div class="Label"><acronym title="The number of times this user&#39;s character has destroyed another user&#39;s character in-game.">Knockouts</acronym>:</div>
                    <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lKillsStatistics">312 ( last week)</span></div>
                </div>
            </div>
        </div>
    </div>

    <div id="RightBank">
        <div id="UserPlacesPane">
            <div id="UserPlaces">
                @if(count($UserGames) > 0)
                <h4>Showcase</h4>
                <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion">
                    <input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ShowcasePlacesAccordion_AccordionExtender_ClientState" id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion_AccordionExtender_ClientState" value="0">

                    @foreach ($UserGames as $Game)
                        <div class="AccordionHeader">{{$Game->asset->name}}</div>


                        @if($loop->first == true)
                            <div class="AccordionEnabled">
                        {{-- <div style="display:block;"> --}}
                        @else
                            <div class="AccordionDisabled">
                            {{-- <div style="display:none;"> --}}
                        @endif

                            <div class="Place">
                                <div class="PlayStatus">
                                    <!--
                                    <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="{{asset("img/locked.png")}}" alt="Locked" border="0">&nbsp;Friends-only</span>
                                    <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="{{asset("img/unlocked.png")}}" alt="Unlocked" border="0">&nbsp;Friends-only: You have access</span>
                                    -->
                                    <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_Public"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="{{asset("img/public.png")}}" alt="Public" border="0">&nbsp;Public</span>
                                </div>
                                <br>

                                <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_FancyButtons">

                                    {{-- VISIT ONLINE --}}
                                    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_VisitMPButton2" style="display: inline; width: 10px;">
                                        <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$MultiplayerVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_MultiplayerVisitButtonB" class="ImageButton" src="{{asset("img/buttons/Play.png")}}" alt="Visit Online" border="3">
                                    </div>

                                    {{-- PLAY SOLO CHARACTER MODE  --}}

                                    @if($Game->game_uncopylocked == true || $MyProfile == true)
                                    <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_EditButton">
                                        <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/BuildSolo2.png")}}" alt="Visit Solo" border="3" onclick="javascript:ROBLOX_GameLaunch_PlaySolo({{$Game->id}})">
                                    </span>
                                    @endif


                                    {{-- EDIT BUTTON ONLY APPEARS ON MY ROBLOX --}}
                                    @if($Game->game_uncopylocked == true && $MyProfile == true)
                                        <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_EditSoloButton2" style="display: inline; width: 10px;">
                                            <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/EditMode2.png")}}" alt="Visit Solo" border="3" onclick="javascript:ROBLOX_GameLaunch_EditMode({{$Game->id}})">
                                        </div>
                                    @endif
                                </div>


                                <div class="Statistics">
                                    <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_lStatistics">Visited 6 times (0 last week)</span></div>

                                    <div class="Thumbnail">
                                        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="rock1996's Place" href="{{route("Item_Page",["ID" => $Game->id])}}" style="display:inline-block;">
                                            <img src="{{asset("img/Default/EmptyBaseBig.png")}}" border="0" alt="rock1996's Place">
                                        </a>
                                    </div>

                                    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_pDescription">
                                        <div class="Description">
                                            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_lDescription">{{$Game->asset->about}}</span>
                                        </div>
                                    </div>

                                    {{--https://www.youtube.com/watch?v=xffHGIQ6tFA--}}
                                    @if($MyProfile == true)
                                    <div class="Configuration">
                                        <a id="ctl00_cphRoblox_EditItemHyperLink" href="My/Item.aspx?ID=1061325">Configure this Place</a>
                                    </div>
                                    <div class="Configuration">
                                        <a id="ctl00_cphRoblox_EditItemHyperLink" href="My/Item.aspx?ID=1061325">Advertise this Place</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>

                @else
                    <p>{{$UserData->username}} does not have any Roblox places.</p>
            </div>
                @endif

                {{-- Edit place
                <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcaseFooter" class="PanelFooter">
                    <a id="ctl00_cphRoblox_rbxUserPlacesPane_ConfigureShowcaseHyperLink" href="My/Places.aspx">Manage My Places</a>
                </div>
                --}}
            </div>


        <!--Friends-->
    <div id="FriendsPane">
        <div id="Friends">
            <h4>{{$DisplayUsername}} Friends
            <a href="https://web.archive.org/web/20080730015017/http://www.roblox.com/Friends.aspx?UserID=1">See all {{$UserFriends->total()}}</a>

            @if($MyProfile == true)
                <span><a href="./My/EditFriends.aspx">(Edit)</a></span>
            @endif
            </h4>

            <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">
                <tbody>
                        @if(count($UserFriends) > 0)

                            @foreach($UserFriends as $Friend)
                            {{--Group Items hack--}}
                            @if($loop->index % 3 == 0)
                            </tr><tr>
                            @endif

                            <td>
                                <div class="Friend">
                                    <div class="Avatar">
                                        <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlAvatar" title="brickmason" href="{{route("Users_Profile_Page",["ID" => $Friend->id])}}" style="display:inline-block;cursor:pointer;">
                                            <img src="{{asset("img/Placeholder/AvatarFriends.png")}}" border="0" alt="brickmason" blankurl="http://t6.roblox.com:80/blank-100x100.gif">
                                        </a>
                                    </div>
                                    <div class="Summary">
                                        <span class="OnlineStatus">
                                            <img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_iOnlineStatus" src="{{asset("img/OnlineStatusIndicator_IsOffline.gif")}}" alt="brickmason is offline (last seen at 12/12/2007 4:56:27 PM)." border="0"></span>
                                        <span class="Name">
                                            <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlFriend" href="{{route("Users_Profile_Page",["ID" => $Friend->id])}}">{{$Friend->username}}</a></span>
                                    </div>
                                </div>
                            </td>
                            @endforeach

                        @else
                            <p>{{$UserData->username}} has not added any friends.</p>
                        @endif
                </tbody>
            </table>
        </div>
    </div>




    <div id="Friends">
        <div id="FavoritesPane">
            <div id="ctl00_cphRoblox_rbxFavoritesPane_FavoritesPane">
                <div id="Favorites">
                    <h4>Favorites</h4>
                    <div id="FavoritesContent">

                        <div id="Favorites_PaginationPanel" class="FooterPager" style="display: none">
                            <a id="Roblox_UserFavorites_PrevPage" style="display: none"><span class="NavigationIndicators"><<</span> Back</a>

                            <span id="FavoritesPageIndicator">Page
                                <span id="FavoritesActualPage">1</span>
                                of
                                <span id="FavoritesRemainingPages">1</span>
                            </span>

                            <a id="Roblox_UserFavorites_NextPage" style="display: none">Next <span class="NavigationIndicators">>></span></a>
                        </div>

                        <div id="FavoritesNoResults" style="display: none">
                            <p>{{$UserData->username}}  has not liked any items of this type.</p>
                        </div>

                        <table id="Favorites_ItemContainer" cellspacing="0" border="0" style="margin:0 auto;">
                            <tbody></tbody>
                        </table>

                        <div id="Favorites_PaginationPanel" class="FooterPager" style="display: none">
                            <a id="Roblox_UserFavorites_PrevPage" style="display: none"><span class="NavigationIndicators"><<</span> Back</a>

                            <span id="FavoritesPageIndicator">Page
                                <span id="FavoritesActualPage">1</span>
                                of
                                <span id="FavoritesRemainingPages">1</span>
                            </span>

                            <a id="Roblox_UserFavorites_NextPage" style="display: none">Next <span class="NavigationIndicators">>></span></a>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="PanelFooter">
                        Category:&nbsp;
                        <select name="Favorites_SearchType" id="Favorites_SearchType">
                            <option value="2" selected>T-Shirts</option>
                            <option value="11">Shirts</option>
                            <option value="12">Pants</option>
                            <option value="8">Hats</option>
                            <option value="13">Decals</option>
                            <option value="10">Models</option>
                            <option value="9">Places</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--My friends requests--}}
@if($MyProfile == true)
    <div id="UserAssetsPane">
        <div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
            <div id="FriendRequests">
                <h4>Friends Request (1)</h4>
                <div id="FriendRequestsHeader">
                    <span><a href="#">Accept all</a></span>
                    <span> | </span>
                    <span><a href="#">Decline All</a></span>
                </div>
                <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Friend">
                                    <div class="Avatar">
                                        <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlAvatar" title="brickmason" href="{{route("Users_Profile_Page",["ID" => $UserData->id])}}" style="display:inline-block;cursor:pointer;">
                                            <img src="{{asset("img/Placeholder/AvatarFriends.png")}}" border="0" alt="brickmason" blankurl="http://t6.roblox.com:80/blank-100x100.gif">

                                        </a>
                                    </div>
                                    <div class="Summary">
                                        <span class="OnlineStatus">
                                            <img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_iOnlineStatus" src="{{asset("img/OnlineStatusIndicator_IsOffline.gif")}}" alt="brickmason is offline (last seen at 12/12/2007 4:56:27 PM)." border="0"></span>
                                        <span class="Name">
                                            <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlFriend" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/User.aspx?ID=169">brickmason</a></span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{--My Assets--}}
    <div id="UserAssetsPane">
        <div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
            <div id="UserAssets">
                <h4>Stuff</h4>

                <div id="AssetsMenu">
                    <button id="2" class="UserInventoryButton" disabled>T-Shirts</button>
                    <button id="11" class="UserInventoryButton">Shirts</button>
                    <button id="12" class="UserInventoryButton">Pants</button>
                    <button id="8" class="UserInventoryButton">Hats</button>
                    <button id="13" class="UserInventoryButton">Decals</button>
                    <button id="10" class="UserInventoryButton">Models</button>
                    <button id="9" class="UserInventoryButton">Places</button>
                </div>

                @if($MyProfile == true)
                <div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_HeaderPagerPanel" class="HeaderPager">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_CatalogHyperLink" href="Catalog.aspx?m=ForSale&d=All">Shop</a>&nbsp;&nbsp;&nbsp;
                        <a id="Roblox_Creator_ThisItem" href="#AssetsMenu">Create</a>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                @endif

                <div id="InventoryNoResults" style="display: none">
                    <p>{{$UserData->username}}  has not bought any catalog items for this type.</p>
                </div>
                    <table id="AssetsContent" cellspacing="0" border="0"></table>

                    <div id="UserInventory_Footer" class="FooterPager" style="display: none">
                        <span><a id="Roblox_UserInventory_PrevPage" href="#AssetsMenu" style="display: none"><span class="NavigationIndicators"><<</span> Back</a></span>

                        <span id="PageIndicatorInventory">Page <span id="InventoryActualPage">1</span> of <span id="InventoryRemainingPages">1</span></span>

                        <span><a id="Roblox_UserInventory_NextPage" href="#AssetsMenu" style="display: none">Next <span class="NavigationIndicators">>></span></a></span>
                    </div>

                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <input type="number" name="UserID" id="RobloxUserID" value="{{$UserData->id}}" readonly="true" style="display: none">
        <input type="text" name="UserEditMode" id="UserEditMode" value="{{$MyProfile == 1 ? "true" : "false"}}" readonly="true" style="display: none">
    </div>

    <script src="{{asset("js/Roblox/Web_UserInventory.js")}}"></script>
    <script src="{{asset("js/Roblox/Web_UserFavorites.js")}}"></script>
    <script src="{{ asset("js/Roblox/Web_AccordionHandler.js")}}"></script>
</div>

@endsection
