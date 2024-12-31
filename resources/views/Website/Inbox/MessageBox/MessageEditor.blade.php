<form method="post" action="{{$linkAPI}}" id="ctl00_cphRoblox_pPrivateMessageEditor">
    <h3>Your Message</h3>
    <div id="MessageEditorContainer">
        <div class="MessageEditor">
            <table width="100%">
                <tbody><tr valign="top">
                    <td style="width:12em">
                        <div id="From">
                    <span class="Label">
                        <span id="ctl00_cphRoblox_rbxMessageEditor_lblFrom">From:</span></span> <span class="Field">
                            <span id="ctl00_cphRoblox_rbxMessageEditor_lblAuthor">{{Auth::user()->username}}</span></span>
                        </div>
                        <div id="To">
                    <span class="Label">
                        <span id="ctl00_cphRoblox_rbxMessageEditor_lblTo">Send To:</span></span> <span class="Field">
                            <span id="ctl00_cphRoblox_rbxMessageEditor_lblRecipient">{{$UserData->username}}</span></span>
                        </div>

                    </td>
                    <td style="padding:0 24px 6px 12px">
                        <div id="Subject">
                            <div class="Label">
                                <label for="ctl00_cphRoblox_rbxMessageEditor_txtSubject" id="ctl00_cphRoblox_rbxMessageEditor_lblSubject">Subject:</label></div>
                            <div class="Field">
                                <input name="Subject" value="{{ $MessageData->subject ?? null }}" type="text" id="ctl00_cphRoblox_rbxMessageEditor_txtSubject" class="TextBox" style="width:100%;">
                            </div>
                        </div>
                        <div class="Body">
                            <div class="Label">
                                <label for="ctl00_cphRoblox_rbxMessageEditor_txtBody" id="ctl00_cphRoblox_rbxMessageEditor_lblBody">Message:</label></div>
                                <textarea name="Body" rows="2" cols="20" id="ctl00_cphRoblox_rbxMessageEditor_txtBody" class="MultilineTextBox" style="width:100%;"></textarea>
                                <h4 style="color: Red;display:none;">Remember, Roblox staff will never ask you for your password. <br/>People who ask for your password are trying to steal your account.</h4>
                        </div>
                    </td>
                </tr>
                </tbody></table>
        </div>
        <div style="clear:both"></div>
    </div>
    <div class="Buttons">
        <button id="ctl00_cphRoblox_lbSend" class="Button" type="submit">Send</button>
        @csrf
        @method("post")
    </div>
</form>

