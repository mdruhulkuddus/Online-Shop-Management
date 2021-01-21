<?php
	include("../database/db_connect.php");
	//print $db_message;
	
	$cus_id=$_POST["id"];
	$cus_name=$_POST["name"];
	$cus_address=$_POST["address"];
	$cus_phone=$_POST["phone"];
	$cus_email=$_POST["email"];
	$cus_password=$_POST["password"];
	
	if(isset($_POST["add"]))
	{   
		if(!empty($cus_id) && !empty($cus_name) && !empty($cus_phone) && !empty($cus_email) && !empty($cus_password))
	
		{
			mysql_query("insert into customerinformation (`customer_id`,`customer_name`,`customer_address`,`customer_phone`,`customer_email`,`customer_password`) value('$cus_id','$cus_name','$cus_address','$cus_phone','$cus_email','$cus_password')");
			
			if(mysql_affected_rows()>0)
			
			{
				print "DATA insert successfully";
			}
			else
			{
				print "DATA insert Unsuccessfully";
			}
		}
		else
		{
			print"Insert DATA";
		}	
	 }
 
	if(isset($_POST["edit"]))
	{   
		if(!empty($cus_id) && !empty($cus_name) && !empty($cus_phone) && !empty($cus_email) && !empty($cus_password))
	
		{
			mysql_query("replace into customerinformation (`customer_id`,`customer_name`,`customer_address`,`customer_phone`,`customer_email`,`customer_password`) value('$cus_id','$cus_name','$cus_address','$cus_phone','$cus_email','$cus_password')");
			
			if(mysql_affected_rows()>0)
			
			{
				print "DATA Update successfully";
			}
			else
			{
				print "DATA Update Unsuccessfully";
			}
		}
		else
		{
			print"Insert DATA";
		}	
	 }

	if(isset($_POST["btnsearch"]))
		{
			$search=$_POST["search"];
			$select=mysql_query("select * from customerinformation where customer_id='$search'");
			$fetch=mysql_fetch_row($select);
		
		}
	
	if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from customerinformation");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='745' border='1' bordercolor='#330066' >";
		$table.="<tr><td>Customer ID</td><td>Customer Name</td><td>Customer Address</td><td>Customer Phone</td><td>Customer E-mail</td><td>Customer Password</td> </tr>";
		
		while($fetch_data=mysql_fetch_row($select))
		{
			$table.="<tr>";
				for($i=0; $i<$total_fields; $i++)
				{
				$table.="<td>";
				$table.=$fetch_data[$i];
				$table.="</td>";
				}
			$table.="</tr>";
		}
		
		$table.="</table>";
	}
	
	if(isset($_POST["delete"]))
	{
	$cus_id=$_POST["id"];
	if(!empty($cus_id))
	{
	mysql_query("DELETE  FROM customerinformation WHERE customer_id='$cus_id'");
	
	if(mysql_affected_rows()>0)
			{
				print"Data Delete Successfully";
			}
			else
			{
				print"Data Delete unsuccessfully";
			}
	}
	else
	{
		print"Insert the Data";
	}

}
?>

<html>
	<head>
		<title> Create An Acount</title></head>
	<body>
	
	<form name="customer" action="" method="post" >
		<table width="745" height="411" border="0"align="center" cellpadding="0" cellspacing="1">
	  	<tr align="center">
			<td height="74" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
		  <h2>Customer Information</h2></td>
	    </tr>
		<tr align="right" bgcolor="#E2E3D3">
			<td ><font color="#0066FF"  />Search Customer</td>
			<td align="center">:</td>
	  		<td height="26"> <input type="text" name="search" /><input type="submit" value="SEARCH" name="btnsearch" /></td>
	 	</tr>
	    <tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" />Customer ID</td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
			<td width="295"  align="left"> <input type="text" name="id" value="<?php print $fetch[0]; ?>"/>	 </td>
	  	<tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" /> Customer Name</td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
			<td width="295"  align="left"><input type="text"  name="name" value="<?php print $fetch[1]; ?>"/></td>
	   </tr>
	   <tr bgcolor="#E2E3D3">
				<td height="28" width="287" align="right"><font color="#0066FF" /> Customer Address  </td>
				<td align="center"> :<font color="#0066FF" /> </td>
				<td align="left"> <textarea name="address" value="<?php print $fetch[2]; ?>"/></textarea> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="24" width="287"><font color="#0066FF" />Customer Phone </td>
				<td align="center"> <font color="#0066FF" />: </td>
				<td align="left"> <input type="text" name="phone" value="<?php print $fetch[3]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Customer E-mai</td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="email" value="<?php print $fetch[4]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Customer Password  </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="password" value="<?php print $fetch[5]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Customer Picture </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="file"/> </td>
	  </tr>
	  
	  <tr align="center"bgcolor="#E2E3D3" >
			<td height="26" colspan="3"> <input name="add" type="submit"  value="ADD"/>
			<input name="edit" type="submit" id="edit" value="UPDATE" />
			<input type="submit" value="DELETE" name="delete"/>
			<input type="submit" value="VIEW" name="view"/>
			<input type="submit" value="CANCEL" />		</td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287" colspan="3"> <?php print $table; ?></td>
	  </tr>
	</table>
	</form>
	</body>
</html>