<!--
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
-->
<div class="container">
    <form id="frmRegister" action="/index.php/user/register" method="POST">
        <div class="header">
            <h3>Sign Up</h3>
            <p>You want to fill out this form</p>
        </div>
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
            <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus >
            <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value="">
            <input type="password" placeholder="Confirm Password" id="txtConfirmPasword" name="txtConfirmPasword" value="">
            <div class="checkboxy">
                <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">Remember me</label>
            </div>
            <!-- <a id="submit" href="#">REGISTER</a> -->
            <input id='submit' type="submit" value="Register" name="btnRegister">
        </div>
    </form>
</div>
​