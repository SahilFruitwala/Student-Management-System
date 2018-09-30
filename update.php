<?php
    error_reporting(0);
    session_start();
    if(isset($_SESSION['user']))
    {    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Student Management System/Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="css/update.css" />
    <script>
    function show(n)
    {
        var x = document.getElementsByClassName("tab");
        var y = document.getElementsByClassName("button1");
        x[n].style.display = "block";
        x[(n+1)%2].style.display = "none";
        y[n].style.backgroundColor="orange";
        y[(n+1)%2].style.backgroundColor="#4CAF50";
    }
    </script>
</head>
<body >
<center>
    <button class="button1" onClick='show(0)'>UNIVERSITY INFORMATION</button>
    <button class="button1" onClick='show(1)'>COLLEGE INFORMATION</button>

<form id="regForm" name="regForm" method="POST" onsubmit="return validate()">
<div class="tab">
  <table>
        <tr>
            <td>Enrollment ID </td>
            <td><input type="text" name="1" id="1" placeholder="Enter Enrollment Number" size="25" /></td>
            <td><i class="fa fa-search" onclick="document.getElementById('search').value = 'set';document.forms[0].submit()"></i></td>
            <input type="hidden" name="search" id="search" value="unset"/>
        </tr>
        <tr>
            <td>Surname</td>
            <td><input type="text" name="2" id="2" placeholder="Enter Surname" size="25"  /></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" autocomplete="true" id="3" name="3" placeholder="Enter Firstname" size="25"  /></td>
        </tr>
        <tr>
            <td>Second Name</td>
            <td><input type="text" name="4" id="4" placeholder="Enter Second Name" size="25"  /></td>
        </tr>
        <tr>
            <td>Mother Name</td>
            <td><input type="text" name="5" id="5" placeholder="Enter Mother Name" size="25"  /></td>
        </tr>
        <tr>
            <td>Adhaarcard Number </td>
            <td><input type="text" name="6" id="6" placeholder="Enter Adhaarcard Number" size="25"  /></td>
        </tr>
        <tr>
            <td>Permanent Address</td>
            <td><textarea name="7" id="7" placeholder="Enter Permanent Address" size="25"  ></textarea></td>
        </tr>
        <tr>
            <td>Permanent City</td>
            <td><input type="text" name="8" id="8" placeholder="Enter Permanent City" size="25"  /></td>
        </tr>
        <tr>
            <td>Permanent Pincode</td>
            <td><input type="text" name="9" id="9" placeholder="Enter Permanent Pincode" size="25"  /></td>
        </tr>
        <tr>
            <td>Permanent Phone</td>
            <td><input type="text" name="10" id="10" placeholder="Enter Permanent Phone" size="25"  /></td>
        </tr>
        <tr>
            <td>Permanent Mobile</td>
            <td><input type="text" name="11" id="11" placeholder="Enter Permanent Mobile" size="25"  /></td>
        </tr>
                <tr>
            <td>Correspondance Address</td>
            <td><textarea name="12" id="12" placeholder="Enter Correspondance Address" size="25"  ></textarea></td>
        </tr>
        <tr>
            <td>Correspondance City</td>
            <td><input type="text" name="13" id="13" placeholder="Enter Correspondance City" size="25"  /></td>
        </tr>
        <tr>
            <td>Correspondance Pincode</td>
            <td><input type="text" name="14" id="14" placeholder="Enter Correspondance Pincode" size="25"  /></td>
        </tr>
        <tr>
            <td>Correspondance Phone</td>
            <td><input type="text" name="15" id="15" placeholder="Enter Correspondance Phone" size="25"  /></td>
        </tr>
        <tr>
            <td>Correspondance Mobile</td>
            <td><input type="text" name="16" id="16" placeholder="Enter Correspondance Mobile" size="25"  /></td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td><input type="date" name="17" id="17" placeholder="Enter Date Of Birth"  /></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><input type="radio" name="18" id="18" value="M"  checked="true"/>M<input type="radio" name="18" id="18_1" value="F" />F</label></td>
        </tr>
        <tr>
            <td>Ph</td>
            <td><input type="radio" name="19" id="19" value="N" checked="true"/>N<input type="radio" name="19" id="19_1" value="Y" />Y</label></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><input type="text" name="20" id="20" placeholder="Enter Nationality" size="25"  /></td>
        </tr>
        <tr>
            <td>Caste</td>
            <td><input type="text" name="21" id="21" placeholder="Enter Caste"  /></td>
        </tr>
        <tr>
            <td>Sub Caste</td>
            <td><input type="text" name="22" id="22" placeholder="Enter SubCaste" size="25"  /></td>
        </tr>
        <tr>
            <td>Minority</td>
            <td><input type="radio" name="23" id="23" value="N" checked="true"/>N<input type="radio" name="23" id="23_1" value="Y" />Y</td>
        </tr>
        <tr>
            <td>Religion</td>
            <td><input type="text" name="24" id="24" placeholder="Enter Religion" size="25"  /></td>
        </tr>
        <tr>
            <td>Board Name</td>
            <td><input type="text" name="25" id="25" placeholder="Enter Board Name" size="25"  /></td>
        </tr>
        <tr>
            <td>HSC Seat No.</td>
            <td><input type="text" name="26" id="26" placeholder="Enter HSC Seat NO." size="25"  /></td>
        </tr>
        <tr>
            <td>Admission Quota</td>
            <td><input type="text" name="27" id="27" placeholder="Enter Admission Quota" size="25"  /></td>
        </tr>
        <tr>
            <td>Exam Center</td>
            <td><input type="text" name="28" id="28" placeholder="Enter Exam Center" size="25"  /></td>
        </tr>
        <tr>
            <td>Year Of Passing</td>
            <td><input type="number" name="29" id="29" placeholder="Enter Year OF Passing" size="25"  /></td>
        </tr>
        <tr>
            <td>School Name</td>
            <td><input type="text" name="30" id="30" placeholder="Enter School Name" size="25"  /></td>
        </tr>
        <tr>
            <td>Marksheet Info.</td>
            <td><input type="text" name="31" id="31" placeholder="Enter Marksheet Info." size="25"  /></td>
        </tr>
        <tr>
            <td>Obtained Marks</td>
            <td><input type="number" name="32" id="32" placeholder="Enter Obtained Marks" size="25"  /></td>
        </tr>
        <tr>
            <td>Total Marks</td>
            <td><input type="number" name="33" id="33" placeholder="Enter Total Marks" size="25"  /></td>
        </tr>
        <tr>
            <td>GSEB</td>
            <td><input type="text" name="34" id="34" placeholder="Enter GSEB" size="25"  /></td>
        </tr>
        <tr>
            <td>PecNumber</td>
            <td><input type="text" name="35" id="35" placeholder="Enter PecNumber" size="25"  /></td>
        </tr>
        <tr>
            <td>PecDate</td>
            <td><input type="date" name="36" id="36"  placeholder="Enter PecDate" size="25"  /></td>
        </tr>
        <tr>
            <td>FecNumber</td>
            <td><input type="text" name="37" id="37"  placeholder="Enter FecNumber" size="25"  /></td>
        </tr>
        <tr>
            <td>FecDate</td>
            <td><input type="date" name="38" id="38"  placeholder="Enter FecDate" size="25"  /></td>
        </tr>
        <tr>
            <td>College Name</td>
            <td><input type="text" name="39" id="39"  placeholder="Enter College Name" size="25"  /></td>
        </tr>
        <tr>
            <td>College Code</td>
            <td><input type="number" name="40" id="40"  placeholder="Enter College Code" size="25"  /></td>
        </tr>
        <tr>
            <td>Admission Year</td>
            <td><input type="text" name="41" id="41" placeholder="Enter Admission Year" size="25"  /></td>
        </tr>
        <tr>
            <td>Faculty</td>
            <td><input type="text" name="42" id="42"  placeholder="Enter Faculty" size="25"  /></td>
        </tr>
        <tr>
            <td>Course Name</td>
            <td><input type="text" name="43" id="43" placeholder="Enter Course Name" size="25"  /></td>
        </tr>
        <tr>
            <td>Course Year</td>
            <td><input type="number" name="44" id="44" placeholder="Enter Course Year" size="25"  /></td>
        </tr>
        <tr>
            <td>Faculty Code</td>
            <td><input type="number" name="45" id="45" placeholder="Enter Faculty Code" size="25"  /></td>
        </tr>
        <tr>
            <td>Course Code</td>
            <td><input type="number" name="46" id="46" placeholder="Enter Course Code" size="25"  /></td>
        </tr>
        <tr>
            <td>Search Key</td>
            <td><input type="text" name="47" id="47"  placeholder="Enter Search Key" size="25"  /></td>
        </tr>
        <tr>
            <td>Form Number</td>
            <td><input type="text" name="48" id="48" placeholder="Enter Form Number" size="25"  /></td>
            <td><i class="fa fa-search" onclick="document.getElementById('formNo').value = 'set';document.forms[0].submit()"></i></td>
            <input type="hidden" name="formNo" id="formNo" value="unset"/>
        </tr>
        <tr>
            <td>Email ID</td>
            <td><input type="email" name="49" id="49"  placeholder="Enter Email ID" size="25"  /></td>
        </tr>
    </table>
</div>

<div class="tab">
  <table>
        <tr>
            <td>NEET Exam Roll No</td>
            <td><input type="text" name="50" id="50" placeholder="Enter NEET Exam Roll No" size="25"  ></input></td>
        </tr>
        <tr>
            <td>NEET Exam Year</td>
            <td><input type="text" name="51" id="51" placeholder="Enter NEET Exam Year" size="25"  ></input></td>
        </tr>
        <tr>
            <td>NEET Obtained Marks</td>
            <td><input type="text" name="52" id="52"  placeholder="Enter NEET Obtained Marks" size="25"  ></input></td>
        </tr>
        <tr>
            <td>NEET Total Marks</td>
            <td><input type="text" name="53" id="53"  placeholder="Enter NEET Total Marks" size="25"  ></input></td>
        </tr>
        <tr>
            <td>NEET Percentage</td>
            <td><input type="text" name="54" id="54" placeholder="Enter NEET Percentage" size="25"  ></input></td>
        </tr>
        <tr>
            <td>NEET Percentile</td>
            <td><input type="text" name="55" id="55" placeholder="Enter NEET Percentile" size="25"  ></input></td>
        </tr>
        <tr>
            <td>Bank Account Number</td>
            <td><input type="text" name="56" id="56" placeholder="Enter Bank Account Number" size="25"  /></td>
        </tr>
        <tr>
            <td>Bank Name</td>
            <td><input type="text" name="57" id="57"  placeholder="Enter Bank Name " size="25"  /></td>
        </tr>
        <tr>
            <td>IFSC Number </td>
            <td><input type="text" name="58" id="58" placeholder="Enter IFSC Number" size="25"  /></td>
        </tr>
        <tr>
            <td>First Year Result</td>
            <td><input type="text" name="59" id="59" placeholder="Enter First Year Result" size="25"  /></td>
        </tr>
        <tr>
            <td>Clinical Batch No.</td>
            <td><input type="text" name="60" id="60" placeholder="Enter Clinical Batch No." size="25"  /></td>
        </tr>
        <tr>
            <td>Second Year Result</td>
            <td><input type="text" name="61" id="61" placeholder="Enter Second Year Result" size="25"  /></td>
        </tr>
        <tr>
            <td>Third Year Part-1 Result</td>
            <td><input type="text" name="62" id="62" placeholder="Enter Third Year Part1 Result" size="25"  /></td>
        </tr>
        <tr>
            <td>Third Year Part-2 Result</td>
            <td><input type="text" name="63" id="63" placeholder="Enter Third Year Part2 Result" size="25"  /></td>
        </tr>

        <tr>
            <td>Internship Order No.</td>
            <td><input type="text" name="64" id="64"  placeholder="Enter Internship Order No." size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Solvancy Name</td>
            <td><input type="text" name="65" id="65" placeholder="Enter UG Bond Solvancy Name" size="25"  ></input></td>
        </tr>
        <tr>
            <td>UG Bank Gaurantee</td>
            <td><input type="text" name="66" id="66" placeholder="Enter UG Bank Gaurantee" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Surity Address</td>
            <td><textarea name="67" id="67" placeholder="Enter Surity Address" size="25"  ></textarea></td>
        </tr>
        <tr>
            <td>UG Bond Surity Phone</td>
            <td><input type="text" name="68" id="68" placeholder="Enter Surity Phone" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Surity Email ID</td>
            <td><input type="email" name="69" id="69"  placeholder="Enter UG Bond Surity Email ID" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Amount</td>
            <td><input type="number" name="70" id="70" placeholder="Enter UG Bond Amount" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Paid Amount</td>
            <td><input type="number" name="71" id="71" placeholder="Enter UG Bond Paid Amount" size="25"  /></td>
        </tr>
        <tr>
            <td>Recovery Bond Amount</td>
            <td><input type="number" name="72" id="72" placeholder="Enter UG Bond Recovery Amount" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Challan Number</td>
            <td><input type="text"  name="73" id="73" placeholder="Enter UG Bond Challan Number" size="25"  /></td>
        </tr>
        <tr>
            <td>UG Bond Challan Date</td>
            <td><input type="date" name="74" id="74" placeholder="Enter UG Bond Challan Date" size="25"  /></td>
        </tr>
        <tr>
            <td>Mamlatdar Case Number</td>
            <td><input type="text" name="75" id="75" placeholder="Enter Mamlatdar Case Number" size="25"  /></td>
        </tr>
        <tr>
            <td></td>
                <td style="float:right;"><BUTTON id="done" name="done" value="Insert / Update"
                style="background-color: #4CAF50;cursor: pointer;width: 100%;font-size: 17px;
                padding: 10px 20px;border: 1px solid #aaaaaa;color: #ffffff;" size="25" >Insert / Update</BUTTON></td>
            <script type="text/javascript">
                function validate()
                {
                    let success = true;
                    var count = 0;
                    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                    const eno = document.getElementById('1').value.trim();
                    const fname = document.getElementById('3').value.trim();
                    const adhar = document.getElementById('6').value.trim();
                    const mob = document.getElementById('11').value;
                    const skey = document.getElementById('47').value.trim();
                    const fno = document.getElementById('48').value.trim();
                    const email = document.getElementById('49').value.trim();
                    
                    if( eno == null || eno == "")
                    {
                        alert('Enter Valid Enrollment ID!');
                        success = false;
                        count++;
                    }
                    if( success == true && (fname == null || fname == "" ))
                    {
                        alert('Enter Valid First Name!');
                        success = false;
                        count++;
                    }
                    if(success == true && (isNaN(adhar) || adhar.length < 12))
                    {
                        alert('Enter Valid Adhar No.!');
                        success = false;
                        count++;
                    }
                    // if(success == true && (mob.length != 10))
                    // {
                    //     alert('Enter Valid Mobile No.!');
                    //     success = false;
                        // count++;
                    // }
                    if(success == true && ( skey == null || skey == ""))
                    {
                        alert('Enter Valid SearchKey!');
                        success = false;
                        count++;
                    }
                    if(success == true && (isNaN(fno) || fno == null || fno == ""))
                    {
                        alert('Enter Valid Form No.!');
                        success = false;
                    }
                    if(success == true && (!re.test(String(email).toLowerCase())))
                    {
                        alert('Enter Valid Email!');
                        success = false;
                        count++;
                    }
                    return success;
                }
            </script>
        </tr>
    </table>
</div>
</form>
</center>
</body>
<script>
    show(0);
</script>
</html>
<?php

    if(isset($_POST['search']) || isset($_POST['formNo']))
    {
        $conn = new mysqli('localhost', 'root', ''); 
        mysqli_select_db($conn, 'test');
        $sql = "";
        if($_POST['search'] == "set")
        {
            $sql = "select * from student where EnrollmentId = '".$_POST['1']."'"; 
        }
        else if($_POST['formNo'] == "set")
        {
            $sql = "select * from student where FormNumber = '".$_POST['48']."'"; 
        }
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row=mysqli_fetch_array($result))
            {
                $count = 1;
                while($count <= 75)
                {
                    if($count == 18)
                    {
                        if($row[$count-1] == 'M')
                        {
                            echo '<script>document.getElementById("18").checked = true;
                            document.getElementById("18_1").checked = false;</script>';
                        }
                        else
                        {
                            echo '<script>document.getElementById("18_1").checked = true;
                            document.getElementById("18").checked = false;</script>';   
                        }
                    }
                    else if($count == 19)
                    {
                        if($row[$count-1] == 'N')
                        {
                            echo '<script>document.getElementById("19").checked = true;
                            document.getElementById("19_1").checked = false;</script>';
                        }
                        else
                        {
                            echo '<script>document.getElementById("19_1").checked = true;
                            document.getElementById("19").checked = false;</script>';   
                        }
                    }
                    else if($count == 23)
                    {
                        if($row[$count-1] == 'N')
                        {
                            echo '<script>document.getElementById("23").checked = true;
                            document.getElementById("23_1").checked = false;</script>';
                        }
                        else
                        {
                            echo '<script>document.getElementById("23_1").checked = true;
                            document.getElementById("23").checked = false;</script>';   
                        }
                    }
                    else
                    {
                        echo '<script>document.getElementById("'.$count.'").value = "'.$row[$count-1].'";</script>';
                    }
                    $count++;
                }
            }
        }
        else
        {
            echo "<script>alert('No Data Found!')</script>";
        }
    }

    if(isset($_POST['done']))
    {
        $conn = new mysqli('localhost', 'root', ''); 
        mysqli_select_db($conn, 'test');
        $query = "SELECT firstname from student where EnrollmentId = '".$_POST['1']."'";
        if ($result=mysqli_query($conn,$query))
        {
            if(mysqli_num_rows($result) > 0)
            {
                // Update dat
                $sql = "UPDATE student SET Surname = '".$_POST['2']."'
                                            ,firstname = '".$_POST['3']."'
                                            ,secondname = '".$_POST['4']."'
                                            ,mothername = '".$_POST['5']."'
                                            ,AadhaarNumber = '".$_POST['6']."'
                                            ,permanentAddress = '".$_POST['7']."'
                                            ,permanentCity = '".$_POST['8']."'
                                            ,permanentPincode = '".$_POST['9']."'
                                            ,permanentPhone = '".$_POST['10']."'
                                            ,permanentMobile = '".$_POST['11']."'
                                            ,correspondanceAddress = '".$_POST['12']."'
                                            ,correspondanceCity = '".$_POST['13']."'
                                            ,correspondancePincode = '".$_POST['14']."'
                                            ,correspondancePhone = '".$_POST['15']."'
                                            ,correspondanceMobile = '".$_POST['16']."'
                                            ,dob = '".$_POST['17']."'
                                            ,gender = '".$_POST['18']."'
                                            ,ph = '".$_POST['19']."'
                                            ,nationality = '".$_POST['20']."'
                                            ,caste = '".$_POST['21']."'
                                            ,subCaste = '".$_POST['22']."'
                                            ,minority = '".$_POST['23']."'
                                            ,religion = '".$_POST['24']."'
                                            ,boardName = '".$_POST['25']."'
                                            ,hscSeatNumber = '".$_POST['26']."'
                                            ,admissionQuota = '".$_POST['27']."'
                                            ,examCenter = '".$_POST['28']."'
                                            ,yearOfPassing = '".$_POST['29']."'
                                            ,schoolName = '".$_POST['30']."'
                                            ,marksInfo = '".$_POST['31']."'
                                            ,obtainedMarks = '".$_POST['32']."'
                                            ,totalMarks = '".$_POST['33']."'
                                            ,gseb = '".$_POST['34']."'
                                            ,pecNumber = '".$_POST['35']."'
                                            ,pecDate = '".$_POST['36']."'
                                            ,fecNumber = '".$_POST['37']."'
                                            ,fecDate = '".$_POST['38']."'
                                            ,collegeName = '".$_POST['39']."'
                                            ,collegeCode = '".$_POST['40']."'
                                            ,admissionYear = '".$_POST['41']."'
                                            ,faculty = '".$_POST['42']."'
                                            ,courseName = '".$_POST['43']."'
                                            ,courseYear = '".$_POST['44']."'
                                            ,facultyCode = '".$_POST['45']."'
                                            ,courseCode = '".$_POST['46']."'
                                            ,searchKey = '".$_POST['47']."'
                                            ,FormNumber = '".$_POST['48']."'
                                            ,EmailId = '".$_POST['49']."'
                                            ,NEETExamRollNo = '".$_POST['50']."'
                                            ,NEETExamYear = '".$_POST['51']."'
                                            ,NEETObtainedMarks = '".$_POST['52']."'
                                            ,NEETTotalMarks = '".$_POST['53']."'
                                            ,NEETPercentage = '".$_POST['54']."'
                                            ,NEETPercentile = '".$_POST['55']."'
                                            ,BankAccountNo = '".$_POST['56']."'
                                            ,BankName = '".$_POST['57']."'
                                            ,IFSCNo = '".$_POST['58']."'
                                            ,FirstYearResult = '".$_POST['59']."'
                                            ,ClinicalBatchNo = '".$_POST['60']."'
                                            ,SecondYearResult = '".$_POST['61']."'
                                            ,ThirdYearPart1Result = '".$_POST['62']."'
                                            ,ThirdYearPart2Result = '".$_POST['63']."'
                                            ,InternshipOrderNo = '".$_POST['64']."'
                                            ,UGBondSolvancyName = '".$_POST['65']."'
                                            ,UGBankGaurantee = '".$_POST['66']."'
                                            ,UGBondSurityAddress = '".$_POST['67']."'
                                            ,UGBondSurityPhone = '".$_POST['68']."'
                                            ,UGBondSurityemailid = '".$_POST['69']."'
                                            ,UGBondAmount = '".$_POST['70']."'
                                            ,UGBondPaidAmount = '".$_POST['71']."'
                                            ,RecoveryBondAmount = '".$_POST['72']."'
                                            ,UGBondPaidChallanNo = '".$_POST['73']."'
                                            ,UGBondPaidChallanDate = '".$_POST['74']."'
                                            ,MamlatdarCaseNo = '".$_POST['75']."'
                                            where EnrollmentId = '".$_POST['1']."'";
                $result = mysqli_query($conn,$sql);
            }
            else
            {
                // Insert data
                $temp = "";
                $temp = $temp."'".$_POST['1']."'";
                for($i=2;$i<76;$i++)
                {
                    $temp = $temp.",'".$_POST[$i]."'";
                }
                $sql = "INSERT INTO student VALUES(".$temp.")";
                $result = mysqli_query($conn,$sql);
            }
        }
    }
    }
else
{
    echo "<center><br><br><br><br><br><br><br><h2 style='color:red;font-family:Times New Roman'>First Login!</h2></center>";
    include 'Login.html';
}

?>