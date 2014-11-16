<div class="container">
<!--    <form id="frmUpdateAvatar" action="/index.php/user/do_upload" method="POST" enctype="multipart/form-data">-->
    <form id="frmUpdateAvatar" action="<?php echo site_url("user/info"); ?>" method="POST" enctype="multipart/form-data">
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
            <input id="file" type="file" accept="image/*" name="avatar">
            <input id='submit' type="submit" value="Update Avatar" name="btnUpdateAvatar">
        </div>
    </form>
</div>
​
