@extends('Website.Templates.PageView')

@section('Content')
<form id="EditItemContainer" method="POST" action="{{ route("Asset_Edit_post",["ID" => $ItemData->id ]) }}">
    <div id="EditItem" style="float:none;margin:0 auto;">
        <h2>Configure T-Shirt</h2>
        <div id="ItemName">
                <span style="font-weight: bold;">Name:</span><br>
                <input name="Name" type="text" value="{{$ItemData->name}}" maxlength="50" class="TextBox">
                @error("Name")
                <span style="color:Red;">{{$message}}</span>
                @enderror
            </div>

        <div id="ItemDescription">
                <span style="font-weight: bold;">Description:</span><br>
                <textarea name="Description" rows="2" cols="20" class="MultilineTextBox" style="height:150px;">{{$ItemData->about}}</textarea>
                @error("Description")
                    <span style="color:Red;">{{$message}}</span>
                @enderror
            </div>

        <div id="Comments">
                <fieldset title="Turn comments on/off">
                    <legend>Turn comments on/off</legend>
                    <div class="Suggestion">
                        Choose whether or not this item is open for comments.
                    </div>
                    <div class="EnableCommentsRow">
                        <input type="checkbox" name="AllowedComments" @checked($ItemConfig->comments_allowed == 1)>
                        <label for="AllowedComments">Allow Comments</label>
                    </div>
                </fieldset>
                @error("Comments")
                    <span style="color:Red;">{{$message}}</span>
                @enderror
            </div>


        @if($ItemData->type =="cloth")
            <div id="SellThisItem">
                <fieldset title="Sell this Item">
                    <legend>Sell this Item</legend>
                    <div class="Suggestion">
                        Check the box below and enter a price if you want to sell this item in the Roblox
                        catalog. Uncheck the box to remove the item from the catalog.
                    </div>
                    <div class="SellThisItemRow">
                        <input type="checkbox" name=""><label>Sell this Item</label>
                        <div class="PricingPanel">
                            <div id="Pricing">
                                <div id="Currency" style="margin-left: 151px;">
                                    <div class="PricingLabel">
                                    </div>
                                    <div class="PricingField_Robux">
                                        <input type="checkbox"><label>for ROBUX</label>
                                    </div>
                                    <div class="PricingField_Tickets">
                                        <input type="checkbox"><label>for Tickets</label>
                                    </div>
                                    <div style="clear: both;">
                                    </div>
                                </div>
                                <div id="Price">
                                    <div class="PricingLabel">
                                        Price:
                                    </div>
                                    <div class="PricingField_Robux">
                                        <span>R$&nbsp;</span>
                                        <input name="" type="text" maxlength="9" class="TextBox">

                                    </div>
                                    <div class="PricingField_Tickets">

                                        <span>Tx&nbsp;</span>
                                        <input name="" type="text" maxlength="9" class="TextBox">

                                    </div>
                                    <span id="PricingError" class="status-error" style="display:none;">
                                                The minimum price for this item is <span>2</span>
                                            </span>
                                    <span id="PricingErrorMax" class="status-error" style="display:none;">
                                                The maximum price for this item is <span>999999999</span>
                                            </span>
                                    <div style="clear: both;"></div>
                                </div>
                                <div id="Fee" style="margin-top: 18px;">
                                    <div class="PricingLabel">
                                        Marketplace Fee @ <br> 90%:
                                        <br><span class="Suggestion">(minimum 1)</span>
                                    </div>
                                    <div class="PricingField_Robux">
                                        <span>R$&nbsp;</span>
                                        <span class="">123</span>
                                    </div>
                                    <div class="PricingField_Tickets">
                                        <span>Tx&nbsp;</span>
                                        <span class="">123</span>
                                    </div>
                                    <div style="clear: both;">
                                    </div>
                                </div>
                                <div id="Profit" style="margin-top:10px">
                                    <div class="PricingLabel">
                                        You Earn:</div>
                                    <div class="PricingField_Robux">
                                        <span>R$&nbsp;</span>
                                        <span class="">123</span>
                                    </div>
                                    <div class="PricingField_Tickets">
                                        <span>Tx&nbsp;</span>
                                        <span class="">123</span>
                                    </div>
                                    <div style="clear: both;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        @endif


        <div class="Buttons">
            <button class="Button" type="submit">Update</button> &nbsp;
            <a id="Cancel" tabindex="5" class="Button" href="{{route("Asset_Page",["ID" => $ItemData->id])}}">Cancel</a>
        </div>
    </div>
    @csrf
    @method("post")
</form>
@endsection
