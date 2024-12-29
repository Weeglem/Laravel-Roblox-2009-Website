<?php

namespace App\Models\User;

use App\Models\Asset\Asset;
use Illuminate\Database\Eloquent\Model;

class Economy extends Model
{
    protected $table = "users_economy";
    public $timestamps = false;

    /**Models,Decals, Free*/
    static public function BuyFreeItem($UserID = 1, $AssetID = 0)
    {
        $Asset = Asset::find($AssetID);
        $User = User::find($UserID); //TODO:SET AUTH ID

        if(Inventory::userOwnsItem($User->id, $Asset->id)){
            throw new \Exception("You already own this item",303);
        }

        $Config = $Asset->Config;

        if($Config->on_sale != 1 || $Config->price_free != 1)
        {
            throw new \Exception("This item is not available for sale",404);
        }

        Inventory::userAddItem($User->id, $Asset->id);

        //echo "OnSale : $Config->on_sale <br>";
        //echo "Price_free : $Config->price_free <br>";
    }


    static public function BuyWalletItem($UserID = 1,$AssetID = 0,$withRobux = false)
    {

        $Asset = Asset::find($AssetID);
        $User = User::find($UserID); //TODO:SET AUTH ID

        if(Inventory::userOwnsItem($User->id, $Asset->id)){
            throw new \Exception("You already own this item",303);
        }

        //GET USER WALLET AND ITEM WORTH
        if(!$withRobux){
            //TICKETS
            $Price = $Asset->Config->price_ticket;  //GET ITEM PRICE
            $UserWallet = $User->Economy->ticket;   //GET TOTAL FROM USER WALLET
            $WalletType = "ticket"; //SET WALLET
        }else{
            //ROBUXS
            $Price = $Asset->Config->price_robux;   //GET ITEM PRICE
            $UserWallet = $User->Economy->robux;    //GET TOTAL FROM USER WALLET
            $WalletType = "robux";  //SET WALLET
        }

        //DO SALE
        if($UserWallet >= $Price) {
            Inventory::userAddItem($User->id, $Asset->id); //ADD ITEM
            $User->Economy()->decrement($WalletType,$Price); //DECREMENT USER REQUESTED PAY TYPE
        }else{
            throw new \Exception("You don't have enough ".$WalletType."s to buy this item",303);
        }
    }
}
