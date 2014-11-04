<form id="frmRegister" action="/index.php/user/register" method="POST">
    <h4>Register new account</h4>
    <?php if ($errorMessage != '') : ?>
    <div>
        <center>
            <span style="color: red;"><?php echo $errorMessage ?></span>
        </center>
    </div>
    <?php endif ?>
    <label for="txtEmail">Email</label>
    <input type="text" id="txtEmail" name="txtEmail" value="">
    <br />
    <label for="txtPasword">Password</label>
    <input type="password" id="txtPassword" name="txtPassword" value="">
    <br />
    <label for="txtConfirmPasword">Confirm password</label>
    <input type="password" id="txtConfirmPassword" name="txtConfirmPasword" value="">
    <br />
    <input type="submit" value="Register" name="btnRegister">
</form>