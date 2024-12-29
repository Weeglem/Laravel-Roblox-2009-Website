<?php
namespace App\Http\Controllers\web\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset\Asset;
use App\Models\Asset\AssetConfig;
use App\Models\Asset\Comment;
use App\Models\User\Favorites;
use App\Models\User\Inventory;
use Illuminate\Http\Request;


class AssetPageController extends Controller
{
    public function view(Request $request)
    {
        //CALL ASSET
        $ItemID = $request->id;
        $Asset = Asset::with("Config","Comments")->withCount("Favorites")->find($ItemID);
        $AssetConfig = $Asset->config;
        $Type = strtolower($Asset->type);
        $Final = $Type == "game" ? "Website.Items.Game" : "Website.Items.Item"; //LOAD VIEW

        //OTHER VALS
        $Comments = $Asset->comments()->paginate(11); //GET COMMENTS
        $EditMode = true;  //SHOWS CONFIGURATE ITEM PANEL AND HIDES REPORT BUTTON
        $Favorited = Favorites::CheckFavorite($ItemID); //GET IS FAVORITE FROM USER BOOLEAN
        $GameAccess = $AssetConfig->AccessLevel(); //GAME ACCESS TYPES:
                            //0 = Public,
                            //1 = Friends not allowed,
                            //2 = Friends you're allowed,
                            //3 = Closed to everyone,
        $OwnedItem = Inventory::userOwnsItem(1,$ItemID);

        //SET VARAIBLE ONLY IF TYPE IS GAME
        if($Type == "game"){
            //var_dump("Access level: ".$AssetConfig->AccessLevel());
            $GameAccess = $AssetConfig->AccessLevel();
        }

        return view($Final)->with([
            "ItemData" => $Asset,
            "ItemConfig" => $AssetConfig,
            "ItemOwner"=> $Asset->Owner,
            "ItemComments" => $Comments,
            "EditMode" => $EditMode,
            "Favorited" => $Favorited,
            "GameAccess" => $GameAccess,
            "OwnedItem" => $OwnedItem,
        ]);
    }

    public function viewEdit(Request $request)
    {
        $ItemID = $request->id;
        $Asset = Asset::with("Config")->find($ItemID);
        $AssetConfig = $Asset->config;
        $Type = strtolower($Asset->type);


        $Final = $Type == "game" ? "Website.Edit.Game" : "Website.Edit.Item"; //SETS VIEW
        $PriceEditor = false;   //SHOW TICKET ROBUX PRICE MENU

        return view($Final)->with([
            "ItemData" => $Asset,
            "ItemConfig" => $AssetConfig,
            "PriceEditor" => $PriceEditor,
        ]);
    }

    //TODO: ADD WIPE GAME
    //TODO: CUSTOM REQUEST
    public function update(Request $request)
    {
        //GET ITEM FROM ID
        $Asset = Asset::find($request->id);
        $AssetConfig = AssetConfig::find($request->id);

        //SET MAIN ASSET CHANGE
        $Asset->name = $request->Name;    //ITEM NAME
        $Asset->about = $request->Description; //ITEM ABOUT

        //ITEM SETTINGS HANDLER
        switch(strtolower($Asset->type))
        {
            case "game":
                $AssetConfig->is_friends_only = $request->PlaceAccess == "PrivateAccess" ? 1 : 0; //FRIENDS ONLY
                $AssetConfig->is_copylocked = $request->IsCopyProtected == "on" ? 1 : 0; //COPY LOCKED
                $AssetConfig->comments_allowed = 1;; //ALLOW COMMENTS ALWAYS
                break;

            case "model":
                $AssetConfig->on_sale = 1;           //FREE MODEL
                $AssetConfig->price_free = 1;        //SET PRICE FREE
                $AssetConfig->comments_allowed = 1;; //ALLOW COMMENTS ALWAYS
                break;

            case "cloth":
                $AssetConfig->on_sale = 1;  //IS FOR SALE
                $AssetConfig->comments_allowed = $request->AllowedComments == "on" ? 1 : 0;
                $AssetConfig->price_ticket = 0; //PRICES
                $AssetConfig->price_robux = 0;
                break;

                //SET ERROR TO UNKNOWN ITEM
            default:
                throw new \Exception("Invalid Item Type asaked",303);
                break;
        }

        //SAVE AND FINISH
        $AssetConfig->save();
        $Asset->save();
        return redirect()->back();
    }
}
