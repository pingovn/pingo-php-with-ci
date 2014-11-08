<?php $this->load->helper('url');?>
<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
            <?php
             if(isset($user)){
                echo "<li>";
                echo "<a href=" . site_url('c_user/info/'.$user['id']) ."  style='font-size:12px'>Welcome ". $user['email'] . "!</a>" ;
                echo "</li>";
                echo "<li>";
                echo "<a href=". site_url('homepage/logout') . " style='font-size:12px'>Logout</a>";
                echo "</li>";
            }
            else
            {
                echo "<li>";
                echo "<a href=". site_url('c_user/register') .">Register</a>";
                echo "</li>";

                echo "<li>";
                echo "<a href=". site_url('c_user/login') . ">Login</a>";
                echo "</li>";
            }
        ?>
    </ul>
</div>