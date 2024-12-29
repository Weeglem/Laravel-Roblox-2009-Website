const LikeButton = document.getElementById("FavoriteThisButton");
const LikeButton_ItemID = document.getElementById("ItemIDBox").value;
let LikeButton_ActivePing = false;

LikeButton.addEventListener("click", function () {

    //DISABLE BUTTON
    if(LikeButton_ActivePing == true) {return;}
    LikeButton_ActivePing = true;
    LikeButton.disabled = true;

    //GET FAVORITE STATUS FROM API
    let Request = new XMLHttpRequest();
    Request.open("GET", "/Favs/"+LikeButton_ItemID+"/Check", true);



    Request.onload = function ()
    {
        if(Request.status != 200) {
            alert("Failed to send request");
            return;
        }

        try{
            //CHECK STATUS
            let req = JSON.parse(Request.responseText);
            if(req.case == true){
                //REMOVE FROM FAVS
                LikeButton_newStatus(false);
                LikeButton.innerText = "Favorite";
            }else{
                //ADD TO FAVS
                LikeButton.innerText = "Remove from Favorites";
                LikeButton_newStatus(true);
            }

            //REENABLE BUTTON
            setTimeout(function(){
                LikeButton_ActivePing = false;
                LikeButton.disabled = false;
            },1000);

        }catch(e){alert(e.message);}
    }
    Request.send();
})

//TODO: CHANGE TO POST
function LikeButton_newStatus(Add = false)
{
    let Final = Add == true ? "Add" : "Remove";
    let Request = new XMLHttpRequest();
    Request.open("GET", "/Favs/"+LikeButton_ItemID+"/"+Final, true);

    Request.onload = function ()
    {
        if(Request.status != 200){
            throw("Failed to send request to Server")
        }

        let Answer = JSON.parse(Request.responseText);
        if(Answer.code != 200) {
            throw(Answer.message);
        }
    }

    Request.send();
}
