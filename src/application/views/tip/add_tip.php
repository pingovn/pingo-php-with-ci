<?php 
 	foreach ($allTopics as $topic){		
 		$name[$topic['id']] = $topic['name']; 
 	}
// var_dump($temp);	
// die;
?>	
<?php if ($this->session->userdata('userId') !== false) : ?>
<div class="container">
	<!-- Codrops top bar -->
	<div id="container_demo">
		<div id="wrapper-add-tip">
			<div id="add_tip"  class="animate form">
				<form id="addTip" action="/index.php/tip/add_tip" method="POST"
					autocomplete="on">
					<h1>Add tip</h1>
					<p>
					<?php if (isset($errorMessage) && $errorMessage!='') : ?>		
					<div>
						<br /> <span style="color: red;"><?php echo $errorMessage;?> 
        							</span>
					</div>
        			<?php endif ?>
						<label for="Tip" class="tip"> Your tip</label>
					<textarea name="txtTip" id="txtTip" rows="6" cols="8"></textarea>
					<p>
						<label for="Topic">Topic</label>
							<?php echo form_dropdown('slbTopic',$name,'Sport')?>
						</p>
					<p class="login button">
						<input type="submit" value="Add-Tip" name="btnAddTip" />
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endif ?>	
<div class="title">Tips of Today</div>
