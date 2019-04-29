<?php
$server = $_SERVER['SERVER_NAME'];
$d_id =$_GET['id'];
// Turn off error reporting
error_reporting(0);


// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
include_once('config.php');
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysqli_error());
}
$xls_filename = 'export_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
$sql = "Select * from personal_details where id = '$d_id'";
$result = mysqli_query($sql) or die("Failed to execute query:<br />" . mysqli_error(). "<br />" . mysqli_errno());
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 $row = mysqli_fetch_array($result);
  print "\n";
  echo "";
		print "\t";
		echo "COMPARATIVE BIO-DATA";
		print "\t";
		
	print "\n";
	
  echo "";
		print "\t";
		echo "Category:";
		print "\t";
		$schema_insert = "";
         $schema_insert =ucwords(strtolower($row['post_applied']));
	
	  print(trim($schema_insert));
	print "\n";
 print "\n";
 
 echo "#";
		print "\t";
		echo "Description";
		print "\t";
		
	print "\n";
	
 /////////////////////aaaaaaaaaaaaaaaaa////////////////////
 
 echo "A.";
		print "\t";
	echo "Applicant Detail";
		print "\t";
		
	print "\n";

		echo " ";
		print "\t";
	echo "Applicant Image";
		print "\t";
		$schema_insert = "";
         $schema_insert ='http://'.$server.'/uploads/'.$row['image'].'';               
	
	  print(trim($schema_insert));
	print "\n";
	
		 $g=$row['gender'];
		 if($g=='Male')
		 {
	echo " ";
		print "\t";
	echo "Name of Applicant";
		print "\t";
		$schema_insert = "";
     $schema_insert = ' '.ucfirst($row['first_name']).' '.ucfirst($row['last_name']);
	  print(trim($schema_insert));
	print "\n";
			 }
		 else
		 {
			 echo " ";
		print "\t";
	echo "Name of Applicant";
		print "\t";
		$schema_insert = "";
     $schema_insert =''.ucfirst($row['first_name']).' '.ucfirst($row['last_name']);
	  print(trim($schema_insert));
	print "\n";
		 }
	
	$s =$row['husband'];
	if($s!='')
	{
	echo " ";
		print "\t";
	echo "Husband Name";
		print "\t";
		$schema_insert = "";
     $schema_insert =''.ucwords(strtolower($row['husband']));
	
	  print(trim($schema_insert));
	print "\n";
	
	}
	else
	{
	echo " ";
		print "\t";
	echo "Father's Name";
		print "\t";
		$schema_insert = "";
     $schema_insert = ''.ucwords(strtolower($row['father_name']));
	  print(trim($schema_insert));
	print "\n";
	
	}
	
	echo " ";
		print "\t";
	echo "Present Address";
		print "\t";
		$schema_insert = "";
		
		
     $schema_insert = preg_replace( "/\r|\n/", " ", ucwords(strtolower($row['communication_address'])));
	  print(trim($schema_insert));
	print "\n";
	
	echo " ";
		print "\t";
	echo "Contact Numbers";
		print "\t";
		$schema_insert = "";
		if($row['comm_telephoneno']!='' || $row['comm_mobileno']!='')
		{
      $schema_insert = $row['comm_telephoneno'].' / '.$row['comm_mobileno'];
	  print(trim($schema_insert));
		}
	print "\n";
	
	echo " ";
		print "\t";
	echo "Permanent Address";
		print "\t";
		$schema_insert = "";
    
	$schema_insert=preg_replace( "/\r|\n/", " ", ucwords(strtolower($row['address'])));
	  print(trim($schema_insert));
	
	print "\n";
	
	
	echo " ";
			print "\t";
	echo "Date of Birth & Age";
		print "\t";
		$schema_insert = "";
		
		function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}
$dob =$row['dob'];
ageCalculator($dob);

    $schema_insert = $row['dob'].'('.ageCalculator($dob).' Years)';
	
	  print(trim($schema_insert));
	print "\n";
	
	echo " ";
			print "\t";
	echo "Application Receipt Date ";
		print "\t";
		$schema_insert = "";
    $schema_insert = $row['dt_created'];
	  print(trim($schema_insert));
	print "\n";
	
	///////////////////////////bbbbbbbbbbbbbbbbbbbbbb////////////////////////
		 echo "B.";
		print "\t";
	echo "Family details";
		print "\t";
		
	print "\n";
	
	echo " ";
			print "\t";
	echo "Marital  Status-Married/Unmarried/Widow/*Divorcee";
		print "\t";
		$schema_insert = "";
    $schema_insert = ucwords($row['marital_status']);
	  print(trim($schema_insert));
	print "\n";
	
	echo " ";
			print "\t";
	echo "No. of kids(Age,Sex,Class in which studying)";
			print "\t";
		
	$schema_insert = "";
 $schema_insert = "Name     |      AGE        |      M/F      |   Studyingin";
	  print(trim($schema_insert)); 
	  print "\n";
