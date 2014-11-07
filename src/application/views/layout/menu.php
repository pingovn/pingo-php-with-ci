<?php $this->load->helper('url');?>
<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
            <?php
            //var_dump($logged_in);die();
                if(isset($email)){
                echo "<li>";
                echo "<a href=" . site_url('c_user/info/'.$id) ."  style='font-size:12px'>Welcome ". $email . "!</a>" ;
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