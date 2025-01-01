@extends('Website.Templates.PageView')

@section('Content')
    <div class="MessageContainer">
        <div id="MessagePane">
            <div id="ctl00_cphRoblox_pPrivateMessage">
                @section("MessageType","Friend Request")

                @section("MessageReader_Buttons")
                    <a id="ctl00_cphRoblox_lbCancel" class="Button" href="{{route("InboxPage")}}">Cancel</a>
                    <a id="ctl00_cphRoblox_lbDecline" class="Button" href="">Decline</a>
                    <a id="ctl00_cphRoblox_lbAccept" class="Button" href="">Accept</a>
                @endsection

                @section("ApiLink","FriendRequestHandler")

                @include("Website.Inbox.MessageBox.MessageReader")
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
@endsection
