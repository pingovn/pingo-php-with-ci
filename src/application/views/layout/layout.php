<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tips of the day</title>

    <!-- Bootstrap -->
    <link href="/themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/pingo/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div id="main_container">
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <div class="main-container">
        <div class="col-md-2 left-container">
            <?php include("left_content.php") ?>
        </div>
        <div class="col-md-8 mid-container">
            <?php include("$mainContent"); ?>
        </div>
        <div class="col-md-2 right-container">
            <?php include("right_content.php"); ?>
        </div>
    </div>
    <?php include("footer.php"); ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/themes/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
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
                        $("#errorContainer").html('<div  class="alert alert-danger" role="alert">' 
                            + response + '</div>')
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
    });

</script>
  </body>
</html>
<!--

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="/themes/phatnguyen/theme3/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/themes/phatnguyen/theme3/css/pingo.css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>

</body>
</html>
-->