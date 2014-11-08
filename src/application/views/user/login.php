<div class="container">
	<!-- Codrops top bar -->
	<div id="container_demo">
		<div id="wrapper">
			<div id="login"  class="animate form">
				<form id="frmLogin" action="/index.php/user/login" method="POST" autocomplete="on">
					<h1>Log in</h1>
					<p>
					<?php if ((validation_errors() != '')||($errorMessage!='')) : ?>
        			<div>
        					<br /> <span style="color: red;"><?php echo validation_errors();
        															echo $errorMessage;?> 
        							</span>
					</div>
        			<?php endif ?>
						<label for="Email" class="uname" data-icon="u"> Your email or
							username </label> <input id="txtEmail" name="txtEmail"
							required="required" type="text"
							placeholder="myusername or mymail@mail.com" />
					</p>
					<p>
						<label for="Password" class="youpasswd" data-icon="p"> Your
							password </label> <input id="txtPassword" name="txtPassword"
							required="required" type="password" placeholder="eg. Password" />
					</p>
					<p class="keeplogin">
						<input type="checkbox" name="loginkeeping" id="loginkeeping"
							value="loginkeeping" /> <label for="loginkeeping">Keep me logged
							in</label>
					</p>
					<p class="login button">
						<input type="submit" value="Login" name="btnLogin"/>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>

