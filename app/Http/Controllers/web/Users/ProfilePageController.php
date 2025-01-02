<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPage_Request;
use App\Models\User\Inventory;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class ProfilePageController extends Controller
{
    //
    public function index(UserPage_Request $request){

        $UserID = $request->ID;

        if(is_null($UserID))
        {
            if(Auth::check())
            {
                $UserID = Auth::id();
                $EditMode = true;
            }else{
                return redirect()->route("login");
            }

        }else{
            $UserID = $UserID;
            $EditMode = false;
        }

        $UserData = User::withCount("friends")->findOrFail($UserID);

        $ShowcaseData = $UserData->Showcase;
        $UserFriends = $UserData->friends;
        $UserPendingFriends = $UserData->friends_requests;
        $UserMembership = $UserData->membership;

        return view("Website.User.ProfilePage.Page",[
            "UserData" => $UserData,
            "UserGames" => $ShowcaseData,
            "UserFriends" => $UserFriends,
            "UserPendingFriends" => $UserPendingFriends,
            "MyProfile" => $EditMode,
            "UserMembership" => $UserMembership,
        ]);
    }
}
