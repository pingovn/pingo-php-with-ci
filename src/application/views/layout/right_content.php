<?php
//    var_dump($mostLikedTips); die();
?>

<div class="right_content">
    <div class="title">Latest tips</div>
    <?php if (isset($latestTips) && is_array($latestTips) && count($latestTips) > 0) : ?>
        <?php foreach ($latestTips as $tip) : ?>
            <div class="right_news">
                <div class="news_date">
                    <img width="50px" height="50px" src="<?php echo "/images/avatars/${tip['avatar']}";?>">
                </div>
                <div class="news_content">
                    <span class="red"><?php echo $tip['topic_name']; ?></span><br />
                    <?php echo $tip['content']; ?>
                    <br/>
                    <?php if ($this->session->userdata('userId') === false): ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php else: ?>
                        <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <div class="title">Top tips</div>

    <?php if (isset($mostLikedTips) && is_array($mostLikedTips) && count($mostLikedTips) > 0) : ?>
        <?php foreach ($mostLikedTips as $tip) : ?>     
            <div class="right_news">
                <div class="news_date">
                    <img width="50px" height="50px" src="<?php echo "/images/avatars/${tip['avatar']}";?>">
                </div>
                <div class="news_content">
                <span class="red"><?php echo $tip['topic_name']; ?></span><br />
                    <?php echo $tip['content']; ?>
                    <br/>
                    <?php if ($this->session->userdata('userId') === false): ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                        <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                    <?php else: ?>
                        <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                    <?php endif ?>
                </div>  
            </div>  
    <?php endforeach ?>
    <?php endif ?>
    

</div>
