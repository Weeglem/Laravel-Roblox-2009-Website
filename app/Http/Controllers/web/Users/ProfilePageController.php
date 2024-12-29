<?php

namespace App\Http\Controllers\web\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\User;

class ProfilePageController extends Controller
{
    //
    public function index($ID){
        $UserData = User::find($ID);
        $ShowcaseData = $UserData->Showcase;

        return view("Website.User.ProfilePage.Page",[
            "UserData" => $UserData,
            "UserGames" => $ShowcaseData,
            "MyProfile" => false,
        ]);
    }
}
