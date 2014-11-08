

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

<h1>Update Information</h1>
<form id="frmUpdate" name="upinf" action="/index.php/hoang_update" onsubmit="return validateForm()" method="POST">

	<p><label>ID&nbsp;&nbsp; : </label>
	 <input id="id" type="id" name="id" placeholder="Nhap ID" /></p>
 
    
	<p><label for=user_email>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="email" type="email" name="email" required placeholder="abcd@something.com" /></p>
 
     <p><label for=user_password>Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password"  placeholder="Nhap password" /></p>
 
 	<p><label>FullName&nbsp;&nbsp; : </label>
	 <input id="fullname" type="password" name="fullname" placeholder="Nhap ho ten day du" /></p>
 
 	<p><label>Age&nbsp;&nbsp; : </label>
	 <input id="age" type="age" name="age" placeholder="Nhap tuoi cua ban" /></p>
 
 	<p><label>Gender&nbsp;&nbsp; : </label>
	 <input id="gender" type="gender" name="gender" placeholder="Nhap gioi tinh" /></p>
 
	<p><label>Avatar&nbsp;&nbsp; : </label>
	 <input id="avatar" type="images" name="avatar" placeholder="Chon hinh dai dien" /></p>
	 
	 <p><label>Status&nbsp;&nbsp; : </label>
	 <input id="status" type="checkbox" name="status" /></p>
	 
	 
    <input class="btn update" type="submit" name="btnsubmit" value="Update" />
    </form>
</div>
</body>
</html>