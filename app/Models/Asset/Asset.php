<?php

namespace App\Models\Asset;

use App\Models\User\Favorites;
use App\Models\User\Friend;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Inventory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Carbon\CarbonInterface;


class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    public function LastUpdated()
    {
        //THIS SUCKS BUT WORKS
        //TODO: REVIEW IF AGO IS NEEDED
        return $this->updated_at->diffForHumans(Carbon::now(), CarbonInterface::DIFF_ABSOLUTE)." ago";
    }
    //
    public function Owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function TotalPurchases()
    {
        return $this->belongsTo(Inventory::class,"id","asset_id");
    }

    public function Config()
    {
        return $this->belongsTo(AssetConfig::class, 'id', 'asset_id');
    }

    public function Favorites()
    {
        return $this->hasMany(Favorites::class, "asset_id","id");
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class, 'asset_id', 'id');
    }


}
