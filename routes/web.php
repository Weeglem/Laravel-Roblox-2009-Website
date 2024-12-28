<?php

use App\Http\Controllers\web\Assets\AssetPageController;
use App\Http\Controllers\api\User\FavoritesApiController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "Favs"], function () {
   Route::get("/{UserID}",[FavoritesApiController::class,'index']);
   Route::get("/{ItemID}/Add",[FavoritesApiController::class,'newFavorite']);
    Route::get("/{ItemID}/Remove",[FavoritesApiController::class,'RemoveFavorite']);
});

Route::group(["prefix" => "Item"], function () {
   Route::get("/{id}",[AssetPageController::class,'view']);
    Route::get("/{id}/Edit",[AssetPageController::class,"viewEdit"]);
    Route::post("/{id}/Update",[AssetPageController::class,"update"])->name("UpdateAsset_Post");
    Route::post("/{id}/AddComment",[AssetPageController::class,"postComment"])->name("AddAsset_Comment");
});
