<form id="frmLogin" action="/index.php/user/login" method="POST">
    <?php if (isset($err_msg)) {
        echo "<h4 style='color:red'>$err_msg</h4>";
    } else {
        echo "<h4>Login</h4>";
    }
    ?>
    <label for="txtEmail">Email</label>
    <input type="text" id="txtEmail" name="txtEmail" value="<?php if (isset($email)) {echo $email;}?>">
    <br />
    <label for="txtPassword">Password</label>
    <input type="password" id="txtPassword" name="txtPassword" value="">
    <br />
    <input type="submit" value="Login" name="btnLogin">
</form>