<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Friend extends Model
{
    protected $table = 'users_friends';

    public static function friendsWith($UserID)
    {
        $MyID = 1;
        return Friend::where("user_1","=",$MyID)->Where("user_2","=",$UserID)
            ->orWhere("user_1","=",$UserID)->orWhere("user_2","=",$MyID)
            ->Where("approved","=",1)
            ->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_1","id");
    }
}
