@extends('Website.Templates.PageView')
@php
    $DisplayUsername = substr($UserData->username,-1) == "s" ? $UserData->username."' " : $UserData->username."'s ";
@endphp

@section('Content')
<div id="FriendsContainer">
    <div id="Friends">
        <h4>{{$DisplayUsername}} Friends ({{$UserFriend->total()}})</h4>

        @if(count($UserFriend) > 0)
        <div id="ctl00_cphRoblox_rbxFriendsPane_Pager1_PanelPages" align="center">
            @if($UserFriend->currentPage() > 1 || $UserFriend->hasMorePages())
                Pages:
            @endif

            @if($UserFriend->currentPage() > 1)
                <a id="ctl00_cphRoblox_rbxFriendsPane_Pager1_LinkButtonNext" href="{{$UserFriend->previousPageUrl()}}"><< Back</a>
            @endif

            @if($UserFriend->hasMorePages())
                <a id="ctl00_cphRoblox_rbxFriendsPane_Pager1_LinkButtonNext" href="{{$UserFriend->nextPageUrl()}}">Next &gt;&gt;</a>
            @endif
        </div>
        @endif

        <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">

            @if($UserFriend->total() > 0)

                {{--Draw all friends--}}
                @if(count($UserFriend) > 0)
                    @foreach($UserFriend as $Friend)
                    @if($loop->index % 6 == 0)
                        </tr></tr>
                     @endif
                    <td>
                        <div class="Friend">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_hlAvatar" title="lion" href="https://web.archive.org/web/20080914025146/http://www.roblox.com/User.aspx?ID=6179" style="display:inline-block;cursor:pointer;">
                                    <img src="{{asset("img/Placeholder/AvatarFriends.png")}}" border="0" alt="lion" blankurl="http://t6.roblox.com:80/blank-100x100.gif"></a>
                            </div>
                            <div class="Summary">
                                <span class="OnlineStatus">
                                    <img id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_iOnlineStatus" src="{{asset("img/OnlineStatusIndicator_IsOffline.gif")}}"
                                         alt="{{$Friend->user->username}} is offline (last seen at 9/30/2007 3:48:00 PM)." border="0">
                                </span>
                                <span class="Name">
                                    <a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl26_hlFriend" href="https://web.archive.org/web/20080914025146/http://www.roblox.com/User.aspx?ID=6179">
                                        {{$Friend->user->id}}{{$Friend->user->username}}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </td>
              @endforeach
                @else
                {{--No results found--}}
                    <h3 style="text-align: center">No results found for this page</h3>
                @endif

            @else
                {{--No friends found--}}
                <h3 style="text-align: center">{{$UserData->username}} doesn't has any Roblox friends</h3>
            @endif

        </table>
    </div>
</div>
@endsection
