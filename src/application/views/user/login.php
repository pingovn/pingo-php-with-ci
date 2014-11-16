<div class="container">
    <form id="frmLogin" action="<?php echo site_url("user/login"); ?>" method="POST">
        <div class="header">
            <h3>Sign In</h3>
            <?php if (isset($errorMessage) && $errorMessage != '' ) :?>
                <?php echo "<p style='color: red'>" . $errorMessage . "</p>"; ?>
            <?php else : ?>
                <p>Please enter email and password to continue</p>
            <?php endif ?>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus >
            <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value="">
            <div class="checkboxy">
                <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">Remember me</label>
            </div>
            <!-- <a id="submit" href="#">REGISTER</a> -->
            <input id='submit' type="submit" value="Login" name="btnLogin">
        </div>
    </form>
</div>