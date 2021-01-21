<?php
	include("../database/db_connect.php");

?>

<html>
<head></head>
<body>
	<table  width="857" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#99CCFF">
	
		<tr>
			<td height="48" align="center" bgcolor="#99CCFF">Daly Order Report</td>
		</tr>
		
		
		<?php
		$netTota=0;
			$select=mysql_query("SELECT * FROM shopping_card GROUP BY date ");
			while($fetch=mysql_fetch_array($select))
			{
		?>
		
		
		<tr>
		
		  <td height="35" bgcolor="#f4f4f4" align="center" ><h3> <?php print $fetch['date'];?></h3></td>
		</tr>
		
		<tr>
			<td>
			<table width="856" border="0" cellpadding="0" cellspacing="1">
			 <?php
			 $dayTotal=0;
		  $i=0;
		  $select_shopping_card=mysql_query("select * from shopping_card where date='$fetch[date]'");
		// print "select * from shopping_card where session_id='$session'";
			while($fetch=mysql_fetch_array($select_shopping_card))
			{
			$i++;
		  ?>
		  <tr>
				<td width="151" bgcolor="#FFFFFF"><?php print $i;?></td>
				
				<td width="136" bgcolor="#FFFFFF"><?php print $fetch[2] ?> </td>
				<td width="328" bgcolor="#FFFFFF"><img  src="../images/<?php print $fetch[1]?>.jpg" width="122" height="57" /></td>
			<td width="82" bgcolor="#FFFFFF"><?php print $fetch[1]?>			</td>
				<td width="67" bgcolor="#FFFFFF"><?php print $fetch[3] ?></td>
				<td width="85" bgcolor="#FFFFFF">
					<?php
						$quantity=$fetch[4];
						$price=$fetch[3];
						$total_price=$quantity*$price;
						print"$total_price";
						$dayTotal=$dayTotal+$total_price;
					?>				</td>
		  </tr>
		  <?php }
		  ?>
		  <tr>
		<td colspan="5" align="right" bgcolor="#FFFFFF">Total</td>
		<td bgcolor="#FFFFFF"><?php $netTota=$netTota+$dayTotal;  print $dayTotal;?></td>
		</tr>
			</table>
			
			</td>
		</tr>
		
		
		
		<?php
		
		}
		
		?>
		<tr>
		<tr>
		<td align="right"><b>Total Price: &nbsp;&nbsp;<?php print $netTota;?></td>
		</tr>
		
			<td  height="42" bgcolor="#0099FF" align="center">Skill Based IT</td>
		</tr>
</table>

</body>
</html>