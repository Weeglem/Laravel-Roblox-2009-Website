<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset\Asset;
use Carbon\Carbon;


class CatalogPageController extends Controller
{
    public function index(Request $request)
    {
        $UserSearch_Category = isset($request->c) ? $request->c : "2";
        $UserSearch_Browse = isset($request->m) ? $request->m : "TopFavorites";
        $UserSearch_Time = isset($request->t) ? $request->t : "PastDay";
        $UserSearch_Name = isset($request->SearchTextBox) ? $request->SearchTextBox : null;

        //AVAILABLE TAGS

        //KEY, ITEM ID
        //0 DB QUERY
        //1 VIEW DISPLAY


        $Available_BrowseTags = [
            "TopFavorites" => ["Top Favorites", "Favorite"],
            "BestSelling" => ["Best Selling", "Best Selling"],
            "RecentlyUpdated" => ["Recently Updated", "Recently Updated"],
            "ForSale" => ["For Sale", "For Sale"],
            "PublicDomain" => ["Public Domain","Public Domain"],
        ];

        $Available_TimeTags = [
            "PastDay" => ["Past Day", "Past Day"],
            "PastWeek" => ["Past Week", "Past Week"],
            "PastMonth" => ["Past Month", "Past Month"],
            "AllTime" => ["All Time", "All Time"],
        ];

        $Available_CategoryTags = [
            2 => ["T-Shirt", "T-Shirts"],
            11 => ["Shirt","Shirts"],
            12 => ["Pant","Pants"],
            8 => ["Hat","Hats"],
            13 => ["Decal","Decals"],
            10 => ["Model","Models"],
            9 => ["Game","Places"],
        ];

        \DB::statement("SET SQL_MODE=''");

        $CatalogItems = new Asset();
        $CatalogItems = $CatalogItems->withCount("Favorites","TotalPurchases");
        $CatalogItems = $CatalogItems->where("type","=",$Available_CategoryTags[$UserSearch_Category][0]);

        if(!is_null($UserSearch_Name))
        {
            $CatalogItems = $CatalogItems->where("name","like",$UserSearch_Name."%");
        }

        switch($UserSearch_Browse) {
            case "TopFavorites":
                $CatalogItems = $CatalogItems->join("users_favorites","users_favorites.asset_id","=","assets.id");
                $CatalogItems = $CatalogItems->groupBy("users_favorites.asset_id");
                $CatalogItems = $CatalogItems->orderBy("users_favorites.asset_id","DESC");
                break;

            case "BestSelling":
                $CatalogItems = $CatalogItems->join("users_owneditems","users_owneditems.asset_id","=","assets.id");
                $CatalogItems = $CatalogItems->groupBy("users_owneditems.asset_id");
                $CatalogItems = $CatalogItems->orderBy("users_owneditems.asset_id","DESC");
                break;

            case "RecentlyUploaded":
                $CatalogItems = $CatalogItems->orderBy("created_at","DESC");
                break;

            case "PublicDomain":
                $CatalogItems = $CatalogItems->join("assets_data","assets_data.asset_id","=","assets.id");
                $CatalogItems = $CatalogItems->where("assets_data.on_sale","=",1);
                $CatalogItems = $CatalogItems->where("assets_data.buy_with_free","=",1);
                break;

            default:
            case "ForSale":
                $CatalogItems = $CatalogItems->join("assets_data","assets_data.asset_id","=","assets.id");
                $CatalogItems = $CatalogItems->where("assets_data.on_sale","=",1);
                break;
        }

        switch($UserSearch_Time)
        {
            case "PastDay":
                $ComparateData = Carbon::now()->subDays(1);

                //dd($ComparateData);
                break;
            case "PastWeek":
                $ComparateData = Carbon::now()->subWeek();
                //dd($ComparateData);
                break;
            case "PastMonth":
                $ComparateData = Carbon::now()->subMonth();
                //dd($ComparateData);
                break;

            default:
                break;
        }


        $CatalogItems = $CatalogItems->paginate(20)->withQueryString();
        //HANDLE NOT FOUND IN ARRAY

        return view("Website.Catalog",[

            "ItemsData" => $CatalogItems,

            //TopBar
            "SearchName" => $Available_CategoryTags[$UserSearch_Category][1],
            "SearchBrowse" => $Available_BrowseTags[$UserSearch_Browse][1],
            "SearchTime" => $Available_TimeTags[$UserSearch_Time][1],


            //Original Search
            "UserSearch_Browse" => $UserSearch_Browse,
            "UserSearch_Time" => $UserSearch_Time,
            "UserSearch_Category" => $UserSearch_Category,
            "UserSearch_Name" => $UserSearch_Name,

            //Tags
            "Available_BrowseTags" => $Available_BrowseTags,
            "Available_TimeTags" => $Available_TimeTags,
            "Available_CategoryTags" => $Available_CategoryTags,
        ]);

    }
}
