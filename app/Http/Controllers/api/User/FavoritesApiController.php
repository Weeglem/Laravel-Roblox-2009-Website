<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\Controller;
use App\Models\User\Favorites;
use http\Env\Response;
use Illuminate\Http\Request;

class FavoritesApiController extends Controller
{
    public function index(Request $request)
    {
        $FinalData = array();
        $PaginateTemplate = array(
            "nextPage" => true,
            "prevPage" => false,
            "currentPage" => false,
            "lastPage" => false,
            "data" => ""
        );

        $Data = Favorites::with("Asset")
            ->where("user_id",$request->UserID)
            ->paginate(6);

        foreach($Data as $Item){
            $FinalData[] = array(
                "id"=> $Item->Asset->id,
                "Name"=> $Item->Asset->name,
                "Owner_id" => $Item->Asset->owner_id,
                "Owner_name" => $Item->Asset->Owner->username,
                "Thumbnail" => "file:///C:/xampp/htdocs/RobloxWebsite/public/img/Default/broken-120x120.Png"
            );
        }

        $PaginateTemplate["nextPage"] = $Data->hasMorePages();
        $PaginateTemplate["prevPage"] = $Data->currentPage() > 1;
        $PaginateTemplate["currentPage"] = $Data->currentPage();
        $PaginateTemplate["data"] = $FinalData;
        $PaginateTemplate["lastPage"] = $Data->lastPage();

        return response()->json($PaginateTemplate);
    }

    public function newFavorite(Request $request)
    {
        try{
            Favorites::addFavorite($request->ItemID);
            return response()->json(
                [
                    "message" => "Favorite added successfully",
                    "code" => "200"
                ]);
        }
        catch (\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage(),
                    "code" => $e->getCode()
                ]);
        }
    }

    public function removeFavorite(Request $request)
    {
        try{
            Favorites::removeFavorite($request->ItemID);
            return response()->json(
                [
                    "message" => "Favorite removed successfully",
                    "code" => "200"
                ]);
        }
        catch (\Exception $e){
            return response()->json(
                [
                    "message" => $e->getMessage(),
                    "code" => $e->getCode()
                ]);
        }
    }

    public function checkFavorite(Request $request)
    {
        $AssetID = $request->ItemID;
        return response()->json(["case" => Favorites::checkFavorite($AssetID)]);
    }
}
