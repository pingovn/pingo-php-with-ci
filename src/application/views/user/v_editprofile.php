<?php $this->load->helper('form');?>
<?php if (isset($user)) : ?>
<?php $fullname = $userinfo['fullname']?>
    <section class="container">
    <div class="login">
        <h1>Create New Account</h1>
        <?php echo form_open('C_user/process_updateprofile') ?>
            <div>
                <label>Full Name : </label>
                <input type="text" name="txtFullname" value="<?php echo $fullname;?>">
                <span style="color: red;font-style: italic;"><?php echo form_error('txtFullname'); ?></span>
            </div>
            <div>
                <label>Age : </label>
                <select name="age">
                    <?php
                            for ($i=1; $i<=100; $i++)
                            {
                    ?>
                                <option <?php echo ($userinfo['age']==$i)?'selected':'' ?> value="<?php echo $i;?>"><?php echo $i;?> </option>
                    <?php
                            }
                    ?>
                </select>
                <span style="color: red;font-style: italic;"><?php echo form_error('age'); ?></span>
            </div>
            <div>
                <label>Gender :</label>
                <input <?php echo ($userinfo['gender']=='1')?'checked':'' ?> type="radio" name="sex" value="1" size="17">Male
                <input <?php echo ($userinfo['gender']=='2')?'checked':'' ?> type="radio" name="sex" value="2" size="17">Female
                <input <?php echo ($userinfo['gender']=='3')?'checked':'' ?> type="radio" name="sex" value="3" size="17">Other
                <span style="color: red;font-style: italic;"><?php echo form_error('sex[]'); ?></span>
            </div>
            <div>
                <p class="submit"><input type="submit" name="btnSave" value="UPDATE"></p>
            </div>
        </form>
    </div>
</section>
<?php else : redirect('c_user/login', 'refresh');?>
<?php endif ?>