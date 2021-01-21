<?php
include("../database/db_connect.php");
//print $db_message;

	function makeID($table,$field,$prefix,$idLength)
		{
			$query=mysql_query("select max($field) from $table");
			$fetch_max=mysql_fetch_row($query);
			$maxid=$fetch_max[0];
			//print $maxid."<br>";
			 
			$prefixLenght=strlen($prefix);
			//print $prefixLenght."<br>";
			
			$onlyID=substr($maxid,$prefixLenght);
			//print $onlyID."<br>";
			
			$newID=(int)($onlyID);
			//print $newID."<br>";
			
			$newID++;
			//print $newID."<br>";
			
			$numberOfzero=$idLength-$prefixLenght-strlen($newID);
			//print $numberOfzero."<br>";
			
			$repearZero=str_repeat("0",$numberOfzero);
			//print $repearZero."<br>";
			
			$madeID=$prefix.$repearZero.$newID;
			//print $madeID."<br>";
			
			return($madeID);
		}
	
	$fetch[2]=makeID('categoryinformation','Category_ID','CAT-','7');
	
	
if(isset($_POST["add"]))
{
	$name=$_POST["textN"];
	$Catname=$_POST["textC"];
	$Id=$_POST["textI"];
	
	if(!empty($name) && !empty($Catname) && !empty($Id))
	{
		mysql_query("insert into CategoryInformation(`Item_Name`,`Category_Name`,`Category_ID`) values('$name','$Catname','$Id')");
		if(mysql_affected_rows()>0)
		{
		$fetch[2]=makeID('categoryinformation','Category_ID','CAT-','7');
		print"Data Add Successfully";
		
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
	$name=$_POST["textN"];
	$Catname=$_POST["textC"];
	$Id=$_POST["textI"];
	
	if(!empty($name) && !empty($Catname) && !empty($Id))
	{
	
		mysql_query("replace into CategoryInformation(`Item_Name`,`Category_Name`,`Category_ID`) values('$name','$Catname','$Id')");
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

if(isset($_POST["delete"]))
{
	$Id=$_POST["textI"];
	if(!empty($Id))
	{
		mysql_query("DELETE FROM CategoryInformation WHERE Category_ID='$Id'");
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
if(isset($_POST["btnsearch"]))
	{
		$search=$_POST["search"];
		
		$select=mysql_query("select * from CategoryInformation where Category_ID='$search'");
		$fetch=mysql_fetch_row($select);
	
	}

if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from CategoryInformation ");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='540' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
			$table.="<tr><td>Item ID</td> <td>Ctegory Name</td>  <td>Ctegory Id</td> </tr>";
			
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
	
	if(isset($_POST["exit"]))
	{
		print exit();
	}
?>

<html>
	<head>
		<title> Item Information</title>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
	</head>
	<body>
	<form name="frmcinfo" method="post" action="">
 		<table width="541" height="276" border="0" bordercolor="#FFFFF"  align="center" cellpadding="0" cellspacing="1">
			<tr align="center">
				<td height="69" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
			  <h2>Caterory Information</h2></td>
		  </tr>
			<tr align="right" bgcolor="#E2E3D3">
			  <td height="39" colspan="3"> <input type="text" name="search" /><input type="submit" value="Search" name="btnsearch"  /></td>
			</tr>
		  
		  
		  
			<tr bgcolor="#E2E3D3" >
					<td height="36" width="244" align="right">  <font color="#3399FF" />Item Name </td>
					<td width="28" align="center"> <font color="#3399FF" /> : <font color="#3399FF" /> </td>
					<td width="271">
						<select name="textN">
							<option><?php print  $fetch[0]; ?></option>
							
							<?php
							$select=mysql_query("select * from iteminformation ");
							while($fetch_item_name=mysql_fetch_row($select))
							{?>
								<option><?php print $fetch_item_name[1]; ?></option>
							<?php
							}
							?>
						</select>
					</td>
			</tr>
		   <tr  bgcolor="#E2E3D3" >
				<td height="32" width="244" align="right"> <font color="#3399FF" /> Category Name </td>
				<td align="center">  <font color="#3399FF" />: </td>
				<td align="justify"> <input type="text" name="textC" value="<?php print $fetch[1]; ?>"/> </td>
		  </tr>
	   		<tr  bgcolor="#E2E3D3" >
				<td height="36" width="244" align="right"> <font color="#3399FF" /> Category ID</td>
				<td align="center">  <font color="#3399FF" />: </td>
				<td align="justify"> <input type="text" name="textI" value="<?php print $fetch[2]; ?>"/> </td>
			</tr>
			
	  
			<tr align="center" bgcolor="#E2E3D3" >
				<td height="57" colspan="3"> <input type="submit" value="ADD" name="add"/>
					<input type="submit" value="EDIT" name="edit"/>
					<input type="submit" value="DELETE" name="delete"/>
					<input type="submit" value="VIEW" name="view"/>
					<input type="submit" value="CLEAR"/>  
			  	<input type="submit" value="EXIT" name="exit"/>  		</td>
			</tr>
			</tr>
			<tr align="center" bgcolor="#E2E3D3" >
			  <td height="54" colspan="3"><?php print $table;?></td>
		  </tr>
	</table>
	</form>
	</body>
</html>