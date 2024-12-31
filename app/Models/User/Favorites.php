<?php

namespace App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset\Asset;
use Illuminate\Support\Facades\Auth;

class Favorites extends Model
{
    protected $table = 'users_favorites';
    protected $hidden = ["user_id","id"];
    protected $fillable = ["user_id","asset_id"];


    static public function userFavorite($UserID = 0,$ItemID = 0)
    {
        return Favorites::where("user_id",$UserID)->where("asset_id",$ItemID)->exists();
    }

    static public function addFavorite($ItemID = 0)
    {
        if(!Auth::check())
        {
            throw new \Exception("You are not logged to Roblox",303);
        }

        if(!Asset::where("id",$ItemID)->exists())
        {
            throw new \Exception("Requested item does not exists.",404);
        }

        if(self::userFavorite(Auth::id(),$ItemID)) {
            throw new \Exception("this Item is already added to your favorites.",303);
        }

        $Create = new Favorites();
        $Create->timestamps = false;
        $Create->asset_id = $ItemID;
        $Create->user_id = Auth::id();
        $Create->save();

        return true;
    }

    static public function removeFavorite($ItemID = 0){

        if(!Auth::check())
        {
            throw new \Exception("You are not logged to Roblox",303);
        }

        if(self::userFavorite(Auth::id(),$ItemID)){
            Favorites::where('asset_id',$ItemID)->where('user_id',Auth::id())->delete();
            return true;
        }

        throw new \Exception("You dont have this item on favorites.",303);
    }

    static public function checkFavorite($ItemID = 0)
    {
        if(!Auth::check()) { return false; }
        return Favorites::where("user_id",Auth::id())->where("asset_id",$ItemID)->limit(1)->exists();
    }
    public function Asset()
    {
        return $this->belongsTo(Asset::class,'asset_id','id');
    }
}
