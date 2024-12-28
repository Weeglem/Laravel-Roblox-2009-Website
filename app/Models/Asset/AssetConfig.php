<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetConfig extends Model
{
    use hasFactory;
    public $timestamps = false;
    protected $primaryKey = "asset_id";
    protected $table = 'assets_data';
    protected $fillable = ["is_friends_only","is_free_model","is_copylocked","price_ticket","price_robux"];
}
