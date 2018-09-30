<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['user']))
	{
		$temp = $_SESSION['user'];
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Student Management System/Login</title>
		<link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
		<link rel="stylesheet"  href="css/login.css" /> 
		<script src="js/login.js" type="text/javascript"> </script>
	</head>
	<body>
		<center>
		<div class="contain">
			</br>
			<form action="home.php?open=change_pass" method="POST" enctype="application/x-www-form-urlencoded">
				<table cellpadding="0">
					<tr><td colspan="2" style="font-size:14px;font-weight:bold"><lable class="tag">Old Password</lable></td></tr>
					<tr>
						<td colspan="2">
							<input autocomplete="off" type="password" placeholder="Type Your Old Password"  id="old" name="old"></input><br/><br/>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="font-size:14px;font-weight:bold"><lable class="tag">New Password</lable></td></tr>
					<tr>
						<td colspan="2">
							<input type="password" autocomplete="off" placeholder="Type Your Password" id="newPass" name="newPass"></input><br/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox"  autocomplete="off" name="showpass1" id="showpass1" value="ShowPassword" onclick="ShowPass1()"></input><label onclick="ShowPass1()">Show Password</label><br><br></td></tr>
						<td>
							<script type="text/javascript">
								function ShowPass1()
								{
								    var pass1=document.getElementById("old");
								    var pass2=document.getElementById("newPass");
								    
								    if(pass2.type==="password")
								    {
								        pass2.type="text";
								        pass1.type="text";
								        document.getElementById("showpass1").checked = true;
								    }
								    else
								    {
								        pass2.type="password";
								        pass1.type="password";
								        document.getElementById("showpass1").checked = false;
								    }
								}
							</script>
							<input type="submit" name="sub" id="sub" value="Change Password"></input>
						</td>
					</tr>
					<br/><br/>
				</table>
			</form>
			</br>
			</br>
		</div>
		</center>
	</body>
</html>

<?php
	if(isset($_POST['sub']))
	{
		$_SESSION['user'] = $temp;
		$con = mysqli_connect("localhost","root","") or die("die");
        mysqli_select_db($con,"test");
		$sql = "SELECT * from user where Id = '".$_SESSION['user']."'";
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_row($result);
        
		if($data[1] == $_POST['old'])
		{
			$result = mysqli_query($con,"UPDATE user SET Password ='".$_POST["newPass"]."' where Id = '".$_SESSION['user']."'");
			echo "<script>alert('Password Changed!')</script>";
		}
		else
		{
			echo "<script>alert('Old Password Invalid!')</script>";
		}
	}
}
else
{
	echo "<center><br><br><br><br><br><br><br><h2 style='color:red;font-family:Times New Roman'>First Login!</h2></center>";
	header("Location:Login.html");
}

?>