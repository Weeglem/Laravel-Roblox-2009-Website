@extends('Website.Templates.PageView')

@section('Content')
<div id="Body">


    <div id="Registration">
        <form id="ctl00_cphRoblox_upAccountRegistration" action="{{route("newAccountPost")}}"  method="POST">
                @csrf
                @method("post")
                <h2>Sign Up and Play</h2>
                <h3>Step 1 of 2: Create Account</h3>
                <div id="EnterUsername">
                    <fieldset title="Choose a name for your Roblox character">
                        <legend>Choose a name for your Roblox character</legend>
                        <div class="Suggestion">
                            Use 3-20 alphanumeric characters: A-Z, a-z, 0-9, no spaces
                        </div>
                        <div class="Validators">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="UsernameRow">
                            <label for="ctl00_cphRoblox_UserName" id="ctl00_cphRoblox_UserNameLabel" class="Label">Character Name:</label>&nbsp;
                            <input name="UserName" id="ctl00_cphRoblox_UserName" tabindex="1" class="TextBox" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" autocomplete="off" type="text">
                        </div>
                    </fieldset>
                </div>
                <div id="EnterPassword">
                    <fieldset title="Choose your Roblox password">
                        <legend>Choose your Roblox password</legend>
                        <div class="Validators">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="PasswordRow">
                            <label for="ctl00_cphRoblox_Password" id="ctl00_cphRoblox_LabelPassword" class="Label">Password:</label>
                            &nbsp;
                            <input name="Password" id="ctl00_cphRoblox_Password" tabindex="2" class="TextBox" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" autocomplete="off" type="password">
                        </div>
                        <div class="ConfirmPasswordRow">
                            <label for="ctl00_cphRoblox_TextBoxPasswordConfirm" id="ctl00_cphRoblox_LabelPasswordConfirm" class="Label">Confirm Password:</label>&nbsp;<input name="ctl00$cphRoblox$TextBoxPasswordConfirm" id="ctl00_cphRoblox_TextBoxPasswordConfirm" tabindex="3" class="TextBox" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;" type="password">
                        </div>
                    </fieldset>
                </div>
            {{--
                <div id="EnterEmail">
                    <fieldset title="Provide your email address">
                        <legend>Provide your email address</legend>
                        <div class="Suggestion">
                            This will allow you to recover a lost password
                        </div>
                        <div class="Validators">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="EmailRow">
                            <label for="ctl00_cphRoblox_TextBoxEMail" id="ctl00_cphRoblox_LabelEmail" class="Label">Your Email:</label>
                            &nbsp;<input name="EMail" id="ctl00_cphRoblox_TextBoxEMail" tabindex="4" class="TextBox" type="text">
                        </div>
                    </fieldset>
                </div>
                --}}
                <div class="Confirm">
                    <input name="ctl00$cphRoblox$ButtonCreateAccount" value="Register" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$ButtonCreateAccount&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_cphRoblox_ButtonCreateAccount" tabindex="5" class="BigButton" type="submit">
                </div>

        </form>
    </div>
    <div id="Sidebars">
        <div id="AlreadyRegistered">
            <h3>Already Registered?</h3>
            <p>If you just need to login, go to the <a id="ctl00_cphRoblox_HyperLinkLogin" href="{{route("login")}}">Login</a> page.</p>
            <p>If you have already registered but you still need to download the game installer, go directly to <a id="ctl00_cphRoblox_HyperLinkDownload" href="/download">download</a>.</p>
        </div>
        <div id="TermsAndConditions">
            <h3>Terms &amp; Conditions</h3>
            <p>Registration does not provide any guarantees of service.</p>
            <p>Roblox will not share your email address with 3rd parties.</p>
        </div>
    </div>
    <div id="ctl00_cphRoblox_ie6_peekaboo" style="clear: both"></div>

            </div>
@endsection
