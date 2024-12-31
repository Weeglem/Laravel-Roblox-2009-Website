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
                        @include("Website.User.ProfilePage.CardOptions")

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--Badges-->
        {{--@include("Website.User.ProfilePage.Badges")--}}

        <!--UserStats-->
        @include("Website.User.ProfilePage.Stats")
    </div>

    <div id="RightBank">
        <!--Showcase-->
         @include("Website.User.ProfilePage.PlacesShowcase")

        <!--Friends-->
        @include("Website.User.ProfilePage.Friends")

        <!--Faves-->
        @include("Website.User.ProfilePage.Favorites")
    </div>
</div>

{{--My friends requests--}}
@if($MyProfile == true)
     @include("Website.User.ProfilePage.FriendsRequests")
@endif

{{--My Assets--}}
@include("Website.User.ProfilePage.AssetsInventory")

<input type="number" name="UserID" id="RobloxUserID" value="{{$UserData->id}}" readonly="true" style="display: none">
<input type="text" name="UserEditMode" id="UserEditMode" value="{{$MyProfile == 1 ? "true" : "false"}}" readonly="true" style="display: none">
<script src="{{asset("js/Roblox/Web_UserInventory.js")}}"></script>
<script src="{{asset("js/Roblox/Web_UserFavorites.js")}}"></script>
<script src="{{ asset("js/Roblox/Web_AccordionHandler.js")}}"></script>


@endsection
