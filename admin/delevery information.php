<?php 
	include("../database/db_connect.php");
	//print $db_message;
	
	$id=$_POST["dele_id"];
	$date=$_POST["dele_date"];
	$type=$_POST["ship_type"];
	$name=$_POST["ship_name"];
	$address=$_POST["ship_address"];
	$phone=$_POST["ship_phone"];
	$email=$_POST["ship_email"];
	
	if(isset($_POST["add"]))
	{
		if(!empty($id) && !empty($date) && !empty($name) && !empty($phone))
		{
		mysql_query("insert into delevaryinformation(`delevary_id`,`delevary_date`,`shipment_type`,`shipment_name`,`shipment_address`,`shipment_phone`,`shipment_email`) value('$id','$date','$type','$name','$address','$phone','$email')");
		
		if(mysql_affected_rows()>0)
		{
			print"Data Insert Successfully";
		}
		else
		{
			print"Data Insert Unsuccessfully";
		}
		
	}	
	else
		{
			print"Insert DATA";
		}
	
	
	}
	
	if(isset($_POST["edit"]))
	{
		if(!empty($id) && !empty($date) && !empty($name) && !empty($phone))
		{
		mysql_query("replace into delevaryinformation(`delevary_id`,`delevary_date`,`shipment_type`,`shipment_name`,`shipment_address`,`shipment_phone`,`shipment_email`) value('$id','$date','$type','$name','$address','$phone','$email')");
		
		if(mysql_affected_rows()>0)
		{
			print"Data Insert Successfully";
		}
		else
		{
			print"Data Insert Unsuccessfully";
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
	
	$select=mysql_query("select * from delevaryinformation WHERE delevary_id='$search'");
	$fetch=mysql_fetch_row($select);
	}
	
	
	if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from delevaryinformation");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='745' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
		$table.="<tr> <td>Delevary ID</td> <td>Delevary Date</td> <td>Shipment Type </td> <td>Shipment Name</td> <td>Shipment Address</td> <td>Shipment Phone</td> <td>Shipment E-mail</td> </tr>";
	
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
	
	if(isset($_POST["delete"]))
	{
	$id=$_POST["dele_id"];
	if(!empty($id))
	{
	mysql_query("DELETE  FROM delevaryinformation WHERE delevary_id='$id'");
	
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
	<form name="delevery" method="post" >
		<table width="745" height="439" border="0"align="center" cellpadding="0" cellspacing="1">
	  	<tr align="center">
			<td height="74" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
		  <h2>Delevary Information</h2></td>
	    </tr>
		<tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" colspan="3" ><font color="#0066FF" /><input type="text" name="search" > <input type="submit" name="btnsearch" value="Search" > </td>
			
		</tr>
	    <tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" />Delevary ID</td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
			<td width="295"  align="left"> <input type="text" name="dele_id" value="<?php print $fetch[0]; ?>" />		  </td>
		</tr>
	  	<tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" />Delevary Date</td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
			<td width="295"  align="left"> <input type="text"  name="dele_date" value="<?php print $fetch[1]; ?>"/>		  </td>
	   </tr>
	   <tr bgcolor="#E2E3D3">
				<td height="28" width="287" align="right"><font color="#0066FF" /> Shipment Type  </td>
				<td align="center"> :<font color="#0066FF" /> </td>
				<td align="left"> <input type="text" name="ship_type" value="<?php print $fetch[2]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="24" width="287"><font color="#0066FF" />Shipment Name </td>
				<td align="center"> <font color="#0066FF" />: </td>
				<td align="left"> <input type="text" name="ship_name" value="<?php print $fetch[3]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Shipment Address </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <textarea  name="ship_address" value="<?php print $fetch[4]; ?>"></textarea></td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Shipment Phone </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text"  name="ship_phone" value="<?php print $fetch[5]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Shipment E-mail </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="ship_email" value="<?php print $fetch[6]; ?>"/> </td>
	  </tr>
	  
	  <tr align="center"bgcolor="#E2E3D3" >
			<td height="54" colspan="3"><input type="submit" value="ADD" name="add"/>
			  <input type="submit" value="EDIT" name="edit" />
			<input type="submit" value="DELETE" name="delete"/>
			<input type="submit" value="VIEW" name="view"/>
		<input type="submit" value="CANCEL" name="cancle"/>		</td>
	  </tr>
	  <tr>
	  <td colspan="3"><?php print $table;?></td>
	  
	  </tr>
	</table>
	</form>
	</body>
</html>