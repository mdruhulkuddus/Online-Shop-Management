<?php
	include("../database/db_connect.php");
	//print $db_message;
	
	$user_name=$_POST["name"];
    $email=$_POST["email"];
	$password=$_POST["password"];
	$confirm_password=$_POST["confirmPassword"];
	
	if(isset($_POST["add"]))
	{
	if(!empty($user_name) && !empty($email) && !empty($password) && !empty($confirm_password))
	{
	
				mysql_query("INSERT INTO  createadminuser (`user_name`,`email`,`password`,`confirm_password`) VALUE('$user_name',' $email','$password','$confirm_password')");
		
		if(mysql_affected_rows()>0)
		{
		print "Data insert successfully";
		}
		else
		{
		print "Data insert Unsuccessfully";
		}
	}
	else
	{
	print "Insert Data";
	}
}

if(isset($_POST["edit"]))
	{
	if(!empty($user_name) && !empty($email) && !empty($password) && !empty($confirm_password))
	{
	
				mysql_query("REPLACE INTO  createadminuser (`user_name`,`email`,`password`,`confirm_password`) VALUE('$user_name',' $email','$password','$confirm_password')");
		
		if(mysql_affected_rows()>0)
		{
		print "Data insert successfully";
		}
		else
		{
		print "Data insert Unsuccessfully";
		}
	}
	else
	{
	print "Insert Data";
	}
}

if(isset($_POST["btnsearch"]))
	{
		$search=$_POST["search"];
		
		$select=mysql_query("select * from createadminuser where user_name='$search'");
		$fetch=mysql_fetch_row($select);
	
	}
	
	if(isset($_POST["delete"]))
	{
		if(!empty($user_name))
		{
			mysql_query("delete from createadminuser where user_name='$user_name'");
			if(mysql_affected_rows()>0)
			{
				print "DATA delete successfully";
			}
			else
			{
				print "DATA delete successfully";
			}
	
		}
		else
		{
		print "Insert DATA";
		}
	}
	
	if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from createadminuser ");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='617' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
			$table.="<tr><td>User Name</td>  <td>E-mail</td><td>Password</td><td>Confirm Password</td> </tr>";
			
			while($fetch_data=mysql_fetch_row($select))
			{
			$table.="<tr>";
				for($i=0;$i<$total_fields;$i++)
				{
					$table.="<td>";
						$table.=$fetch_data[$i];
					$table.="</td>";
				
				}
			$table.="</tr>";
			}
		$table.="</table>";
		
	}
?>

<html>
<head>


<title> Create An Acount</title></head>
<body>
<form name="admin" method="post" action="">
<table width="617" height="257" border="0"align="center" cellpadding="0" cellspacing="1">
  <tr align="center">
    <td height="24" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
    <h3>Create An Acount</h3></td>
    
  </tr>
	<tr align="right" bgcolor="#E2E3D3">
  <td height="26" colspan="3" bgcolor=""> <input type="text" name="search" /><input type="submit" value="search" name="btnsearch" /></td>
  </tr>
   
  <tr align="center" bgcolor="#E2E3D3" >
    <td width="269" height="25" align="right" ><font color="#0066FF" />User Name</td>
    <td width="16" align="center"> <font color="#0066FF" />:</td>
    <td width="159"  align="left"> <input type="text" name="name" value="<?php print $fetch[0]; ?>" />
	
	</td>
  </tr>
  <tr bgcolor="#E2E3D3">
			<td height="28" width="269" align="right"><font color="#0066FF" />E-maii </td>
			<td align="center"> :<font color="#0066FF" /> </td>
			<td align="left"> <input type="text" name="email" value="<?php print $fetch[1]; ?>" /> </td>
  </tr>
  <tr align="right" bgcolor="#E2E3D3">
			<td height="24" width="269"><font color="#0066FF" /> Passowrd </td>
			<td align="center"> <font color="#0066FF" />: </td>
			<td align="left"> <input type="text" name="password" value="<?php print $fetch[2]; ?>" /> </td>
  </tr>
  <tr align="right" bgcolor="#E2E3D3">
			<td height="30" width="269"> <font color="#0066FF" />Confirm passowrd </td>
			<td align="center"><font color="#0066FF" /> : </td>
			<td align="left"> <input type="text" name="confirmPassword" value="<?php print $fetch[3]; ?>" /> </td>
  
  <tr align="center"bgcolor="#E2E3D3" >
    	<td height="26" colspan="3"> <input type="submit" value="ADD" name="add"/>
	  	<input type="submit" value="UPDATE" name="edit"/>
	 	<input type="submit" value="DELETE" name="delete"/>
		<input type="submit" value="VIEW" name="view"/>
		<input type="submit" value="CANCEL"/>
    </td>
  </tr>
   <tr align="right" bgcolor="#E2E3D3"  >
			<td height="30" width="269" colspan="3"> <?php print $table; ?> </td>
		
</table>
</form>
</body>
</html>