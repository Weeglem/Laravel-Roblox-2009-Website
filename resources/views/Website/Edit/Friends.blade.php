@extends('Website.Templates.PageView')

@section('Content')
<div id="FriendsContainer">
    <div id="Friends">
        <h4>My Friends ({{$UserFriends->total()}})</h4>
        <div id="ctl00_cphRoblox_rbxEditFriendsPane_Pager1_PanelPages" style="text-align:center;">
            Pages:
        </div>
    
        <!--https://laravel.com/docs/5.3/blade-->
        <table id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
            <tbody>
                @foreach ($UserFriends as $Friend)
                {{var_dump($loop->iteration % 2 == 0)}}
                
                @if($loop->iteration % 2 != 0)
                <tr>
                @endif
                    <td>
                        <div class="Friend" onmouseover="this.style.borderStyle='outset';this.style.margin='6px'" onmouseout="this.style.borderStyle='none';this.style.margin='10px'">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_hlAvatar" title="builderman" href="{{route("Users_Profile_Page",["ID" => $Friend->id])}}" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img src="http://t0.roblox.com:80/a1ce482a65842b7503770f9f26ac2e22" border="0" alt="builderman"></a>
                            </div>
                            <div class="Summary">
                                <span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_iOnlineStatus" src="{{asset("img/OnlineStatusIndicator_IsOffline.gif")}}" alt="builderman is offline (last seen at 3/7/2008 2:40:35 PM)." style="border-width:0px;"></span>
                                <span class="Name"><a id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_hlFriend" href="{{route("Users_Profile_Page",["ID" => $Friend->id])}}">{{$Friend->username}}</a></span>
                            </div>
                            <div class="Options">
                                <input type="submit" name="ctl00$cphRoblox$rbxEditFriendsPane$dlFriends$ctl00$bDelete" value="Delete" id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_bDelete"></div>
                        </div>
                    </td>
                @if($loop->iteration % 2 == 0)
                    <tr>
                @endif

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection