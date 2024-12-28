<?php

namespace App\Http\Controllers\api\Economy;
use App\Http\Controllers\Controller;
use App\Models\Asset\Asset;
use App\Models\User\Economy;
use Illuminate\Http\Request;


class BuyItemController extends Controller
{
    public function __invoke(Request $request)
    {
        $AssetID = $request->ItemID;
        $Type = $request->Type;

        //DETERMINE ITEM TYPE

        $Item = Asset::find($AssetID);

        //TODO: DENY GAMES BUY
        switch($Item->Type){
            //MODEL BUY
            case "model":
                return Economy::BuyModel($Item->id);
            break;

            //GAME BUY
            case "game":
                return response()->json(["message" => "You can't buy this item"], 403);
            break;

            //CLOTHES BUY
            default:
                $Type = $Type == "Robux";
                return Economy::BuyClothes($Item->id,$Type);
            break;
        }

    }
}
