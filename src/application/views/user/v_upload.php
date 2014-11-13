</body>
</html>
<section class="container">
    <div class="login">
        <h1>Change avatar</h1>
        <?php echo form_open_multipart('c_user/do_upload');?>
        <img src="/themes/phatnguyen/theme3/uploads/<?php echo $userinfo['avatar']?>" width=80px height=80px border=0px />
        <input type="file" name="userfile" size="20" />
        <input type="submit" value="upload" name="upload" />
        </form>
    </div>
</section>