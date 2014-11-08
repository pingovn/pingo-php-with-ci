<div class="container">
    <form id="frmLogin" action="/index.php/user/login" method="POST">
        <div class="header">
            <h3>Sign In</h3>
            <p>Please enter email and password to continue</p>
        </div>
        <div class="sep"></div>
        <?php if (isset($errorMessage) && $errorMessage != '') : ?>
        <div>
            <center>
                <br />
                <span style="color: red;"><?php echo $errorMessage ?></span>
            </center>
        </div>
        <?php endif ?>
        <div class="inputs">
            <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus autocomplete="OFF">
            <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value="">
            <div class="checkboxy">
                <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">Remember me</label>
            </div>
            <!-- <a id="submit" href="#">REGISTER</a> -->
            <input id='submit' type="submit" value="Login" name="btnLogin">
        </div>
    </form>
</div>