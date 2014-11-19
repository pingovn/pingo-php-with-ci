<?php
// 	$user=$this->session->all_userdata();
// 	var_dump($user);
// // 	echo date("Y-m-d H:i:s");
// 	die;
?>

<div class="container">

	<div id="container_demo">
		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
		<div id="wrapper" >
			<div id="register" class="animate form" >
			<?php if(isset($user['avatar'])):?>
			<div class="focus pic">
			<img class="info-avt" src="<?php echo "/images/avatars/".$user['avatar']?>"alt="" title=""/>
			</div>
			<?php endif;?>
				<h1>User info</h1>
				<form id="frmInfo" action="/index.php/user/info" method="GET">
					<p> 
						<label for="fullName"> Full Name : </label>
						<span class="info"><?php echo $user['fullname']; ?></span>
						<br><br>
						<label for="email"> Your Email : </label>  	
                		<span class="info"><?php echo $user['email']; ?></span>   
						<br><br>
						<label for="Gender"> Gender : </label> 
						<span class="info">
                    		<?php if ($user['gender'] == 0) : ?>
                        		<?php echo 'Male'; ?>
                    		<?php elseif ($user['gender'] == 1) : ?>
                        		<?php echo 'Female'; ?>
                    		<?php else : ?>
                        		<?php echo 'Other'; ?>
                    		<?php endif ?>
                		</span>
                		<br><br>
						<label for="Age">Age : </label> 
						<span class="info"><?php echo $user['age']; ?></span>
					</p>
					<br><br>
					<p class="signin button">
						<a href="<?php echo site_url('user/edit/'.$user['id']); ?>"><input value="Edit Profile" name="btnUpdate" /></a>
						<a href="<?php echo site_url('user/do_upload/'.$user['id']); ?>"><input value="Upload Image" name="btnChangeAvt" /></a>
						<a href="<?php echo site_url('user/changePass/'.$user['id']); ?>"><input value="Change Pass" name="btnChangePas" /></a>
					</p>
				</form>
			</div>

		</div>
	</div>

</div>
<?php 
// var_dump(date('Y-m-d H:m:s'));
//     var_dump($tip['create_time']);
// 	die;
if (isset($userTips) && is_array($userTips) && count($userTips) > 0) : ?>

		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->

    <div class="container">
	<div id="container_demo">
    <?php foreach ($userTips as $tip) : ?>
		<div id="wrapper-today-tips" >
			<div id="register" class="animate form" >
        	<table class="left_shows">
            <tr>
            	<td>
            	<?php if(isset($tip['avatar'])):?>
            		<img class="today-tips" src="<?php echo '/images/avatars/'.$tip['avatar']?>"alt="" title=""/><br/>
            		<?php echo $tip['fullname'];?>
            	<?php endif?>
            	</td>
            	<td class='show_text_content'> 
                	<?php echo $tip['content'];
                		$time=strtotime($tip['create_time']);
                		echo '<br/>';
                		echo (timespan($time,time()))." ago";
                		
                	?>
            	</td>
            </tr>
           </table>
 <a class="more_details" href="<?php echo site_url('user/info/' . $tip['user_id']); ?>" ><?php echo $tip['email']; ?></a>  
			</div>
		</div>
    <?php endforeach ?>
</div>
</div>

<?php endif ?>