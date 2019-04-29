<?Php
session_start();
error_reporting(0);
include_once('config.php');
$server = $_SERVER['SERVER_NAME'];

@$search_text=$_GET['txt'];
$dropdown = $_GET['dropdown'];
$id = $_GET['id'];
$search3 = $_GET['search3'];

$dropdown = $_GET['dropdown'];
$job = $_GET['job'];
$language = $_GET['language'];
$noti = $_GET['noti'];
$search_text2=trim($search3);
$kt=preg_split("/[\s,]+/",$search_text2);
if($column=='undefined')
{
	$column='id';
}
$search_text=trim($search_text);
$message = '';
$query='';
$query2='';
$queryy='';
$query_eligble='';

$mm=0;
while(list($key,$val)=each($kt)){

if($val<>" " and strlen($val) > 0){

	 $subquery=" concat(first_name,middle_name,last_name,post_applied,dob,gender,father_name,husband, 	address,per_address1,city,state,country,per_mobile,pin,contact_no,communication_address,comm_address1 ,comm_city,comm_state,comm_country,comm_telephoneno,comm_mobileno,comm_email,comm_pin,marital_status 	,nationality,state_of_domicile,fresher_exp,present_post,post_type,present_salary,pay_band ,grade_pay ,present_employer,teach_language,regional_language,ctet_tet_detail,ncc_detail,foregin_language_detail,techosavvy_computerliterate_detail,awards_detail,noticeperiod_detail,casepending_detail ,criminalcharged_detail,eariler_applied_employement_ps,other_information,Notification,eligibilty) like  '%".$val."%'";
	 
	if($query!="" && $mm==0)
	{
		$sub="&&";
	}
	else {
		$sub="";
	}
	$mm++;
	   $query .= " AND (".$subquery.")";
	 
}
}
	if($search_text!="")
	{
		 $query .= " AND (first_name LIKE '%$search_text%' OR last_name LIKE '%$search_text%') ";
	}
	
	if($dropdown!="")
	{
   if($dropdown!='1')
    {
	  $queryy .= " id IN (select ulid from eligible where eligibilty='$dropdown') AND ";
	
	}
	else
	{
		
	$queryy .= "id IN (select ulid from eligible where eligibilty='$dropdown') AND  ";
	}
 }
	if($job!="")
	{
	  $queryy .="(post_applied='$job') AND";
	}
	if($job!="")
	{
	  $queryy .="(post_applied='$job') AND ";
	}
		 $queryy .=" 1=1 AND Notification='$noti' AND ";
	
$xls_filename = 'export_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
   $query1= "select * from personal_details  where ".$queryy." post_applied IN (select title  from jobs where nid =$id )". $query;
$result = mysql_query($query1) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";
 

 $cars = array("ID","First Name","Middel Name","last Name", "Post Applied", "DOB","AGE","GENDER", "Father Name", "Husband" ,"Address","Address1","City","State","Country","Mobile","Pin","Contact No", "Communication Address" , "Communication Address1" ,"City","State","Country","communication Telephoneno","Communication Mobile", "Communication Email", "Communication Pin" ,"Marital Status ","Nationality","State of Domicile","Fresher","Present Post" ,"Post Type","Present Salary","Pay Band", "Grade Pay", "Present Employer ","Teach language","Regional language ","Ctet Tet Detail", "Ncc Detail ", "Foregin language","Techo computerliterate", "Awards Detail ","Notice Period Detail","Casepending Detail","Criminal charged Detail", "Eariler Applied Employement", "image","Submit Place ","Other Information","Date Created","States","Eligibility","Repeat","Notification","Teaching Experience","Non-Teaching Experience","Administrative Experience");
 
 
for ($i =0; $i<count($cars); $i++) 
{
  echo $cars[$i];
  echo "\t";
}

print("\n");
$m=1;
while($row = mysql_fetch_array($result))
{
  $r=$row['id'];
  $schema_insert = "";
  $schema_insert .= $m.$sep;
 
	 
  for($j=1; $j<mysql_num_fields($result)-1; $j++)
  {
	 
	   if($j==33)
	  {
		 $demo=$row['present_salary'];
		 $subtotal =  'Rs.'.number_format($demo, 2, '.', ',').'/-';
				
		 $schema_insert .= $subtotal.$sep;
	  }
	  elseif($j==48)
	  {
		   $demo=$row['image'];
	 $schema_iamge ='http://'.$server.'/psschool/uploads/'.$demo.'';       
		 $schema_insert .= $schema_iamge.$sep;
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
  $schema_insert.= preg_replace( '!\s+!', ' ',ucwords(strtolower($row[$j]))).$sep;
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
   $result121 = mysql_query($sql21);
           $row21= mysql_fetch_array($result121);
		 $schema_insert = "";
		if($row21['period_from']!='')
		{
      $schema_insert =' '.$row21['period_from'].' - '.$row21['period_to'].'  as an '.ucwords(strtolower($row21['institute'])).' in  '.ucwords(strtolower($row21['designation']));
		
		
	  echo(trim($schema_insert));
		}  
	//echo ucwords(strtolower($row21['total_experience']));
	echo "\t";
	
	
	   $sqn = "Select * from nonteaching_staff_exp where id='$r'";
   $resn = mysql_query($sqn);
           $rown= mysql_fetch_array($resn);
		   $schema_insert = "";
	if($rown['period_from']!='')
		{
	  $schema_insert =' '.$rown['period_from'].' - '.$rown['period_to'].'  as an '.ucwords(strtolower($rown['post'])).' in  '.ucwords(strtolower($rown['bussiness']));
	  echo(trim($schema_insert));
		}
	//echo ucwords(strtolower($rown['total_experience']));
	
	echo "\t";
	
	   $sqna = "Select * from administrative_exp_detail where id='$r'";
   $resna = mysql_query($sqna);
           $rowna= mysql_fetch_array($resna);
		   $schema_insert = "";
		   if($rowna['no_of_year']!='')
		{
      	    $schema_insert =' '.$rowna['no_of_year'].' years as an '.ucwords(strtolower($rowna['responsibilities'])).' in  '.ucwords(strtolower($rowna['school']));
			  echo(trim($schema_insert));
}
	//echo ucwords(strtolower($rowna['no_of_year ']));
	echo "\t";

	$sql11 = "Select * from acadmic_detail where id='$r' ORDER BY acadmic_id DESC";
	$result11 = mysql_query($sql11);
	$r3 = mysql_num_rows($result11);
	
	$cars1 = array("Acadamic Details:-","Year","Examination","School","Medium","subject_offered","%age");
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
    while($r=mysql_fetch_array($result11))
	{
         
		$abc=$r['marks_obtain']/$r['max_marks']*100;
		echo "";
		echo "\t";
		echo  $r['year_of_passing'];
		echo "\t";
		//preg_replace('!\s+!', ' ', $input);
		echo preg_replace( '!\s+!', ' ', ucwords(strtolower($r['examination_passed'])));
		echo "\t";
		
		echo preg_replace( '!\s+!', ' ', ucwords(strtolower($r['school'])));
		echo "\t";
		
		echo preg_replace('!\s+!', ' ', ucwords(strtolower($r['medium_of_insruction'])));
		echo "\t";
		
		echo preg_replace( '!\s+!', ' ',ucwords(strtolower($r['subject_offered'])));
		echo "\t";
		echo number_format((float)$abc, 2, '.', '').'%';
		echo "\t";
	}
	echo "\n";
  }



////  End of data collection from table /// 
?>

  