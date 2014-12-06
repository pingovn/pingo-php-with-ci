<div>
    <form role="form" id="frmLogin" action="/index.php/user/login" method="POST">
        <div class="header">
            <h3>Sign In</h3>
            <p>Please enter email and password to continue</p>
        </div>
        <?php if (isset($errorMessage) && $errorMessage != '') : ?>
        <div>
            <center>
                <div class="alert alert-danger" role="alert"><?php echo $errorMessage ?></div>
            </center>
        </div>
        <?php endif ?>
        <div class="inputs">
            <div class="form-group">
                <label for="txtEmail">Email address</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter email"  autofocus autocomplete="OFF">
            </div>
            <div class="form-group">
                <label for="txtEmail">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
            </div>
            <!-- <a id="submit" href="#">REGISTER</a> -->
            <input id='submit' type="submit" value="Login" name="btnLogin">
        </div>
    </form>
</div>