<?php

namespace App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset\Asset;

class Inventory extends Model
{
    protected $table = 'users_owneditems';
    protected $hidden = ["user_id","id"];
    protected $fillable = ["user_id","asset_id"];

    static public function userOwnsItem($UserID,$ItemID = 0)
    {
        return Inventory::where("user_id",$UserID)->where("asset_id",$ItemID)->exists();
    }

    static public function userAddItem($UserID,$ItemID = 0)
    {

        $Create = new Inventory();
        $Create->timestamps = false;
        $Create->user_id = $UserID;
        $Create->asset_id = $ItemID;
        $Create->save();
        return true;
    }

    static public function userDeleteItem($UserID,$ItemID = 0)
    {
        if(Inventory::where("user_id",$UserID)->where("asset_id",$ItemID)->limit(1)->count() > 0)
        {
            //TODO AVOID USER DELETING MADE BY HIM AND IMAGES/MESHES
            Inventory::where("user_id",$UserID)->where("asset_id",$ItemID)->delete();
            return true;
        }else{
            throw new \Exception("Item does not exist");
        }
    }

    /**Relations*/

    public function Asset()
    {
        return $this->belongsTo(Asset::class,'asset_id','id');
    }
}
