<?php
	error_reporting(0);
	session_start();
	if(isset($_SESSION['user']))
	{
?>
<?php
	require_once('tcpdf/tcpdf.php');
	class MYPDF extends TCPDF {
	public function Header() 
	{
        
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0,20, 'GOVERNMENT MEDICAL COLLEGE,SURAT', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 12);
        // Page number
        $this->Cell(0, 10, $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

	if(isset($_POST["down1"]))
	{

	$flag = 0;
	$test="<html><body><table border='1' style='border: 1px solid #000000;' ><tr>";
	$conn = new mysqli('localhost', 'root', ''); 
	mysqli_select_db($conn, 'test'); 
	$sql = "";
	$columnHeader = ''; 
	for($i=1;$i<76;$i++)
	{
		if(isset($_POST[$i]))
		{
			//$columnHeader = $columnHeader.$_POST[$i]."\t";
			if($sql=="")
			{
				$sql=$_POST[$i];
			}
			else
			{
				$sql=$sql.",".$_POST[$i];
			}
			$test=$test.'<td style="border: 1px solid #000000; width:20% ;text-align:center;background-color:gray">'.$_POST[$i].'</td>';
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
				$value = '<td style="border: 1px solid #000000;text-align:center;">' . $value . '</td>'; 
				$rowData .= $value; 
			} 			$setData =$rowData.'</tr>';
			$test=$test.$setData;
		}
		$test=$test."</table></body></html>";
		require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("REPORT");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
	  $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(true);  
      $obj_pdf->setPrintFooter(true);  
	  $obj_pdf->SetMargins(10,13,10,10);
      $obj_pdf->SetAutoPageBreak(TRUE,20);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();
	  $obj_pdf->SetMargins(10,10,10,10);
	  $obj_pdf->writeHTML($test,true, false, true, false, '');  
      $obj_pdf->Output('REPORT.pdf', 'I');
	}
}
?>

<?php

}
else
{
	echo "<center><br><br><br><br><br><br><br><h2 style='color:red;font-family:Times New Roman'>First Login!</h2></center>";
	include 'Login.html';
}

?>