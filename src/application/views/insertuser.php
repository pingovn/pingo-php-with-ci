<html>
<body>

<?php echo '<form action="./input" method="post" accept-charset="utf-8">' ?>
<?php echo $email; ?>: 
<?php echo form_input('email'); ?>
</br>
<?php echo $password; ?>: 
<?php echo form_input('password'); ?>
</br>
<?php echo $confirm_password; ?>:
<?php echo form_input('confirm_password'); ?>
</br>
<?php echo form_submit('mysubmit','Register');  ?>
<?php echo form_close(); ?>

</body>
</html>