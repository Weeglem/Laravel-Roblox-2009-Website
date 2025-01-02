<?php

namespace App\Http\Controllers\web\My\Friends;

use App\Http\Controllers\Controller;
use App\Models\User\Message;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Friend;
use Symfony\Component\String\Inflector\FrenchInflector;

class MyFriendsController extends Controller
{
    public function index()
    {
        $UserFriends = Auth::user()->friends()->paginate(15);

        return view("Website.Edit.Friends",
        ["UserFriends" => $UserFriends]);
    }

    public function sendRequestView(Request $request){

        $UserID = $request->UserID;
        $UserData = User::findOrFail($UserID);

        if(Friend::friendsWith($UserID))
        {
            return view("Website.Inbox.MessageBox.Failed",
                [
                    "ErrorName" => "Already friends",
                    "ErrorReason" => "You are already friends with $UserData->username"]
            );
        }

        if(Friend::pendingRequest($UserID)){
            if(Friend::friendRequest_CanApprove($UserID)){
                return redirect()->route("Inbox_Message",["MessageID" => Friend::RequestgetMessage($UserID)]);
            }else{
                return view("Website.Inbox.MessageBox.Failed",
                    [
                        "ErrorName" => "Already sent Friend Request",
                        "ErrorReason" => "You already sent a friend request to $UserData->username"]
                    );
            }
        }


        return view("Website.Inbox.WriteFriendRequest",
        [
            "UserData" => $UserData,
            "linkAPI"=> route("MyFriends_SendRequest_post",["UserID" => $UserID])
        ]);
    }

    public function sendRequest(Request $request){
        $UserID = $request->UserID;
        $UserData = User::findOrFail($UserID);

        if(Friend::friendsWith($UserID)){
            throw new \Exception("You are already friends with this user");
        }

        $Message = new Message();
        $Message->from_id = Auth::id();
        $Message->to_id = $UserID;
        $Message->friend_request = 1;
        $Message->subject = "Friend Request";
        $Message->message = $request->Body;
        $Message->save();

        $Friend = new Friend();
        $Friend->user_1 = Auth::id();
        $Friend->user_2 = $UserID;
        $Friend->message_id = $Message->id;
        $Friend->save();



        return back()->with("MessageSuccess","Message sent");
    }

    public function delete(Request $request)
    {
        //TODO: CHECK REQUESTS
        $UserID = $request->deleteUserID;

        try{
            Friend::removeFriend($UserID);
            return redirect()->back();
        }catch(\Exception $exception){
            return redirect()->back()->withErrors(["DeleteUser" =>  $exception->getMessage()]);
        }
    }

    public function declineFriend(Request $request){
        $UserID = $request->UserID;
        Friend::DeclineRequest($UserID);
        return back();
    }

    public function acceptFriend(Request $request){
        $UserID = $request->UserID;
        Friend::AcceptRequest($UserID);
        return back();
    }

    public function acceptAllFriend(Request $request){
        Friend::AcceptAllRequests();
        return back();
    }

    public function declineAllFriend(Request $request){
        Friend::DeclineAllRequests();
        return back();
    }


}
