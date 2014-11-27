<?php $this->load->helper('date');
$this->load->model("M_tip", "modelTip");
$this->load->library('pagination');?>
<?php if (isset($ntip) && is_array($ntip) && count($ntip) > 0) : ?>
    <div id="updates" class="box">
    <h2>New Tips Today</h2>
    <?php foreach ($ntip as $tip) : ?>
            <ul>
                <li>
                    <a href="<?php echo site_url('c_user/showtips_byuserid/'.$tip['user_id'])?>">
                        <img src="/themes/phatnguyen/theme3/uploads/<?php echo $tip['avatar'];?>" alt="Img" height="50" width="50">
                    </a>
                    <div class="links">
                        <h4><a href="<?php echo site_url('c_user/info/'.$tip['user_id'])?>" class="time"><?php echo $tip['fullname'];?></a></h4>
                        <a href="" class="time">
                            <?php $time=strtotime($tip['create_time']);
                            echo (timespan($time,time()))." ago";
                            ?></a>
                        <?php if ($this->session->userdata('logged_in')=== false): ?>
                            <image src="/themes/phatnguyen/theme3/images/like.png" alt="Like this tip" /></image>&nbsp;<?php echo $tip['like_number'];?>
                        <?php elseif($this->modelTip->isUserLikedTip($this->session->userdata('logged_in')['id'], $tip['id'])) : ?>
                            <a href="<?php echo site_url("C_user/dislikeTip/" . $tip['id']); ?>"><image src="/themes/phatnguyen/theme3/images/liked.png" alt="Click to dislike" /></image></a>&nbsp;<?php echo $tip['like_number']; ?>
                        <?php else: ?>
                            <a href="<?php echo site_url("C_user/likeTip/" . $tip['id']); ?>"><image src="/themes/phatnguyen/theme3/images/like.png" alt="Like this tip" /></image></a>&nbsp;<?php echo $tip['like_number'];?>
                        <?php endif ?>            </div>
                    <p>
                        <?php echo $tip['content'];?>
                    </p>
                </li>
            </ul>
        <br>
    <?php endforeach ?>
    </div>
<?php endif ?>



