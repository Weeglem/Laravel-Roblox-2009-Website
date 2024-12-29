<?php

use App\Http\Controllers\web\Assets\AssetPageController;
use App\Http\Controllers\api\User\FavoritesApiController;
use App\Http\Controllers\web\Assets\AssetCommentController;
use App\Http\Controllers\api\Economy\BuyItemController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "My"], function () {
    //Item Editor
    Route::get("/Item/{id}",[AssetPageController::class,"viewEdit"])->name("editItem_page");
    Route::post("/Item/{id}",[AssetPageController::class,"update"])->name("editItem_post");
});

Route::group(["prefix" => "Item"], function () {
    //TODO: CLEAN THIS UP
    Route::get("/{id}",[AssetPageController::class,'view']);
    Route::post("/{id}/AddComment",[AssetCommentController::class,"postComment"])->name("AddAsset_Comment");
});





//TODO: MOVE TO API
Route::group(["prefix" => "Favs"], function () {
   Route::get("/{UserID}",[FavoritesApiController::class,'index']);
   Route::get("/{ItemID}/Check",[FavoritesApiController::class,'checkFavorite']);
   Route::get("/{ItemID}/Add",[FavoritesApiController::class,'newFavorite']);
   Route::get("/{ItemID}/Remove",[FavoritesApiController::class,'RemoveFavorite']);
});


//TODO: MOVE TO API
Route::group(["prefix" => "Catalog"],function(){
    Route::get("/{ItemID}/Buy/{WalletType?}",[BuyItemController::class,'buyItem']);
    Route::get("/{ItemID}/Owned",[BuyItemController::class,'checkItem']);
});


