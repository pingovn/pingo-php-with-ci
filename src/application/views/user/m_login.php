<h4>Login your Account</h4>
<?php echo form_open('c_user/login') ?>
<label for="txtEmail">Email</label>
<input type="text" name="txtEmail" value="<?php echo set_value('txtEmail');?>"><span style="color: red"><?php echo form_error('txtEmail'); ?></span>
<br />
<label for="txtPasword">Password</label>
<input type="password" name="txtPassword" value=""><span style="color: red"><?php echo form_error('txtPassword'); ?></span>
<br />
<input type="submit" value="Login" name="btnLogin">
</form>