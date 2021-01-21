<?php
$username=$_GET["username"];
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="admin.css" />
		<title>Admin Panel</title>
	   
</head>
	<body>
		<div class="wrepper" >
				<div class="header">
					<h1 class="title"><font color="#FF0000">A</font>DM<font color="#FF0000">I</font>N <font color="#FF0000">P</font>AN<font color="#FF0000">E</font>L</h1>
					<h4 style="float:right; font-size:18px;"><?php print $username; ?></h4>
				 </div>
				 <div class="menu">
				 	<ul>
						<li><a href="#">Home</a> </li>
						<li> <a href="#">About Us</a></li>
						<li> <a href="#">Profile</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Feedback</a> </li>
						<li><a href="../">Log Out</a> </li>
						<li><a href="#">Sign Up</a> </li>
					</ul>
				 </div>
				 <div class="container">
					<div class="left">
						<ul>
							<li><a href="item information.php" target="container" >Item Information</a></li>
							<li><a href="category information.php" target="container" >Category Information</a></li>
							<li><a href="product Infomation.php" target="container">Product Information</a></li>
							<li><a href="customer Infomation.php" target="container">Customer Information</a></li>
							<li><a href="orderdetails.php" target="container">Order Details</a></li>
							<li><a href="cridit card.php" target="container" >Cridit Card</a></li>
							<li><a href="create admin user.php" target="container" >Create Admin User</a></li>
							<li><a href="delevery information.php" target="container">Delevery Information</a></li>
							<li><a href="about us.php" target="container">About Us</a></li>
							<li><a href="contact us.php" target="container">Contact Us</a></li>
							<li><a href="current offer.php" target="container">Current Offer</a></li>
							<li><a href="#">Order Table</a></li>
							
						</ul>
					</div>
					<div class="middle" >
						
						<iframe name="container" height="980" width="950" style="margin-left:2px; margin-top:2px; border:#006600 1px solid;"></iframe>
										
					</div>
					
				
				 <div class="fotter">
				 </div>
			 </div>
			 
		</div>
	</body>

</html>