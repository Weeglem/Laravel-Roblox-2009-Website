<div id="Header">
    <div id="Banner">
        @if(Auth::check())

            <div id="Options">
                <div id="Authentication">
                    <span><span id="ctl00_lnLoginName">Logged in as {{Auth::user()->username;}} | </span>
                    <a id="ctl00_lsLoginStatus" href="{{/*route("LogoutRoblox")*/}}">Logout</a>
                </span>
                </div>
                <div id="Settings">
                    <span id="ctl00_lSettings">Age: 13+, Chat Mode: Safe</span>
                </div>
            </div>

        @else

            <div id="Options">
                <div id="Authentication">
                    <span><a href=""><span id="ctl00_lnLoginName">Login</a></span></span>
                </div>
                <div id="Settings">
                    <span id="ctl00_lSettings"></span>
                </div>
            </div>

        @endif
        <div id="Logo" style="margin: 5px 0;">
            <a id="ctl00_rbxImage_Logo" title="ROBLOX" href="" style="display:inline-block;width:267px;cursor:pointer;">
                <img src="{{asset("img/roblox_logo.png")}}" border="0" id="img" alt="ROBLOX">
            </a>
        </div>

        @if(Auth::check())
            <div id="Alerts">
                <table style="width:100%;height:100%">
                    <tbody>
                        <tr>
                            <td valign="middle">
                                <div id="ctl00_rbxAlerts_AlertSpacePanel">
                                    <div id="AlertSpace">
                                            <div id="MessageAlert">
                                                <a id="ctl00_rbxAlerts_MessageAlertIconHyperLink" class="MessageAlertIcon" href="Inbox.aspx"><img src="{{asset("img/Navbar/Message.gif")}}" style="border-width:0px;"></a>&nbsp;
                                                <a id="ctl00_rbxAlerts_MessageAlertCaptionHyperLink" class="MessageAlertCaption" href="Inbox.aspx">0 new message</a>
                                            </div>
                                            <div id="ctl00_rbxAlerts_RobuxAlertPanel">
                                                <div id="RobuxAlert">
                                                    <a id="ctl00_rbxAlerts_RobuxAlertIconHyperLink" class="RobuxAlertIcon" href="My/AccountBalance.aspx"><img src="{{asset("img/Navbar/robux.png")}}" style="border-width:0px;"></a>&nbsp;
                                                    <a id="ctl00_rbxAlerts_RobuxAlertCaptionHyperLink" class="RobuxAlertCaption" href="My/AccountBalance.aspx">0 ROBUX</a>
                                                </div>
                                            </div>
                                            <div id="ctl00_rbxAlerts_TicketsAlertPanel">
                                                <div id="TicketsAlert">
                                                    <a id="ctl00_rbxAlerts_TicketsAlertIconHyperLink" class="TicketsAlertIcon" href="My/AccountBalance.aspx">
                                                        <img src="{{asset("img/Navbar/Tickets.png")}}" style="border-width:0px;">
                                                    </a>&nbsp;
                                                    <a id="ctl00_rbxAlerts_TicketsAlertCaptionHyperLink" class="TicketsAlertCaption" href="My/AccountBalance.aspx">0 Tickets</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div id="Alerts">
                <table style="width:100%;height:100%">
                    <tbody>
                        <tr>
                            <td valign="middle">
                                <a id="ctl00_BannerAlertsLoginView_BannerAlerts_Anonymous_rbxAlerts_SignupAndPlayHyperLink" class="SignUpAndPlay" text="Sign-up and Play!" href="" style="display:inline-block;cursor:pointer;">
                                    <img src="{{asset("img/BannerPlay.png")}}" border="0" blankurl="http://t1.roblox.com:80/blank-210x40.gif">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        @endif
    </div>

    <div class="Navigation">
        <span><a id="ctl00_hlMyRoblox" class="MenuItem" href="">My ROBLOX</a></span>
        <span class="Separator">&nbsp;|&nbsp;</span>
        <span><a id="ctl00_hlGames" class="MenuItem" href="">Games</a></span>
        <span class="Separator">&nbsp;|&nbsp;</span>
        <span><a id="ctl00_hlCatalog" class="MenuItem" href="">Catalog</a></span>
        <span class="Separator">&nbsp;|&nbsp;</span>
        <span><a id="ctl00_hlBrowse" class="MenuItem" href="">Browse</a></span>
        <span class="Separator">&nbsp;|&nbsp;</span>
        <span><a id="ctl00_hlForum" class="MenuItem" href="#">Forum</a></span>
     </div>
</div>