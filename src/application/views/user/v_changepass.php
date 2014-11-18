<?php $this->load->helper('url');
//var_dump($this->session->userdata('logged_in'));die;
?>
<?php if (isset($user['id']) && $user['id']!== false) : ?>
<section class="container">
    <div class="login">
        <h1>Change Your Password</h1>
        <?php echo form_open('c_user/changePassProcess') ?>
        <p><input type="password" name="txtOldPassword" value="<?php echo set_value('txtOldPassword');?>" placeholder="Old Password"> </p>
        <span style="color: red;font-style: italic;"><?php echo form_error('txtOldPassword'); ?></span>
        <p><input type="password" name="txtPassword" value="" placeholder="New Password"></p>
        <span style="color: red;font-style: italic;"><?php echo form_error('txtPassword'); ?></span>
        <p><input type="password" name="txtConfirmPassword" value="" placeholder="Confirm New Password"></p>
        <span style="color: red;font-style: italic;"><?php echo form_error('txtConfirmPassword'); ?></span>
        <p class="submit"><input type="submit" name="btnChange" value="Change"></p>
        </form>
    </div>
</section>
<?php else : redirect('c_user/login', 'refresh');?>
<?php endif ?>