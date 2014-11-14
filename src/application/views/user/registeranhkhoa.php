<div id="registration-form">
	<div class='fieldset'>
    <legend>Tip Of The Day</legend>
		<form action="/index.php/user/register" method="post" data-validate="parsley">
			<div class='row'>
				<label for='firstname'>E- mail</label>
				<input type="text" placeholder="E-mail" name="txtEmail" id='firstname' data-error-message="Your E-mail is required">
			</div>
			<div class='row'>
				<label for="email">Password</label>
				<input type="text" placeholder="Password"  name="txtPassword" data-required="true" data-type="email" data-error-message="Your Password is required">
			</div>
			<div class='row'>
				<label for="cemail">Confirm your Password</label>
				<input type="text" placeholder="Confirm your Password" name="txtConfirmPasword" data-required="true" data-error-message="Your ConfirmPassword must correspond">
			</div>
			<input type="submit" value="Register">
		</form>
	</div>
</div>

 <!-- <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus >
            <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value="">
            <input type="password" placeholder="Confirm Password" id="txtConfirmPasword" name="txtConfirmPasword" value=""> -->