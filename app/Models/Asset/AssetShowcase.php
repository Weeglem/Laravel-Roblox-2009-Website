<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Model;
use App\Models\Asset\Asset;

class AssetShowcase extends Model
{
    protected $table = 'assets_showcase';
    //
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id',"id");
    }
}
