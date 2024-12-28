<?php
namespace App\Http\Controllers\web\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset\Asset;
use App\Models\Asset\AssetConfig;
use App\Models\Asset\Comment;
use Illuminate\Http\Request;


class AssetPageController extends Controller
{
    public function view(Request $request)
    {
        $ItemID = $request->id;
        $Asset = Asset::with("Config","Comments")->find($ItemID);
        $AssetConfig = $Asset->config;
        $Type = strtolower($Asset->type);

        //Makes Items.game exclusives to games assets
        $Final = $Type == "game" ? "Website.Items.Game" : "Website.Items.Item";
        $Comments = $Asset->comments()->paginate(11);
        $EditMode = true;


        return view($Final)->with([
            "ItemData" => $Asset,
            "ItemConfig" => $AssetConfig,
            "ItemOwner"=> $Asset->Owner,
            "ItemComments" => $Comments,
            "EditMode" => $EditMode

        ]);
    }

    public function viewEdit(Request $request)
    {
        $ItemID = $request->id;
        $Asset = Asset::with("Config")->find($ItemID);
        $AssetConfig = $Asset->config;
        $Type = strtolower($Asset->type);

        //Makes Items.game exclusives to games assets
        $Final = $Type == "game" ? "Website.Edit.Game" : "Website.Edit.Item";

        //TODO: Comments are loaded via Javascript?
        return view($Final)->with([
            "ItemData" => $Asset,
            "ItemConfig" => $AssetConfig,
        ]);
    }

    public function postComment(Request $request)
    {
        $Comment = new Comment([
            "asset_id" => $request->id,
            "user_id" => 1,
            "comment" => $request->message
        ]);

        $Comment->save();

        return redirect()->back();
    }

    //TODO: ADD WIPE GAME
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
                //GAME
            case "game":
                $AssetConfig->is_friends_only = $request->PlaceAccess == "PrivateAccess" ? 1 : 0; //FRIENDS ONLY
                $AssetConfig->is_copylocked = $request->IsCopyProtected == "on" ? 1 : 0; //COPY LOCKED
                break;

                //MODEL
            case "model":
                $AssetConfig->on_sale = 1; //FREE MODEL
                $AssetConfig->comments_allowed = 1;
                break;

                //CLOTHES
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
