<?php 
// 	$user=$this->session->all_userdata();
// 	var_dump($user['id']);
// 	die;
?>

<div class="container">

	<div id="container_demo">
		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
		<div id="wrapper" >
			<div id="register" class="animate form" >
			<img src="/themes/phatnguyen/theme3/css/images/ph1.jpg" alt="" title="" border="0" />
				<h1>User info</h1>
				<form id="frmInfo" action="/index.php/user/info" method="GET">
					<p> 
						<label for="fullName"> Full Name:</label>
						<span class="info"><?php echo $user['fullname']; ?></span>
					</p>
					<p> 
						<label for="email"> Your Email:</label> 	
                		<span class="info"><?php echo $user['email']; ?></span>   
					</p>
					 <p>
						<label for="Gender"> Gender:</label>
						<span class="info">
                    		<?php if ($user['gender'] == 0) : ?>
                        		<?php echo 'Male'; ?>
                    		<?php elseif ($user['gender'] == 1) : ?>
                        		<?php echo 'Female'; ?>
                    		<?php else : ?>
                        		<?php echo 'Other'; ?>
                    		<?php endif ?>
                		</span>
					</p>
					<p>
						<label for="Age">Age</label>
						<span class="info"><?php echo $user['age']; ?></span>
					</p>
					<p class="signin button">
						<a href="<?php echo site_url('user/edit/'. $user['id']); ?>"><input value="Edit Profile" name="btnUpdate" /></a>
						<a href="<?php echo site_url('user/upForm/'. $user['id']); ?>"><input value="Upload Image" name="btnChangeAvt" /></a>
						<a href="<?php echo site_url('user/change_pass/'. $user['id']); ?>"><input value="Change Pass" name="btnChangePas" /></a>
					</p>
				</form>
			</div>

		</div>
	</div>
</div>
