<?php
    error_reporting(0);
    session_start();
	if(isset($_SESSION['user']))
	{
    if(isset($_POST['DeleteData']))
    {
        $con = mysqli_connect("localhost","root","") or die("Can not connect!");
        mysqli_select_db($con,"test");
        $sql = "DELETE from student where EnrollmentId = '".$_POST['DeleteData']."'";
        $query = mysqli_query($con,$sql);        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Student Management System/Login</title>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.ico" />
        <script src="js/searchresult.js" type="text/javascript"> </script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">  
        <link rel="stylesheet" href="css/Search_Navigation.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body >

<?php

    $eno = $name = $lname = $mother = $adhar = $dob = "";

    if(isset($_POST['enrollment']))
    {
        $eno = $_POST['enrollment'];    
    }
    if(isset($_POST['firstname']))
    {
        $name = $_POST['firstname'];
    }
    if(isset($_POST['lastname']))
    {
        $lname = $_POST['lastname'];
    }
    if(isset($_POST['mothername']))
    {
        $mother = $_POST['mothername'];
    }
    if(isset($_POST['adharcard']))
    {
        $adhar = $_POST['adharcard'];
    }
    if(isset($_POST['dob']))
    {
        $dob = $_POST['dob'];
    }
    
    $flag = 0;
    $count = 1;

    if($eno == null && $name == null && $lname == null && $mother == null && $adhar == null && $dob == null)
    {
        $sql = "select * from student";
    }
    else
    {
        $sql = "select * from student where ";

        if($eno != null)
        {
            $sql=$sql."EnrollmentId = '".$eno."'";
            $flag = 1;
        }
        if($name != null)
        {
            if($flag == 1)
            {
                $sql = $sql." and ";
            }
            else
            {
                $flag = 1;
            }
            $sql=$sql."firstname = '".$name."'";
        }
        if($lname != null)
        {
            if($flag == 1)
            {
                $sql = $sql." and ";
            }
            else
            {
                $flag = 1;
            }
            $sql=$sql."Surname = '".$lname."'";
        }
        if($mother != null)
        {
            if($flag == 1)
            {
                $sql = $sql." and ";
            }
            else
            {
                $flag = 1;
            }
            $sql=$sql."mothername = '".$mother."'";
        }
        if($adhar != null)
        {
            if($flag == 1)
            {
                $sql = $sql." and ";
            }
            else
            {
                $flag = 1;
            }
            $sql=$sql."AdharNumber = '".$adhar."'";
        }
        if($dob != null)
        {
            if($flag == 1)
            {
                $sql = $sql." and ";
            }
            else
            {
                $flag = 1;
            }
            $sql=$sql."dob = ".$dob;
        }
    }
    ?>

    <table align="center"  width="100%"  cellspacing="0" cellpadding="0" border="0" style="position:absolute;top:0px;left:0px;border-collapse: collapse;padding: 0;margin: 0">
        <tr>
            <td colspan="2">
                <ul class="topnav">
                        <li class="w3-xxxlarge w3-teal">
                                <a href="home.php?open=edit" id="edit"><i class="fa fa-home"></i></a>
                        </li>
                </ul>
                <br>
            </td>
        </tr>

    <?php
    $con = mysqli_connect("localhost","root","");
    if($con)
    {
        mysqli_select_db($con,"test");
        
        $query = mysqli_query($con,$sql);
        
        echo "<form name='form1' method = 'POST' action=''>";

        echo "<table border = '1' cellpadding='10px' rules = 'all'>";
        echo "<tr>";
        echo "<th>Action</th>";
        while($row = mysqli_fetch_field($query))
        {
            echo "<th>".$row -> name."</th>";
        }
        echo "<th>Action</th>";
        echo '</tr><input type="hidden" name="search" id="search" value=""/>';

        while($row=mysqli_fetch_array($query))
        {
            echo "<tr>";
            $count = 0;
            ?>
            <td>
                <button  value=<?php echo $row[0]; ?> name='DeleteData'
                    onclick='document.forms[0].submit();'>&nbsp;Delete</Button>
            </td>
            <?php
            while($count < 75)
            {
                echo "<td>".$row[$count]."</td>";
                $count++;
            }
            ?>
            <td>
                <button  value= <?php echo $row[0]; ?> name='DeleteData' 
                    onclick='document.forms[0].submit();'>&nbsp;Delete</Button>
            </td>
            </tr>
        <?php
        }
        echo "</table>";
        echo "</form>";
    }
    else
    {
        die("Some Database Error!");
    }
?>

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