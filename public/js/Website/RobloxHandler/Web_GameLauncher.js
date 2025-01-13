function GameLauncher_Create_ModalBox()
{
    let ModalBox_BG = document.createElement("div");
    ModalBox_BG.id = "ModalBoxFather"
    ModalBox_BG.style.backgroundColor = "rgba(100,100,100,0.25)"
    ModalBox_BG.style.width = "100%"
    ModalBox_BG.style.height = "100%"
    ModalBox_BG.style.zIndex = "1"
    ModalBox_BG.style.position = "fixed"
    ModalBox_BG.style.overflow = "auto";

    let ModalBox = document.createElement("div");
    ModalBox.id = "ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1";
    ModalBox.classList.add("modalPopup");
    ModalBox.style.width = "27em"
    ModalBox.style.position = "absolute"; 
    ModalBox.style.top = "50%"
    ModalBox.style.left = "50%"
    ModalBox.style.transform = "translateX(-50%) translateY(-50%)";

    let ModalBox_Inside = document.createElement("div");
    ModalBox_Inside.style.margin = "1.5em";

    let ModalBox_Spinner_div = document.createElement("div");
    ModalBox_Spinner_div.id = "Spinner";
    ModalBox_Spinner_div.style.float = "left";
    ModalBox_Spinner_div.style.margin = "0 1em 1em 0"
    
    
    let ModalBox_Spinner_img = document.createElement("img");
    ModalBox_Spinner_img.id = "ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1";
    ModalBox_Spinner_img.alt = "Process";
    ModalBox_Spinner_img.src = "http://localhost/img/ProgressIndicator2.gif";

    let ModalBox_Message_div = document.createElement("div");
    ModalBox_Message_div.id = "Loading";
    ModalBox_Message_div.style.display="absolute";
    ModalBox_Message_div.innerText = "We at java are working on your request, hold on..."

    let ModalBox_Buttons = document.createElement("div")
    ModalBox_Buttons.style.textAlign = "center"
    ModalBox_Buttons.style.marginTop = "1em"
    
    let ModalBox_Buttons_Cancel = document.createElement("button")
    ModalBox_Buttons_Cancel.id = "Cancel"
    ModalBox_Buttons_Cancel.classList.add = "Button"
    ModalBox_Buttons_Cancel.type = "button"
    ModalBox_Buttons_Cancel.innerText = "Cancel";
    ModalBox_Buttons_Cancel.setAttribute("onclick","GameLauncher_Close_ModalBox()");



    ModalBox_Spinner_div.appendChild(ModalBox_Spinner_img);

    ModalBox_Inside.appendChild(ModalBox_Spinner_div);
    ModalBox_Inside.appendChild(ModalBox_Message_div);

    ModalBox_Buttons.appendChild(ModalBox_Buttons_Cancel);
    ModalBox_Inside.appendChild(ModalBox_Buttons);

    ModalBox.appendChild(ModalBox_Inside);

    ModalBox_BG.appendChild(ModalBox);

    document.getElementById("Container").parentNode.insertBefore(ModalBox_BG,document.getElementById("Container"));

}

function GameLauncher_Close_ModalBox()
{
    let message= document.getElementById("ModalBoxFather");
    message.parentNode.removeChild(message);
}

function GameLauncher_SetMessage_ModalBox(Message)
{
    document.getElementById("Loading").innerText = Message;
}

function GameLauncher_SetMessageFinal_ModalBox(Message)
{
    document.getElementById("Spinner").style.display = "none";
    document.getElementById("Loading").innerText = Message;
}

let GameLauncher_Messages = 
{
    undefined : "Unexpected Error at launch event, error couldnt be handled, Roblox JS Related. Make sure this request is made on client",
    success : "Roblox Launched Successfuly",
    studio : "Loading Place for editing",
    solo : "Loading Place for Solo",
    robloxInstall : "Please install ROBLOX to procceed",

    requesting : "Requesting a server",
    waiting : "Waiting for a server",
    loading : "A server is loading the game",
    joining : "The server is ready. Joining the game...",
    expired : "An error occured. Please try again later",
    ended : "The game you requested has ended",
    full : "The game you requested is full. Please try again later",

    
}

function ROBLOX_GameWindow_Create(ScriptURL)
{  
    try
    {
        if(window.external.IsRobloxAppIDE == undefined)
        {

            GameLauncher_SetMessageFinal_ModalBox(GameLauncher_Messages["robloxInstall"]);
            var link = document.createElement("a")
            link.href = "http://localhost/Install/"
            link.target = "_blank"
            link.click()

            document.getElementById("InstallRoblox").style.display = "block"
            return;
        }

        window.external.GetApp().CreateGame("44340105256").ExecUrlScript(ScriptURL);
        
        GameLauncher_SetMessageFinal_ModalBox(GameLauncher_Messages["success"]);
        setTimeout(function(){ GameLauncher_Close_ModalBox() },2000);
    }
    catch(err)
    {
        GameLauncher_SetMessageFinal_ModalBox(GameLauncher_Messages["undefined"]);
    }
}

function ROBLOX_GameLaunch_PlaySolo(PlaceID){
    GameLauncher_Create_ModalBox();
    GameLauncher_SetMessage_ModalBox(GameLauncher_Messages["solo"]);
    setTimeout(function(){ ROBLOX_GameWindow_Create("http://localhost/Game/visit.ashx?PlaceID="+PlaceID) },1250);
    
}

function ROBLOX_GameLaunch_EditMode(PlaceID){
    GameLauncher_Create_ModalBox();
    GameLauncher_SetMessage_ModalBox(GameLauncher_Messages["studio"]);
    setTimeout(function(){ ROBLOX_GameWindow_Create("http://localhost/Game/edit.ashx?PlaceID="+PlaceID) },1250);
}



let Edit_Button = document.getElementById("ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_EditSoloButton2");
if(Edit_Button != null)
{
    if(window.external.IsRobloxAppIDE == true)
    {
        Edit_Button.style.display = "inline"
    }
}
