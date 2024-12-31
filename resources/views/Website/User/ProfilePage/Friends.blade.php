<div id="FriendsPane">
    <div id="Friends">
        <h4>{{$DisplayUsername}} Friends
            <a href="https://web.archive.org/web/20080730015017/http://www.roblox.com/Friends.aspx?UserID=1">See all {{$UserData->friends_count}}</a>

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
                            <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlAvatar" title="brickmason" href="#" style="display:inline-block;cursor:pointer;">
                                <img src="{{asset("img/Placeholder/AvatarFriends.png")}}" border="0" alt="brickmason" blankurl="http://t6.roblox.com:80/blank-100x100.gif">
                            </a>
                        </div>
                        <div class="Summary">
                           <span class="OnlineStatus">
                                <img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_iOnlineStatus" src="{{asset("img/OnlineStatusIndicator_IsOffline.gif")}}" alt="brickmason is offline (last seen at 12/12/2007 4:56:27 PM)." border="0"></span>
                            <span class="Name">
                                <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlFriend" href="#">Friendname</a></span>
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
