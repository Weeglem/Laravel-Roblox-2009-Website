//ASP CARDS CODE
//BASIC REMAKE

const ASPTabs = document.getElementsByClassName("ajax__tab_tab");
let ASP_Cards_DetectedIDS = [];
let ASP_Cards_SelectedID = 0;
function ASP_Card_ClearHeader()
{
    for( let i = 0; i < ASPTabs.length; i++ ) {
        let ActualTab = ASPTabs[i];
        let Main = ActualTab.parentNode.parentNode.parentNode;
        Main.classList.remove("ajax__tab_active","ajax__tab_hover");
    }
}

function ASP_Card_CleanTabs()
{
    for( let i = 0; i < ASP_Cards_DetectedIDS.length; i++ ) {
        document.getElementById(ASP_Cards_DetectedIDS[i]+"Tab").style.display = "none";
    }
}

function ASP_Card_Activate(cardID)
{
    ASP_Cards_SelectedID = cardID;
    ASPTabs[cardID].parentNode.parentNode.parentNode.classList.add("ajax__tab_active");
    document.getElementById(ASP_Cards_DetectedIDS[cardID]+"Tab").style.display = "block";
}

//handler
for( let i = 0; i < ASPTabs.length; i++ ) {
    let ActualTab = ASPTabs[i];
    let TabValue = ActualTab.id;
    ASP_Cards_DetectedIDS.push(TabValue);

    ActualTab.addEventListener("mouseover", function(){
        ActualTab.parentNode.parentNode.parentNode.classList.add("ajax__tab_hover");
    })

    ActualTab.addEventListener("mouseout", function(){
        ActualTab.parentNode.parentNode.parentNode.classList.remove("ajax__tab_hover");
    })

    ActualTab.addEventListener("click", function(){
        if(ASP_Cards_SelectedID === i){return;}
        ASP_Card_ClearHeader();
        ASP_Card_CleanTabs();
        ASP_Card_Activate(i);
    })

    if(i === 0) {ASP_Card_Activate(i);} //ACTIVATE FIRST TAB FOUND
}

//TODO: Add Open tab when page loads, specified by url param ?
//AUTHOR: Weeglem




