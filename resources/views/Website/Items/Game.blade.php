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

                <div id="LastUpdate">Updated: 1 month ago</div>
                <div id="Favorited">Favorited: 0 times</div>
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
                <a id="ctl00_cphRoblox_FavoriteThisPlaceButton" disabled="disabled">Favorite</a>
            </div>
            <div id="ctl00_cphRoblox_PlayGames" class="PlayGames">
                <div style="text-align: center; margin: 1em 5px;">

                    <!--Locked friend-->
                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyLocked" style="display: none">
                        <img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Locked" src="{{asset("img/locked.png")}}" alt="Locked" border="0">&nbsp;Friends-only</span>

                    <!--Locked with access-->
                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none">
                        <img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Unlocked" src="{{asset("img/unlocked.png")}}" alt="Unlocked" border="0">&nbsp;Friends-only: You have access</span>


                    {{--https://www.youtube.com/watch?v=PPibM6VkI7Y --}}

                    <span id="ctl00_cphRoblox_PlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_PlaceAccessIndicator_iPublic" src="{{asset("img/public.png")}}" alt="Public" border="0">&nbsp;Public</span>

                    @if($ItemData->game_uncopylocked == 0)
                        <img id="ctl00_cphRoblox_CopyLockedIcon" src="{{asset("img/CopyLocked.png")}}" alt="CopyLocked" border="0">Copy Protection: CopyLocked
                    @else
                        <img id="ctl00_cphRoblox_CopySharedIcon" src="{{asset("img/Shared.png")}}" alt="Shared" border="0">Copy Protection: Shared
                    @endif

                </div>

            <div id="ctl00_cphRoblox_VisitButtons_ClientInstaller_Panel1" class="modalPopup" style="display: none">
        </div>

        <div id="ctl00_cphRoblox_VisitButtons_FancyButtons">
            <div id="ctl00_cphRoblox_VisitButtons_VisitMPButton2" style="display: inline; width: 10px;">
                <input type="image" name="ctl00$cphRoblox$VisitButtons$MultiplayerVisitButtonB" id="ctl00_cphRoblox_VisitButtons_MultiplayerVisitButtonB" class="ImageButton" src="{{asset("img/buttons/Play.png")}}" alt="Visit Online" onclick="return Roblox.Client.WaitForRoblox(function() { window.location = &#39;/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d515406&#39; });" border="3">
            </div>


            @if($ItemData->game_uncopylocked)

                <div id="ctl00_cphRoblox_VisitButtons_VisitButton2" style="display: inline; width: 10px;">
                    <input type="image" name="ctl00$cphRoblox$VisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_VisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/PlaySolo.png")}}" alt="Visit Solo" onclick="javascript:ROBLOX_GameLaunch_PlaySolo({{$ItemData->id}})" border="3">
                </div>

            @endif
        </div>
    </div>

    @if($EditMode)
    <div id="Configuration">
        <a href="">Configure this Game</a>
    </div>
    @endif

    <div style="clear: both;"></div>


</div>

