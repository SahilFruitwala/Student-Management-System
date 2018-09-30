<?php
    error_reporting(0);
    session_start();
?>

<?php

    if(isset($_SESSION["user"]))
    {
        header("Location: home.php?open=insert");
        // die("Session Available");
    }
    else
    {
        $pass = $_POST['password'];
        $uname = $_POST['username'];

        $con = mysqli_connect("localhost","root","") or die("die");
        mysqli_select_db($con,"test");
        $sql = "SELECT * from USER WHERE Id = '".$uname."'";
        
        $result = mysqli_query($con,$sql);
        $data = mysqli_fetch_row($result);

        if($data[1] === $pass)
        {
            $_SESSION['user'] = $uname;
            header("Location: home.php?open=insert");
        }
        else
        {
            echo "<center><h2 style='color:red;font-family:Times New Roman'>Enter Correct Username / Password!</h2></center>";
            echo "<script>alert('Incorrect Id / Password !')</script>";
            include 'Login.html';
        }
    }
?>