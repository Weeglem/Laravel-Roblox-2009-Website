@extends('Website.Templates.PageView')

@section('Content')
<form id="ConfigurePlaceContainer" method="POST" action="{{ route("editItem_post",["id" => $ItemData->id ]) }}">
    <h2>Configure Place</h2>

    <div id="PlaceName">
        <span class="Label">Name:</span><br>
        <input name="Name" type="text" value="{{$ItemData->name}}" maxlength="50" class="TextBox">
        @error("Name")
            <span style="color:Red;">{{$message}}</span>
        @enderror

    </div>

    <div id="PlaceThumbnail">
        <a disabled="disabled" supportsalphachannel="False" title="User's Place" style="display:inline-block;height:230px;width:420px;">
            <img src="https://web.archive.org/web/20070821050243if_/http://t2.roblox.com/unavail-420x230.Png" border="0" id="img" alt="User's Place">
        </a>
    </div>

    <div id="PlaceDescription">
        <span class="Label">Description:</span><br>
        <textarea name="Description" rows="2" cols="20" class="MultilineTextBox" style="height:150px;">{{$ItemData->about}}</textarea>
        @error("Description")
            <span style="color:Red;">{{$message}}</span>
        @enderror
    </div>

    <div id="PlaceAccess">
        <fieldset title="Access">
            <legend>Access</legend>
            <div class="Suggestion">
                This determines who can access your place.
            </div>
            <div class="PlaceAccessRow">
                <!--Public-->
                <img src="{{asset("img/public.png")}}" alt="Public" style="border-width:0px;">
                <input type="radio" @checked($ItemConfig->is_friends_only == 0)
                name="PlaceAccess" value="PublicAccess">
                <label for="ctl00_cphRoblox_rbPublicAccess">Public: Anybody can visit my place</label><br>

                <!--Friends Only-->
                <img src="{{asset("img/locked.png")}}" alt="Friends-only" style="border-width:0px;">
                <input type="radio" @checked($ItemConfig->is_friends_only == 1) name="PlaceAccess" value="PrivateAccess">
                <label for="ctl00_cphRoblox_rbPrivateAccess">Friends: Only my friends can visit my place</label>
                @error("PlaceAccess")
                <span style="color:Red;">{{$message}}</span>
                @enderror
            </div>
        </fieldset>
    </div>

    <div id="PlaceCopyProtection">
        <fieldset title="Copy Protection">
            <legend>Copy Protection</legend>
            <div class="Suggestion">
                Checking this will prevent your place from being copied but will also make it available to others only in online mode.
            </div>
            <div class="CopyProtectionRow">
                <input type="checkbox" name="IsCopyProtected" @checked($ItemConfig->is_copylocked == 1)>
                <label for="ctl00_cphRoblox_cbIsCopyProtected">Copy-Lock my place</label>
            </div>
            @error("IsCopyProtected")
                <span style="color:Red;">{{$message}}</span>
                @enderror
        </fieldset>
    </div>

    <div id="PlaceReset">
        <div class="popupControl" id="ResetPlacesPopUp" style="width:400px;">
            <div>
                <div align="right">
                    <a class="PopUpOption" id="ClosePopUp" onclick="javascript:ShowPopUp(false)">[ close window ]</a>
                </div>
                <div class="PopUpInstruction">To reset your place, click an image below:</div>
                <table cellspacing="0" cellpadding="10" align="Center" border="0" style="border-collapse:collapse;">
                    <tbody>
                        <tr>
                            <td align="center" valign="middle" style="color:#003399;background-color:White;">
                                <a supportsalphachannel="false" title="Happy Home in Robloxia" onclick="" style="display:inline-block;height:70px;width:120px;cursor:pointer;">
                                    <img src="http://t6.roblox.com:80/Place-120x70-a2450b0aa54744d7ab199b4ee96f1fc5.Png" border="0" id="img" alt="Happy Home in Robloxia"></a><br>
                                <span>Happy Home in Robloxia</span>
                            </td>
                            <td align="center" valign="middle" style="color:#003399;background-color:White;">
                                <a supportsalphachannel="false" title="Starting BrickBattle Map" onclick="" style="display:inline-block;height:70px;width:120px;cursor:pointer;">
                                    <img src="http://t4.roblox.com:80/Place-120x70-d573a1bb3ee3bc14f535026e8c234671.Png" border="0" id="img" alt="Starting BrickBattle Map"></a><br>
                                <span>Starting BrickBattle Map</span>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" style="color:#003399;background-color:White;">
                                <a supportsalphachannel="false" title="Empty Baseplate" onclick="" style="display:inline-block;height:70px;width:120px;cursor:pointer;">
                                    <img src="http://t1.roblox.com:80/Place-120x70-a67675f3c46d54fa166edaf4e2e8d6e2.Png" border="0" id="img" alt="Empty Baseplate">
                                </a><br>
                                <span>Empty Baseplate</span>
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <fieldset title="Reset Place">
            <legend>Reset Place</legend>
            <div class="Suggestion">Only do this if you want to reset your place to one of our starting templates.  This will cause you to lose any changes you have made and cannot be un-done.</div>
            <div class="ResetPlaceRow">
                <div class="Button" style="width:80px;" onclick="javascript:ShowPopUp(true)">Reset Place</div>
            </div>
        </fieldset>
    </div>

    <div class="Buttons">
        <button class="Button" type="submit">Update</button> &nbsp;
        <a class="Button" href="">Cancel</a>
    </div>

    @csrf
    @method("post")
</form>
<script>
    function ShowPopUp(ShowPopUp)
    {
        document.getElementById("ResetPlacesPopUp").style.visibility = ShowPopUp == true ? "visible" : "hidden";
    }

</script>
@endsection
