@extends('Website.Templates.PageView')

@section('Content')
<div id="FrameLogin" style="margin: 50px auto 150px auto; width: 500px; border: black thin solid; padding: 22px; z-index: 8; background-color: white;">
	<div id="PaneNewUser">
		<h3>New User?</h3>
		<p>You need an account to play Roblox.</p>
		<p>If you aren't a Roblox member then <a href="{{route("CreateAccountRoblox")}}">register</a>. It's easy and we do <em>not</em> share your personal information with anybody.</p>
	</div>
	<div id="PaneLogin">
		<h3>Log In</h3>
		<div class="AspNet-Login">
			<form class="AspNet-Login" action="{{route("LoginToRoblox")}}"  method="post">
				<div class="AspNet-Login-UserPanel">
					<label for="UserName" class="TextboxLabel"><em>U</em>ser Name:</label>
					<input id="UserName" name="UserName" accesskey="u" autocomplete="off" type="text">&nbsp;
				</div>
				<div class="AspNet-Login-PasswordPanel">
					<label for="Password" class="TextboxLabel"><em>P</em>assword:</label>
					<input id="Password" name="Password" value="" accesskey="p" autocomplete="off" type="password">&nbsp;
				</div>
				<div class="AspNet-Login-SubmitPanel">
					<input value="Log In" name="LoginButton" type="submit">
				</div>
				@csrf
				@method("post")
			</form>
			<!-- Find original
			<div class="AspNet-Login-PasswordRecoveryPanel">
				<a disabled="disabled" title="Forgot your password?" onclick="return false" style="display:inline-block;">
					<img src="/resources/fgtpwspeech.png" id="img" alt="Forgot your password?" border="0" onclick="window.location.href='ResetPasswordRequest.aspx'" style="position:absolute;margin-left:200px;cursor:pointer;">
					<img src="/resources/loginfig.png" id="img" alt="Figure" border="0" style="margin-left: 80px;position:absolute;z-index:-1;margin-top:-50px;">
				</a>
			</div>

		-->
					</div>
	</div>
</div>
@endsection