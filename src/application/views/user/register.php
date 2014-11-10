<div id="container_demo">
<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
	<div id="wrapper">
		<div id="register" class="animate form">
<!-- 	<form id="frmRegister" action="/index.php/user/register" -->
<!-- 	 method="POST"> -->
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
			<?php echo form_close();?>
		</div>
	</div>
</div>
