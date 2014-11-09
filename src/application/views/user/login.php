<<<<<<< HEAD
<!-- <form id="frmLogin" action="/index.php/user/login" method="POST">
    <h4>Register new account</h4>
    <label for="txtEmail">Email</label>
    <input type="text" id="txtEmail" name="txtEmail" value="">
    <br />
    <label for="txtPasword">Password</label>
    <input type="password" id="txtPassword" name="txtPasword" value="">
    <br />
    <input type="submit" value="Login" name="btnLogin">
</form> -->

  <form id="frmLogin" action="/index.php/user/login" method="POST" class="login">
    <h1>Login Tip Of The Day</h1>
    <input type="email" name="txtEmail" class="login-input" placeholder="Email Address" autofocus>
    <input type="password" name="txtPassword" class="login-input" placeholder="Password">
    <input type="submit" name="btnLogin" value="Login" class="login-submit">
    <p class="login-help"><a href="index.html">Forgot password?</a></p>
  </form>
<!-- =======
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
>>>>>>> origin
 -->