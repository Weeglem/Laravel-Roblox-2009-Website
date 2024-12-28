<?php

namespace App\Models\Asset;

use App\Models\User\User;
use App\Models\Asset\Asset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'assets_comments';
    protected $fillable = [ "asset_id","user_id","comment" ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, "asset_id");
    }
}
