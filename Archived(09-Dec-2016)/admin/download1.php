<?php
session_start();

include_once('config.php');

if (!$db_selected) {
    die ('Can\'t use foo : ' . mysqli_error());
}



$select2="SELECT *  FROM notification WHERE date_ex >= DATE_FORMAT(NOW(),'%Y-%m-%d')";
	$row2=mysqli_Query($select2);
    $rc=mysqli_num_rows($row2);
	while($ro=mysqli_fetch_array($row2))
	{
		
		$title=$ro['title'];
	}
$xls_filename = 'export_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
/* $sql ="select * from personal_details where `post_applied` in (select `title` from jobs WHERE expiredate <= DATE_FORMAT(NOW(),'%m/%d/%Y'))"; */
$sql = "Select * from personal_details where Notification='$title'";
$result = mysqli_query($sql) or die("Failed to execute query:<br />" . mysqli_error(). "<br />" . mysqli_errno());

// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";

$cars = array("ID","First Name","Middel Name","last Name", "Post Applied", "DOB","AGE","GENDER", "Father Name", "Husband" ,"Address","Address1","City","State","Country","Mobile","Pin","Contact No", "Communication Address" , "Communication Address1" ,"City","State","Country","communication Telephoneno","Communication Mobile", "Communication Email", "Communication Pin" ,"Marital Status ","Nationality","State of Domicile","Fresher Exp","Present Post" ,"Post Type","Present Salary","Pay Band", "Grade Pay", "Present Employer ","Teach language","Regional language ","Ctet Tet Detail", "Ncc Detail ", "Foregin language","Techo computerliterate", "Awards Detail ","Notice Period Detail","Casepending Detail","Criminal charged Detail", "Eariler Applied Employement", "image","Submit Place ","Other Information","Date Created","States","Eligibility","Repeate","Notification","Teaching Experience","Non-Teaching Experience","Administrative Experience");

for ($i =0; $i<count($cars); $i++) 
{
  echo $cars[$i];
  echo "\t";
  
}

print("\n");
$m=1;
while($row = mysqli_fetch_array($result))
{
  $r=$row['id'];
  $schema_insert = "";
  $schema_insert .= $m.$sep;
  for($j=1; $j<mysqli_num_fields($result); $j++)
  {
	
		if($j==33)
	  {
		 $demo=$row['present_salary'];
		 $subtotal =  'Rs.'.number_format($demo, 2, '.', ',').'/-';
				
		 $schema_insert .= $subtotal.$sep;
	  }
	  else
	  {  
	 
	 if($row[$j]=='my_age')
	 {
    $date2 = $row['dob'];	
	$daylen = 365*60*60*24;
	$date1 = date('Y-m-d');
    $age= (strtotime($date1)-strtotime($date2))/$daylen;
    $schema_insert .=((int)($age)).$sep;
	 }		 
	 else{ 
    if(!isset($row)) 
	{
      $schema_insert .= "NULL".$sep;
    }
    elseif ($row[$j] != "") 
	{
  $schema_insert.= preg_replace( "/\r|\n/", " ", ucwords(strtolower($row[$j]))).$sep;
    }
    else 
	{
      $schema_insert .= "".$sep;
    }
	 }
  }
  }
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
	  
	echo "\t";
	  $sql21 = "Select * from teaching_experience_detail where id='$r'";
   $result121 = mysqli_query($sql21);
           $row21= mysqli_fetch_array($result121);
		   
	echo ucwords(strtolower($row21['total_experience']));
	echo "\t";
	
	   $sqn = "Select * from nonteaching_staff_exp where id='$r'";
   $resn = mysqli_query($sqn);
           $rown= mysqli_fetch_array($resn);
	echo ucwords(strtolower($rowna['total_experience']));
	
	echo "\t";
	
	   $sqna = "Select * from administrative_exp_detail where id='$r'";
   $resna = mysqli_query($sqna);
           $rowna= mysqli_fetch_array($resna);
	echo ucwords(strtolower($rown['total_experience']));
	echo "\t";

	$sql11 = "Select * from acadmic_detail where id='$r' ORDER BY acadmic_id DESC";
	$result11 = mysqli_query($sql11);
	$r3 = mysqli_num_rows($result11);
	
	$cars1 = array("Year","Examination","School","Medium","subject_offered","%");
	for($h=0; $h<$r3; $h++)
	{
		for($s=0; $s<6; $s++)
		{
			echo $cars1[$s];
			echo "\t";
		}
	}
  $m++;
  echo "\n";
  
  $tabs = "";
 for($k=0; $k<(count($cars)); $k++)
  {
	  $tabs .="\t";
  }
  
  
	echo $tabs;
		$h1=count($cars);
    while($r=mysqli_fetch_array($result11))
	{

		//$abc=$r['marks_obtain']/$r['max_marks']*100;
		echo  $r['year_of_passing'];
		echo "\t";
		
		echo preg_replace( "/\r|\n/", " ", ucwords(strtolower($r['examination_passed'])));
		echo "\t";
		
		echo preg_replace( "/\r|\n/", " ", ucwords(strtolower($r['school'])));
		echo "\t";
		
		echo preg_replace( "/\r|\n/", " ", ucwords(strtolower($r['medium_of_insruction'])));
		echo "\t";
		
		echo preg_replace( "/\r|\n/", " ", ucwords(strtolower($r['subject_offered'])));
		echo "\t";
		echo number_format((float)$abc, 2, '.', '').'%';
		echo "\t";
	}
	echo "\n";
  }



?>
