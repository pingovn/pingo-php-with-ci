<form id="frmRegister" action="/index.php/user/register" method="POST">
    <?php if (isset($err_msg)) {
        echo "<h4 style='color:red'>$err_msg</h4>";
    } else {
        echo "<h4>Register new account</h4>";
    }
    ?>
    <label for="txtEmail">Email</label>
    <input type="text" id="txtEmail" name="txtEmail" value="<?php if (isset($email)) {echo $email;}?>">
    <br />
    <label for="txtPassword">Password</label>
    <input type="password" id="txtPassword" name="txtPassword" value="">
    <br />
    <label style="color: red" for="txtConfirmPassword">Confirm password (*required for Register*)</label>
    <input type="password" id="txtConfirmPassword" name="txtConfirmPassword" value="">
    <br />
    <input type="submit" value="Register" name="btnRegister">
    <input type="submit" value="Login" name="btnLogin">
</form>