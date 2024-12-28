let UpdateItem_Div = document.getElementById("ChooseUpdate")
let MenuItem_Div = document.getElementById("MainMenu")

let Message_Success = document.getElementById("Confirmation")
let Message_Process = document.getElementById("Uploading")
let Message_Failure = document.getElementById("Failure")

let Go_UpdateItem_Button = document.getElementById("ChoosePublishContentModificationButton")

Go_UpdateItem_Button.addEventListener("click",function(){
    MenuItem_Div.style.display = "none"
    UpdateItem_Div.style.display = "block"
})

function UpdateItem_Ping(id)
{
    UpdateItem_Div.style.display = "none"
    MenuItem_Div.style.display = "none"
    Message_Process.style.display = "block"

    function CreateData(id)
    {
        try {
            var workspace = window.external;
            var content = workspace.Write().Upload("http://localhost/Studio/Upload/"+id)
    
            Message_Process.style.display = "none"
            Message_Success.style.display = "block"
        }catch(err)
        {
            Message_Process.style.display = 'none'
            Message_Failure.style.display = 'block'
        }
    }

    setTimeout(CreateData(id),1000)
}