<div style="margin: 10px; width: 703px;">
    <div class="ajax__tab_xp" id="ctl00_cphRoblox_TabbedInfo">
        <div id="ctl00_cphRoblox_TabbedInfo_header">
            <span id="__tab_ctl00_cphRoblox_TabbedInfo_GamesTab"><h3>Games</h3></span>
            <span id="__tab_ctl00_cphRoblox_TabbedInfo_CommentaryTab"><h3>Commentary</h3></span>
        </div>

        <div id="ctl00_cphRoblox_TabbedInfo_body" style="    border: 1px solid #999;
    /* border-top: 0; */
    font-size: 10pt;
    padding: 8px;
    background: white;">
    <!--Move to CSS-->


            <!--Running Servers-->
            <div id="ctl00_cphRoblox_TabbedInfo_GamesTab" style="display: block">
                {{--
                <div id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesUpdatePanel">

                    <!--No servers found-->
                    <p style="text-align: center;">There are no running games for this place.</p>
                    {{--
                    <table>
                        <tbody>
                            <tr>
                                <td valign="top" width="150px">
                                    <p>6 of 8 players max<br><br>&nbsp;</p><br>
                                </td>
                                <td valign="top">
                                    <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesListView_ctrl0_ctl00_PlayersRepeater_ctl00_PlayerImage" disabled="disabled" title="cerester" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?id=882186" style="display:inline-block;"><img src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/de73c7113caa65b17b98e5238106e5de" border="0" alt="cerester"></a>
                                    <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesListView_ctrl0_ctl00_PlayersRepeater_ctl01_PlayerImage" disabled="disabled" title="GreenGhost21" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?id=716311" style="display:inline-block;"><img src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/556e630a8995a3e907b7ba242bf5e430" border="0" alt="GreenGhost21"></a>
                                    <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesListView_ctrl0_ctl00_PlayersRepeater_ctl02_PlayerImage" disabled="disabled" title="Shifticus" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?id=892112" style="display:inline-block;"><img src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/55c49222c8419ac851e8d0a4c44acb0b" border="0" alt="Shifticus"></a>
                                    <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesListView_ctrl0_ctl00_PlayersRepeater_ctl03_PlayerImage" disabled="disabled" title="crusher441" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?id=480833" style="display:inline-block;"><img src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/c9ad361dc5c6e657546446ce6bc198a2" border="0" alt="crusher441"></a>
                                    <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesListView_ctrl0_ctl00_PlayersRepeater_ctl04_PlayerImage" disabled="disabled" title="halo3plyr681" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?id=793584" style="display:inline-block;"><img src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/ca82e044e39c83b7acbc1df9c4ab05f6" border="0" alt="halo3plyr681"></a>
                                    <br>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <!--Paginator -->
                    <div class="FooterPager" style="text-align: center;">
                        <span id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
                    </div>

                    <!--Refresh part-->
                    <div class="RefreshRunningGames">
                        <input type="submit" name="ctl00$cphRoblox$TabbedInfo$GamesTab$RefreshRunningGamesButton" value="Refresh" id="ctl00_cphRoblox_TabbedInfo_GamesTab_RefreshRunningGamesButton" class="Button">
                    </div>

                </div>
            </div>
            --}}

            <!--Comentarios-->

            <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab">
                <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsUpdatePanel">
                    <div class="CommentsContainer">

                        <h3>Comments ({{$ItemComments->total()}})</h3>

                        @if($ItemComments->count() > 0)

                            <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerPanel" class="HeaderPager">
                                    @if($ItemComments->currentPage() > 1)
                                        <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Back" href="{{$ItemComments->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                                    @endif

                                    <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page {{$ItemComments->currentPage()}} of {{$ItemComments->lastPage()}}</span>

                                    @if($ItemComments->hasMorePages())
                                        <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="{{$ItemComments->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                                    @endif
                            </div>

                            <div class="Comments">

                                @foreach($ItemComments as $Comment)
                                    @if($loop->index % 2 == 0)
                                        <div class="Comment">
                                    @else
                                        <div class="AlternateComment">
                                    @endif

                                        <div class="Commenter">
                                            <div class="Avatar">
                                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_AvatarImage" title="alexwalker332" href="https://web.archive.org/web/20080901045901/http://www.roblox.com/User.aspx?ID=293219" style="display:inline-block;cursor:pointer;">
                                                    <img src="{{asset("img/Placeholder/AvatarCommentInGame.png")}}" border="0" alt="alexwalker332" blankurl="http://t6.roblox.com:80/blank-64x64.gif">
                                                </a>
                                            </div>
                                            </div>
                                            <div class="Post">
                                                <div class="Audit">Posted 12 minutes ago by
                                                    <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_UsernameHyperLink" href="{{$Comment->user->id}}">{{$Comment->user->username}}</a>
                                                </div>
                                                <!--Move to CSS-->
                                                <div class="Content" style="width: 560px;">{{$Comment->comment}}</div>
                                            </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                @endforeach
                            </div>

                            <!--Comment paginate-->
                            <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerPanel" class="FooterPager">
                                @if($ItemComments->currentPage() > 1)
                                    <!--Back page-->
                                    <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Back" href="{{$ItemComments->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                                @endif

                                <!--Comment paginate-->
                                <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page {{$ItemComments->currentPage()}} of {{$ItemComments->lastPage()}}</span>

                                @if($ItemComments->hasMorePages())
                                    <!--Next page-->
                                    <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="{{$ItemComments->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                                @endif
                            </div>
                        @endif

                        <div id="ctl00_cphRoblox_CommentsPane_CommentsUpdatePanel">

                            <div class="CommentsContainer">
                                @if($ItemConfig->comments_allowed == 1)
                                <form id="ctl00_cphRoblox_CommentsPane_PostAComment" class="PostAComment" method="post" action="{{route("AddAsset_Comment",["id"=> $ItemData->id])}}">
                                    <h3>Comment on this Game</h3>
                                    <div class="CommentText">
                                        <textarea name="message" rows="5" cols="20" id="ctl00_cphRoblox_CommentsPane_NewCommentTextBox" class="MultilineTextBox"></textarea></div>
                                    <div class="Buttons"><button class="Button" type="submit">Post Comment</button></div>
                                    @csrf
                                    @method("post")
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
</div>

</div>

<div class="Ads_WideSkyscraper">
    <script type="text/javascript">GA_googleFillSlot("Roblox_Item_Right_160x600");</script>
    <script src="./Builderman&#39;s Hotel - Newly Remodeled Check It Out by builderman - ROBLOX Places_files/ads(1)"></script>
</div>

<div style="clear: both;"></div>

<div id="ctl00_cphRoblox_ItemPurchasePopupPanel" class="modalPopup" style="display: none">
    <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel"></div>
</div>

<input type="hidden" name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1">
<input type="hidden" name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2">
<input type="hidden" name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3">
</div>

@endsection
