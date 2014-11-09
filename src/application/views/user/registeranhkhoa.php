
    <!-- <form action="submit.php" method="post" id="signupForm"> -->
    <form id="frmRegister" action="/index.php/user/register" method="POST">

    <div class="fieldContainer">

        <div class="formRow">
            <div class="field">
                <input type="email" name="txtEmail" id="name" value="" placeholder="e-mail" autofocus />
                <!-- <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus > -->
            </div>
        </div>
        
        <div class="formRow">
            <div class="field">
                <input type="password" placeholder="Password" name="txtPassword" id="email" value="" />
                <!-- <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value=""> -->
            </div>
        </div>
        
        <div class="formRow">
            <div class="field">
                <input type="password" placeholder="Confirm Password" name="txtConfirmPasword" id="pass" value="" />
                <!-- <input type="password" placeholder="Confirm Password" id="txtConfirmPasword" name="txtConfirmPasword" value=""> -->
            </div>
        </div>
    </div> <!-- Closing fieldContainer -->
    
    <div class="signupButton">
        <!-- <input type="submit" name="submit" id="submit" value="Signup" /> -->
        <input id='submit' type="submit" value="Register" name="btnRegister">
    </div>
    
    </form>
