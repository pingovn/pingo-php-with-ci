<section class="container">
    <div class="login">
        <h1>Create New Account</h1>
        <?php echo form_open('c_user/register') ?>
            <p><input type="text" name="txtEmail" value="<?php echo set_value('txtEmail');?>" placeholder="Email"> </p>
                <span style="color: red;font-style: italic;"><?php echo form_error('txtEmail'); ?></span>
            <p><input type="password" name="txtPassword" value="" placeholder="Password"></p>
                <span style="color: red;font-style: italic;"><?php echo form_error('txtPassword'); ?></span>
            <p><input type="password" name="txtConfirmPassword" value="" placeholder="Confirm Password"></p>
                <span style="color: red;font-style: italic;"><?php echo form_error('txtConfirmPassword'); ?></span>
            <p class="submit"><input type="submit" name="btnRegister" value="Register"></p>
        </form>
    </div>
</section>