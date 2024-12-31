<?php

namespace App\Http\Controllers\web\Users;

use App\Http\Controllers\Controller;
use App\Models\User\Friend;
use Illuminate\Http\Request;
use App\Models\User\User;

class FriendsController extends Controller
{
    //MOVE TO REQUEST
    public function index($UserID)
    {
        $Data = User::findOrFail($UserID);
        $Friends = $Data->friends()->paginate(15);

        return view('Website.User.Friends', [
            "UserData" => $Data,
            "UserFriend" => $Friends,
        ]);
    }

    public function addFriend($UserID)
    {
        $Friend = Friend::new([
            "user_1" => $UserID,
            "user_2" => 1,
        ]);

        $Friend->save();
    }

    public function removeFriend($UserID)
    {

    }
}
