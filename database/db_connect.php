<?php
	$con=mysql_connect("localhost","root","");
	$select_db=mysql_select_db("onlineshoping");
	if(!$con or !$select_db)
	{
		print"Not Connected".mysql_error();
	}
	else
	{
		$db_message="<h1 style='color:#ff0000'>Connected</h1>";
	}
?>