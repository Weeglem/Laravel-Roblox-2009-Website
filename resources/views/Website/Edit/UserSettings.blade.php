@extends('Website.Templates.PageView')

@section('Content')

<div id="EditProfileContainer">
    <h2>Edit Profile</h2>
    <div id="AgeGroup">
        <fieldset title="Update your age-group">
            <legend>Update your age-group</legend>
            <div class="Suggestion">
                This is used to customize your ROBLOX experience.  Users under 13 years are only shown pre-approved images.
            </div>
            <div class="AgeGroupRow">
                <table id="ctl00_cphRoblox_rblAgeGroup" border="0">
<tbody><tr>
    <td><input id="ctl00_cphRoblox_rblAgeGroup_0" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="1" tabindex="1"><label for="ctl00_cphRoblox_rblAgeGroup_0">Under 13 years</label></td>
</tr><tr>
    <td><input id="ctl00_cphRoblox_rblAgeGroup_1" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="2" checked="checked" tabindex="1"><label for="ctl00_cphRoblox_rblAgeGroup_1">13 years or older</label></td>
</tr>
</tbody></table>
            </div>
        </fieldset>
    </div>
    <div id="ChatMode">
        <fieldset title="Update your chat mode">
            <legend>Update your chat mode</legend>
            <div class="Suggestion">
                All in-game chat is subject to profanity filtering and moderation.  For enhanced chat safety, choose SuperSafe Chat; only chat from pre-approved menus will be shown to you.
            </div>
            <div class="ChatModeRow">
                <table id="ctl00_cphRoblox_rblChatMode" border="0">
<tbody>
    <tr>
        <td><input id="ctl00_cphRoblox_rblChatMode_0" type="radio" name="ctl00$cphRoblox$rblChatMode" value="False" checked="checked" tabindex="2"><label for="ctl00_cphRoblox_rblChatMode_0">Safe Chat</label></td>
    </tr>
    <tr>
        <td><input id="ctl00_cphRoblox_rblChatMode_1" type="radio" name="ctl00$cphRoblox$rblChatMode" value="True" tabindex="2"><label for="ctl00_cphRoblox_rblChatMode_1">SuperSafe Chat</label></td>
    </tr>
</tbody>

    </table>
            </div>
        </fieldset>
    </div>
    <div id="ResetPassword">
        <fieldset title="Reset your password">
            <legend>Change your password</legend>
            <div class="Suggestion">Click the button below to change your password.</div>
            <div class="ResetPasswordRow">
                &nbsp;<a id="ctl00_cphRoblox_ChangePassword" href="">Change Password</a></div>
        </fieldset>
    </div>
    <div id="EnterEmail">
        <fieldset title="Update Email Address">
            <legend>Update Email Address</legend>
            <div class="Validators">
                <div><span id="ctl00_cphRoblox_RegularExpressionValidator2" style="color:Red;display:none;">Please enter a valid email address.</span></div>
                <div><span id="ctl00_cphRoblox_RequiredFieldValidator1" style="color:Red;display:none;">Email is required.</span></div>
                <div><span id="ctl00_cphRoblox_CustomValidatorEmail" style="color:Red;display:none;">An account with this email address already exists.</span></div>
            </div>
            <div class="EmailRow">
                <label for="ctl00_cphRoblox_TextBoxEMail" id="ctl00_cphRoblox_LabelEmail" class="Label">Email:</label>&nbsp;
                <input name="ctl00$cphRoblox$TextBoxEMail" type="text" value="" id="ctl00_cphRoblox_TextBoxEMail" tabindex="4" class="TextBox">
            </div>
        </fieldset>
    </div>
    <div id="Blurb">
        <fieldset title="Update your personal blurb">
            <legend>Update your personal blurb</legend>
            <div class="Suggestion">
                Describe yourself here (max. 1000 characters).  Make sure not to provide any details that can be used to identify you outside ROBLOX.
            </div>
            <div class="BlurbRow">
                <textarea name="ctl00$cphRoblox$tbBlurb" rows="2" cols="20" id="ctl00_cphRoblox_tbBlurb" tabindex="3" class="MultilineTextBox"></textarea>
            </div>
        </fieldset>
    </div>
    <div class="Buttons">
        <a id="ctl00_cphRoblox_lbSubmit" tabindex="4" class="Button" href="#">Update</a>
        <a id="ctl00_cphRoblox_lbSubmit" tabindex="4" class="Button" href="#">Cancel</a>
    </div>
</div>

@endsection