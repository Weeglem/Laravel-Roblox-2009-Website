<?php

namespace App\Models\User;

use App\Models\Asset\Asset;
use Illuminate\Database\Eloquent\Model;

class Economy extends Model
{
    protected $table = "users_economy";
    public $timestamps = false;

    static public function BuyClothes($AssetID = 0,$withRobux = false)
    {
        $Asset = Asset::find($AssetID);
        $User = User::find(1);

        if(Inventory::userOwnsItem($User->id, $Asset->id)){
            return response()->json([
                "message" => "you already own $Asset->name",
                "code" => 404
            ]);
        }

        if($withRobux == false){
            $Price = $Asset->Config->price_ticket;
            $UserWallet = $User->Economy->tickets;
            $DisplayEconomy = "Tickets";
        }else{
            $Price = $Asset->Config->price_robux;
            $UserWallet = $User->Economy->robuxs;
            $DisplayEconomy = "Robux";
        }


        //BUY ITEM
        if($UserWallet == $Price || $UserWallet >= $Price){
            Inventory::userAddItem($User->id,$Asset->id);

            if($withRobux)
            {
                $User->Economy()->update(["robuxs" => $UserWallet - $Price]);
            }else{
                $User->Economy()->update(["tickets" => $UserWallet - $Price]);
            }


            return response()->json([
                "message" => "$Asset->name was added to your inventory.",
                "code" => 200
            ]);
        }

        //REJECTED PURCHASE
        return response()->json([
            "message" => "You dont have enough $DisplayEconomy to buy this item.",
            "code" => 300
        ]);

    }

    static public function BuyModel($AssetID = 0)
    {
        $Asset = Asset::find($AssetID);
        $User = User::find(1); //MY ID PLACEHOLDER

        //USER OWNS MODEL
        if(Inventory::userOwnsItem($User->id, $Asset->id)){
            return response()->json([
                "message" => "you already own $Asset->name",
                "code" => 404
            ]);
        }

        //FILTER ONLY MODELS
        if($Asset->type != "model")
        {
            return response()->json([
                "message" => "This item isnt a model",
                "code" => 404
            ]);
        }

        //NOT FREE MODEL
        if($Asset->Config->is_free_model != 1)
        {
            return response()->json([
                "message" => "This item isnt open for sale",
                "code" => 303
            ]);
        }

        Inventory::userAddItem($User->id,$Asset->id);

        return response()->json([
            "message" => "$Asset->name was added to your inventory.",
            "code" => 200
        ]);
    }
}
