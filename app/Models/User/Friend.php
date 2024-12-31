<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class Friend extends Model
{
    protected $table = 'users_friends';
    //TODO: PORT TO REQUEST
    public static function friendsWith($UserID)
    {
        if(!Auth::check()){ return false;}
        $MyID = Auth::id();

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
