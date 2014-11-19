<?php
//var_dump($todayTips[0]);
//$now = strtotime("now");
//$postTime = strtotime($todayTips[0]['create_time']);
//$periodHour = round(($now - $postTime)/(60*60));
//$periodMinute = round(($now - $postTime)/(60));
//var_dump($periodHour);
//var_dump($periodMinute);
//
//
////$updateTime = date("Y-m-d H:i:s") - $todayTips[0];
////var_dump($updateTime);
//die();
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

                <?php $now = strtotime("now"); ?>
                <?php $postTime = strtotime($tip['create_time']); ?>
                <?php $periodHour = ($now - $postTime)/(60*60); ?>
                <?php if ( $periodHour > 1 ) : ?>
                    <?php echo round($periodHour) . "hours ago"; ?>
                <?php elseif (($now - $postTime)/(60) > 1 ) : ?>
                    <?php echo round(($now - $postTime)/(60)) . "minutes ago"; ?>
                <?php else : ?>
                    <?php echo "just now"; ?>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>

    <?php echo $pageLink; ?>

<?php endif ?>
