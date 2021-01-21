<?php
	include("../database/db_connect.php");
	
	function makeID($table,$field,$prefix,$idLength)
	{
		$query=mysql_query("select max($field) from $table");
		$fetch_max=mysql_fetch_row($query);
		$maxId=$fetch_max[0];
		//print $maxId."<br>";
		
		$prefixLenght=strlen($prefix);
		//print $prefixLenght."<br>";
		
		$onlyID=substr($maxId,$prefixLenght);
		//print $onlyID."<br>";
		
		$newID=(int)($onlyID);
		//print $newID."<br>";
		
		$newID++;
		//print $newID."<br>";
		
		$numberOfzero=$idLength-$prefixLenght-strlen($newID);
		//print $numberOfzero."<br>";
		
		$repeatZero=str_repeat("0",$numberOfzero);
		//print $repeatZero."<br>";
		
		$madeID=$prefix.$repeatZero.$newID;
		//print $madeID."<br>";
		
		return($madeID);
	}
	$fetch[0]=makeID('iteminformation','Item_ID','ITEM-','8');
	
if(isset($_POST["add"]))
{
	$id=$_POST["id"];
	$name=$_POST["name"];
	
	if(!empty($id) && !empty($name))
	{
		mysql_query("insert into iteminformation (`Item_ID`,`Item_name`) value('$id','$name')");
		if(mysql_affected_rows()>0)
		{
		$fetch[0]=makeID('iteminformation','Item_ID','ITEM-','8');
			print"Data ADD Successfully";
		}
		else
		{
			print"Data ADD Unsuccessfully";
		}
		
			
	}
	else
	{
		print"Insert Data";
	}
}
if(isset($_POST["edit"]))
{
	$id=$_POST["id"];
	$name=$_POST["name"];
	
	if(!empty($id) && !empty($name))
	{
		mysql_query("replace into iteminformation (`Item_ID`,`Item_name`) value('$id','$name')");
		if(mysql_affected_rows()>0)
		{
			print"Data EDIT Successfully";
		}
		else
		{
			print"Data EDIT Unsuccessfully";
		}
		
			
	}
	else
	{
		print"Insert Data";
	}
}
if(isset($_POST["btnsearch"]))
	{
		$search=$_POST["search"];
		
		$select=mysql_query("select * from iteminformation where item_ID='$search'");
		$fetch=mysql_fetch_row($select);
	
	}
	if(isset($_POST["delete"]))
	{
	$ID=$_POST["id"];
		if(!empty($ID))
		{
			mysql_query("DELETE FROM iteminformation WHERE item_ID='$ID'");
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
			print "Insert the Data";
		}
	}
	
	
if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from iteminformation ");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='625' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
			$table.="<tr><td>Item ID</td>  <td>Item Name</td> </tr>";
			
			while($fetch_data=mysql_fetch_row($select))
			{
			$table.="<tr>";
				for($i=0;$i<$total_fields;$i++)
				{
					$table.="<td>";
						$table.=$fetch_data[$i];   //<!--here field onojayi data dekhabe, jeheto ekane 2ta field seheto 1 ta field r por oporta loping hocce  -->
					$table.="</td>";
					
				
				}
			$table.="</tr>";
			}
		$table.="</table>";
		
	}
	
	
	if(isset($_POST["exit"]))
	{
		print exit();
	}
?>

<html>
	<head>
		<title> Item Information</title>
	</head>
	<body>
		<form name="frmiteminfo" method="post" action="">
		<table width="626" height="298" border="0" bordercolor="#FFFFF"  align="center" cellpadding="0" cellspacing="1">
			<tr align="center">
				<td height="68" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
			  <h2>Item Information</h2><p><marquee>Md Ruhul Kuddus</marquee></p></td>
		  </tr>
			<tr align="right" bgcolor="#E2E3D3">
			  <td height="29" colspan="3"> <input type="text" name="search" /><input type="submit" value="Search" name="btnsearch" /></td>
			</tr>
		  
		  
		  
			<tr bgcolor="#E2E3D3" >
					<td height="32" width="244" align="right">  <font color="#3399FF" />Item ID</td>
					<td width="28" align="center"> <font color="#3399FF" /> : <font color="#3399FF" /> </td>
					<td width="271"><input type="text" name="id" value="<?php print $fetch[0]; ?>" /></td>
			</tr>
		   <tr  bgcolor="#E2E3D3" >
				<td height="31" width="244" align="right"> <font color="#3399FF" /> Item Name </td>
				<td align="center">  <font color="#3399FF" />: </td>
		  <td align="justify"><input type="text" name="name" value="<?php print $fetch[1]; ?>" />		  </tr>
	  
			<tr align="center" bgcolor="#E2E3D3" >
				<td height="54" colspan="3"> <input type="submit" value="ADD" name="add"/>
					<input type="submit" value="EDIT" name="edit"/>
					<input type="submit" value="DELETE" name="delete"/>
					<input type="submit" value="VIEW" name="view"/>
					<input type="submit" value="CLEAR"/>  
			  <input type="submit" value="EXIT" name="exit"/>  		</td>
			</tr>
			<tr align="center" bgcolor="#E2E3D3" >
			  <td height="54" colspan="3"><?php print $table;?></td>
		  </tr>
	</table>
	</form>
	</body>
</html>