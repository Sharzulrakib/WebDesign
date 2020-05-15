<?php
if(!isset($_COOKIE["type"])){
	header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="full">
		<div id="header">
			<div id="logo">
				<h1>Homepage</h1>
			</div>
			<div id="nav">
				<ul>	
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div>
			<h1 align="center">Welcome User</h1>
		</div>
	</div>
</body>
</html>