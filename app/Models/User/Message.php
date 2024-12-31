<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ["message","subject","seen"];
    protected $hidden = ["from_id", "to_id"];

    public function from()
    {
        return $this->belongsTo(User::class,"from_id", "id");
    }

    public function to()
    {
        return $this->belongsTo(User::class,"to_id", "id");
    }

    public function replies()
    {
        //TODO:CLEAN QUERY
        $Messages = Message::
        where("parent_id", "=", $this->parent_id)
            ->orWhere("id","=",$this->parent_id)
            ->orderBy("id","DESC")
            ->get();

        return $Messages->where("id","<",$this->id);
    }

    public static function sendMessage($ToID = 0,$Subject = "Test Subject", $message = "Hello World"){

        $Message = new Message();

        $Message->from_id = Auth::id();
        $Message->to_id = $ToID;
        $Message->subject = $Subject;
        $Message->message = $message;

        $Message->save();
        return true;
    }

    public static function replyMessage($MessageID = 0,$message = "Hello World"){

        $MessData = Message::findOrFail($MessageID);
        if($MessData->to_id != Auth::id()){throw new \Exception("Not Authorized",303);}

        $Message = new Message();
        $Message->from_id = Auth::id();
        $Message->to_id = $MessData->to_id;

        //CONTENT
        $Message->subject = "RE: ".$MessData->subject;
        $Message->message = $message;

        if(isset($MessData->parent_id)){
            $Message->parent_id = $MessData->parent_id;
        }else{
            $Message->parent_id = $MessData->id;
        }

        $Message->save();

        return true;
    }




    public static function sendFriendRequest($ToID = 0, $message = "Hello World"){

        if(!Auth::check()){
            throw new \Exception("Not logged in");
        }

        $Message = new Message([
            "from_id" => Auth::id(),
            "to_id" => $ToID,
            "message" => $message,
            "friend_request" => 1
        ]);

        $Message->save();
        return true;
    }



}
