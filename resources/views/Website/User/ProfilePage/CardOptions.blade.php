@if($MyProfile == true)
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_UpgradesHyperLink" href="My/AccountUpgrades/Manage.aspx">Upgrades</a></p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyRobux" href="My/AccountBalance.aspx">Account Balance</a></p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyInbox" href="My/Inbox.aspx">Inbox</a>&nbsp;</p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyAvatar" href="My/Character.aspx">Change Character</a></p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_Edit" href="My/Profile.aspx">Edit Profile</a></p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_View" href="#">View Profile</a></p>
    <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="My/InviteAFriend.aspx">Share ROBLOX</a></p>
    <!--BUILDER CLUB DATA-->
@else

    <!--Render card options-->
    @if(Auth::check())
        @if(Auth::id() != $UserData->id)
            <!--User Actions-->
            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="{{route("Friends_SendRequest",["UserID" => $UserData->id])}}">Send Friend Request</a></p>
            <p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="{{route("Inbox_Message",["UserID" => $UserData->id])}}">Send Message</a></p>
        @endif
    @endif


    <!--User about-->
    <p><span id="ctl00_cphRoblox_rbxUserPane_rbxPublicUser_lBlurb">{{$UserData->about}}</span></p>
@endif







