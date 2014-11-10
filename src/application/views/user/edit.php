<?php
// var_dump($userId);
// die;
$selOptions = array('Male','Female');
?>
<div id="container_demo">
	<div id="wrapper">
		<div id="register" class="animate form">
		<?php echo form_open('user/edit');?>
			<h1>Edit Profile</h1>
			<?php if ((validation_errors() != '')||($errorMessage!='')) : ?>
        	<div>
        		<br /> <span style="color: red;"><?php echo validation_errors();
        					echo $errorMessage;?> 
        			</span>
				</div>
        		<?php endif ?>
				<p>
					<label for="fullName" data-icon="u"> Your Full Name</label>
					<input id="txtFulName" name="txtFulName" required="required"
					type="text" placeholder="..." autocomplete=off value="<?php echo set_value('txtFulName');?>"/>
				</p>
				<p>
					<label for="gender" >Your Gender</label>
					<?php echo form_dropdown('gender',$selOptions,'Male')?>
				</p>
				<p>
					<label for="age" >Age </label>
					<input id="age" name="age"
						required="required" type="text" value=""/>
				</p>
					<p class="signin button">
						<input type="submit" value="Edit" name="btnEdit" />
					</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>
