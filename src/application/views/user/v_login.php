<?php
$this->load->helper('form');
?>
<section class="container">
    <div class="login">
        <h1>Login your Account</h1>
        <?php echo form_open('c_user/login') ?>
        <p><input type="text" name="txtEmail" value="<?php echo set_value('txtEmail');?>" placeholder="Email" autocomplete="OFF"> </p>
        <span style="color: red;font-style: italic;"><?php echo form_error('txtEmail'); ?></span>
        <p><input type="password" name="txtPassword" value="" placeholder="Password"></p>
        <span style="color: red;font-style: italic;"><?php echo form_error('txtPassword'); ?></span>
        <p class="submit"><input type="submit" name="btnLogin" value="Login"></p>
        </form>
    </div>
</section>