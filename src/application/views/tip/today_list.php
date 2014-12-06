<?php 
    $this->load->model("Tips", "tipModel");
?>
<div class="panel panel-default" id="todayList">
    <div class="panel-heading title">
         <h3 class="panel-title">Tips of Today</h3>
    </div>
    <div class="panel-body">
        <?php include(VIEW_PATH . "/tip/add_tip.php");?>
        <div class="list-group">
        <?php if (isset($todayTips) && is_array($todayTips) && count($todayTips) > 0) : ?>
            <?php foreach ($todayTips as $tip) : ?>
                <div class="list-group-item">
                <div class="user-avatar">
                    <div class="avatar">
                        <a href="<?php echo site_url('user/info/' . $tip['user_id']); ?>" class="thumbnail">
                            <img src="/images/avatars/iphone-4s-64gb-black.jpg" width="80" height="80" alt="Avatar">
                        </a>
                    </div>
                    <div><?php echo $tip['email']; ?></div>
                </div>
                <div class="tip-content-container">
                    <div><?php echo $tip['topic']; ?></div>
                    <div class="tip-content">
                        <?php echo $tip['content']; ?>
                    </div>
                    <div class="tip-status">
                        <span><?php echo $tip['create_time']; ?></span> -
                        <span>Likes <span class="badge">10</span></span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
                            <?php /* if ($this->session->userdata('userId') === false): ?>
                                <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                            <?php elseif($this->tipModel->isUserLikedTip($this->session->userdata('userId'), $tip['id'])) : ?>
                                <image src="/images/like.png" alt="Like this tip" /></image><?php echo $tip['like_number']; ?>
                            <?php else: ?>
                                <a href="<?php echo site_url("user/likeTip/" . $tip['id']); ?>"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                            <?php endif */ ?>
            <?php endforeach ?>
        <?php endif ?>
        </div>
    </div>
</div>