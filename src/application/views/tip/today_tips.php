<?php 
// var_dump(date('Y-m-d H:m:s'));
//     var_dump($tip['create_time']);
// 	die;
if (isset($todayTips) && is_array($todayTips) && count($todayTips) > 0) : ?>

		<!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->

    <div class="container">
	<div id="container_demo">
    <?php foreach ($todayTips as $tip) : ?>
		<div id="wrapper-today-tips" >
			<div id="register" class="animate form" >
        	<table class="left_shows">
            <tr>
            	<td>
            	<?php if(isset($tip['avatar'])):?>
            		<img class="today-tips" src="<?php echo '/images/avatars/'.$tip['avatar']?>"alt="" title=""/><br/>
            		<?php echo $tip['fullname'];?>
            	<?php endif?>
            	</td>
            	<td class='show_text_content'> 
                	<?php echo $tip['content'];
                		$time=strtotime($tip['create_time']);
                		echo '<br/>';
                		echo (timespan($time,time()))." ago";
                		
                	?>
            	</td>
            </tr>
           </table>
 <a class="more_details" href="<?php echo site_url('user/info/' . $tip['user_id']); ?>" ><?php echo $tip['email']; ?></a>  
			</div>
		</div>
    <?php endforeach ?>
</div>
</div> 

    
<?php endif ?>
<!--
        <div class="left_shows">
            <div class="show_date">20.07.09</div>
            <div class="show_text_content">
        “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
            </div> 
            <a href="#" class="more_details">more details</a>  
        </div>
-->        