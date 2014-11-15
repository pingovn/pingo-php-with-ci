<?php if ($this->session->userdata('userId') !== false) : ?>
<div class="container">
    <form id="frmAddTip" action="<?php echo site_url("tip/add"); ?>" method="POST">
        <?php if (isset($error) && $error != "") : ?>
            <center><p style="color: red;"><i><?php echo $error; ?></i></p>
            <div class="sep"></div>
        <?php endif ?>
        <div class="inputs">
        <textarea placeholder="Toi muon noi vai dieu" name="txtTip" id="txtTip"></textarea>
        <br />
        <select name="slbTopic" id="slbTopic">
            <?php foreach ($allTopics as $topic) : ?>
                <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" name="btnAddTip" id="btnAddTip" value="Add Tip" />
        </div>
    </form>
    </div>
<?php endif ?>