<?php

namespace App\Http\Controllers\api\Economy;
use App\Http\Controllers\Controller;
use App\Models\Asset\Asset;
use App\Models\User\Economy;
use App\Models\User\Inventory;
use Illuminate\Http\Request;
use Illuminate\Auth;
use mysql_xdevapi\Exception;


class BuyItemController extends Controller
{
    public function buyItem(Request $request)
    {
        try {
            $AssetID = $request->ItemID;
            $WalletType = $request->WalletType;


            $Item = Asset::find($AssetID);

            switch ($Item->type) {
                //MODEL BUY
                case "model":
                    Economy::BuyFreeItem(1, $AssetID);
                    break;

                case "cloth":

                    //ADD FREE ITEM SUPPORT
                    $WalletType = $WalletType == "robux" ? "robux" : "ticket";
                    Economy::BuyWalletItem(1, $AssetID, $WalletType);
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