$sql1 ="Select * from children_detail where id='$d_id'";
$result1 = mysqli_query($sql1);
while($roww=mysqli_fetch_array($result1))
{
	 echo " ";
     print "\t";
	 echo " ";
     print "\t";
 	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($roww['name'])).'    |    '.$roww['dob'].'    |    '.ucfirst($roww['gender']).'     |   '.ucwords(strtolower($roww['qualification_detail']));
	  print(trim($schema_insert));
	  print "\n";
}
$sql2 = "Select * from spouse_detail where id= '$d_id'";
$result2 = mysqli_query($sql2);
 $ro= mysqli_fetch_array($result2);
	
echo " ";
			print "\t";
	echo "Spouse working (Profession)";
			print "\t";
		
	$schema_insert = "";
  $schema_insert =ucwords(strtolower($ro['profession']));
	  print(trim($schema_insert));
	  print "\n";

echo " ";
			print "\t";
	echo "Place of posting of Spouse";
			print "\t";
		
	$schema_insert = "";
  $schema_insert = ucwords(strtolower($ro['place_of_posting']));
	  print(trim($schema_insert));
	  print "\n";

echo " ";
			print "\t";
	echo "Monthly Income of Spouse";
			print "\t";
		if($ro['monthly_income']!='')
		{
	$schema_insert = "";
  $schema_insert ='Rs.'.number_format($ro['monthly_income'], 2, '.', ',').'/-';
	  print(trim($schema_insert));
	  print "\n";
		}
	$sql5= "Select * from  dependent_member_detail where id= '$d_id'";
$result5= mysqli_query($sql5);
 $ro5= mysqli_fetch_array($result5);  
	  
	echo " ";
			print "\t";
	echo "Other dependents to stay with Candidate";
			print "\t";
	
	$schema_insert = "";
     $schema_insert = ucwords(strtolower($ro5['relationship'])).'('.$ro5['dob'].')';
	 
	  print(trim($schema_insert));
	  print "\n";  
	  
////////////////////ccccccccccccccccccccc//////////////////////

	 echo "C.";
		print "\t";
	echo "Educational Qualifications(Year of Passing, Name of   College & Medium, %age of Marks)";
		print "\t";
		
	print "\n";
	
$sql11 = "Select * from acadmic_detail where id= '$d_id'";
$result11 = mysqli_query($sql11);
while($r=mysqli_fetch_array($result11))
{
	echo " ";
			print "\t";
	
			print "\t";

	  $schema_insert = "";
	  $abc=$r['marks_obtain']/$r['max_marks']*100;
      $schema_insert = $r['year_of_passing'].'/'.ucwords(strtolower($r['examination_passed'])).'/'.ucwords(strtolower($r['school'])).'/'.ucwords(strtolower($r['medium_of_insruction'])).'/'.number_format((float)$abc, 2, '.', '').'%'; 
	  print(trim($schema_insert));
	  print "\n";
}

echo " ";
			print "\t";
	        echo "Extra Curricular Activities/Games";
			print "\t";

	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($row['awards_detail']));
	  print(trim($schema_insert));
	  print "\n";

echo " ";
			print "\t";
	echo "Other";
			print "\t";

	  $schema_insert = "";
      $schema_insert = '';
	  print(trim($schema_insert));
	  print "\n";
///////////////////////dddddddddddddddddddddd//////////////////////////
           $sql21 = "Select * from teaching_experience_detail where id='$d_id'";
           $result121 = mysqli_query($sql21);
           $row21= mysqli_fetch_array($result121);
		  

		 
    

 echo "D.";
		print "\t";
	echo "Experience:";
		print "\t";
		$schema_insert = "";
		if($row21['period_from']!='')
		{
      $schema_insert =' '.$row21['period_from'].' - '.$row21['period_to'].'  as an '.ucwords(strtolower($row21['institute'])).' in  '.ucwords(strtolower($row21['designation']));
		
		
	  print(trim($schema_insert));
		}
	print "\n";
		
	 echo "";
		print "\t";
		  $sqn = "Select * from nonteaching_staff_exp where id='$d_id'";
           $resn = mysqli_query($sqn);
           $rown= mysqli_fetch_array($resn);
	echo "";
		print "\t";
		$schema_insert = "";
	if($rown['period_from']!='')
		{
	  $schema_insert =' '.$rown['period_from'].' - '.$rown['period_to'].'  as an '.ucwords(strtolower($rown['post'])).' in  '.ucwords(strtolower($rown['bussiness']));
	  print(trim($schema_insert));
		}
	print "\n";
		
	 echo "";
		print "\t";
		 	$sqna = "Select * from administrative_exp_detail where id='$d_id'";
           $resna = mysqli_query($sqna);
           $rowna= mysqli_fetch_array($resna);
	echo "";
		print "\t";
		$schema_insert = "";
      	    $schema_insert =' '.$rowna['no_of_year'].' years as an '.ucwords(strtolower($rowna['responsibilities'])).' in  '.ucwords(strtolower($rowna['school']));
	  print(trim($schema_insert));
	print "\n";
	
	
	     
		   $sql121="SELECT sum( total_experience )
