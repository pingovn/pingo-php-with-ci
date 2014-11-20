<?php 
    $this->load->model("Tips", "tipModel");
?>
<div class="title">Tips of Today</div>
<?php if (isset($todayTips) && is_array($todayTips) && count($todayTips) > 0) : ?>
    <?php foreach ($todayTips as $tip) : ?>
        <div class="left_shows">
            <div class="show_date"><?php echo $tip['create_time']; ?></div>
            <div class="show_text_content">
                <div>
                    <?php echo $tip['content']; ?>
                </div>
                <div>
                    <?php if ($this->session->userdata('userId') === false): ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php else: ?>
                        <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                    <?php endif ?>
                </div>
            </div>
            <a href="<?php echo site_url('user/info/' . $tip['user_id']); ?>" class="more_details">&nbsp;<?php echo $tip['email']; ?></a>  
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