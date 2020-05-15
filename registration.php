
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
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div>
		<div id="header">
			<div id="logo">
				<h2>Registration Page</h1>
			</div>
		</div>

		<div id="form">
			<form action="registration.php" method="post">
			<table style="color: blue;">
				<tr>
					<td>Name: </td>
					<td><input type="text" name="name" placeholder="Enter your name"></td>
				</tr>
				
				<tr>
					<td>E-mail: </td>
					<td><input type="text" name="email" placeholder="Enter your email"></td>
				</tr>
				
				<tr>
					<td>Password: </td>
					<td><input type="password" name="password"></td>
				</tr>

				<tr>
				<td><input style="width: 120px; height: 30px; border-radius: 20px; font-weight: bold;background-color: black; font-size: 17px; color: blue;" type="submit" value="Submit" name="submit"></td>
                                <td>  Already a member? <u><a style="border-radius: 10px; font-weight: bold;background-color: white; font-size: 20px; color: blue; " href="login.php">Sign-in</u></td>
				</tr>
			</table>
		</form>

		<?php
		$conn = new mysqli("127.0.0.1","root","","mydata");
		if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      					echo "Invalid email format";
      				}
      		else{
			$sql="INSERT INTO people(name,email,password) VALUES('$name','$email','$password')";
			if (mysqli_query($conn, $sql)) {
    			echo "New record created successfully";
    			setcookie('type', $email, time()+3600);
				//header("Location:index.php");
    		} 
    		else {
   				 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   			}
   		}
   	}
		?>

	  </div>
	 </div>
	</div>
</body>
</html>