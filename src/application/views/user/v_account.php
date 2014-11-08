<?php $this->load->helper('url');?>
<section class="container">
    <div class="login">
<h1>Welcome <?php echo $userinfo['email'];?> !</h1>
    <br>
    <label>ID:</label><?php echo $userinfo['id'];?>
        <br>
    <label>Password:</label><?php echo $userinfo['password'];?>
    <li><a href="<?php echo site_url("c_user/changePass/{$userinfo['id']}"); ?>" title="">Change password</a></li>
    <br>
    <label>FullName:</label><?php echo $userinfo['fullname'];?>
    <br>
    <label>Age:</label><?php echo $userinfo['age'];?>
    <br>
    <label>Gender:</label><?php echo $userinfo['gender'];?>
    <br>
    <label>Status:</label><?php echo $userinfo['status'];?>
    <br>
    <label>Avatar:</label><img src="/themes/phatnguyen/theme3/uploads/<?php echo $userinfo['avatar'];?>" width=40px height=40px border=0px />
    <li><a href="<?php echo site_url('c_user/uploadimage'); ?>" title="">Change Image</a></li>

<li><a href="<?php echo site_url('c_user/updateuser'); ?>" title="">Update Your Information</a></li>
</div>
</section>
