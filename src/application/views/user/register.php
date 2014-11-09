<!-- <form id="frmRegister" action="/index.php/users/create" method="POST"> -->
<?php 
// echo validation_errors();?>
<!--     <h4>Register new account</h4> -->
<?php //if ($errorMessage != '') : ?>
<!--     <div> -->
<!--         <center> -->
<!--  <span style="color: red;"><?php // echo $errorMessage ?></span>-->
<!--         </center> -->
<!--     </div> -->
<?php //endif ?>
<!--     <label for="txtEmail">Email</label> -->
<?php 	//echo form_error('email');?>
<!--     <input type="text" id="txtEmail" name="txtEmail" value=""> -->
<!--     <br /> -->
<!--     <label for="txtPasword">Password</label> -->
<!--     <input type="password" id="txtPassword" name="txtPassword" value=""> -->
<!--     <br /> -->
<!--     <label for="txtConfirmPasword">Confirm password</label> -->
<!--     <input type="password" id="txtConfirmPassword" name="txtConfirmPasword" value=""> -->
<!--     <br /> -->
<!--     <input type="submit" value="Register" name="btnRegister"> -->
<!-- </form> -->
<div class="container">
<<<<<<< HEAD

	<div id="container_demo">
		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
		<div id="wrapper">
			<div id="register" class="animate form">
<!-- 				<form id="frmRegister" action="/index.php/user/register" -->
<!-- 					 method="POST"> -->
			<?php echo form_open('user/register');?>
					<h1>Sign up</h1>
					<?php if ((validation_errors() != '')||($errorMessage!='')) : ?>
        			<div>
        					<br /> <span style="color: red;"><?php echo validation_errors();
        															echo $errorMessage;?> 
        							</span>
					</div>
        			<?php endif ?>
					<p>
						<label for="Email" data-icon="e"> Your email</label>
						<input id="txtEmail" name="txtEmail" required="required"
							type="email" placeholder="mysupermail@mail.com" autocomplete=off value="<?php echo set_value('txtEmail');?>"/>
					</p>
					<p>
						<label for="Password" class="youpasswd" data-icon="p">Your password </label>
						<input id="txtPassword" name="txtPassword"
							required="required" type="password" value=""/>
					</p>
					<p>
						<label for="Password_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
						<input id="txtConfirmPasword" name="txtConfirmPasword"
							required="required" type="password" value=""/>
					</p>
					<p class="signin button">
						<input type="submit" value="Sign up" name="btnRegister" />
					</p>
				</form>
			</div>

		</div>
	</div>
</div>
=======
    <form id="frmRegister" action="/index.php/user/register" method="POST">
        <div class="header">
            <h3>Sign Up</h3>
            <p>You want to fill out this form</p>
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
            <input type="email" id="txtEmail" name="txtEmail" value="" placeholder="e-mail" autofocus >
            <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" value="">
            <input type="password" placeholder="Confirm Password" id="txtConfirmPasword" name="txtConfirmPasword" value="">
            <!--
            <div class="checkboxy">
                <input name="cecky" id="checky" value="1" type="checkbox" /><label class="terms">Remember me</label>
            </div>
            -->
            <input id='submit' type="submit" value="Register" name="btnRegister">
        </div>
    </form>
</div>
​
>>>>>>> master
