@extends('Website.Templates.PageView')

@section('Content')
<div class="MessageContainer">
    <div id="MessagePane">
        <div id="ctl00_cphRoblox_pConfirmation">
            <div id="Confirmation">
                <h3>Message Sent</h3>
                <div id="Message"><span id="ctl00_cphRoblox_lConfirmationMessage">Your message has been sent to user.</span></div>
                <div class="Buttons"><a id="ctl00_cphRoblox_lbContinue" class="Button" href="{{route("InboxPage")}}">Continue</a></div>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
@endsection
