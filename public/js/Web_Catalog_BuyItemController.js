//WINDOWS
const BuyMenu = document.getElementById('ModalBoxFather');
const BuyMenu_Question = document.getElementById('VerifyPurchase_Question');
const BuyMenu_ProcessOrder = document.getElementById('ProcessPurchase');
const BuyMenu_Buttons = document.getElementById('VerifyPurchase_Buttons');
const BuyMenu_FinalMessage = document.getElementById('FinalMessage');
const BuyMenu_ItemID = document.getElementById("ItemIDBox").value;

const BuyMenu_ProcessPurchase = document.getElementById('ProcessPurchase');
const BuyMenu_PurchaseSuccess = document.getElementById('PurchaseSuccess');
const BuyMenu_FailedPurchase = document.getElementById('FailedPurchase');
const BuyMenu_FailedPurchaseMessage = document.getElementById('FailedPurchase_message');

//ITEM PRICE DIVS
const Menu_TicketPrice = document.getElementById('VerifyPurchase_TicketPrice');
const Menu_RobuxPrice = document.getElementById('VerifyPurchase_RobuxPrice');
const Menu_FreePrice = document.getElementById('VerifyPurchase_FreePrice');

//MY REMAINING WALLET DIVS
const Menu_RemainingTicket = document.getElementById('VerifyPurchase_TicketRemaining');
const Menu_RemainingRobux = document.getElementById('VerifyPurchase_RobuxRemaining');
const Menu_RemainingWallet = document.getElementById('VerifyPurchase_Remaining');

//MENU BUY BUTTONS

const Menu_BuyWithTickets = document.getElementById('BuyWithTickets');
const Menu_BuyWithRobux = document.getElementById('BuyWithRobux');
const Menu_BuyWithFree = document.getElementById('BuyWithFree');
const Menu_CancelButton = document.getElementById('CloseBuyMenu');

//SITE BUTTONS

const BuyFreeButton = document.getElementById('PurchaseFreeButton');
const BuyRobuxButton = document.getElementById('PurchaseWithRobuxButton');
const BuyTicketButton = document.getElementById('PurchaseWithTicketsButton');


const BuyMenu_Class_TicketPrice = document.getElementsByClassName("TicketPrice");
const BuyMenu_Class_RobuxPrice = document.getElementsByClassName("RobuxPrice");
const BuyMenu_Class_FreePrice = document.getElementsByClassName("FreePrice");



//SHOW MENUS
function ShowTicketRelated(ac)
{
    Menu_RemainingWallet.style.display = ac === true ? 'block': 'none';
    Menu_RemainingTicket.style.display = ac === true ? 'inline': 'none';
    Menu_BuyWithTickets.style.display = ac === true ? 'block': 'none';
    BuyMenu_Question.style.display = ac === true ? 'block': 'none';

    for(let i=0; i < BuyMenu_Class_TicketPrice.length; i++)
    {
        BuyMenu_Class_TicketPrice[i].style.display = ac === true ? 'inline' : 'none';
    }
}

function ShowRobuxRelated(ac)
{
    Menu_RemainingWallet.style.display = ac === true ? 'block': 'none';
    Menu_RemainingRobux.style.display = ac === true ? 'inline': 'none';
    Menu_BuyWithRobux.style.display = ac === true ? 'block': 'none';
    BuyMenu_Question.style.display = ac === true ? 'block': 'none';

    for(let i=0; i < BuyMenu_Class_RobuxPrice.length; i++)
    {
        BuyMenu_Class_RobuxPrice[i].style.display = ac === true ? 'inline' : 'none';
    }
}

function ShowFreeRelated(ac)
{
    Menu_RemainingWallet.style.display = "none";
    Menu_BuyWithFree.style.display = ac === true ? 'block': 'none';
    BuyMenu_Question.style.display = ac === true ? 'block': 'none';

    for(let i=0; i < BuyMenu_Class_FreePrice.length; i++)
    {
        BuyMenu_Class_FreePrice[i].style.display = ac === true ? 'inline' : 'none';
    }
}

function ShowBuyMenu(ac)
{
    BuyMenu.style.display = ac === true ? 'block': 'none';
    BuyMenu_Question.style.display = ac === true ? 'block': 'none';
    BuyMenu_ProcessPurchase.style.display = "none";
    BuyMenu_FailedPurchase.style.display = "none";
    BuyMenu_Buttons.style.display = ac === true ? 'block': 'none';
}

//SHOW MENUS
if(BuyFreeButton != undefined) {
    BuyFreeButton.addEventListener('click', function(){
        ShowBuyMenu(true);
        ShowFreeRelated(true);
    });
}

if(BuyRobuxButton != undefined) {
    BuyRobuxButton.addEventListener('click', function () {
        ShowBuyMenu(true);
        ShowRobuxRelated(true);
    })
}

if(BuyTicketButton != undefined) {
    BuyTicketButton.addEventListener('click', function () {
        ShowBuyMenu(true);
        ShowTicketRelated(true);
    })
}

BuyMenu_Buttons.addEventListener("click", function(ev){
    let Target = ev.target;
    if(Target.nodeName.toLowerCase() != 'input' || Target.value == "Cancel"){return;}
    BuyMenu_Question.style.display = "none";
    BuyMenu_Buttons.style.display = "none";
    BuyMenu_ProcessOrder.style.display = "block";

    //SEND REQUEST
    let Check = new XMLHttpRequest();
    Check.open("GET","http://localhost/Catalog/"+BuyMenu_ItemID+"/Owned");
    Check.onload = function(){

        //ALREADY OWNED HANDLE
        if(Check.responseText == "true"){
            BuyMenu_ProcessPurchase.style.display = "none";
            BuyMenu_FailedPurchase.style.display = "block";
            BuyMenu_FailedPurchaseMessage.innerText = "You already own this item";
            return;
        }

        switch(Target.id)
        {
            case "BuyWithTickets":
                WalletType = "ticket";
            break;
            case "BuyWithRobux":
                WalletType = "robux";
            break;
            default:
                WalletType = "free";
            break;
        }

        console.log("Selected wallet: "+WalletType)
        let BuyRequest = new XMLHttpRequest();
        BuyRequest.open("GET","http://localhost/Catalog/"+BuyMenu_ItemID+"/Buy/"+WalletType);
        BuyRequest.onload = function()
        {
            let Answer = JSON.parse(BuyRequest.response);

            //SET FAILED MESSAGE
            if(Answer.code != 200)
            {
                BuyMenu_ProcessPurchase.style.display = "none";
                BuyMenu_FailedPurchase.style.display = "block";
                BuyMenu_FailedPurchaseMessage.innerText = Answer.message;
                return;
            }

            //SHOW FINAL MESSAGE
            BuyMenu_ProcessPurchase.style.display = "none";
            BuyMenu_PurchaseSuccess.style.display = "block";
        }
        BuyRequest.send();
    }
    Check.send();
})

let CloseMenu = document.getElementsByClassName("CloseBuyMenu");

for(i=0; i < CloseMenu.length; i++)
{
    CloseMenu[i].addEventListener("click", function(){
        ShowBuyMenu(false);
        ShowRobuxRelated(false);
        ShowTicketRelated(false);
        ShowFreeRelated(false);
    })
}

//TODO: SET NOT ENOUGH FUNDS MESASGE FIRST




