<div class="container" id="userInfo">
        <div class="header">
            <h3><?php echo "User information" ?></h3>
        </div>
        <div class="sep"></div>
        <div class="userFields">
            <div>
                <span>Email</span>
                <span><?php echo $user['email']; ?></span>
            </div>
            <div>
                <span>Fullname</span>
                <span><?php echo $user['fullname']; ?></span>
            </div>
            <div>
                <span>Gender</span>
                <span>
                    <?php if ($user['gender'] == 0) : ?>
                        <?php echo 'Male'; ?>
                    <?php elseif ($user['gender'] == 1) : ?>
                        <?php echo 'Female'; ?>
                    <?php else : ?>
                        <?php echo 'Other'; ?>
                    <?php endif ?>
                </span>
            </div>
            <div>
                <span>Age</span>
                <span><?php echo $user['age']; ?></span>
            </div>
        </div>
</div>


<!--Xu ly re chuot vao Email co the thay click = hover
<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
 
<style> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#e5eecc;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
</head>
<body>
 
<div id="flip">Click to slide the panel down or up</div>
<div id="panel">Hello world!</div>

</body>
</html>
 -->