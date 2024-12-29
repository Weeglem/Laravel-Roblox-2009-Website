<div id="UserPlacesPane">
    <div id="UserPlaces">
        @if(count($UserGames) > 0)
            <h4>Showcase</h4>
            <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion">
                <input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ShowcasePlacesAccordion_AccordionExtender_ClientState" id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion_AccordionExtender_ClientState" value="0">

                @foreach ($UserGames as $Game)
                    @php( $Game_AccessLevel = $Game->asset->config->AccessLevel())
                    <div class="AccordionHeader">{{$Game->asset->name}}</div>


                    @if($loop->first == true)
                        <div class="AccordionEnabled">
                            {{-- <div style="display:block;"> --}}
                            @else
                                <div class="AccordionDisabled">
                                    {{-- <div style="display:none;"> --}}
                            @endif

                                    <div class="Place">
                                        <div class="PlayStatus">

                                            @if($Game_AccessLevel == 0)
                                                <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_Public">
                                                <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="{{asset("img/public.png")}}" alt="Public" border="0">&nbsp;Public</span>
                                            @endif

                                            @if($Game_AccessLevel == 1)
                                                <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display:inline;">
                                                <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="{{asset("img/locked.png")}}" alt="Locked" border="0">&nbsp;Friends-only</span>
                                            @endif

                                            @if($Game_AccessLevel == 2)
                                                <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked">
                                                <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="{{asset("img/unlocked.png")}}" alt="Unlocked" border="0">&nbsp;Friends-only: You have access</span>
                                            @endif
                                        </div>
                                        <br>

                                        @if($Game_AccessLevel == 0 || $Game_AccessLevel == 2)
                                        <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_FancyButtons">
                                            {{-- VISIT ONLINE --}}
                                            <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_VisitMPButton2" style="display: inline; width: 10px;">
                                                <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$MultiplayerVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_MultiplayerVisitButtonB" class="ImageButton" src="{{asset("img/buttons/Play.png")}}" alt="Visit Online">
                                            </div>


                                            {{-- PLAY SOLO CHARACTER MODE  --}}
                                            @if($Game->game_uncopylocked == true || $MyProfile == true)
                                                <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_EditButton">
                                                    <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/BuildSolo2.png")}}" alt="Visit Solo" onclick="javascript:ROBLOX_GameLaunch_PlaySolo({{$Game->id}})">
                                                </span>
                                            @endif

                                            {{-- EDIT BUTTON ONLY APPEARS ON MY ROBLOX --}}
                                            @if($Game->game_uncopylocked == true && $MyProfile == true)
                                                <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_EditSoloButton2" style="display: inline; width: 10px;">
                                                    <input type="image" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$SoloVisitButtonB" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_SoloVisitButtonB" class="ImageButton" src="{{asset("img/buttons/EditMode2.png")}}" alt="Visit Solo" border="3" onclick="javascript:ROBLOX_GameLaunch_EditMode({{$Game->id}})">
                                                </div>
                                            @endif
                                        </div>
                                        @endif

                                        <div class="Statistics">
                                            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_lStatistics">Visited 6 times (0 last week)</span></div>

                                        <div class="Thumbnail">
                                            <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="rock1996's Place" href="" style="display:inline-block;">
                                                <img src="{{asset("img/Default/EmptyBaseBig.png")}}" border="0" alt="rock1996's Place">
                                            </a>
                                        </div>

                                        <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_pDescription">
                                            <div class="Description">
                                                <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_lDescription">{{$Game->asset->about}}</span>
                                            </div>
                                        </div>

                                        {{--https://www.youtube.com/watch?v=xffHGIQ6tFA--}}
                                        @if($MyProfile == true)
                                            <div class="Configuration">
                                                <a id="ctl00_cphRoblox_EditItemHyperLink" href="My/Item.aspx?ID=1061325">Configure this Place</a>
                                            </div>
                                            <div class="Configuration">
                                                <a id="ctl00_cphRoblox_EditItemHyperLink" href="My/Item.aspx?ID=1061325">Advertise this Place</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                        </div>
            </div>

        @else
            <p>{{$UserData->username}} does not have any Roblox places.</p>
    </div>
    @endif

    {{-- Edit place
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcaseFooter" class="PanelFooter">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ConfigureShowcaseHyperLink" href="My/Places.aspx">Manage My Places</a>
    </div>
    --}}
</div>
