<?php
	include("../database/db_connect.php");
	if(isset($_POST["itemname"])){
		$itemname = $_POST["itemname"];	
		$category = mysql_query("SELECT Category_Name FROM categoryinformation WHERE Item_Name='$itemname'");
		while($fetch = mysql_fetch_array($category)){
			echo "<option>".$fetch['Category_Name']."</option>";
		}
	}
?>