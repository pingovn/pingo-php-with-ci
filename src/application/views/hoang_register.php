<!DOCTYPE html>
<html>
<head>
<title>Simple user registration Script</title>

    
<script type="text/javascript">
function validateForm()
{
var pw=document.forms["regin"]["password"].value;
var rpw=document.forms["regin"]["repassword"].value;

if ((pw==null || pw=="") && (rpw==null || rpw=="")) 
{
alert(" Các khung không được để trống! ");
return false;
}

if (pw==null || pw=="")
{
alert("Vui lòng nhập mật khẩu!");
return false;
}

if (rpw==null || rpw=="")
{
alert("Nhập lại mật khẩu như trên");
return false;
}


}
</script>

</head>
<body>
    <!-- Form for logging in the users -->
<div class="register-form">

<h1>Register Information</h1>
<form id="frmRegister" name="regin" action="/index.php/hoang_register" onsubmit="return validateForm()" method="POST">
    
	<p><label for=user_email>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="email" type="email" name="email" required placeholder="abcd@something.com" /></p>
 
     <p><label for=user_password>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password"  placeholder="Nhap password" /></p>
 
 	<p><label>Re-Password&nbsp;&nbsp; : </label>
	 <input id="repassword" type="password" name="repassword" placeholder="Nhap lai password" /></p>
 
 	
  
    <input class="btn register" type="submit" name="btnsubmit" value="Register" />
    </form>
</div>
</body>
</html>