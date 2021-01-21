<?php
	include("../database/db_connect.php");
	//print $db_message;
	
	$full_name=$_POST["name"];
	$acount_title=$_POST["acountTitle"];
	$acount_number=$_POST["acountNum"];
	$password=$_POST["password"];
	$amount=$_POST["amount"];
	
	if(isset($_POST["add"]))
	{ 
	if(!empty($full_name) && !empty($acount_title) && !empty($acount_number) && !empty($password) && !empty($amount))
	{
	
				mysql_query("INSERT INTO  credit_card (`full_name`,`account_title`,`account_number`,`password`,`amount`) VALUE('$full_name',' $acount_title','$acount_number','$password','$amount')");
		
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
	if(!empty($full_name) && !empty($acount_title) && !empty($acount_number) && !empty($password) && !empty($amount))
	{
	
				mysql_query("replace INTO  credit_card (`full_name`,`account_title`,`account_number`,`password`,`amount`) VALUE('$full_name',' $acount_title','$acount_number','$password','$amount')");
		
		if(mysql_affected_rows()>0)
		{
		print "Data Edit successfully";
		}
		else
		{
		print "Data  Edit Unsuccessfully";
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
		
		$select=mysql_query("select * from credit_card where account_number='$search'");
		$fetch=mysql_fetch_row($select);
	
	}
	if(isset($_POST["delete"]))
	{
		if(!empty($acount_number))
		{
			mysql_query("delete from credit_card where account_number='$acount_number'");
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
		$select=mysql_query("select * from credit_card");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='720' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
			$table.="<tr><td>Full Name</td>  <td>Acount Title</td><td>Acount Number</td><td>Password</td> <td>Amonut</td></tr>";
			
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
	<form name="card" method="post" action="">
		<table width="720" height="352" border="0"align="center" cellpadding="0" cellspacing="1">
	  	<tr align="center">
			<td height="63" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
		  <h2>Create Card</h2></td>
			
	    </tr>
		<tr align="right" bgcolor="#E2E3D3">
			<td ><font color="#0066FF" />Search Card</td>
			<td align="left">:</td>
	  		<td height="26"  bgcolor=""> <input type="text" name="search" /><input type="submit" value="search" name="btnsearch" /></td>
			
	 	</tr>
	   
	  	<tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" />Full Name</td>
			<td width="19" align="left"> <font color="#0066FF" />:</td>
			<td width="295"  align="left"> <input type="text" name="name" value="<?php print $fetch[0]; ?>" />
			
		  </td>
	   </tr>
	   <tr bgcolor="#E2E3D3">
				<td height="28" width="287" align="right"><font color="#0066FF" />Acount Title  </td>
				<td align="left"> :<font color="#0066FF" /> </td>
				<td align="left"> <input type="text" name="acountTitle" value="<?php print $fetch[1]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="24" width="287"><font color="#0066FF" /> Acount Number </td>
				<td align="left"> <font color="#0066FF" />: </td>
				<td align="left"> <input type="text" name="acountNum" value="<?php print $fetch[2]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Passowrd </td>
				<td align="left"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="password" value="<?php print $fetch[3]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Amount </td>
				<td align="left"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="amount" value="<?php print $fetch[4]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Picture </td>
				<td align="left"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="file"/> </td>
	  </tr>
	  
	  <tr align="center"bgcolor="#E2E3D3" >
			<td height="60" colspan="3"> <input type="submit" value="ADD" name="add"/>
			<input type="submit" value="UPDATE" name="edit"/>
			<input type="submit" value="DELETE" name="delete"/>
			<input type="submit" value="VIEW" name="view"/>
			<input type="submit" value="CANCEL"/>
		</td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287" colspan="3"><?php print $table; ?></td>
			
	  </tr>
	</table>
	</form>
	</body>
</html>