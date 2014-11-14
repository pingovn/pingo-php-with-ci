<!--  <form action="index.html" class="login">
    <h1>Facebook</h1>
    <input type="email" name="email" class="login-input" placeholder="Email Address" autofocus>
    <input type="password" name="password" class="login-input" placeholder="Password">
    <input type="submit" value="Login" class="login-submit">
    <p class="login-help"><a href="index.html">Forgot password?</a></p>
  </form> -->
  <form id="frmLogin" action="/index.php/user/login" method="POST">
      <label for="login">Email:</label>
      <input type="text" name="login" id="login" value="name@example.com">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="4815162342">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

    <p class="forgot-password"><a href="index.html">Forgot your password?</a></p>
  </form>