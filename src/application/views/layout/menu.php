<div id="menu">
    <ul>                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>
        <li><a href="#" title="">Overall</a></li>
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
        <?php
            if (isset($_SESSION['login'])) {
                echo '<li><a href="/index.php/user/logout" title="">Logout</a></li>';
            } else {
                echo '<li><a href="/index.php/user/register" title="">Register/Login</a></li>';
            }
        ?>
    </ul>
</div>