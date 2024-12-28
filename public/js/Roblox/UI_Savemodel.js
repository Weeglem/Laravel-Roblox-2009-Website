function CreateItem()
{
    
}

let CreateNew_button = document.getElementById("ChoosePublishNewContentButton");
let UpdateAsset_button = document.getElementById("ChoosePublishContentModificationButton");

let UpdateAsset_Form = document.getElementById("ChooseUpdate");
let CreateNew_Form = document.getElementById("CreateNew");
let MainMenu = document.getElementById("MainMenu");

let Message_Success = document.getElementById("Confirmation");
let Message_Uploading = document.getElementById("Uploading");
let Message_Failure = document.getElementById("Failure");

CreateNew_button.onclick = function()
{
    MainMenu.style.display = "none"
    UpdateAsset_Form.style.display = "none"
    CreateNew_Form.style.display = "block"
}

UpdateAsset_button.onclick = function()
{
    MainMenu.style.display = "none"
    UpdateAsset_Form.style.display = "block"
    CreateNew_Form.style.display = "none" 
}

function UpdateItem_Ping(id){
    MainMenu.style.display = "none"
    UpdateAsset_Form.style.display = "none"
    CreateNew_Form.style.display = "none"

    function CreateData(id)
    {
        try {
            Message_Uploading.style.display = "block"

            var workspace = window.external;
            var content = workspace.WriteSelection().Upload("http://localhost/Studio/Upload/"+id)
    
            Message_Success.style.display = "block"
            Message_Failure.style.direction = "none"
        }catch(err)
        {
            Message_Uploading.style.display = "none"
            Message_Success.style.display = "none"
            Message_Failure.style.direction = "block"
        }
    }
        
    setTimeout(CreateData(id),1000)
}

document.getElementById("PublishNewContentButton").onclick = function(){
    setTimeout(function(){
        try{
            MainMenu.style.display = "none"
            UpdateAsset_Form.style.display = "none"
            CreateNew_Form.style.display = "none"
            Message_Uploading.style.display = "block"

            let ItemName = document.getElementById("NameTextBox").value;
            let ItemDescription = document.getElementById("DescriptionTextBox").value;
            let ItemCheckbox = document.getElementById("DescriptionTextBox");
            let ItemPublic = ItemCheckbox.checked ? true : false;

            if(ItemName.length < 3)
            {
                alert("Item name cannot be less than 3 characters");
                return;
            }

            if(ItemName.length > 50)
            {
                alert("Item name cannot be over 50");
                return;
            }

            let Query = "?Name="+ItemName+"&About="+ItemDescription+"&Public="+ItemPublic+"&Type=Model";
            let Link = "http://localhost/Studio/Upload/";


        
            window.external.WriteSelection().Upload(Link+Query);

            Message_Uploading.style.display = "none"
            Message_Success.style.display = "block"
            
        }catch(err)
        {
            Message_Uploading.style.display = "none"
            Message_Success.style.display = "none"
            Message_Failure.style.display = "block"
        }
    },1000);
}

