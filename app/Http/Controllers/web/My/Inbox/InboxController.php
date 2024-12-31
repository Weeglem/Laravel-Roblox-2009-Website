<?php

namespace App\Http\Controllers\web\My\Inbox;

use App\Http\Controllers\Controller;
use App\Models\User\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User\User;

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

        $MessageData = Message::findOrFail($MessageID);

        if($MessageData->to_id != Auth::id()){
            return redirect()->back()->withErrors(["You do not own this message"]);
        }

        if($MessageData->seen == 0) {
            $MessageData->update(["seen" => 1]);
        }


        //SEE MESSAGE
        if(isset($MessageID)) {
            return view("Website.Inbox.See",[
                "UserData" => $MessageData->from,
                "MessageData" => $MessageData,
            ]);
        }

        //REPLY MESSAGE
        if(isset($ReplyID)) {
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
        if(!Auth::check()){ return redirect()->route("login")->with("notLogged","Please Login First"); }

        //DELETE SINGLE MESSAGE
        $MessageID = $request->ID;
        if(!is_null($MessageID)) {
            $Mess = Message::find($MessageID);
            if($Mess->to_id != Auth::id()){  return redirect()->route("InboxPage")->with("error","Unauthorised"); }
            $Mess->seen = 1;
            $Mess->deleted = 1;
            $Mess->save();
            return redirect()->route("InboxPage");
        }

        //DELETE MULTIPLE MESSAGES
        $Messages = $request->DeleteCheckbox;
        if(is_null($Messages) || count($Messages) <= 0) {  return redirect()->route("InboxPage")->with("error","No messages selected"); }

        foreach($Messages as $Message)
        {
            //todo: keep messages?
            $Mess = Message::find($Message);
            if($Mess->to_id != Auth::id()){  return redirect()->route("InboxPage")->with("error","Unauthorised"); }
            $Mess->seen = 1;
            $Mess->deleted = 1;
            $Mess->save();
        }

        return redirect()->route("InboxPage");
    }
}
