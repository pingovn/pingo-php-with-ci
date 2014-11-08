<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 
  
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>    
    <title>Login Screen | Welcome </title>
</head>
<body>
    <div id='login_form'>
        <form action="process" method='post' name='process'>
            <h2>User Login</h2>
            <br />            
            <?php if(! is_null($msg)) echo $msg;?>
            <label for='email'>Email</label>
            <input type='text' name='email' id='username' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
        
            <input type='submit' value='Login' />            
        </form>
    </div>
</body>
</html>