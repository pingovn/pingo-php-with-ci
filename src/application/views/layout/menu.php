
<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
        
        <li><a href="<?php echo site_url('user/logout'); ?>" title="">Logout</a></li>
        
        <?php if(empty($user['id'])): ?>
        <li><a href="<?php  echo site_url('user/login'); ?>" title="Login">Login</a></li>
        <li><a href="<?php echo site_url('user/register'); ?>" title="Register">Register</a></li>      
        <?php else :?>
        <li><font color='yellow' ><?php  echo $user['email']; ?></font> </li>
        <?php endif ?>
        
        
    </ul>
</div>