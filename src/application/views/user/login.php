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