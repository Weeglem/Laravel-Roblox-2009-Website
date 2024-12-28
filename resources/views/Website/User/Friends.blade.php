@extends('Website.Templates.PageView')

@section('Content')
<div id="FriendsContainer">
    <div id="Friends">
        <h4>ROBLOX's Friends</h4>
        <div id="ctl00_cphRoblox_rbxFriendsPane_Pager1_PanelPages" align="center">
            Pages:
            <a id="ctl00_cphRoblox_rbxFriendsPane_Pager1_LinkButtonNext" href="javascript:__doPostBack(&#39;ctl00$cphRoblox$rbxFriendsPane$Pager1$LinkButtonNext&#39;,&#39;&#39;)">Next &gt;&gt;</a>
        </div>
    
        <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">
            <tbody>
                <tr>
                    <td>
                        <div class="Friend">
                            <div class="Avatar"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_hlAvatar" title="lion" href="https://web.archive.org/web/20080914025146/http://www.roblox.com/User.aspx?ID=6179" style="display:inline-block;cursor:pointer;"><img src="./ROBLOX - ROBLOX&#39;s Friends_files/Avatar-100x100-d1ce69b2256856cbdd4715c212c1d695.Png" border="0" alt="lion" blankurl="http://t6.roblox.com:80/blank-100x100.gif"></a></div>
                            <div class="Summary">
                                <span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_iOnlineStatus" src="./ROBLOX - ROBLOX&#39;s Friends_files/OnlineStatusIndicator_IsOffline.gif" alt="lion is offline (last seen at 9/30/2007 3:48:00 PM)." border="0"></span>
                                <span class="Name"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_hlFriend" href="https://web.archive.org/web/20080914025146/http://www.roblox.com/User.aspx?ID=6179">lion</a></span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
</div>
@endsection