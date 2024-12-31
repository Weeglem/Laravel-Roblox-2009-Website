<?php

use App\Http\Controllers\UserAuthentication;
use App\Http\Controllers\web\Assets\AssetCommentController;
use App\Http\Controllers\web\Assets\AssetPageController;
use App\Http\Controllers\web\CatalogPageController;
use App\Http\Controllers\web\My\Inbox\InboxController;
use App\Http\Controllers\web\ProfilePageController;
use App\Http\Controllers\web\Users\EditProfile_PageController;
use App\Http\Controllers\web\Users\FriendsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\My\Friends\MyFriendsController;

//Base Routes
Route::get("/",function(){return "Landing";})->name("landingPage");
Route::get("/Catalog.aspx",[CatalogPageController::class,"index"])->name("CatalogPage");
Route::get("/User.aspx",[ProfilePageController::class,"index"])->name("ProfilePage");


Route::get("/Item.aspx",[AssetPageController::class,"view"])->name("Asset_Page");
Route::post("/Item.aspx",[AssetCommentController::class,"postComment"])->name("Asset_Comment_post")->middleware("auth");


//Login Routes
Route::controller(UserAuthentication::class)->prefix("/Login")->group(function()
{
    Route::post("/New.aspx","createAccount")->name("newAccountPost");
    Route::post("/Default.aspx","login")->name("loginPage_Post");
    Route::get("/New.aspx","viewNew")->name("newAccount");
    Route::get("/Default.aspx","viewLogin")->name("login");
    Route::get("/Logout.aspx","Logout")->name("logout");
});

//My Routes
Route::group(["prefix"=>"My","middleware"=>"auth"],function(){

    //My Item
    Route::controller(AssetPageController::class)->group(function(){
        Route::get("/Item.aspx","viewEdit")->name("Asset_Edit");
        Route::post("/Item.aspx","update")->name("Asset_Edit_post");
    });

    //My Profile
    Route::controller(EditProfile_PageController::class)->group(function(){
        Route::get("/Profile.aspx","view")->name("Profile_Edit");
        Route::post("/Profile.aspx","update")->name("Profile_Edit_post");
    });

    //My Inbox
    Route::controller(InboxController::class)->group(function(){
        Route::get("/Inbox.aspx","index")->name("InboxPage");
        Route::post("/Inbox.aspx","deleteMessages")->name("Inbox_Page_DeleteMessages_post");

        Route::get("/PrivateMessage.aspx","MessageHandler")->name("Inbox_Message");
        Route::post("/PrivateMessage.aspx","PrivateMessageHandler")->name("Inbox_Message_post");

        Route::post("/NewMessage.aspx","newMessage")->name("Inbox_NewMessage_post");

    });

    //My Friend
    Route::controller(MyFriendsController::class)->group(function(){
        Route::get("/FriendInvitation.aspx","createRequest")->name("Friends_SendRequest");
        Route::get("/Friends.aspx","index")->name("Friends_Edit");
    });






});


/*


//TODO: MOVE TO API
Route::group(["prefix" => "Favs"], function () {
   Route::get("/{UserID}",[FavoritesApiController::class,'index']);
   Route::get("/{ItemID}/Check",[FavoritesApiController::class,'checkFavorite']);
   Route::get("/{ItemID}/Add",[FavoritesApiController::class,'newFavorite']);
   Route::get("/{ItemID}/Remove",[FavoritesApiController::class,'RemoveFavorite']);
});

//TODO: MOVE TO API
Route::group(["prefix" => "Friends"], function () {
    Route::get("/{UserID}",[FriendsController::class,'index']);
    Route::get("/{UserID}/Check",[FriendsController::class,'checkFriend']);
    Route::get("/{UserID}/Add",[FriendsController::class,'newFriend']);
    Route::get("/{UserID}/Remove",[FriendsController::class,'RemoveFriend']);
});


//TODO: MOVE TO API
Route::group(["prefix" => "Catalog"],function(){
    Route::get("/{ItemID}/Buy/{WalletType?}",[BuyItemController::class,'buyItem']);
    Route::get("/{ItemID}/Owned",[BuyItemController::class,'checkItem']);
});
*/

