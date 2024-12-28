@extends('Website.Templates.PageView')

@section('Content')
<div id="ctl00_cphRoblox_pPrivateMessageEditor">
		
    <h3>Your Message</h3>
    <div id="MessageEditorContainer">
        
<div class="MessageEditor">
<table width="100%">
<tbody><tr valign="top">
<td style="width:12em">
<div id="From">
    <span class="Label">
        <span id="ctl00_cphRoblox_rbxMessageEditor_lblFrom">From:</span></span> <span class="Field">
            <span id="ctl00_cphRoblox_rbxMessageEditor_lblAuthor">User</span></span>
</div>
<div id="To">
    <span class="Label">
        <span id="ctl00_cphRoblox_rbxMessageEditor_lblTo">Send To:</span></span> <span class="Field">
            <span id="ctl00_cphRoblox_rbxMessageEditor_lblRecipient">User</span></span>
</div>

</td>
<td style="padding:0 24px 6px 12px">
<div id="Subject">
    <div class="Label">
        <label for="ctl00_cphRoblox_rbxMessageEditor_txtSubject" id="ctl00_cphRoblox_rbxMessageEditor_lblSubject">Subject:</label></div>
    <div class="Field">
        <input name="ctl00$cphRoblox$rbxMessageEditor$txtSubject" type="text" value="RE: RE: P.S." id="ctl00_cphRoblox_rbxMessageEditor_txtSubject" class="TextBox" style="width:100%;"></div>
</div>
<div class="Body">
    <div class="Label">
        <label for="ctl00_cphRoblox_rbxMessageEditor_txtBody" id="ctl00_cphRoblox_rbxMessageEditor_lblBody">Message:</label></div>
    <textarea name="ctl00$cphRoblox$rbxMessageEditor$txtBody" rows="2" cols="20" id="ctl00_cphRoblox_rbxMessageEditor_txtBody" class="MultilineTextBox" style="width:100%;">

------------------------------
On 12/27/2007 at 4:44 PM User wrote:

[MusicalProgrammer modified this message]

------------------------------
On 12/27/2007 at 4:40 PM User wrote:

[MusicalProgrammer modified this message]</textarea>
</div>

</td>
</tr>
</tbody></table>
</div>

        <div style="clear:both"></div>
    </div>
    <div class="Buttons">
        <a id="ctl00_cphRoblox_lbSend" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$lbSend','')">Send</a>
        <a id="ctl00_cphRoblox_lbSendAndDelete" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$lbSendAndDelete','')">Send &amp; Delete</a>
    </div>

</div>
@endsection