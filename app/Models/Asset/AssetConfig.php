<?php

namespace App\Models\Asset;

use App\Models\User\Friend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asset\Asset;
use Illuminate\Support\Facades\Auth;

class AssetConfig extends Model
{
    use hasFactory;
    public $timestamps = false;
    protected $primaryKey = "asset_id";
    protected $table = 'assets_data';
    protected $fillable = ["is_friends_only","is_free_model","is_copylocked","price_ticket","price_robux"];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
    public function AccessLevel()
    {
        //GAME ACCESS TYPES:
        //0 = Public,
        //1 = Friends not allowed,
        //2 = Friends you're allowed,
        //3 = Closed to everyone,

        if($this->is_friends_only == 0)
        {
            return 0; //PUBLIC
        }

        if($this->is_friends_only == 1)
        {
            if(Auth::check()){

                //ACCESS IF OWNER
                //TODO: MAKE ACCESS SEPARATE FROM DISPLAYER
                if(Auth::id() == $this->asset->owner_id){ return 2; }

                return !Friend::friendsWith($this->asset->owner_id) ? 1 : 2;
            }else{
                //NOT LOGGED, EXIT
                return 1; //NO ACCESS
            }

        }
    }
}
