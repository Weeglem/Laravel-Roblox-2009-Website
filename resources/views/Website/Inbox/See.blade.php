@extends('Website.Templates.PageView')

@section('Content')
    <div class="MessageContainer">
        <div id="MessagePane">
            <div id="ctl00_cphRoblox_pPrivateMessage">
                @include("Website.Inbox.MessageBox.MessageReader")
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
@endsection
