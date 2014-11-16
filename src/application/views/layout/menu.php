<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
        <?php if ($this->session->userdata('userId') !== false) : ?>
            <li><a href="<?php echo site_url('user/info/' . $this->session->userdata('userId')); ?>" title="Login"><?php echo $this->session->userdata['email'];?></a></li>
            <li><a href="<?php echo site_url('user/logout'); ?>" title="Login">Logout</a></li>
        <?php else : ?>
            <li><a href="<?php echo site_url('user/register'); ?>" title="">Register</a></li>
            <li><a href="<?php echo site_url('user/login'); ?>" title="Login">Login</a></li>
        <?php endif ?>
    </ul>
</div>