<?php echo validation_errors();?>
<?php echo form_open('user2/dangky');?>
    <h4>Register new account</h4>
    <label for="txtEmail">Email</label>
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