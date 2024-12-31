<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
class UserAuthentication extends Controller
{

    public function viewLogin()
    {
        if(Auth::check()){return redirect()->back();}
        return view("Website.Auth.Login");
    }

    public function viewNew()
    {
        if(Auth::check()){return redirect()->back();}
        return view("Website.Auth.SignUp");
    }

    public function login(Request $request){
        if(Auth::check()){return redirect()->back()->with("error","You are already logged in");}

        $Data = $request->validate([
            "UserName" => "required|string",
            "Password" => "required",
        ]);

        if(!Auth::attempt(["username" => $request->UserName,"password" => $request->Password]))
        {
            return back()->withErrors(["Wrong username or password"]);
        }

        return redirect()->intended(route("landingPage"));
    }

    public function createAccount(Request $request)
    {
        if(Auth::check()){return redirect()->back()->with("error","You are already logged in");}

        $User = new User();
        $User->username = $request->UserName;
        $User->password = Hash::make($request->Password);
        $User->email = $request->Email;
        $User->save();

        Auth::login($User);
        return redirect()->route("landingPage");
    }

    public function Logout(Request $request)
    {
        if(!Auth::check()){return redirect()->back()->with("error","You are not logged in");}
        Auth::logout();

        return redirect()->back();
    }






}
