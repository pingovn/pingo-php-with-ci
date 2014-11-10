<?php
var_dump($userId);
die;
// $selOptions = array('Male','Female');
?>
<div id="container_demo">
	<div id="wrapper">
		<div id="register" class="animate form">
		<?php echo form_open_multipart('upload/doUpload');?>
			<h1>Edit Profile</h1>
			<?php if ($errorMessage!='') : ?>
        	<div>
        		<br /> <span style="color: red"> <?php echo $errorMessage;?> 
        			</span>
			</div>
        		<?php endif ?>
				<p>
					<label for="Avatar" data-icon="u"> Your Upload</label>
					<input type="file" name="avatar" size="20" />
				</p>					
				<p class="signin button">
					<input type="submit" value="Upload" name="btnUpload" />
				</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>
