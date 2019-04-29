<?Php

session_start();
//***************************************
// This is downloaded from www.plus2net.com //
// You can distribute this code with the link to www.plus2net.com ///
// Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
// The author is not responsible for any type of loss or problem or damage on using this script.//
// You can use it at your own risk. /////
//*****************************************
// ini_set('display_errors', true);//Set this display to display  all erros while testing and developing the script
//////////////////////////////
require "config2.php"; // Database Connection 
////  Collect options from table ///
//$search_text="plus2net demo ";
@$search_text=$_GET['txt'];

//$dropdown = $_GET['dropdown'];
//$job = $_GET['job'];
$demo = $_GET['demo'];

$search3 = $_GET['search3'];

//$language = $_GET['language'];
$page=$_GET['page'];

//echo $search_text;
/////////// Start of preparation for Paging //////
@$end_record=$_GET['endrecord'];//
@$opts=$_GET['opts'];//  
$column=$_GET['column'];//  
@$order=$_GET['order'];// 

//$end_record=20;

$limit=10;

if($end_record < $limit) {$end_record = 0;}
switch(@$_GET['direction'])   // Let us know forward or backward button is pressed
{
case "fw":
$start_record = $end_record ;
$page = $page+1;
break;
case "bk":
$start_record = $end_record - 2*$limit;
$page = $page-1;
break;

case "update":
$start_record = $end_record-$limit;
$page =$page ;
break;
case "page":
$start_record = ($page-1)*$limit;
break;
default:
//echo "Data Error";
//exit;
$start_record=0;
break;
}
if($start_record < 0){$start_record=0;}
 $end_record =$start_record+$limit;


$start_record3 = $start_record;

$search_text2=trim($search3);
$kt=preg_split("/[\s,]+/",$search_text2);

if($demo!='' AND $demo!='All')
	
{
	$querye="$demo";
	
}
else
{
	$querye="first_name,middle_name,last_name,post_applied,dob,gender,father_name,husband, 	address,per_address1,city,state,country,per_mobile,pin,contact_no,communication_address,comm_address1,comm_city,comm_state,comm_country,comm_telephoneno,comm_mobileno,comm_email,comm_pin,marital_status,nationality,state_of_domicile,fresher_exp,present_post,post_type,present_salary,pay_band,grade_pay,present_employer,teach_language,regional_language,ctet_tet_detail,ncc_detail,foregin_language_detail,techosavvy_computerliterate_detail,awards_detail,noticeperiod_detail,casepending_detail,criminalcharged_detail,eariler_applied_employement_ps,other_information,Notification,eligibilty,eligibilty,examination_passed,year_of_passing,subject_offered,medium_of_insruction,max_marks,marks_obtain,marks_percentage,division,school,board ";
	
}


$message = '';
$query111='';
$query='';
$query2='';
$queryy='';
$query_eligble='';
$mm=0;
while(list($key,$val)=each($kt)){
if($val<>" " and strlen($val) > 0){

	 $subquery=" concat($querye) like  '%".$val."%'";
	 
	if($query!="" && $mm>0)
	{
		$sub="AND";
	}
	else 
	{
		$sub="";
	}
	$mm++;
	$query .= " ".$sub." (".$subquery.")   ";
	 
}
}

	if($search3=="")
	{
		 $query .= "1";
		
	}
	
	
	
	
	//if($language!="")
	//{
//	  $queryy .="(repate='$language') AND ";
//	}
	
	 
	 //$queryy .=" 1=1 AND Notification='$noti' AND ";
	
		 $query111 .=" ORDER BY ".$column." ".$order.""; 
	 
		 
	 

       $q="SELECT group_concat(c.id) FROM  personal_details c  INNER JOIN acadmic_detail o ON c.id = o.id where ".$query." group by c.id ".$query111."";
	 
     $query1= "SELECT * FROM  personal_details c INNER JOIN acadmic_detail o ON c.id = o.id where ".$query." group by c.id ".$query111." limit $start_record,$limit " ;
	 
 
     $row2=$dbo->prepare($query1);
     $row2->execute();
	 
     $result2=$row2->fetchAll(PDO::FETCH_ASSOC);
  
     $query_h= "select * from personal_details  ";
  
  
     $row_h=$dbo->prepare($query_h);
     $row_h->execute();
	 
     $result_h=$row_h->fetchAll(PDO::FETCH_ASSOC);
 
  
  $current_records=count($result2);
  $query2= 'select first_name from talents where '. $query2.''  ;
///////////////End of adding key word search query //////////
//echo $query;
$message .=$query1;


$q_db = $dbo->prepare($q);
$q_db->execute();

 $count = $q_db->rowCount();
 
 
  $records_found = $count; // Number of records found

 
 
 $records_found_total=$records_found;
$row=$dbo->prepare($query1);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);


for($i=0; $i<count($result); $i++)
{
	$query_per = "SELECT ROUND(min((marks_obtain/max_marks)*100),2) as 'marks' FROM acadmic_detail where id=".$result[$i]['id']."";
	$ro=$dbo->prepare($query_per);
	$ro->execute();
	$result_marks=$ro->fetchAll(PDO::FETCH_ASSOC);

	$result[$i]['marks']=$result_marks[0]['marks'];
	
	$query_pe= "SELECT DISTINCT (medium_of_insruction) as 'medium' FROM acadmic_detail where id=".$result[$i]['id']."";
	$r=$dbo->prepare($query_pe);
	$r->execute();
	$result_mark=$r->fetchAll(PDO::FETCH_ASSOC);
	$medium="";
	
	for($j=0; $j<count($result_mark); $j++)
	{
		$medium .=$result_mark[$j]['medium'];
		if($j!=(count($result_mark)-1))
		{
		 $medium .=", ";
		}
	}
	$result[$i]['medium']=$medium;	
}
$row2=$dbo->prepare($query2);
$row2->execute();
$result2=$row2->fetchAll(PDO::FETCH_ASSOC);

//total pages
$total_pages = ceil($records_found/$limit);

$result=array_merge($result2,$result);
//$nume=count($result);
if(($end_record) < $records_found_total ){$end="yes";}
else{$end="no";}

if(($end_record) > $limit ){$startrecord="yes";}
else{$startrecord="no";}

$start_record1=$start_record+1;
$end2=$start_record1+9;

$end_record5 = $start_record3+$current_records;

$main = array('data'=>$result,'value'=>array("total_pages"=>"$total_pages","page1"=>"$page","page1"=>"$page","no_records"=>"$records_found","message"=>"$message","status1"=>"T","endrecord5"=>"$end_record5","endrecord"=>"$end_record","limit"=>"$limit","end"=>"$end","end2"=>"$end2","startrecord"=>"$startrecord","start_record3"=>"$start_record3","current_records"=>"$current_records","start_record1"=>"$start_record1","records_found_total"=>"$records_found_total" ));

echo json_encode($main);
////  End of data collection from table /// 
?>

  