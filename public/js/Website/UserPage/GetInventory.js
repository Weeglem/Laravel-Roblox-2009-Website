console.log("GetInventory");

const Inventory_SearchBox = document.getElementById("AssetsMenu");
const Inventory_ButtonsQuery = document.getElementsByClassName("UserInventoryButton")
const AssetsContent = document.getElementById("AssetsContent");
const Inventory_UserID = document.getElementById("RobloxUserID").value;

let Inventory_CanInteract = false;
let Inventory_ActualPage = 1
let Inventory_SearchType = 6;

//Load Inventory Page
function getInventoryData() {
    Inventory_CanInteract = false
    let GetInventoryData = new XMLHttpRequest();
    GetInventoryData.onload = function(){
        console.log("GetInventoryData");
        AssetsContent.innerHTML = "";
        AssetsContent.innerHTML = GetInventoryData.response;

        setTimeout(function(){
            Inventory_CanInteract = true
        },400);
    }

    GetInventoryData.open("GET","http://localhost/User/Inventory/"+Inventory_UserID+"/"+Inventory_SearchType+"?page="+Inventory_ActualPage);
    GetInventoryData.send();
}


//Pages Handler
function inventoryNext()
{
    Inventory_ActualPage++;
    getInventoryData();
}

function inventoryPrev()
{
    Inventory_ActualPage = Inventory_ActualPage < 1 ? 1 : Inventory_ActualPage - 1;
    getInventoryData();
}

//Buttons Handler
Inventory_SearchBox.onclick = function(ev)
{
    //If cant interact return;
    if(!Inventory_CanInteract) {
        return;
    }

    let TargetClick = ev.target;
    if(TargetClick.nodeName !== "BUTTON"){ return; }

    for(let i = 0; i <Inventory_ButtonsQuery.length; i++)
    {
        //clean all slots
        Inventory_ButtonsQuery[i].disabled = false
    }

    //Set inventory type and button activated
    Inventory_SearchType = TargetClick.id;
    TargetClick.disabled = true;
    Inventory_ActualPage = 1;

    //Send Request
    getInventoryData()
}

//First call
getInventoryData()
