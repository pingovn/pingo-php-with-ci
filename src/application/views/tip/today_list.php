<?php
$this->load->model("Tips", "tipModel");
?>
<div class="title">Tips of Today</div>
<?php if (isset($todayTips) && is_array($todayTips) && count($todayTips) > 0) : ?>


    <?php foreach ($todayTips as $tip) : ?>
        <div class="left_shows">
            <div class="show_date">
            <!--                avatar and fullname-->
                <img width="100px" height="100px" src="<?php echo "/images/avatars/${tip['avatar']}";?>">
                <!--                <a href="--><?php //echo site_url('/user/info/' . $tip['user_id']); ?><!--" class="more_details">--><?php //echo $tip['fullname']; ?><!--</a>-->
                <a href="/index.php/tip/user_tip/<?php echo $tip['user_id'];?>" class="show_name"><?php echo $tip['user_name']; ?></a>
            </div>
            <div class="show_text_content">
                <?php echo $tip['topic_name']; ?>
                <br />
                <?php echo $tip['content']; ?>
                <br />
                <div>
                    <?php if ($this->session->userdata('userId') === false): ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php else: ?>
                        <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                    <?php endif ?>
                </div>
                <?php $this->load->helper('date'); ?>
                <?php $postTime = strtotime($tip['create_time']); ?>
                <?php echo timespan($postTime, time()); ?>
            </div>
        </div>
    <?php endforeach ?>

    <?php echo $pageLink; ?>

<?php endif ?>
