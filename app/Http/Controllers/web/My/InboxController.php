<?php

namespace App\Http\Controllers\web\My\Inbox;

use App\Http\Controllers\Controller;
use App\Models\User\Friend;
use App\Models\User\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;
use Mockery\Exception;

class InboxController extends Controller
{
    public function index(Request $request)
    {
        $Sort = isset($request->Sort) ?? $request->Sort;
        $Messages = Message::where("to_id","=",Auth::id())->where("deleted","=",0);
        $Messages = $Messages->orderBy("id","DESC");

        switch ($Sort) {
            case "From":
                $Messages = $Messages->orderBy("from_id","DESC");
            break;
            case "Subject":
                $Messages = $Messages->orderBy("subject","DESC");
            break;
            default:
            case "Date":
                $Messages = $Messages->orderBy("created_at","DESC");
            break;
        }

        $Messages = $Messages->paginate(15);


        return view("Website.Inbox.index",[
            "MessagesData" => $Messages
        ]);
    }

    public function MessageHandler(Request $request)
    {
        $MessageID = $request->MessageID;
        $UserID = $request->UserID;
        $ReplyID = $request->ReplyID;

        //TODO:CLEAN THIS PAGE

        //NEW MESSAGE
        if(isset($UserID)) {
            $UserData = User::findOrFail($UserID);

            return view("Website.Inbox.Write",[
                "UserData" => $UserData,
                "linkAPI" => route("Inbox_NewMessage_post",["UserID"=>$UserData->id]),
            ]);
        }

        //SEE MESSAGE
        if(isset($MessageID)) {
            $MessageData = Message::findOrFail($MessageID);


            if($MessageData->to_id != Auth::id()){
                throw new \Exception("You dont own this message");
                //return redirect()->back()->withErrors(["You do not own this message"]);
            }

            if($MessageData->seen == 0) {$MessageData->update(["seen" => 1]);}

            $View = $MessageData->friend_request == 1 ? "Website.Inbox.SeeFriendRequest" : "Website.Inbox.See";

            return view($View,[
                "UserData" => $MessageData->from,
                "MessageData" => $MessageData,
            ]);
        }

        //REPLY TO MESSAGE
        if(isset($ReplyID)) {
            $MessageData = Message::findOrFail($ReplyID);

            if($MessageData->to_id != Auth::id()){
                return redirect()->back()->withErrors(["You do not own this message"]);
            }

            if($MessageData->seen == 0) {
                $MessageData->update(["seen" => 1]);
            }



            return view("Website.Inbox.Reply",[
                "UserData" => $MessageData->from,
                "MessageData" => $MessageData,
                "linkAPI" => route("Inbox_NewMessage_post",["MessageID"=>$MessageData->id]),
            ]);
        }



    }

    public function newMessage(Request $request)
    {
        if(!Auth::check()){ redirect()->route("login")->withErrors("error","not logged in"); }

        $MessageID = $request->MessageID;

        if(isset($MessageID)) {
            Message::replyMessage($MessageID,$request->Body);
        }else{
            $UserID = $request->UserID;
            Message::sendMessage($UserID,$request->Subject, $request->Body);
        }

        return back()->with("MessageSuccess","Message sent");

    }


    public function deleteMessages(Request $request)
    {
        $MessagesArray = array();
        if(!Auth::check()){ return redirect()->route("login")->with("notLogged","Please Login First"); }

        //APPEND ID TO ARRAY
        if(!is_null($request->ID)) {
            $MessagesArray[] = $request->ID;
        }

        if(!is_null($request->DeleteCheckbox))
        {
            foreach($request->DeleteCheckbox as $MessageID) {
                $MessagesArray[] = $MessageID;
            }
        }

        if(count($MessagesArray) <= 0 ) {
            //TODO: Fix message not showind up
            return redirect()->route("InboxPage")->withErrors("No Messages Found");
        }

        //DELETE LOOP

        foreach($MessagesArray as $Message) {
            //TODO: Sanitize ?
            if(!filter_var($Message, FILTER_VALIDATE_INT)) {
                return;
            }

            if(Message::find($Message)->exists){
                try {
                    Message::find($Message)->deleteMessage();
                }catch (Exception $e) {
                    //dont do shit
                }
            }
        }

        return redirect()->route("InboxPage");
    }
}
