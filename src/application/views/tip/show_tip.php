<?php $this->load->helper('date');
$this->load->model("M_tip", "modelTip");
$this->load->library('pagination');?>
<?php if (isset($ntip) && is_array($ntip) && count($ntip) > 0) : ?>
    <?php foreach ($ntip as $tip) : ?>
        <div class="left_shows">
            <div class="">
                <a href="<?php echo site_url('c_user/showtips_byuserid/'.$tip['user_id'])?>">
                <img src="/themes/phatnguyen/theme3/uploads/<?php echo $tip['avatar'];?>" width=40px height=40px border=0px>
                </a>
            </div>
            <div class="show_text_content">
                <a href="<?php echo site_url('c_user/info/'.$tip['user_id'])?>">
                    <?php echo $tip['fullname'];?>
                </a>
            </div>
            <div><span>
                    <?php $time=strtotime($tip['create_time']);
                    //var_dump($time);
                    //var_dump(time());die;
                             echo '<br/>';
                		     echo (timespan($time,time()))." ago";
                    ?>
                 </span>
            </div>
            <a href="#" class="more_details"> <?php echo $tip['content'];?></a>
            <?php if ($this->session->userdata('logged_in')=== false): ?>
                <image src="/themes/phatnguyen/theme3/images/like.png" alt="Like this tip" /></image>&nbsp;<?php echo $tip['like_number'];?>
            <?php elseif($this->modelTip->isUserLikedTip($this->session->userdata('logged_in')['id'], $tip['id'])) : ?>
                <a href="<?php echo site_url("C_user/dislikeTip/" . $tip['id']); ?>"><image src="/themes/phatnguyen/theme3/images/liked.png" alt="Click to dislike" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
            <?php else: ?>
                <a href="<?php echo site_url("C_user/likeTip/" . $tip['id']); ?>"><image src="/themes/phatnguyen/theme3/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number'];?>
            <?php endif ?>
        </div>
    <?php endforeach ?>
<?php endif ?>