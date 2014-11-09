<?php 
// 	$user=$this->session->all_userdata();
// 	var_dump($user);
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
						<label for="Fullname" class="youpasswd" data-icon="p">Full name</label>
						<input disabled id="txtFullName" name="txtFullName"
							type="text" value="<?php echo $user['fullname']?>"/>
					</p>
					<p>
						<label for="Email" data-icon="e"> Your email</label>
						<input disabled id="txtEmail" name="txtEmail"
							required="required" type="text" value="<?php ?>"/>
					</p>
					<p>
						<label for="Age" data-icon="a">Full name</label>
						<input disabled id="txtFullName" name="txtFullName"
							type="text" value="<?php echo $user['fullname']?>"/>
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
<div class="container" id="userInfo">
        <div class="header">
            <h3><?php echo "User information" ?></h3>
        </div>
        <div class="sep"></div>
        <div class="userFields">
            <div>
                <span>Email</span>
                <span><?php echo $user['email']; ?></span>
            </div>
            <div>
                <span>Fullname</span>
                <span><?php echo $user['fullname']; ?></span>
            </div>
            <div>
                <span>Gender</span>
                <span>
                    <?php if ($user['gender'] == 0) : ?>
                        <?php echo 'Male'; ?>
                    <?php elseif ($user['gender'] == 1) : ?>
                        <?php echo 'Female'; ?>
                    <?php else : ?>
                        <?php echo 'Other'; ?>
                    <?php endif ?>
                </span>
            </div>
            <div>
                <span>Age</span>
                <span><?php echo $user['age']; ?></span>
            </div>
        </div>
</div>
​
