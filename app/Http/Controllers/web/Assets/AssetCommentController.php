<?php

namespace App\Http\Controllers\web\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AssetCommentController extends Controller
{
    //TODO: CUSTOM REQUEST
    public function postComment(Request $request)
    {
        $Validate = Validator::make($request->all(), [
            "message" => "required|string|max:10000|min:5",
        ],[
            "message.required" => "Comment box cannot be empty",
            "required" => "The :attribute field is required.",
            "numeric" => "The :attribute must be numeric.",
            "min" => "The :attribute must be at least :min.",
            "max" => "The :attribute must be at most :max.",
            "exists" => "The requested :attribute is invalid.",
        ]);

        if ($Validate->fails()) {
            return back()->withErrors($Validate)->withInput();
        }

        $Data = $Validate->validated();

        $Comment = new Comment([
            "asset_id" => $request->id,
            "user_id" => Auth::id(),
            "comment" => $request->message
        ]);

        $Comment->save();

        return redirect()->back();
    }
}
