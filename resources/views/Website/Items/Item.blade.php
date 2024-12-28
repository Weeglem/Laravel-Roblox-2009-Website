@extends('Website.Templates.PageView')

@section('Content')

<div id="ItemContainer" style="width: 725px; margin:0 auto; border:1px solid black;">
    <h2>{{$ItemData->name}}</h2>
    <div id="Item" style="width: auto; float:none; padding:10px; border:none;">
        <div id="Thumbnail">
            <a id="ctl00_cphRoblox_AssetThumbnailImage" title="Im with stupid shirt" onclick="javascript:__doPostBack('ctl00$cphRoblox$AssetThumbnailImage','')" style="display:inline-block;height:250px;width:250px;cursor:pointer;"><img src="http://t7.roblox.com:80/Shirt-250x250-2cc79d725bc13e25bcbb337506062131.Png" border="0" id="img" alt="Im with stupid shirt"></a>
        </div>
        <div id="Summary">
            <h3>ROBLOX {{ucfirst($ItemData->type)}}</h3>

            @if($ItemConfig->on_sale == 1)

                @if($ItemConfig->price_free == 1)

                    {{-- Render free Item Button --}}
                    <div id="ctl00_cphRoblox_PublicDomainPurchasePanel">
                    <div id="PublicDomainPurchase">
                        <div id="PricePublicDomain">Free</div>
                        <div id="BuyForFree">
                            <a id="ctl00_cphRoblox_PurchaseWithTicketsButton" class="Button" href="#">Take one</a>
                        </div>
                    </div>
                </div>

                @else

                    {{-- Render Buy buttons  --}}

                    @if($ItemConfig->price_robux > 0)
                        <div id="ctl00_cphRoblox_RobuxPurchasePanel">
                    <div id="RobuxPurchase">
                        <div id="PriceInRobux">R$: {{$ItemConfig->price_robux}}</div>
                        <div id="BuyWithRobux">
                            <a id="ctl00_cphRoblox_PurchaseWithRobuxButton" class="Button" href="#">Buy with R$</a>
                        </div>
                    </div>
                </div>
                    @endif

                    @if($ItemConfig->price_ticket > 0)
                        <div id="ctl00_cphRoblox_TicketsPurchasePanel">
                    <div id="TicketsPurchase">
                        <div id="PriceInTickets">Tx: {{$ItemConfig->price_ticket}}</div>
                        <div id="BuyWithTickets">
                            <a id="ctl00_cphRoblox_PurchaseWithTicketsButton" class="Button" href="#">Buy with Tx</a>
                        </div>
                    </div>
                </div>
                    @endif

                @endif

            @endif

            <div id="Creator">
                <div class="Avatar">
                    <a id="ctl00_cphRoblox_AvatarImage" title="clockwork" href="/web/20080805100901/http://www.roblox.com/User.aspx?ID=19358" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080805100901im_/http://t7.roblox.com:80/09656fe0be8b334427dc51c29d4752ae" border="0" alt="clockwork" blankurl="http://t6.roblox.com:80/blank-100x100.gif"></a>
                </div>
                Created by: <a id="ctl00_cphRoblox_CreatorHyperLink" href="#">{{ $ItemOwner->username }}</a>
            </div>
            <div id="LastUpdate">Updated: 3 days ago</div>
            <div id="FavoritedLabel">Favorited: 6,444 times</div>
            <div id="ctl00_cphRoblox_DescriptionPanel">
                <div id="DescriptionLabel">Description:</div>
                <div id="Description">{{$ItemData->about}}</div>
            </div>
            <p></p>

        @if(!$EditMode)
        <div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
            <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/AssetVersion.aspx?ID=295070&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d1294770"><img src="{{asset("img/abuse.png")}}" alt="Report Abuse" style="border-width:0px;"></a></span>
            <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/AssetVersion.aspx?ID=295070&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d1294770">Report Abuse</a></span>
        </div>
        @endif

        <p></p>
    </div>

    <!--User settings for item-->

    @if($EditMode)
    <div id="Configuration">
        <a>Configure this {{ucfirst($ItemData->type)}}</a>
    </div>
    @endif

    <!--END User settings for item-->

    <div style="clear: both;"></div>
    <div id="ctl00_cphRoblox_CommentsPane_CommentsUpdatePanel">

        <div class="CommentsContainer">
            @if($ItemConfig->comments_allowed == 1)
                <form id="ctl00_cphRoblox_CommentsPane_PostAComment" class="PostAComment" method="post" action="{{route("AddAsset_Comment",["id"=> $ItemData->id])}}">
                    <h3>Comment on this {{ucfirst($ItemData->type)}}</h3>
                    <div class="CommentText">
                        <textarea name="message" rows="5" cols="20" id="ctl00_cphRoblox_CommentsPane_NewCommentTextBox" class="MultilineTextBox"></textarea></div>
                    <div class="Buttons"><button class="Button" type="submit">Post Comment</button></div>
                    @csrf
                    @method("post")
                </form>
            @endif


        </div>

    </div>

</div>

    {{--
<div id="ctl00_cphRoblox_ItemPurchasePopupPanel" class="modalPopup" style="width:27em;">

    <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel">


        <div id="VerifyPurchase_Tickets" style="margin: 1.5em;">
            <h3>Purchase Item:</h3>
            <p>Would you like to purchase Shirt "Im with stupid shirt" from zamorak990 for Tx 1?</p>
            <p>Your balance after this purchase will be Tx 9.</p>
            <p><input type="submit" name="ctl00$cphRoblox$ProceedWithTicketsPurchaseButton" value="Buy Now!" onclick="document.getElementById('VerifyPurchase_Tickets').style.display = 'none';document.getElementById('ProcessPurchase_Tickets').style.display = 'block';" id="ctl00_cphRoblox_ProceedWithTicketsPurchaseButton" class="MediumButton" style="width:100%;"></p>
            <p><input type="submit" name="ctl00$cphRoblox$CancelTicketsPurchaseButton" value="Cancel" onclick="$find('myBehavior1').hide();" id="ctl00_cphRoblox_CancelTicketsPurchaseButton" class="MediumButton" style="width:100%;"></p>
        </div>

        <div id="ProcessPurchase_Tickets" style="margin: 2.5em auto; display: none;">
            <div id="Processing_Tickets" style="margin: 0 auto; text-align: center; vertical-align: middle;">
                    <img id="ctl00_cphRoblox_ProcessingTicketsPurchaseIconImage" src="images/ProgressIndicator2.gif" align="middle" style="border-width:0px;">&nbsp;&nbsp;
                    Processing transaction ...
            </div>
        </div>


</div>
--}}

</div>

<input type="hidden" name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1">
<input type="hidden" name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2">
<input type="hidden" name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3">


</div>
</div>
@endsection
