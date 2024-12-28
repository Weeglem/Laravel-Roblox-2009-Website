<?php

namespace App\Http\Controllers\api\User;

use App\Http\Controllers\Controller;
use App\Models\User\Inventory;
use Illuminate\Http\Request;

class InventoryApiController extends Controller
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

        $Data = Inventory::with("Asset")
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
}
