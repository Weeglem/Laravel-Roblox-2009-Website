@extends('Website.Templates.PageView')

@section('Content')
    <div id="SplashContainer">
        <div id="SignInPane">

            <div id="LoginViewContainer">

                <form id="LoginView" action="{{route("loginPage_Post")}}">

                </form>

            </div>

            <br>

            <div id="Figure">
                <a id="ctl00_cphRoblox_LoginView1_ImageFigure" disabled="disabled" title="Figure" onclick="return false" style="display:inline-block;">
                    <img src="{{asset("img/Landing/NewFrontPageGuy.png")}}" border="0" alt="Figure" blankurl="http://t1.roblox.com:80/blank-115x130.gif"></a>
            </div>

        </div>



        <div id="RobloxAtAGlance">
            <h2>ROBLOX Virtual Playworld</h2>
            <h3>ROBLOX is Free!</h3>
            <ul id="ThingsToDo">
                <li id="Point1">
                    <h3>Build your personal Place</h3>
                    <div>Create buildings, vehicles, scenery, and traps with thousands of virtual bricks.</div>
                </li>
                <li id="Point2">
                    <h3>Meet new friends online</h3>
                    <div>Visit your friend's place, chat in 3D, and build together.</div>
                </li>
                <li id="Point3">
                    <h3>Battle in the Brick Arenas</h3>
                    <div>Play with the slingshot, rocket, or other brick battle tools.  Be careful not to get "bloxxed".</div>
                </li>
            </ul>
            <div id="Showcase" onload="MM_CheckFlashVersion('8,0,0,0','Content on this page is awesome and requires a newer version of Macromedia Flash Player. Do you want to download it now?');">


                <div id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_NewPlayer">

                    <!--
                    <object width="400" height="326" data="https://web.archive.org/web/20081113124948oe_/https://www.youtube.com/v/oDVAjvNeGA8&amp;hl=en&amp;fs=1&amp;rel=0&amp;border=1">
                        <param name="movie" value="https://www.youtube.com/v/oDVAjvNeGA8&amp;hl=en&amp;fs=1&amp;rel=0&amp;border=1">
                        <param name="allowFullScreen" value="true">
                        <embed src="https://web.archive.org/web/20081113124948oe_/https://www.youtube.com/v/oDVAjvNeGA8&amp;hl=en&amp;fs=1&amp;rel=0&amp;autoplay=1&amp;ap=%2526fmt%3D18" type="application/x-shockwave-flash" allowfullscreen="true" width="380" height="336">
                    </object>

                    -->

                    <iframe width="400" height="326" src="https://www.youtube.com/embed/oDVAjvNeGA8?si=dePazIK9MeAZo8qC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                </div>
            </div>
            <div id="Install">
                <div id="CompatibilityNote">Works with your<br>Windows PC!</div>
                <div id="DownloadAndPlay">
                    <a id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlDownloadAndPlay" href="Games.aspx">
                        <img src="{{asset("img/Landing/PlayNowRedBlinker.gif")}}" alt="FREE - Download and Play!" border="0"></a></div>
            </div>

            <div id="ForParents">
                <a id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlKidSafe" title="ROBLOX is kid-safe!" href="Parents.aspx" style="display:inline-block;">
                    <img title="ROBLOX is kid-safe!" src="{{asset("img/Landing/COPPASeal-125x125.jpg")}}" border="0"></a>
            </div>
            <div id="PrivPolicy" style="font-size:large;">
                <a id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlPrivacyPolicy" href="info/Privacy.aspx" style="display:inline-block;">Privacy Policy</a>
            </div>
        </div>

        <div id="ctl00_cphRoblox_CoolPlaces_FlashContent">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="https://web.archive.org/web/20081113124948oe_/http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="900" height="100" id="CoolPlaces" align="middle"><param name="movie" value="images/CoolPlaces.swf?place1=3498035&amp;place2=3075297&amp;place3=527440&amp;place4=3196550&amp;place5=483519&amp;bounce=true&amp;subdomain=http://www.roblox.com"><ruffle-embed src="/web/20081113124948mp_/http://www.roblox.com/images/CoolPlaces.swf?place1=3498035&amp;place2=3075297&amp;place3=527440&amp;place4=3196550&amp;place5=483519&amp;bounce=true&amp;subdomain=http://www.roblox.com" width="900" height="100" name="CoolPlaces" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></ruffle-embed> </object></div>
    </div>
    <div style="clear:both"></div>
@endsection
