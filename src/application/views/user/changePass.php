<?php

?>
<div id="container_demo">
	<div id="wrapper">
		<div id="register" class="animate form">
		<?php echo form_open('user/changePass');?>
			<h1>Update Password</h1>
			<?php if ((validation_errors() != '')||($errorMessage!='')) : ?>
        	<div>
        		<br /> <span style="color: red;"><?php echo validation_errors();
        					echo $errorMessage;?> 
        			</span>
				</div>
        		<?php endif ?>
				<p>
					<label for="oldpass" data-icon="p"> Your Old Pass</label>
					<input id="txtOldPas" name="txtOldPas" required="required"
					type="password" placeholder="..." autocomplete=off value=""/>
				</p>
				<p>
					<label for="newpass" data-icon="p"> Your New Pass</label>
					<input id="txtNewPas" name="txtNewPas" required="required"
					type="password" placeholder="..." autocomplete=off value=""/>
				</p>
				<p>
					<label for="confpass" data-icon="p"> Pass Confirmation</label>
					<input id="txtConPas" name="txtConPas" required="required"
					type="password" placeholder="..." autocomplete=off value=""/>
				</p>
					<p class="signin button">
						<input type="submit" value="Edit" name="btnChangePass" />
					</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>
