<div class="title">Tips of Today</div>
<?php if (isset($todayTips) && is_array($todayTips) && count($todayTips) > 0) : ?>
    <?php foreach ($todayTips as $tip) : ?>
        <div class="left_shows">
            <div class="show_date"><?php echo $tip['create_time']; ?></div>
            <div class="show_text_content">
                <?php echo $tip['content']; ?>
            </div> 
            <a href="<?php echo site_url('user/info/' . $tip['user_id']); ?>" class="more_details"><?php echo $tip['email']; ?></a>  
        </div>        
    <?php endforeach ?>
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