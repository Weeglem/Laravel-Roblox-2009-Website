<?php

namespace App\Models\Asset;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';
    //
    public function Owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function Config()
    {
        return $this->belongsTo(AssetConfig::class, 'id', 'asset_id');
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class, 'asset_id', 'id');
    }
}
