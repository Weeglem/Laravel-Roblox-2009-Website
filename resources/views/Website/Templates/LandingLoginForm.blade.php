<h5>Member Login</h5>
<div class="AspNet-Login">
    <div class="AspNet-Login">
        <div class="AspNet-Login-UserPanel">
            <label for="UserName" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserNameLabel" class="Label">Character Name</label>
            <input name="UserName" type="text" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserName" tabindex="1" class="Text">
        </div>
        <div class="AspNet-Login-PasswordPanel">
            <label for="Password" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_PasswordLabel" class="Label">Password</label>
            <input name="Password" type="password" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Password" tabindex="2" class="Text">
        </div>
        <!--div class="AspNet-Login-RememberMePanel"-->

        <!--/div-->
        <div class="AspNet-Login-SubmitPanel">
            <button type="submit" class="Button">Login</button>
        </div>

        <div id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_RegisterDiv" align="center">
            <br>
            <a id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Register" tabindex="5" class="Button" href="{{route("newAccount")}}">Register</a>
        </div>

        <div class="AspNet-Login-PasswordRecoveryPanel">
            <a id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_hlPasswordRecovery" tabindex="6" href="Login/ResetPasswordRequest.aspx">Forgot your password?</a>
        </div>
    </div>

</div>
