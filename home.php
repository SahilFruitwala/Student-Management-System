<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['user']))
	{
?>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System/Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
    <link rel="stylesheet" href="css/home.css" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
	<link rel="stylesheet" href="css/Navigation.css" />
</head>

<body > 
<table align="center"  width="100%"  cellspacing="0" cellpadding="0" border="0" style="position:absolute;top:0px;left:0px;border-collapse: collapse;padding: 0;margin: 0">
        <tr>
            <td><img src="image/logo.ico" style="width:10vw"/></td>
            <td><img src="image/hostel.jpeg" style="width:90vw"/></td>
        </tr>

		<tr>
			<td colspan="2">
				<ul class="topnav">
						<li>
								<a href="home.php?open=edit" id="edit">DELETE</a>
						</li>
						<li>
								<a href="home.php?open=insert" id="insert">INSERT/UPDATE</a>
						</li>
						<li>
								<a href="home.php?open=downloadExcel" id="downloadE">DOWNLOAD EXCEL</a>
						</li>
						<li>
								<a href="home.php?open=downloadPdf" id="downloadP">DOWNLOAD PDF</a>
						</li>
						<!-- <li>
								<a href="home.php?open=upload" id="upload">UPLOAD EXCEL</a>
						</li> -->
						<li>
								<a href="home.php?open=change_pass"  id="change_pass" >CHANGE PASSWORD &nbsp;</a>
						</li>
						</li>
						<li>
								<a href="home.php?open=logout"  id="logout" >LOG OUT &nbsp;</a>
				</ul>
				<br>
			</td>
		</tr>
		<tr>
		<td colspan="2" cellpadding="10px">
			<?php
				if(isset($_GET["open"]))
				{
					$temp = $_GET["open"];
					if($temp == 'edit')
					{
						include 'edit.html'; ?>

						<script>
							document.getElementById("edit").classList.add("active");
						</script>

					<?php
					}
					else if($temp == 'insert')
					{
						if(isset($_GET['update']))
						{
							include 'update.php?find = ';
						}
						else
						{
							include 'update.php';
						} ?>
					
						<script>
							document.getElementById("insert").classList.add("active");
						</script>
					
					<?php
					}
					else if($temp == 'downloadExcel')
					{
						include 'DownloadExcel.html'; ?>
					
						<script>
							document.getElementById("downloadE").classList.add("active");
						</script>
					
					<?php
					}
					else if($temp == 'downloadPdf')
					{
						include 'DownloadPdf.html'; ?>
					
						<script>
							document.getElementById("downloadP").classList.add("active");
						</script>
					
					<?php
					}
					else if($temp == 'change_pass')
					{
						include 'changePassword.php'; ?>
					
						<script>
							document.getElementById("change_pass").classList.add("active");
						</script>
					
					<?php
					// }
					// else if($temp == 'upload')
					// {
					// 	include 'upload.php'; ?>
            			<!-- <script>
							document.getElementById("upload").classList.add("active");
						</script> -->
					<?php
					}
					else if($temp == 'logout')
					{
						session_unset(); 
						session_destroy(); 
						header("Location: Login.html");
            			die("Session seted");?>
					<?php
					}
				}
			?>
		</td>
		</tr>
    </table>

</body>

</html>

<?php

		}
	else
	{
		echo "<center><br><br><br><br><br><br><br><h2 style='color:red;font-family:Times New Roman'>First Login!</h2></center>";
		include 'Login.html';
	}

?>