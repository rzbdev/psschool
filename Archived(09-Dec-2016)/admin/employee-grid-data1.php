<?Php
error_reporting(0);
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
require "config.php"; // Database Connection 
////  Collect options from table ///
//$search_text="plus2net demo ";
@$search_text=$_GET['txt'];
$dropdown = $_GET['dropdown'];
$id = $_GET['id'];
$page=$_GET['page'];
$noti=$_GET['noti'];



//echo $search_text;
/////////// Start of preparation for Paging //////
@$end_record=$_GET['endrecord'];//
@$opts=$_GET['opts'];// 
 @$column=$_GET['column'];//  
@$order=$_GET['order'];// 
$dropdown = $_GET['dropdown'];
$job = $_GET['job'];
$demo = $_GET['demo'];
//$language = $_GET['language'];
if($column=='undefined')
{
	$column='id';
}
//$end_record=20;
if(strlen($end_record) > 0 AND (!is_numeric($end_record))){
echo "Data Error 1";
exit;
} 
if($demo!='All')
{
$limit=$demo;
}
else
{
$limit='10000000';	
	
}
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

////////// End of preparation for paging /////
$search_text=trim($search_text);
$message = '';
$query='';
$query2='';
$queryy='';
$query_eligble='';


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
		
	$queryy .= " id IN (select ulid from eligible where eligibilty='$dropdown') AND  ";
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
	//if($language!="")
	//{
	///  $queryy .="(repate='$language') AND ";
//}
	
	 
	  $queryy .=" 1=1 AND Notification='$noti' AND ";
	 $query .=" ORDER BY ".$column." ".$order.""; 



 $q="select count(id) from personal_details  where  ".$queryy."  post_applied IN (select title  from jobs where nid=$id) ". $query ;
 
 $query1= "select * from personal_details  where ".$queryy." post_applied IN (select title  from jobs where nid =$id) ". $query . " limit $start_record,$limit " ;
	
	 
	 
     
 
 $row2=$dbo->prepare($query1);
 $row2->execute();
 $result2=$row2->fetchAll(PDO::FETCH_ASSOC);
  
 $query_h= "select * from personal_details  where ".$queryy." post_applied IN (select title  from jobs where nid=$id)". $query ;
  
  $row_h=$dbo->prepare($query_h);
  $row_h->execute();
  $result_h=$row_h->fetchAll(PDO::FETCH_ASSOC);
 
  
  $current_records=count($result2);
  $query2= 'select first_name from talents where '. $query2.''  ;
///////////////End of adding key word search query ////////
//echo $query;
$message .=$query1;
 $records_found = $dbo->query($q)->fetchColumn(); // Number of records found

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
	//==============experience==============================
	 $query11111="select * from teaching_experience_detail where id=".$result[$i]['id']."";
							 $rowt=mysqli_query($query11111);
							 $total_years=0;
							 $total_months=0;
							   while($row=mysqli_fetch_array($rowt))
							 {
								
								 
								    $from =  $row['period_from'];
								    $from_array = explode("/",$from);
								   
								    $to =   $row['period_to'];
    
									$to_array = explode("/",$to);
									
									 $year_differ = $to_array[2]-$from_array[2];
									
								if($year_differ>=0)
									{
										if($from_array[1]<$to_array[1])
										{
											$months = $to_array[1]-$from_array[1];
											if($year_differ!=0)
											{
												$years=$year_differ;
											}
											else{
												$years=0;
											}
										}
										else if($from_array[1]==$to_array[1]){
											$months = 0;
											$years=$year_differ;
										}
										else{
											$months = (12-($from_array[1]-$to_array[1]));
											$years=$year_differ-1;
										}
									}
									  $total_months = $total_months+$months;
									  $total_years = $total_years+$years;
									

							 }
							 if($total_months>=12)
							 {
								   $total_years = ($total_years + floor($total_months/12));
								  $total_months = ($total_months%12);
								
							 }
							 
		$result[$i]['period_to']=$total_years;	
	$result[$i]['period_from']=$total_months;							

							 	
//====================non teaching===========================
	 $query2222="select * from nonteaching_staff_exp where id=".$result[$i]['id']."";
							 $rowtt=mysqli_query($query2222);
							 $total_years1=0;
							 $total_months1=0;
							   while($row11=mysqli_fetch_array($rowtt))
							 {
								
								 
								    $from =  $row11['period_from'];
								    $from_array = explode("/",$from);
								   
								    $to =   $row11['period_to'];
    
									$to_array = explode("/",$to);
									
									 $year_differ = $to_array[2]-$from_array[2];
									
									if($year_differ>=0)
									{
										if($from_array[1]<$to_array[1])
										{
											$months = $to_array[1]-$from_array[1];
											if($year_differ!=0)
											{
												$years=$year_differ;
											}
											else{
												$years=0;
											}
										}
										else if($from_array[1]==$to_array[1]){
											$months = 0;
											$years=$year_differ;
										}
										else{
											$months = (12-($from_array[1]-$to_array[1]));
											$years=$year_differ-1;
										}
									}
									  $total_months1 = $total_months1+$months;
								
									  $total_years1 = $total_years1+$years;
									
									

							 }
							 if($total_months1>=12)
							 {
								  $total_years1 = ($total_years1 + (floor($total_months1/12)));
								  $total_months1 = ($total_months1%12);
								
								 
								
							 }
	
	$result[$i]['period_to1']=$total_years1;	
	$result[$i]['period_from1']=$total_months1;	

//===================adminstrator===============
$query_exp1= "SELECT no_of_year from administrative_exp_detail as no_of_year where id=".$result[$i]['id']."";
	$ro_exp11=$dbo->prepare($query_exp1);
	$ro_exp11->execute();
	$result_exp11=$ro_exp11->fetchAll(PDO::FETCH_ASSOC);
	$no_of_year="";
	for($h=0; $h<count($result_exp11); $h++)
	{
		$no_of_year .=$result_exp11[$h]['no_of_year'];
	if($h!=(count($result_exp11)-1))
		{
		 $no_of_year .=", ";
		}
	}
	
	$result[$i]['no_of_year']=$no_of_year;		
	
	
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
$main = array('data'=>$result,'value'=>array("total_pages"=>"$total_pages","page1"=>"$page","no_records"=>"$records_found","message"=>"$message","status1"=>"T","endrecord5"=>"$end_record5","endrecord"=>"$end_record","limit"=>"$limit","end"=>"$end","end2"=>"$end2","startrecord"=>"$startrecord","start_record3"=>"$start_record3","current_records"=>"$current_records","start_record1"=>"$start_record1","records_found_total"=>"$records_found_total" ));

echo json_encode($main);




////  End of data collection from table /// 
?>

  