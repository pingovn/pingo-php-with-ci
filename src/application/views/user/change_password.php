<div class="container">
    <form id="frmChangePassword" action="<?php echo site_url("user/info"); ?>" method="POST" autocomplete="off">
        <div class="sep"></div>
        <?php if ($errorMessage != '') : ?>
            <div>
                <center>
                    <br />
                    <span style="color: red;"><?php echo $errorMessage ?></span>
                </center>
            </div>
        <?php endif ?>
        <div class="inputs">
            <input type="password" placeholder="Old Password" id="txtOldPassword" name="txtOldPassword" value="">
            <input type="password" placeholder="New Password" id="txtNewPassword" name="txtNewPassword" value="">
            <input type="password" placeholder="Confirm New Password" id="txtConfirmNewPasword" name="txtConfirmNewPassword" value="">
            <input id='submit' type="submit" value="Update Password" name="btnUpdatePassword">
        </div>
    </form>
</div>
​