<?php  //Start the Session
session_start();
 //require('connect.php');


if (isset($_POST['email']) and isset($_POST['password']))
{

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);

if ($count == 1)
{
$_SESSION['email'] = $email;
}
else{

echo "Đăng nhập thất bại.";
}
}

if (isset($_SESSION['email']))
{
$email = $_SESSION['email'];
echo "Hello " . $email . " ";
echo "Khu vực cho thành viên";

echo "<a href='".site_url()."hoanglogout'>Logout</a>";
 
}
else{

?>
<!DOCTYPE html>
 <head>
<title>Simple Login Script</title>

</head>
<body>
<!-- Form for logging in the users -->

<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Login User</h1>
<form action="index.php/hoang_login.php" method="POST">
    <p><label>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="email" type="email" name="email" required placeholder="email@something.com" /></p>
 
     <p><label>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" required placeholder="Nhap password" /></p>
 
 	<a class="btn" href="/index.php/Hoang_user/hoangregister">Registration</a> &nbsp;&nbsp;
    
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>
<?php } ?>
</body>
</html>