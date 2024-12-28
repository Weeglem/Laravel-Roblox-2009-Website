const User_ID = document.getElementById("RobloxUserID").value;
const UserInventory_ItemsBox = document.getElementById("AssetsContent");
const UserInventory_SearchBox = document.getElementById("AssetsMenu");
const UserInventory_ButtonsQuery = document.getElementsByClassName("UserInventoryButton")
const UserInventory_NextPage_UI = document.getElementById("Roblox_UserInventory_NextPage");
const UserInventory_PrevPage_UI = document.getElementById("Roblox_UserInventory_PrevPage");
const UserInventory_Footer_UI = document.getElementById("UserInventory_Footer");
const UserInventory_ErrorMessage = document.getElementById("InventoryNoResults");
const UserInventory_EditMode = document.getElementById("UserEditMode").value;


console.log(UserInventory_EditMode);

let Actual_Page = 1;
let Actual_Search = 2;

//-------------------

function CallInventory()
{
    let GetInventory = new XMLHttpRequest();
    GetInventory.onload = function()
    {
        if(GetInventory.status !== 200)
        {

            UserInventory_ErrorMessage.style.display = "block"
            return;
        }

        UserInventory_ErrorMessage.style.display = "none"
        UserInventory_Footer_UI.display = "none"

        if(document.getElementById("Roblox_Creator_ThisItem") != null)
        {
            document.getElementById("Roblox_Creator_ThisItem").setAttribute("href","http://localhost/My/ContentBuilder.aspx?ID="+parseInt(Actual_Search))
        }

        let InventoryData = JSON.parse(GetInventory.response);
        let InventoryData_Data = InventoryData.data;
        UserInventory_ItemsBox.innerHTML = "";
        UserInventory_Footer_UI.style.display = "none"
        UserInventory_NextPage_UI.style.display = "none";
        UserInventory_PrevPage_UI.style.display = "none";

        let Print_Data = "";

        if(InventoryData_Data.length < 1)
        {
            UserInventory_ErrorMessage.style.display = "block"
            return false;
        }

        for(let i = 0; i < InventoryData_Data.length; i++)
        {
            if(i % 5 === 0)
            {
                Print_Data += "</tr><tr>";
            }

            Print_Data +=
                "<td class='Asset' valign='top'>"+
                    "<div style='padding:5px'>"
                        +"<div class='AssetThumbnail'>"
                            +'<div class="popupControl" id="ResetPlacesPopUp" style=" visibility: visible; margin:5px 0px 0px 48px; padding:2px; ">'
                                                    +'<div align="right">'
                                                        +'<a class="PopUpOption" id="ClosePopUp">[ delete ]</a>'
                                                    +'</div>'
                                               +'</div>'


                            +" <a id='ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink' title='Red Banded Top Hat' href='https://web.archive.org/web/20080730015017/http://www.roblox.com/Item.aspx?ID=2972302&amp;UserAssetID=6348507' style='display:inline-block;cursor:pointer;'>"
                                 + "<img src='http://localhost/img/Placeholder/Item.png' border='0' alt='Red Banded Top Hat' blankurl='http://t6.roblox.com:80/blank-110x110.gif'></a>"
                        +"</div>"
                        +"<div class='AssetDetails'>"
                            +"<div class='AssetName'>"
                                +"<a id='ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink' href='https://web.archive.org/web/20080730015017/http://www.roblox.com/Item.aspx?ID=2972302&amp;UserAssetID=6348507'>"
                                    +"Red Banded Top Hat"
                                +"</a>"
                            +"</div>"
                            +"<div class='AssetCreator'>"
                                +"<span class='Label'>Creator:</span> "
                                +"<span class='Detail'>"
                                    +"<a id='ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetCreatorHyperLink' href='https://web.archive.org/web/20080730015017/http://www.roblox.com/User.aspx?ID=1'>ROBLOX</a>"
                                +" </span>"
                            +"</div>"
                        +"</div>"
                    +"</div>"
                +"</td>"
        }

        //DRAW SCREEN
        UserInventory_ItemsBox.innerHTML = Print_Data;
        UserInventory_NextPage_UI.style.display = InventoryData.nextPage !== false ? "block" : "none";
        UserInventory_PrevPage_UI.style.display = Actual_Page > 1 ? "block" : "none";
        UserInventory_Footer_UI.style.display = "block"
        document.getElementById("InventoryActualPage").innerText = parseInt(Actual_Page);
        document.getElementById("InventoryRemainingPages").innerText = parseInt(InventoryData.totalPages);
    }

    GetInventory.onerror = function()
    {
        console.log("OOF")
    }

    //REVIEW WEIRD CODE
    GetInventory.open("GET","http://localhost/api/Inventory/Get?id="+User_ID+"&t="+Actual_Search+"&page="+Actual_Page)
    GetInventory.send();
}

//-------------------

UserInventory_SearchBox.onclick = function(ev)
{
    let TargetClick = ev.target;
    if(TargetClick.nodeName !== "BUTTON"){ return; }

    for(let i = 0; i < UserInventory_ButtonsQuery.length; i++)
    {
        //clean all slots
        UserInventory_ButtonsQuery[i].disabled = false
    }

    Actual_Search = TargetClick.id;
    TargetClick.disabled = true;
    Actual_Page = 1;
    CallInventory()
}

//-------------------

UserInventory_NextPage_UI.addEventListener("click",function(){
    Actual_Page++
    CallInventory();
})

UserInventory_PrevPage_UI.addEventListener("click",function(){
    Actual_Page = Actual_Page < 1 ? 1 : Actual_Page - 1;
    CallInventory();
})

function RemoveFromInventory(ItemID)
{

}


CallInventory();






/*<!--
                                <td class="Asset" valign="top">
                                    <div style="padding:5px">
                                        <div class="AssetThumbnail">
                                            <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink" title="Red Banded Top Hat" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/Item.aspx?ID=2972302&amp;UserAssetID=6348507" style="display:inline-block;cursor:pointer;">
                                                <img src="{{asset("img/Placeholder/Item.png")}}" border="0" alt="Red Banded Top Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"></a>
                                        </div>
                                        <div class="AssetDetails">
                                            <div class="AssetName">
                                                <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/Item.aspx?ID=2972302&amp;UserAssetID=6348507">
                                                    Red Banded Top Hat
                                                </a>
                                            </div>
                                            <div class="AssetCreator">
                                                <span class="Label">Creator:</span>
                                                <span class="Detail">
                                                    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetCreatorHyperLink" href="https://web.archive.org/web/20080730015017/http://www.roblox.com/User.aspx?ID=1">ROBLOX</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            -->*/
