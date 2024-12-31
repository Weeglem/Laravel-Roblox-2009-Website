@extends('Website.Templates.PageView')

@section('Content')
    <div class="MessageContainer">
        <div id="MessagePane">
            <div id="ctl00_cphRoblox_pPrivateMessage">
                @if(session("MessageSuccess"))
                    @include("Website.Inbox.MessageBox.Success")
                @else
                    @include("Website.Inbox.MessageBox.MessageReader")
                    @include("Website.Inbox.MessageBox.MessageEditor")
                @endif
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
@endsection
