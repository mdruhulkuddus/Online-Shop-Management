<?php
	include("../database/db_connect.php");
	//print $db_message;
	
	$area=$_POST["textarea"];
	if(isset($_POST["add"]))
	{
		if(!empty($area))
			{
				mysql_query("insert into contactus (`text_area`,`id`) values('$area','1')");
				if(mysql_affected_rows()>0)
				{
				print "Data ADD successsfully";
				}
				else
				{
				print "Data ADD Unsuccesssfully";
				}
			}
		else
		{
		print"Please Insert DATA";
		}
	}	
if(isset($_POST["edit"]))
	{
		if(!empty($area))
			{
				mysql_query("replace into contactus (`text_area`,`id`) values('$area','1')");
				if(mysql_affected_rows()>0)
				{
				print "Data ADD successsfully";
				}
				else
				{
				print "Data ADD Unsuccesssfully";
				}
			}
		else
		{
		print"Please Insert DATA";
		}
	}	
?>

<html>
		<head>
		<title>user panel</title>
		</head>
		
		
		<style type="text/css">
		table{background:#f4f4f4; border: 5px #FFFFFF solid; box-shadow:0px 5px 5px #999; margin-top:10px; }
			.title{ color:#FFFFFF; font-size:28px; font-family: "Times New Roman", Times, serif; text-transform:uppercase ; text-shadow:0px 6px 6px #000; letter-spacing:1px; font-weight:bold;}
			
			.input{background:#F6F6F6; height:200; width:350;  border:1px #4D8B00 solid;   padding-top:90px; padding-left:120px; border-radius: 5px; }
			.input:focus{ background:#FFFFFF;}
			.btm{ background:#5481FC; color:#FFFFFF; height:30px; width:100px; border-radius:5px; border:1px #FFFFFF solid;   }
			
		</style>
		
		
	<body>
	<form name="about" method="post" >
 				<table height="424" width="506" cellpadding="0" cellspacing="0" align="center"  >
					<tr>
						<td colspan="3" height="82" align="center" bgcolor="#5481FC"><font class="title" ><font color="FFFFFF">C</font>ontact<font color="FFFFFF"> U</font>s</font></td>
					</tr>
					
					</tr>
					<tr  height="300">
					<td width="100%" height="293" align="center" bgcolor="#B8B8B8"  >
					<textarea  name="textarea" class="input" placeholder="Write Here" required ><?php 
					$selct=mysql_query("select * from contactus WHERE id='1'");
					$fetch=mysql_fetch_row($selct);
					print $fetch[0];
					 ?></textarea></td>
					</tr>
									
			
					<tr bgcolor="#5481FC">
					  <td height="49" colspan="3" align="center" ><input type="submit" value="ADD" class="btm" name="add" /><input type="submit" value="EDIT" class="btm" name="edit" /> <input type="reset" value="CANCEL" class="btm"   >  </td>
					</tr>	
				
		</table>
		 </form>
	</body>
</html>