<?php $this->load->helper('form');?>
<?php if ($user !== false) : ?>
    <?php echo form_open('C_content/showtopic')?>
        <textarea style="width: 484px;height: 60px" name="txtContent">Write something you want</textarea>
        <select name = "catTopic">
            <?php
                foreach($ntopic as $row)
                {
                    $a = $row['name'];
                    echo "<option>$a</option>";
                }
            ?>
        </select>
        <input type="submit" name="btnAddTips" value="Add Tip">
    </form>
<?php endif ?>

<div class="title">Welcome to our radio station</div>
    <p>
    <img src="/themes/phatnguyen/theme3/images/earphones.gif" alt="" title="" class="left_img" />
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
    </p>  
     <div class="title">Tips of Today</div>
     
     
    <div class="left_shows">
        <div class="show_date">20.07.09</div>
        <div class="show_text_content">
“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
        </div> 
        <a href="#" class="more_details">more details</a>  
    </div>
    
    <div class="left_shows">
        <div class="show_date">20.07.09</div>
        <div class="show_text_content">
“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
        </div> 
        <a href="#" class="more_details">more details</a>  
    </div>    
    
    
    <div class="left_shows">
        <div class="show_date">20.07.09</div>
        <div class="show_text_content">
“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
        </div> 
        <a href="#" class="more_details">more details</a>  
    </div>  
    
    
    <div class="title">Photo Gallery</div>  
    
    <div class="photo_gallery">
        <div class="left_nav"><a href="#"><img src="/themes/phatnguyen/theme3/images/left_arrow.gif" alt="" title="" border="0" /></a></div>
        <div class="gallery_thumbs">
        <a href="#"><img src="/themes/phatnguyen/theme3/images/photo.gif" alt="" class="gallery_thumb" border="0" /></a>
        <a href="#"><img src="/themes/phatnguyen/theme3/images/photo.gif" alt="" class="gallery_thumb" border="0" /></a>
        <a href="#"><img src="/themes/phatnguyen/theme3/images/photo.gif" alt="" class="gallery_thumb" border="0" /></a>
        </div>
        <div class="right_nav"><a href="#"><img src="/themes/phatnguyen/theme3/images/right_arrow.gif" alt="" title="" border="0" /></a></div> 
    </div>
     