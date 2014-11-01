<h2>Create a User</h2>
<?php

echo validation_errors();?>
<?php echo form_open('users/create');?>
<label for="email">Email</label>
<input type="text" name="email"/><br/>

<label for="password">Password</label>
<input type="password" name="password"/><br/>

<label for="passwordConfirm">PasswordConfirm</label>
<input type="password" name="passconf"/><br/>

<input type="submit" name="submit" value="Create new user"/>
<a href="/index.php/phatnguyen/index">Back</a>
<a href="/index.php/users/thank">Login</a>
<?php echo form_close();?>