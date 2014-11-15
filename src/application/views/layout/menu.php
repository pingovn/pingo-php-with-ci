<style>

ul#pamenu li {
    position: relative;
}
/*sub-menu*/
ul#pamenu li ul.submenu {
    display:none;
    position: absolute;  
    top: 38px;
    left: 0;
    width: 200px;
    
}
ul#pamenu li:hover ul.submenu {
    background-color:	#1E90FF;
    padding:5px;
    display:block;
    border:solid 2px  #FFA500;
    /*display: inline-block; hieu ung xuong dong trong sub-menu, chua hoan chinh */
}

</style>            

<div id="menu">
    <ul id="pamenu">                                                                                                                      
        <li><a class="current" href="/" title="">Tips of today</a></li>               
   		<li><a href="#" title="">Overall</a></li> 
        <li><a href="#" title="">Your tips</a></li>
        <li><a href="#" title="">Your followers' tips</a></li>
                       
        <?php if($this->session->userdata('email') == false): ?>
        <li><a href="<?php  echo site_url('user/login'); ?>" title="Login">Login</a></li>
        <li><a href="<?php echo site_url('user/register'); ?>" title="Register">Register</a></li>      
        
        <?php else :?>
        <li><font color='yellow' ><?php  echo $this->session->userdata('email'); ?></font>
        <ul class="submenu">
       	 				<li><a href="<?php echo site_url('user/logout'); ?>" title="">Logout</a></li></br>
       	 				<li><a href="<?php echo site_url('user/update'); ?>" title="">Update Info</a></li>
       	 				
       	 				
       		</ul>
         </li>
        <?php endif ?>
        
        
    </ul>
</div>


