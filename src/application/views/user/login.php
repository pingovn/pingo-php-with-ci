<?php echo validation_errors();?>
<?php echo form_open('user2/login');?>
    <h4>Register new account</h4>
    <label for="txtEmail">Email</label>
    <input type="text" id="txtEmail" name="txtEmail" value="">
    <br />
    <label for="txtPasword">Password</label>
    <input type="password" id="txtPassword" name="txtPasword" value="">
    <br />
    <input type="submit" value="Login" name="btnLogin">
</form>