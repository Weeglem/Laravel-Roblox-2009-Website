const User_ID_Favs = document.getElementById("RobloxUserID").value;
const UserFavorites_ItemsBox = document.getElementById("Favorites_ItemContainer");


const UserFavorites_ErrorMessage = document.getElementById("FavoritesNoResults");
const UserFavorites_EditMode = document.getElementById("UserEditMode").value;
const UserFavorites_SearchBox = document.getElementById("Favorites_SearchType");



const UserFavorites_NextPages = document.querySelectorAll("#Roblox_UserFavorites_NextPage");
const UserFavorites_PrevPages = document.querySelectorAll("#Roblox_UserFavorites_PrevPage");
const UserFavorites_Footers_Head = document.querySelectorAll("#Favorites_PaginationPanel");




let Favorites_Actual_Page = 1;
let Favorites_Actual_Search = 2;

//-------------------

function CallFavorites()
{
    let GetFavorites = new XMLHttpRequest();
    GetFavorites.onload = function()
    {
        console.log("Looking for type: "+Favorites_Actual_Search);
        console.log("Looking for page: "+Favorites_Actual_Page);

        if(GetFavorites.status !== 200)
        {
            console.log("Failure for favorites");
            UserFavorites_ErrorMessage.style.display = "block"
            return;
        }

        UserFavorites_ErrorMessage.style.display = "none"
        UserFavorites_ItemsBox.innerHTML = "";

        let FavoritesData = JSON.parse(GetFavorites.response);
        Favorites_HidePaginators(true);

        let FavoritesData_Data = FavoritesData.data;
        let Print_Data = "";

        if(FavoritesData_Data.length < 1)
        {
            UserFavorites_ErrorMessage.style.display = "block"
            return false;
        }

        for(let i = 0; i < FavoritesData_Data.length; i++)
        {
            if(i % 5 === 0)
            {
                Print_Data += "</tr><tr>";
            }

            let Item = FavoritesData_Data[i];
            let ItemAsset = Item.asset;
            let id = ItemAsset.id;
            let name = ItemAsset[0].name;

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
                                    +name
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

        //DRAW CURSORS

        for(let i = 0; i < UserFavorites_NextPages.length; i++)
        {
            UserFavorites_NextPages[i].style.display = FavoritesData.nextPage != false ? "block" : "none"
            UserFavorites_PrevPages[i].style.display = Favorites_Actual_Page > 1 ? "block" : "none";
        }

        //DRAW SCREEN
        console.log("Set data");
        UserFavorites_ItemsBox.innerHTML = Print_Data;
        Favorites_HidePaginators(false);
        document.getElementById("FavoritesActualPage").innerText = parseInt(Favorites_Actual_Page);
        document.getElementById("FavoritesRemainingPages").innerText = parseInt(FavoritesData.totalPages);
    }

    GetFavorites.onerror = function()
    {
        console.log("Failure for favorites");
        UserFavorites_ErrorMessage.style.display = "block"
        return;
    }

    //REVIEW WEIRD CODE
    GetFavorites.open("GET","http://localhost/api/Favorites/Get?id="+User_ID_Favs+"&t="+Favorites_Actual_Search+"&page="+Favorites_Actual_Page)
    GetFavorites.send();
}

//-------------------

UserFavorites_SearchBox.addEventListener("change",function(){
    console.log(UserFavorites_SearchBox.value);
    Favorites_Actual_Search = UserFavorites_SearchBox.value;
    Favorites_Actual_Page = 1;
    CallFavorites();
})

function Favorites_HidePaginators(show)
{
    for(let i = 0; i < UserFavorites_Footers_Head.length; i++)
    {
        UserFavorites_Footers_Head[i].style.display = show == true ? "none" : "block";
    }
}

function Favorites_NextPage()
{
    console.log("Nextr page")
    Favorites_Actual_Page++
    CallFavorites();
}

function Favorites_PrevPage()
{
    console.log("Prev page")
    Favorites_Actual_Page = Favorites_Actual_Page < 1 ? 1 : Favorites_Actual_Page - 1;
    CallFavorites();
}

for(let i = 0; i < UserFavorites_NextPages.length; i++)
    {
        UserFavorites_NextPages[i].addEventListener("click",function(){Favorites_NextPage()})
        UserFavorites_PrevPages[i].addEventListener("click",function(){Favorites_PrevPage()})
    }

CallFavorites();









/*<!--
                                <td class="Asset" valign="top">
                                        <div style="padding:5px">
                                            <div class="AssetThumbnail" >
                                                <div class="popupControl" id="ResetPlacesPopUp" style=" visibility: visible; margin:5px 0px 0px 48px; padding:2px; ">
                                                    <div align="right">
                                                        <a class="PopUpOption" id="ClosePopUp" >[ delete ]</a>
                                                    </div>
                                                </div>

                                                <a id="ctl00_cphRoblox_rbxFavoritesPane_FavoritesDataList_ctl01_AssetThumbnailHyperLink" title="ROBLOX Spanish Tutorial/Tutorial ROBLOX Español" href="/web/20080913071017/http://www.roblox.com/Item.aspx?ID=3589278" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080913071017im_/http://t1.roblox.com:80/a4646b48d95dea91daa9ea24055caaa4" border="0" alt="ROBLOX Spanish Tutorial/Tutorial ROBLOX Español"></a>
                                            </div>

                                            <div class="AssetDetails">
                                                <div class="AssetName">
                                                    <a id="ctl00_cphRoblox_rbxFavoritesPane_FavoritesDataList_ctl01_AssetNameHyperLink" href="Item.aspx?ID=3589278">ROBLOX Spanish Tutorial/Tutorial ROBLOX Español</a>
                                                </div>
                                                <div class="AssetCreator">
                                                    <span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxFavoritesPane_FavoritesDataList_ctl01_AssetCreatorHyperLink" href="User.aspx?ID=847130">SpanishTutorial</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                            -->*/
