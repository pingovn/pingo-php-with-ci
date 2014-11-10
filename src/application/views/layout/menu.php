<?php

?>
<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
        <li><a href="/index.php/user/register" title="">Register</a></li>
        <?php
//                            var_dump( $this->session->userdata('loginUser')); die();
            if ( $this->session->userdata('email') != '') {
                $userId = $this->session->userdata('id');
                $loginEmail = $this->session->userdata('email');
               echo  "<li><a href='/index.php/user/userInfo/$userId' title=''>$loginEmail</a></li>";
               echo  "<li><a href='/index.php/user/logout' title='Logout'>Logout</a></li>";
            } else {
                echo "<li><a href='/index.php/user/login' title='Login'>Login</a></li>";
            }
        ?>
    </ul>
</div>