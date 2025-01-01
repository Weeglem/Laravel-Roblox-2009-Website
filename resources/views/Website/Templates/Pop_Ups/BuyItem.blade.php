<div id="ModalBoxFather" style="display: none">
    <div id="modalPopup" class="modalPopup" style="width:27em;">
        <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel">
            <div id="VerifyPurchase" style="margin: 1.5em;">
                <div id="VerifyPurchase_Question">
                    <h3>Purchase Item:</h3>

                    <p>Would you like to purchase {{ucfirst($ItemData->type)}} "{{$ItemData->name}}" from {{$ItemOwner->username}} for
                        <span class="TicketPrice" id="VerifyPurchase_TicketPrice" style="display: none">Tx 9</span>
                        <span class="RobuxPrice" id="VerifyPurchase_RobuxPrice" style="display: none">Robux 9</span>
                        <span class="FreePrice" id="VerifyPurchase_FreePrice" style="display: none">Free</span>
                        <span> ?</span>
                    </p>

                    <div id="VerifyPurchase_Remaining">
                        <p>Your balance after this purchase will be
                        <span id="VerifyPurchase_TicketRemaining" style="display: none">Tx 9</span>
                        <span id="VerifyPurchase_RobuxRemaining" style="display: none">Robux 9</span>
                        <span>.</span>
                        </p>
                    </div>

                    <div id="VerifyPurchase_Buttons">
                        <p><input type="button" value="Buy Now!" id="BuyWithTickets" class="MediumButton" style="width:100%; display: none"></p>
                        <p><input type="button" value="Buy Now!" id="BuyWithRobux" class="MediumButton" style="width:100%; display: none"></p>
                        <p><input type="button" value="Buy Now!" id="BuyWithFree" class="MediumButton" style="width:100%; display: none"></p>
                        <p><input type="button" value="Cancel"  id="CloseBuyMenu" class="MediumButton CloseBuyMenu" style="width:100%;"></p>
                    </div>
                </div>
            </div>

            <div id="PurchaseSuccess" style="margin: 1.5em; display: none;">

                <h3>Purchase Complete</h3>
                <p>You have successfully purchased {{ucfirst($ItemData->type)}} "{{$ItemData->name}}" from {{$ItemOwner->username}} for
                    <span class="TicketPrice" id="VerifyPurchase_TicketPrice" style="display: none">Tx 9</span>
                    <span class="RobuxPrice" id="VerifyPurchase_RobuxPrice" style="display: none">Robux 9</span>
                    <span class="FreePrice" id="VerifyPurchase_FreePrice" style="display: none">Free</span>
                    <span>.</span>
                </p>
                <p><a href="#">Continue Shopping</a></p>
                <p><a href="#">Customize character</a></p>
            </div>

            <div id="ProcessPurchase" style="margin: 2.5em auto; display: none;">
                <div id="Processing" style="margin: 0 auto; text-align: center; vertical-align: middle;">
                    <img id="ctl00_cphRoblox_ProcessingTicketsPurchaseIconImage"
                         src="{{asset("img/ProgressIndicator2.gif")}}" align="middle" style="border-width:0px;">&nbsp;&nbsp;
                    Processing transaction ...
                </div>
            </div>

            <div id="FailedPurchase" style="margin: 1.5em; ">
                <h3>Purchase failed:</h3>
                <p id="FailedPurchase_message">Message</p>
                <input type="button" value="Cancel"  id="CloseBuyMenu" class="Button CloseBuyMenu">
            </div>

        </div>
    </div>
</div>
