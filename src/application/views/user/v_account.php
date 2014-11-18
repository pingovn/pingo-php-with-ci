<?php $this->load->helper('url');?>
<?php if (isset($user['id']) && $user['id']!== false) : ?>

<section class="container">
    <div class="login">
    <h1>Welcome <?php echo $userinfo['email'];?> !</h1>
        <?php if($user['id']==$this->uri->segment(3)):?>
            <br>
            <label>ID:</label><?php echo $userinfo['id'];?>
                <br>
                <label>Password:</label><?php echo $userinfo['password'];?>
                <li>
                <a href="<?php echo site_url('c_user/changePass/'.$userinfo['id'])?>">Change password</a>
                </li>
            <br>
        <?endif?>
    <span>Tips posted<a href="<?php echo site_url('c_user/showtips_byuserid/'.$userinfo['id']); ?>" title="">(<?php echo count($ntip);?></a>)</span><br>
    <label>FullName:</label><?php echo $userinfo['fullname'];?>
    <br>
    <label>Age:</label><?php echo $userinfo['age'];?>
    <br>
    <label>Gender:</label><?php echo ($userinfo['gender']=='1')?'Male':'' ?><?php echo ($userinfo['gender']=='2')?'Female':'' ?><?php echo ($userinfo['gender']=='3')?'Others':'' ?>
    <br>
    <label>Status:</label><?php echo $userinfo['status'];?>
    <br>
    <label>Avatar:</label><img src="/themes/phatnguyen/theme3/uploads/<?php echo $userinfo['avatar'];?>" width=40px height=40px border=0px />
    <?php
        if($user['id']==$this->uri->segment(3)){
            echo "<li>";
            echo "<a href=" . site_url('c_user/uploadimage').">Change Image</a>";
            echo "</li>";
            echo "<li>";
            echo "<a href=" . site_url('c_user/update_profile').">Update Your Information</a>";
            echo "</li>";
        }
    ?>
</div>
</section>
<?php else : redirect('c_user/login', 'refresh');?>
<?php endif ?>
