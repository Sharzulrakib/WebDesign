<?php
include 'connection.php';
$conn = OpenCon();
//echo "Connected Successfully";
CloseCon($conn);

if(isset($_COOKIE["type"])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="full">
		<div id="header">
			<div id="logo">
				<h2>Login Page</h1>
			</div>
		</div>
		<div id="form">
			<form action="login.php" method="post">
			<table style="color: blue;">
				<tr>
					<td>Email: </td>
					<td><input type="text" name="email" placeholder="Enter email"></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="Password" name="pass" placeholder="Enter user password"></td>
				</tr>
				  <tr>
				  <td><input style="width: 120px; height: 30px; border-radius: 20px; font-weight: bold;background-color: black; font-size: 17px; color: blue; " type="submit" value="Login" name="sub"></td>
				
				  <td>Not a member? <u><a style="border-radius: 10px; font-weight: bold;background-color: white; font-size: 20px; color: blue; " href="registration.php">Sign up</u></td>
				  </tr>

			</table>
		</form>
		<?php
		$conn = new mysqli("127.0.0.1","root","","mydata");
		if(isset($_POST['sub'])){
			$un=$_POST['email'];
			$ps=$_POST['pass'];

			$q1="select*from people WHERE email='$un' AND password='$ps'";
			$run=mysqli_query($conn,$q1);
			$row=mysqli_fetch_array($run);
			$u=$row['email'];
			$p=$row['password'];
			//echo "$un"."$ps";
			//echo "$u";
			//echo "$p";
			if($un==$u && $ps==$p)
			{
				//echo "match";
				setcookie('type', $u, time()+3600);
				header("Location:index.php");
			}
			else{
				echo "Incorrect email or password!!";
			}
}
		?>

		</div>
	 </div>
	</div>
</body>
</html>