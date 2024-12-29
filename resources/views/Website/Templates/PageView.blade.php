<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROBLOX: A FREE Virtual World-Building Game with Avatar Chat, 3D Environments, and Physics</title>
    <link id="ctl00_Favicon" rel="Shortcut Icon" type="image/ico" href="../favicon.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="ROBLOX Corporation" />
    <meta name="description" content="ROBLOX is SAFE for kids! ROBLOX is a FREE casual virtual world with fully constructible/desctructible 3D environments and immersive physics. Build, battle, chat, or just hang out." />
    <meta name="keywords" content="game, video game, building game, construction game, online game, LEGO game, LEGO, MMO, MMORPG, rowblocks, rowbloks, robloks, roblocs, roblok" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/AllCSS.css")}}">
    <link rel="stylesheet" href="{{ asset("css/NETajax.css")}}">


    <title>Document</title>
</head>
<body>

    @stack("Extra_Views")
    <div id="Container">
        @include("Website.Templates.Header")
        <div id="Body">
            @yield('Content')
            @include("Website.Templates.Footer")
        </div>
    </div>

    {{--Required scripts --}}
    <script src="{{asset("js/Web_ASP_CardHandler.js")}}"></script>

    {{-- Pages exclusives --}}
    @stack("Extra_Scripts")

    <!--Debug-->
    <script src="{{asset("js/Roblox/Web_GameLauncher.js")}}"></script>
    <script src="{{asset("js/Web_Catalog_FavoriteController.js")}}"></script>


</body>
</html>
