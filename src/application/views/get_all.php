<?php
foreach ($query as $row) 
{
	echo "ID: ";
	print $row->id;
	echo "</br>";
	echo "Username: ";
	print $row->username;
	echo "</br>";
	echo "Password: ";
	print $row->password;
	echo "</br>";
	echo "Level: ";
	print $row->level;
	echo "</br>";
	echo "</br>";
}
?>