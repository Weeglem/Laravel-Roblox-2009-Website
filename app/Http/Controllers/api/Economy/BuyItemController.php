<?php

namespace App\Http\Controllers\api\Economy;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Asset\Asset;
use App\Models\User\Economy;
use App\Models\User\Inventory;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;


class BuyItemController extends Controller
{
    public function buyItem(Request $request)
    {
        try {

            if(!Auth::check()){
                throw new Exception("Unauthorized", 401);
            }

            $AssetID = $request->ItemID;
            $WalletType = $request->WalletType;


            $Item = Asset::find($AssetID);

            switch ($Item->type) {
                //MODEL BUY
                case "model":
                    Economy::BuyFreeItem(Auth::id(), $AssetID);
                    break;

                case "cloth":

                    //ADD FREE ITEM SUPPORT
                    $WalletType = $WalletType == "robux" ? "robux" : "ticket";
                    Economy::BuyWalletItem(Auth::id(), $AssetID, $WalletType);
                    break;

                default:
                    throw new \Exception("You can't buy this item.",303);
                    break;
            }

            return response()->json([
                "message" => "Item was added succesfuly to your inventory.",
                "code" => 200,
            ]);

        }catch (\Exception $exception){
            return response()->json([
                "message" => $exception->getMessage(),
                "code" => $exception->getCode(),
            ],$exception->getCode());
        }

    }

    public function checkItem(Request $request)
    {
        $AssetID = $request->ItemID;
        $UserID = 1;
        return response()->json(Inventory::userOwnsItem($UserID, $AssetID));
    }
}
