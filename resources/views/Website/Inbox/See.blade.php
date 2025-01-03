@extends('Website.Templates.PageView')

@section('Content')
    <div class="MessageContainer">
        <div id="MessagePane">
            <div id="ctl00_cphRoblox_pPrivateMessage">
                @section("MessageType","Private Message")

                @section("MessageReader_Buttons")
                    <a id="ctl00_cphRoblox_lbCancel" class="Button" href="{{route("Inbox_Message",["ReplyID" => $MessageData->id])}}">Reply</a>
                    <button id="ctl00_cphRoblox_lbDelete" name="action" class="Button" type="submit" value="delete">Delete</button>
                    <a id="ctl00_cphRoblox_lbCancel" class="Button" href="{{route("InboxPage")}}">Cancel</a>
                @endsection

                @section("ApiLink",route("Inbox_Page_DeleteMessages_post",["ID" => $MessageData->id]))

                @include("Website.Inbox.MessageBox.MessageReader")
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
@endsection