FROM (
SELECT total_experience
FROM teaching_experience_detail
WHERE id = '$d_id'
UNION ALL
SELECT total_experience
FROM nonteaching_staff_exp
WHERE id = '$d_id'
UNION ALL
SELECT total_experience
FROM administrative_exp_detail
WHERE id = '$d_id'
)teaching_experience_detailnonteaching_staff_exp ";
           $result21 = mysqli_query($sql121);
           $rows= mysqli_fetch_array($result21);
		 
	
echo " ";
			//print "\t";
	//echo "Total Experience";
			//print "\t";
	 // $schema_insert = "";
     // $schema_insert = $rows[0].' Years';
	 // print($schema_insert);
	 print "\n";
	  
	  
	 // echo " ";
			print "\t";
	
	echo "Present Post/Designation";
			print "\t";

	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($row['present_post']));
	  print(trim($schema_insert));
	  print "\n";
	 
 	 echo " ";
			print "\t";
	        echo "Employer's Name Address&Contact No.";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($row['present_employer']));
	  print(trim($schema_insert));
	  print "\n"; 
	        
			echo " ";
			print "\t";
	        echo "Monthly Income";
			print "\t";
			
	  $schema_insert = "";
	  if($row['present_salary']!='')
	  {
      $schema_insert = $subtotal ='Rs.'.number_format($row['present_salary'], 2, '.', ',').'/-';
	  print(trim($schema_insert));
	  print "\n";
	  }
            echo " ";
			print "\t";
	        echo "Notice Period";
			print "\t";
	  $schema_insert = "";
	
	     $schema_insert = ucwords(strtolower($row['noticeperiod_detail'])).' .';
     
	  print(trim($schema_insert));
	  print "\n";

/////////////////eeeeeeeeeeeeeeeeeeeee//////////////

        echo "E.";
		print "\t";
        echo"Have you earlier applied for Sewa/Employment in  Pathseekers School/RSSB/Hospital Units of MJSMRS or any other Society of era ( Details thereof )";
			print "\t";
	     $schema_insert = "";
         $schema_insert = ucwords(strtolower($row['eariler_applied_employement_ps']));
   print(trim($schema_insert));
		print "\n";

///////////////////////ffffffffffffffffffff//////////////////////

        echo "H.";
		print "\t";
	    echo "Specify if Spouse/Parents/Any other Relative doing Sewa in Dera or employee in the School or   Hospital Units of MJSMRS";
	

		print "\t";
		print "\n";
	
$sqll= "Select * from  other_employee where id= '$d_id'";
$res = mysqli_query($sqll);
$dem=mysqli_num_rows($res);
$rowso= mysqli_fetch_array($res);
              $n=$rowso['name'];
if($n!='')
{
		    echo " ";
			print "\t";
	        echo "Name";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($rowso['name']));
	  print(trim($schema_insert));
	  print "\n";
	
		    echo" ";
			print "\t";
	        echo "Relation";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($rowso['relation']));
	  print(trim($schema_insert));
	  print "\n";
	
			echo" ";
			print "\t";
	        echo "Age";
			print "\t";
	  $schema_insert = "";
      $schema_insert = $rowso['age'].' Years';
	  print(trim($schema_insert));
	  print "\n";
	
	
			echo" ";
			print "\t";
	        echo "Address.";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($rowso['address']));
	  print(trim($schema_insert));
	  print "\n";
	
	
		    echo" ";
		 	print "\t";
	        echo "Department";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($rowso['department']));
	  print(trim($schema_insert));
	  print "\n";
	
		    echo" ";
			print "\t";
	        echo "Date of Joining";
			print "\t";
	  $schema_insert = "";
      $schema_insert = $rowso['joining_date'];
	  print(trim($schema_insert));
	  print "\n";
	 
	        echo" ";
			print "\t";
	        echo "Hony./Parshadi";
			print "\t";
	  $schema_insert = "";
      $schema_insert = ucwords(strtolower($rowso['h_p']));
	  print(trim($schema_insert));
	  print "\n";
	
          	echo" ";
			print "\t";
	        echo "Monthly Salary";
			print "\t";
	  $schema_insert = "";
      $schema_insert = 'Rs.'.number_format($rowso['salary'], 2, '.', ',').'/-';
	  print(trim($schema_insert));
	  print "\n";
}

//////////////////gggggggggggggggggggg////////////////

        echo "G.";
		print "\t";
	    echo "Any other Information ";
		print "\t";
		 $schema_insert = "";
         $schema_insert = ucwords(strtolower($row['other_information']));
	    print(trim($schema_insert));
	    print "\n";
	
//////////////////hhhhhhhhhhhhhhhhhhhhh/////////////
 echo "H.";
		print "\t";
	echo "Overall Assessment";
		print "\t";
		
	print "\n";

//$update_status="UPDATE personal_details SET status='0' WHERE id ='$d_id'";
//$status = mysqli_query($update_status);

?>
