<?php $this->load->helper('url');?>
<section class="container">
    <div class="login">
<h1>Welcome <?php echo $email;?> !</h1>
    <br>
    <label>ID:</label><?php echo $id;?>
        <br>
    <label>Password:</label><?php echo $password;?>
    <li><a href="<?php echo site_url("c_user/changePass/$id"); ?>" title="">Change password</a></li>
    <br>
    <label>FullName:</label><?php echo $fullname;?>
    <br>
    <label>Age:</label><?php echo $age;?>
    <br>
    <label>Gender:</label><?php echo $gender;?>
    <br>
    <label>Status:</label><?php echo $status;?>
    <br>
    <label>Avatar:</label><img src="<?php echo $avatar ?>">
    <li><a href="<?php echo site_url('c_user/changeavatar'); ?>" title="">Change Image</a></li>

<li><a href="<?php echo site_url('c_user/updateuser'); ?>" title="">Update Your Information</a></li>
</div>
</section>
