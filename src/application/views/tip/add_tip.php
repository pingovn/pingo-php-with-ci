<?php if (isset($user) && $user !== false) : ?>
    <?php echo form_open('C_content/addtip')?>
    <textarea style="width: 484px;height: 60px" name="txtContent" placeholder="Write something you want..."></textarea>
    <span><?php echo form_error('txtContent'); ?></span>
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