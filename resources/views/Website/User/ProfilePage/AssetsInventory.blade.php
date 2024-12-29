<div id="UserAssetsPane">
    <div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
        <div id="UserAssets">
            <h4>Stuff</h4>

            <div id="AssetsMenu">
                <button id="2" class="UserInventoryButton" disabled>T-Shirts</button>
                <button id="11" class="UserInventoryButton">Shirts</button>
                <button id="12" class="UserInventoryButton">Pants</button>
                <button id="8" class="UserInventoryButton">Hats</button>
                <button id="13" class="UserInventoryButton">Decals</button>
                <button id="10" class="UserInventoryButton">Models</button>
                <button id="9" class="UserInventoryButton">Places</button>
            </div>

            @if($MyProfile == true)
                <div>
                    <div id="ctl00_cphRoblox_rbxUserAssetsPane_HeaderPagerPanel" class="HeaderPager">
                        <a id="ctl00_cphRoblox_rbxUserAssetsPane_CatalogHyperLink" href="Catalog.aspx?m=ForSale&d=All">Shop</a>&nbsp;&nbsp;&nbsp;
                        <a id="Roblox_Creator_ThisItem" href="#AssetsMenu">Create</a>&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            @endif

            <div id="InventoryNoResults" style="display: none">
                <p>{{$UserData->username}}  has not bought any catalog items for this type.</p>
            </div>
            <table id="AssetsContent" cellspacing="0" border="0"></table>

            <div id="UserInventory_Footer" class="FooterPager" style="display: none">
                <span><a id="Roblox_UserInventory_PrevPage" href="#AssetsMenu" style="display: none"><span class="NavigationIndicators"><<</span> Back</a></span>

                <span id="PageIndicatorInventory">Page <span id="InventoryActualPage">1</span> of <span id="InventoryRemainingPages">1</span></span>

                <span><a id="Roblox_UserInventory_NextPage" href="#AssetsMenu" style="display: none">Next <span class="NavigationIndicators">>></span></a></span>
            </div>

        </div>
        <div style="clear:both;"></div>
    </div>
</div>
