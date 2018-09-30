<?php
// $file = fopen('demo.xls', "r");
// //$sql_data = "SELECT * FROM prod_list_1 ";

// $count = 0;                                         // add this line
// while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE)
// {
//     //print_r($emapData);
//     //exit();
//     $count++;                                      // add this line

//     if($count>1)
//     {                                  // add this line
//       $sql = "INSERT into student(EnrollmentId,Surname,firstname,secondname,mothername,AadhaarNumber,permanentAddress,permanentCity,permanentPincode,permanentPhone,permanentMobile,correspondanceAddress,correspondanceCity,correspondancePincode,correspondancePhone,correspondanceMobile,dob,gender,ph,nationality,caste,subCaste,minority,religion,boardName,hscSeatNumber,admissionQuota,examCenter,yearOfPassing,schoolName,marksInfo,obtainedMarks,totalMarks,gseb,pecNumber,pecDate,fecNumber,fecDate,collegeName,collegeCode,admissionYear,faculty,courseName,courseYear,facultyCode,courseCode,searchKey,FormNumber,EmailId,NEETExamRollNo,NEETExamYear,NEETObtainedMarks,NEETTotalMarks,NEETPercentage,NEETPercentile,BankAccountNo,BankName,IFSCNo,FirstYearResult,ClinicalBatchNo,SecondYearResult,ThirdYearPart1Result,ThirdYearPart2Result,InternshipOrderNo,UGBondSolvancyName,UGBankGaurantee,UGBondSurityAddress,UGBondSurityPhone,UGBondSurityemailid,UGBondAmount,UGBondPaidAmount,RecoveryBondAmount,UGBondPaidChallanNo,UGBondPaidChallanDate,MamlatdarCaseNo) values('".$emapData[0]."','".$emapData[1]."','".$emapData[2]."','".$emapData[3]."','".$emapData[4]."','".$emapData[5]."','".$emapData[6]."','".$emapData[7]."','".$emapData[8]."','".$emapData[9]."','".$emapData[10]."','".$emapData[11]."','".$emapData[12]."','".$emapData[13]."','".$emapData[14]."','".$emapData[15]."','".$emapData[16]."','".$emapData[17]."','".$emapData[18]."','".$emapData[19]."','".$emapData[20]."','".$emapData[21]."','".$emapData[22]."','".$emapData[23]."','".$emapData[24]."','".$emapData[25]."','".$emapData[26]."','".$emapData[27]."','".$emapData[28]."','".$emapData[29]."','".$emapData[30]."','".$emapData[31]."','".$emapData[32]."','".$emapData[33]."','".$emapData[34]."','".$emapData[35]."','".$emapData[36]."','".$emapData[37]."','".$emapData[38]."','".$emapData[39]."','".$emapData[40]."','".$emapData[41]."','".$emapData[42]."','".$emapData[43]."','".$emapData[44]."','".$emapData[45]."','".$emapData[46]."','".$emapData[47]."','".$emapData[48]."','".$emapData[49]."','".$emapData[50]."','".$emapData[51]."','".$emapData[52]."','".$emapData[53]."','".$emapData[54]."','".$emapData[55]."','".$emapData[56]."','".$emapData[57]."','".$emapData[58]."','".$emapData[59]."','".$emapData[60]."','".$emapData[61]."','".$emapData[62]."','".$emapData[63]."','".$emapData[64]."','".$emapData[65]."','".$emapData[66]."','".$emapData[67]."','".$emapData[68]."','".$emapData[69]."','".$emapData[70]."','".$emapData[71]."','".$emapData[72]."','".$emapData[73]."','".$emapData[74]."')";
//       echo $sql;
//       // mysql_query($sql);
//     } 
//     echo $count;                                            // add this line
// }
?>
<?php


require('library/php-excel-reader/excel_reader2.php');

require('library/SpreadsheetReader.php');

require('db_config.php');


if(isset($_POST['Submit'])){


  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];

  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    // echo "You have total ".$totalSheet." sheets".;


    $html="<table border='1'>";

    $html.="<tr><th>Title</th><th>Description</th></tr>";


    /* For Loop for all sheets */

    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);


      foreach ($Reader as $Row)

      {

        // $html.="<tr>";

        // $title = isset($Row[0]) ? $Row[0] : '';

        // $description = isset($Row[1]) ? $Row[1] : '';

        // $html.="<td>".$title."</td>";

        // $html.="<td>".$description."</td>";

        // $html.="</tr>";


        $query = "insert into student(EnrollmentId,Surname,firstname,secondname,mothername,AadhaarNumber,permanentAddress,permanentCity,permanentPincode,permanentPhone,permanentMobile,correspondanceAddress,correspondanceCity,correspondancePincode,correspondancePhone,correspondanceMobile,dob,gender,ph,nationality,caste,subCaste,minority,religion,boardName,hscSeatNumber,admissionQuota,examCenter,yearOfPassing,schoolName,marksInfo,obtainedMarks,totalMarks,gseb,pecNumber,pecDate,fecNumber,fecDate,collegeName,collegeCode,admissionYear,faculty,courseName,courseYear,facultyCode,courseCode,searchKey,FormNumber,EmailId,NEETExamRollNo,NEETExamYear,NEETObtainedMarks,NEETTotalMarks,NEETPercentage,NEETPercentile,BankAccountNo,BankName,IFSCNo,FirstYearResult,ClinicalBatchNo,SecondYearResult,ThirdYearPart1Result,ThirdYearPart2Result,InternshipOrderNo,UGBondSolvancyName,UGBankGaurantee,UGBondSurityAddress,UGBondSurityPhone,UGBondSurityemailid,UGBondAmount,UGBondPaidAmount,RecoveryBondAmount,UGBondPaidChallanNo,UGBondPaidChallanDate,MamlatdarCaseNo) values('".$Row[0]."','".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."','".$Row[6]."','".$Row[7]."','".$Row[8]."','".$Row[9]."','".$Row[10]."','".$Row[11]."','".$Row[12]."','".$Row[13]."','".$Row[14]."','".$Row[15]."','".$Row[16]."','".$Row[17]."','".$Row[18]."','".$Row[19]."','".$Row[20]."','".$Row[21]."','".$Row[22]."','".$Row[23]."','".$Row[24]."','".$Row[25]."','".$Row[26]."','".$Row[27]."','".$Row[28]."','".$Row[29]."','".$Row[30]."','".$Row[31]."','".$Row[32]."','".$Row[33]."','".$Row[34]."','".$Row[35]."','".$Row[36]."','".$Row[37]."','".$Row[38]."','".$Row[39]."','".$Row[40]."','".$Row[41]."','".$Row[42]."','".$Row[43]."','".$Row[44]."','".$Row[45]."','".$Row[46]."','".$Row[47]."','".$Row[48]."','".$Row[49]."','".$Row[50]."','".$Row[51]."','".$Row[52]."','".$Row[53]."','".$Row[54]."','".$Row[55]."','".$Row[56]."','".$Row[57]."','".$Row[58]."','".$Row[59]."','".$Row[60]."','".$Row[61]."','".$Row[62]."','".$Row[63]."','".$Row[64]."','".$Row[65]."','".$Row[66]."','".$Row[67]."','".$Row[68]."','".$Row[69]."','".$Row[70]."','".$Row[71]."','".$Row[72]."','".$Row[73]."','".$Row[74]."')";


        $mysqli->query($query);

       }


    }


    // $html.="</table>";

    // echo $html;

    // echo "<br />Data Inserted in dababase";


  }else { 

    die("<br/>Sorry, File type is not allowed. Only Excel file."); 

  }


}


?>

