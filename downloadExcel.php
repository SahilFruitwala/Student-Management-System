<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['user']))
	{
?>

<html>
<?php
	if(isset($_POST["down1"]))
	{

	$flag = 0;
	$file="demo.xls";
	$test="<table border='1'><tr>";
	$conn = new mysqli('localhost', 'root', ''); 
	mysqli_select_db($conn, 'test'); 
	$sql = "";
	$columnHeader = ''; 
	for($i=1;$i<76;$i++)
	{
		if(isset($_POST[$i]))
		{
			if($sql=="")
			{
				$sql=$_POST[$i];
			}
			else
			{
				$sql=$sql.",".$_POST[$i];
			}
			$test=$test."<th>".$_POST[$i]."</th>";
		}
	}
	$test=$test."</tr>";
	$sql="select ".$sql." from student";

	if(isset($_POST['23_1']))
	{
		if($_POST['23_1'] == 'All')
		{
			$sql = $sql . " "; 
		}
		else if($_POST['23_1'] == 'Yes')
		{
			if($flag == 0)
			{
				$sql = $sql . " where minority = 'Y'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and minority = 'Y'"; 	
			}
		}
		else if($_POST['23_1'] == 'No')
		{
			if($flag == 0)
			{
				$sql = $sql . " where minority = 'N'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and minority = 'N'"; 	
			}
		}
	}
	if(isset($_POST['19_1']))
	{
		if($_POST['19_1'] == 'All')
		{
			$sql = $sql . " "; 
		}
		else if($_POST['19_1'] == 'Yes')
		{
			if($flag == 0)
			{
				$sql = $sql . " where ph = 'Y'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and ph = 'Y'"; 
			}
		}
		else if($_POST['19_1'] == 'No')
		{
			if($flag == 0)
			{
				$sql = $sql . " where ph = 'N'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and ph = 'N'"; 	
			}
		}
	}
	if(isset($_POST['18_1']))
	{
		if($_POST['18_1'] == 'All')
		{
			$sql = $sql . " "; 
		}
		else if($_POST['18_1'] == 'Male')
		{
			if($flag == 0)
			{
				$sql = $sql . " where gender = 'M'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and gender = 'M'"; 
			}
		}
		else if($_POST['18_1'] == 'Female')
		{
			if($flag == 0)
			{
				$sql = $sql . "where gender = 'F'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and gender = 'F'"; 
			}
		}
	}
	if(isset($_POST['21_1']))
	{
		if($_POST['21_1'] == 'All')
		{
			$sql = $sql . " "; 
		}
		else if($_POST['21_1'] == '1')
		{
			if($flag == 0)
			{
				$sql = $sql . "where caste = '1'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and caste = '1'"; 
			}
		}
		else if($_POST['21_1'] == '2')
		{
			if($flag == 0)
			{
				$sql = $sql . " where caste = '2'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and caste = '2'"; 
			}
		}
		else if($_POST['21_1'] == '3')
		{
			if($flag == 0)
			{
				$sql = $sql . "where caste = '3'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and caste = '3'"; 
			}
		}
		else if($_POST['21_1'] == '4')
		{
			if($flag == 0)
			{
				$sql = $sql . " where caste = '4'"; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and caste = '4'"; 
			}
		}
	}
	if(isset($_POST['29_1']))
	{
		if($_POST['29_1'] == 'All')
		{
			$sql = $sql . " "; 
		}
		else if($_POST['29_1'] == 'Between')
		{
			if($flag == 0)
			{
				$sql = $sql. " where yearOfPassing between '".$_POST['t1']."' and '".$_POST['t2']."' ";
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and yearOfPassing between '".$_POST['t1']."' and '".$_POST['t2']."' ";
			}
		}
		else if($_POST['29_1'] == 'LandE')
		{
			if($flag == 0)
			{
				$sql = $sql . " where yearOfPassing <= '".$_POST['t2']."' "; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and yearOfPassing <= '".$_POST['t2']."' ";
			}
		}
		else if($_POST['29_1'] == 'GandE')
		{
			if($flag == 0)
			{
				$sql = $sql . " where yearOfPassing >= '".$_POST['t2']."' "; 
				$flag = 1;
			}
			else
			{
				$sql = $sql . " and yearOfPassing >= '".$_POST['t2']."' ";
			}
		}
	}

	$setRec = mysqli_query($conn, $sql); 
	$setData = ''; 
	//echo $sql;
	//if($sql=="")
	{
		while($rec = mysqli_fetch_row($setRec)) 
		{ 
			$rowData ='<tr>'; 
			foreach ($rec as $value) 
			{ 
				$value = '<td>' . $value . '</td>'; 
				$rowData .= $value; 
			} 			$setData =$rowData.'</tr>';
			$test=$test.$setData;
		}
		$test=$test."</table>";
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$file");
		echo $test;
	}
	//else
	//{
		//echo "<script>alert('SELECT ALEST ONE FIELD')</script>";
	//}
}
?>
</html>

<?php

}
else
{
	echo "<center><br><br><br><br><br><br><br><h2 style='color:red;font-family:Times New Roman'>First Login!</h2></center>";
	include 'Login.html';
}

?>