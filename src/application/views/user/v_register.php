<h4>Register new account</h4>
<?php echo form_open('c_user/register') ?>
<label for="txtEmail">Email</label>
<input type="text" name="txtEmail" value="<?php echo set_value('txtEmail');?>"><span style="color: red"><?php echo form_error('txtEmail'); ?></span>
<br />
<label for="txtPasword">Password</label>
<input type="password" name="txtPassword" value=""><span style="color: red"><?php echo form_error('txtPassword'); ?></span>
<br />
<label for="txtConfirmPasword">Confirm password</label>
<input type="password" name="txtConfirmPassword" value=""><span style="color: red"><?php echo form_error('txtConfirmPassword'); ?></span>
<br />
<input type="submit" value="Register" name="btnRegister">
</form>