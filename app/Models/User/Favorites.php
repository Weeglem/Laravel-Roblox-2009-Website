<?php

namespace App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset\Asset;

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
        if(!Asset::where("id",$ItemID)->exists())
        {
            throw new \Exception("Requested item does not exists.",404);
        }

        if(self::userFavorite(1,$ItemID)) {
            throw new \Exception("this Item is already added to your favorites.",303);
        }

        $Create = new Favorites();
        $Create->timestamps = false;
        $Create->asset_id = $ItemID;
        $Create->user_id = 1;
        $Create->save();

        return true;
    }

    static public function removeFavorite($ItemID = 0){

        if(self::userFavorite(1,$ItemID)){
            Favorites::where('asset_id',$ItemID)->where('user_id',1)->delete();
            return true;
        }

        throw new \Exception("You dont have this item on favorites.",303);
    }

    public function Asset()
    {
        return $this->belongsTo(Asset::class,'asset_id','id');
    }
}
