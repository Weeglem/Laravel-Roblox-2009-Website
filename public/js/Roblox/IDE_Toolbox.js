console.log("Hello world");

let GetItems = new XMLHttpRequest();

GetItems.onload = function(data){
    let Response = JSON.parse(GetItems.response);
    console.log(Response);
    let current_page = Response.current_page;
    let from_page = Response.from;
    let next_page = Response.to;

    let ToolboxItems = Response.data;
    for(i = 0; i < ToolboxItems.length; i++)
    {
        Draw_Item(ToolboxItems[i].name,ToolboxItems[i].id)
    }
}
GetItems.open("GET","http://localhost/Toolbox/GetModels");
GetItems.send();

function Draw_Item(Name,ID)
{
    let Container = document.createElement("a");
    Container.title = Name;
    Container.href = "javascript:InsertContent('http://localhost/asset/?id="+ID+"')";

    Container.style.backgroundImage = "url('http://localhost/img/Unapproved.png')"
    Container.className = "Item";

    document.getElementById("Showcase").appendChild(Container)    
}

function InsertContent(Link){
    try{window.external.Insert(Link);}catch(ex){alert(ex.message);}
}