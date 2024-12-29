<div id="UserBadgesPane">
    <div id="UserBadges">

        <h4><a id="ctl00_cphRoblox_rbxUserBadgesPane_hlHeader" href="#">Badges</a></h4>
        <table id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges" cellspacing="0" align="Center" border="0">
            @if(count($UserBadges) > 0)
                <tbody>
                {{--Draw Badge Cut line--}}
                @if($UserBadge_Actual % 4 == 0)
                    </tr><tr>
                    @endif

                    {{--Draw Badges--}}
                    @foreach ($UserBadges as $Badge)

                        {{--Group Items hack--}}
                        @if($loop->index % 4 == 0)
                </tr><tr>
                    @endif


                    <td>
                        <!--Single badge-->
                        <div class="Badge">
                            <!--Image-->
                            <div class="BadgeImage">
                                <a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_hlHeader" href="#">
                                    <img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_iBadge" src="#" alt="{{$Badge->badges->name}}" height="75" border="0">
                                </a>
                            </div>
                            <!--Name-->
                            <div class="BadgeLabel">
                                <a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_HyperLink1" href="#">{{$Badge->badges->name}}</a>
                            </div>
                        </div>
                    </td>

                {{--ADD TO Cut line--}}
                @php
                    $UserBadge_Actual++
                @endphp

                @endforeach
                </tbody>
            @else
                <p>{{$UserData->username}} does not have any  Roblox badges.</p>
            @endif
        </table>
    </div>
</div>
