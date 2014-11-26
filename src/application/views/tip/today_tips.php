<?php
// var_dump(date('Y-m-d H:m:s'));
// var_dump($todayTips);
// die;
if (isset ( $todayTips['results'] ) && is_array ( $todayTips['results'] ) && count ( $todayTips['results'] ) > 0) :
?>
<div class="container">
	<div id="container_demo">
    <?php foreach ($todayTips['results'] as $tip) : ?>
		<div id="wrapper-today-tips">
			<div id="register" class="animate form">
				<table class="left_shows">
					<tr>
						<td>
            				<?php if(isset($tip['avatar'])):?>
            				<img class="today-tips"
								src="<?php echo '/images/avatars/'.$tip['avatar']?>" alt=""
								title="" />
							<br />
            					<?php echo $tip['fullname'];?>
            				<?php endif?>
            			</td>
						<td class='show_text_content'> 
                		<?php
							echo $tip ['content'];
							$time = strtotime ( $tip ['create_time'] );
							echo '<br/>';
							echo (timespan ( $time, time () )) . " ago";
						?>
            			</td>
					</tr>
			</table>
			<div>
                   <?php if ($this->session->userdata('userId') === false): ?>
                        <img class='like-icon' src="/images/like.ico" alt="Like this tip">
                        <div class='like-num'><?php echo  $tip['like_number']; ?></div>
                    <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                        <img class='like-icon' src="/images/like.ico" alt="Like this tip" > 
                        <div class='like-num'><?php echo  $tip['like_number']; ?></div>
                    <?php else: ?>
                        <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>">
                        <img class='like-icon' src="/images/like.ico" alt="Like this tip" > 
                        </a>
                        <div class='like-num'><?php echo  $tip['like_number']; ?></div>
                    <?php endif ?>
                </div>
				<a class="more_details" href="<?php echo site_url('user/info/' . $tip['user_id']); ?>">
					<?php echo $tip['email']; ?></a>
			</div>
		</div>
	<?php endforeach ?>
	<p><?php echo $this->pagination->create_links(); ?></p>
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
