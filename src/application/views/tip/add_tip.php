<?php if ($this->session->userdata('userId') !== false) : ?>
<div class="add-tip">
    <form role="form" id="frmAddTip" action="<?php echo site_url("tip/add"); ?>" method="POST">
        <div id="errorContainer">
        <?php if (isset($error) && $error != "") : ?>
            <p style="color: red;"><i><?php echo $error; ?></i></p>
            <div class="sep"></div>
        <?php endif ?>
        </div>
        <div class="inputs">
            <textarea class="form-control"  placeholder="Toi muon noi vai dieu" name="txtTip" id="txtTip"></textarea>
            <div style="padding-top: 5px;">
                <div class="input-group" style="float:left;">
                    <select name="slbTopic" id="slbTopic" class="form-control" >
                        <?php foreach ($allTopics as $topic) : ?>
                            <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-group" style="float:left;">
                    <button type="button" id="btnAddTip" class="btn btn-default">Add Tip</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
    </div>
<?php endif ?>
