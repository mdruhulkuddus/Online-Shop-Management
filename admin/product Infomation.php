<?php
	include("../database/db_connect.php");
		//print $db_message;
		
		function makeID($table,$field,$prifix,$idLength)
		{
		$query=mysql_query("select max($field) from $table");
		$fetch_max=mysql_fetch_row($query);
		$maxId=$fetch_max[0];
		
		$prefixLength=strlen($prifix);
		$onlyID=substr($maxId,$prefixLength);
		$newID=(int)($onlyID);
		$newID++;
		$numberOfzero=$idLength-$prefixLength-strlen($newID);
		$repeatZero=str_repeat("0",$numberOfzero);
		$madeID=$prifix.$repeatZero.$newID;
		//print $madeID."<br>";
		
		return ($madeID);
		
		
		}
		$fetch[2]=makeID('productinformation','Product_id','PDT-','8');
		
		
		
if(isset($_POST["add"]))
{
	
	$iname=$_POST["txtItemName"];
	
	$cname=$_POST["txtCat"];
	$id=$_POST["txt3"];
	$pname=$_POST["txt4"];
	$price=$_POST["txt5"];
	$details=$_POST["txt6"];
	$stock=$_POST["txt7"];
	
	if(!empty($iname) && !empty($cname)&& !empty($id)&& !empty($pname))
	{
		mysql_query("insert into productinformation (`Item_name`,`Category_name`,`Product_id`,`Product_name`,`Product_price`,`Product_details`,`Product_stock`) value('$iname','$cname','$id','$pname','$price','$details','$stock')");
	
	$loc="../images/$id.jpg";
	move_uploaded_file($_FILES['image']['tmp_name'],$loc);
			
		if(mysql_affected_rows()>0)
		{
		$fetch[2]=makeID('productinformation','Product_id','PDT-','8');
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
	
	$iname=$_POST["txtItemName"];
	
	$cname=$_POST["txtCat"];
	$id=$_POST["txt3"];
	$pname=$_POST["txt4"];
	$price=$_POST["txt5"];
	$details=$_POST["txt6"];
	$stock=$_POST["txt7"];
	
	if(!empty($iname) && !empty($cname)&& !empty($id)&& !empty($pname)&& !empty($price))
	{
		mysql_query("replace into productinformation (`Item_name`,`Category_name`,`Product_id`,`Product_name`,`Product_price`,`Product_details`,`Product_stock`) value('$iname','$cname','$id','$pname','$price','$details','$stock')");
		if(mysql_affected_rows()>0)
		{
			print"Data EDIT Successfully";
		}
		else
		{
			print"Data  EDIT Unsuccessfully";
		}
		
			
	}
	else
	{
		print"Insert Data";
	}
}

if(isset($_POST["delete"]))
{
	
	$id=$_POST["txt3"];
	
	
	if(!empty($id))
	{
		mysql_query("DELETE FROM productinformation WHERE Product_id='$id'");
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
if(isset($_POST["view"]))
	{
		$select=mysql_query("select * from productinformation");
		$total_fields=mysql_num_fields($select);
		print $total_fields;
		
		$table="<table width='745' bgcolor='#f4f4f4' border='1' bordercolor='#ff9999'>";
			$table.="<tr><td>Item Name</td> <td>Ctegory Name</td>  <td>Product ID</td><td>Product Name</td><td>Product Price</td><td>Product Details</td><td>Product Stock</td><td>Picture</td></tr>";
			
			while($fetch_data=mysql_fetch_row($select))
			{
			$table.="<tr>";
				for($i=0;$i<$total_fields;$i++)
				{
					$table.="<td>";
						$table.=$fetch_data[$i];
					$table.="</td>";
				
				}
				$table.="<td>";
						$table.="<img src='../images/$fetch_data[2].jpg' height='70' width='90'>";
				$table.="</td>";
			$table.="</tr>";
			}
		$table.="</table>";
		
	}
if(isset($_POST["btnsearch"]))
	{
		$search=$_POST["search"];
		
		$select=mysql_query("select * from productinformation where Product_id='$search'");
		$fetch=mysql_fetch_row($select);
	
	}
	
	if(isset($_POST["show"]))
	{
		$fetch[0]=$_POST["txtItemName"];		
	}
	
?>


<html>
	<head>
		<title> Create An Acount</title></head>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
	<body>
	<form name="product" method="post"  enctype="multipart/form-data"> 
		<table width="745" height="446" border="0"align="center" cellpadding="0" cellspacing="1">
	  	<tr align="center">
			<td height="74" colspan="3" bgcolor="#3399FF"><font color="#FFFFFF" />
		  <h2>Product Information</h2></td>
			
	    </tr>
		<tr align="right" bgcolor="#E2E3D3">
			<td ><font color="#0066FF" /></td>
			<td align="center">:</td>
	  		<td height="26"  bgcolor=""> <input type="text" name="search" /><input type="submit" value="search" name="btnsearch" /></td>
			
	 	</tr>
	    <tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" />Item Name </td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
		  <td width="295"  align="left"> 
			
			<select name="txtItemName"  onChange="selectCategory()" id="item">
				<option><?php print $fetch[0]; ?></option>
			<?php
				$selectItem=mysql_query("select * from iteminformation");
				while($fetch_item=mysql_fetch_array($selectItem))
				{
			?>
			<option><?php print $fetch_item['Item_name']?></option>
			
			<?php
			}
			?>
			
			</select>
		  	  </td>
	  	<tr align="center" bgcolor="#E2E3D3" >
			<td width="287" height="25" align="right" ><font color="#0066FF" /> Category Name</td>
			<td width="19" align="center"> <font color="#0066FF" />:</td>
			<td width="295"  align="left">	
			<select name="txtCat" id="category">
				
			</select>
			
		  </td>
	   </tr>
	   <tr bgcolor="#E2E3D3">
				<td height="28" width="287" align="right"><font color="#0066FF" /> Product ID </td>
				<td align="center"> :<font color="#0066FF" /> </td>
				<td align="left"><input type="text" name="txt3" value="<?php print $fetch[2]; ?>" /></td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="24" width="287"><font color="#0066FF" />Product Name </td>
				<td align="center"> <font color="#0066FF" />: </td>
				<td align="left"> <input type="text" name="txt4"value="<?php print $fetch[3]; ?>"/> </td>
	  </tr>
	  <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Product Price </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="txt5"value="<?php print $fetch[4]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Product Details </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left">   <textarea name="txt6" value="<?php print $fetch[5]; ?>"></textarea> </td>
	  </tr>
	    <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" />Product Stock </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="text" name="txt7"value="<?php print $fetch[6]; ?>"/> </td>
	  </tr>
	   <tr align="right" bgcolor="#E2E3D3">
				<td height="30" width="287"><font color="#0066FF" /> Product  Picture </td>
				<td align="center"><font color="#0066FF" /> : </td>
				<td align="left"> <input type="file" name="image"/> </td>
	  </tr>
	  
	  <tr align="center"bgcolor="#E2E3D3" >
			<td height="52" colspan="3"> <input type="submit" value="ADD" name="add"/>
			<input type="submit" value="EDIT" name="edit" />
			<input type="submit" value="DELETE" name="delete"/>
			<input type="submit" value="VIEW" name="view"/>
			<input type="submit" value="CANCEL" name="cancel"/>
		</td>
	  </tr>
	  <tr align="center" bgcolor="#E2E3D3" >
			  <td height="54" colspan="3"><?php print $table;?></td>
		  </tr>
	</table>
	</form>
	</body>
</html>