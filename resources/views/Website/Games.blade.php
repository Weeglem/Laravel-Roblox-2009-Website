@extends('Website.Templates.PageView')

@section('Content')
<div id="GamesContainer">    
    <div id="ctl00_cphRoblox_rbxGames_GamesContainerPanel">
        
        <div class="DisplayFilters">
            <h2>Games&nbsp;<a id="ctl00_cphRoblox_rbxGames_hlNewsFeed" href="https://web.archive.org/web/20080430222234/http://www.roblox.com/Games.aspx?feed=rss"><img src="{{asset("img/feed-icon-14x14.png")}}" alt="RSS" border="0"></a></h2>
            <div id="BrowseMode">
                <h4>Browse</h4>
                <ul>
                    <li><img id="ctl00_cphRoblox_rbxGames_MostPopularBullet" class="GamesBullet" src="{{asset("img/games_bullet.png")}}" alt="Bullet" border="0"><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Games.aspx?m=MostPopular&amp;t=Now"><b>Most Popular</b></a></li>
                    <li><a id="ctl00_cphRoblox_rbxGames_hlTopFavorites" href="Games.aspx?m=TopFavorites&amp;t=AllTime">Top Favorites</a></li>
                    <li><a id="ctl00_cphRoblox_rbxGames_hlRecentlyUpdated" href="Games.aspx?m=RecentlyUpdated">Recently Updated</a></li>
                    <li><a id="ctl00_cphRoblox_rbxGames_hlFeatured" href="User.aspx?id=1">Featured Games</a></li>
                </ul>
            </div>
            <div id="ctl00_cphRoblox_rbxGames_pTimespan">
            
                <div id="Timespan">
                    <h4>Time</h4>
                    <ul>
                        <li><img id="ctl00_cphRoblox_rbxGames_TimespanNowBullet" class="GamesBullet" src="{{asset("img/games_bullet.png")}}" alt="Bullet" border="0"><a id="ctl00_cphRoblox_rbxGames_hlTimespanNow" href="Games.aspx?m=MostPopular&amp;t=Now"><b>Now</b></a></li>
                        
                        <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastDay" href="Games.aspx?m=MostPopular&amp;t=PastDay">Past Day</a></li>
                        <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastWeek" href="Games.aspx?m=MostPopular&amp;t=PastWeek">Past Week</a></li>
                        <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastMonth" href="Games.aspx?m=MostPopular&amp;t=PastMonth">Past Month</a></li>
                        <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanAllTime" href="Games.aspx?m=MostPopular&amp;t=AllTime">All-time</a></li>
                    </ul>
                </div>
            
            </div>
        </div>

        <div id="Games">
            <span id="ctl00_cphRoblox_rbxGames_lGamesDisplaySet" class="GamesDisplaySet">Most Popular (Now)</span>
            <div id="ctl00_cphRoblox_rbxGames_HeaderPagerPanel" class="HeaderPager">


                @if($Found_Games->currentPage() > 1)
                    <a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="{{$Found_Games->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                @endif
                
                
                <span id="ctl00_cphRoblox_rbxGames_HeaderPagerLabel">Page {{$Found_Games->currentPage()}} of {{$Found_Games->lastPage()}}</span>
                
                @if($Found_Games->hasMorePages())
                    <a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="{{$Found_Games->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                @endif
            </div>
            <table id="ctl00_cphRoblox_rbxGames_dlGames" cellspacing="0" align="Center" border="0" width="550">
            <tbody>


                @for($i = 0; $i < count($Found_Games); $i++)
                
                @if($i % 3 == 0)
                    <tr>
                @endif


                    <td class="Game" valign="top">
                        <div style="padding-bottom:5px">
                            <div class="GameThumbnail">
                                <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_ciGame" title="" href="{{route("Item_Page",["ID" => $Found_Games[$i]->id])}}" style="display:inline-block;cursor:pointer;">
                                    <img src="https://web.archive.org/web/20080430222234im_/http://t4.roblox.com:80/broken-160x100.Png" border="0" alt="build on your own island(1 tx or r$ Admin shirt!) " blankurl="http://t0.roblox.com:80/blank-160x100.gif">
                                </a>
                            </div>
                            <div class="GameDetails">
                                <div class="GameName">
                                    <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_hlGameName" href="{{route("Item_Page",["ID" => $Found_Games[$i]->id])}}">{{$Found_Games[$i]->id}}</a>
                                </div>
                                <div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail">33 minutes ago</span></div>
                                <div class="GameCreator">
                                    <span class="Label">Creator:</span> 
                                    <span class="Detail">
                                    <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_hlGameCreator" href="{{route("Users_Profile_Page",["ID" => $Found_Games[$i]->user_id])}}">{{$Found_Games[$i]->user->username}}</a>
                                    </span>
                                </div>
                                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail">{{$Found_Games[$i]->saved}} times</span></div>
                                <div class="GamePlays"><span class="Label">Played:</span> <span class="Detail">0 times today</span></div>
                                <div id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_pGameCurrentPlayers">
                                    <div class="GameCurrentPlayers"><span class="DetailHighlighted">0 players online</span></div>
                                </div>
                            </div>
                        </div>
                    </td> 

                @endfor

                @if($i % 3 != 0)
                </tr>
                @endif
            </tbody>
        </table>
            <div id="ctl00_cphRoblox_rbxGames_FooterPagerPanel" class="HeaderPager">
                @if($Found_Games->currentPage() > 1)
                    <a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="{{$Found_Games->previousPageUrl()}}"><span class="NavigationIndicators"><<</span> Back </a>
                @endif
                
                
                <span id="ctl00_cphRoblox_rbxGames_HeaderPagerLabel">Page {{$Found_Games->currentPage()}} of {{$Found_Games->lastPage()}}</span>
                
                @if($Found_Games->hasMorePages())
                    <a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="{{$Found_Games->nextPageUrl()}}">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                @endif
            </div>
        </div>
    
    </div>
            
    <div class="Ads_WideSkyscraper">
        <script type="text/javascript"><!--
            google_ad_client = "pub-2247123265392502";
            /* Old Games Side Banner */
            google_ad_slot = "7010215018";
            google_ad_width = 160;
            google_ad_height = 600;
            //-->
        </script>
        <script type="text/javascript" src="https://web.archive.org/web/20080430222234js_/http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script><iframe name="google_ads_frame" width="160" height="600" frameborder="0" src="https://web.archive.org/web/20080430213403/http://pagead2.googlesyndication.com/pagead/ads?client=ca-pub-2247123265392502&amp;dt=1209594156200&amp;lmt=1733635414&amp;prev_slotnames=8001698703&amp;output=html&amp;slotname=7010215018&amp;correlator=1209594156187&amp;url=http%3A%2F%2Fwww.roblox.com%2FGames.aspx&amp;frm=0&amp;cc=20&amp;ga_vid=2682422102640574000.1209594156&amp;ga_sid=1209594156&amp;ga_hid=596965104&amp;flash=32.0.0&amp;u_h=864&amp;u_w=1536&amp;u_ah=816&amp;u_aw=1536&amp;u_cd=24&amp;u_his=5&amp;u_nplug=6&amp;u_nmime=6" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" data-ruffle-polyfilled=""></iframe>
    </div>
    
            <div style="clear: both;"></div>
</div>
@endsection