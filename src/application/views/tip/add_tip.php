<?php if ($this->session->userdata('userId') !== false) : ?>
<div class="container">
    <form id="frmAddTip" action="<?php echo site_url("tip/add"); ?>" method="POST">
        <div id="errorContainer">
        <?php if (isset($error) && $error != "") : ?>
            <p style="color: red;"><i><?php echo $error; ?></i></p>
            <div class="sep"></div>
        <?php endif ?>
        </div>
        <div class="inputs">
        <textarea placeholder="Toi muon noi vai dieu" name="txtTip" id="txtTip"></textarea>
        <br />
        <select name="slbTopic" id="slbTopic">
            <?php foreach ($allTopics as $topic) : ?>
                <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
            <?php endforeach ?>
        </select>
        <button type="button" id="btnAddTip">Add Tip</button>
        <!--
        <input type="submit" name="btnAddTip" id="btnAddTip" value="Add Tip" />
        -->
        </div>
    </form>
    </div>
<?php endif ?>
<script type="text/javascript">
$("#btnAddTip").click(function() {
    $.ajax({
        url: "<?php echo site_url('tip/ajaxAdd'); ?>",
        method: "POST",
        data: {
            txtTip: $("#txtTip").val(), 
            slbTopic: $("#slbTopic").val(),
            btnAddTip: 'Add Tip'
        },
        success: function(response) {
            if (response != "OK") {
                // Xu ly loi
                $("#errorContainer").html('<p style="color: red;"><i>' 
                    + response + '</i></p><div class="sep"></div>')
            } else {
                var tipHtml = '<div class="left_shows" id="tipxxx"><div class="show_date">123 123 1231 2</div><div class="show_text_content"><div>asdfsadfsadf asdf asdf oh yea</div><div><image src="/images/like.png" alt="Like this tip" /></image>123123<a href="/index.php/user/likeTip/100"><image src="/images/like.png" alt="Like this tip" /></image></a>&nbsp;123123123</div></div><a href="" class="more_details">&nbsp;adsfsdfsdf.com</a> </div>';
                var tipDiv = $(tipHtml);
                $("#txtTip").val("");
                $("#slbTopic").val("1");
                tipDiv.hide();
                $("#todayList").prepend(tipDiv);
                tipDiv.slideDown();
            }
        }
    });
});
</script>