<form id="frmRegister" action="/index.php/users/create" method="POST">
<?php 
var_dump(validation_errors());
echo validation_errors();?>
    <h4>Register new account</h4>
    <label for="txtEmail">Email</label>
    <?php 	echo form_error('email');?>
    <input type="text" id="txtEmail" name="txtEmail" value="">
    <br />
    <label for="txtPasword">Password</label>
    <input type="password" id="txtPassword" name="txtPasword" value="">
    <br />
    <label for="txtConfirmPasword">Confirm password</label>
    <input type="password" id="txtConfirmPassword" name="txtConfirmPasword" value="">
    <br />
    <input type="submit" value="Register" name="btnRegister">
</form>