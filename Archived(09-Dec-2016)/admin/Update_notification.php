<?php
session_start();
include_once('config.php');
function mysqli_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
} 

$data = array();
date_default_timezone_set('Asia/Kolkata');
 $date11= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
$nid = $_POST['id'];
 $title = mysqli_escape_mimic($_POST['title']);
	$date1 = $_POST['date'];
	$date = $_POST['date'];
	$first_digit=substr($date,0,10);
	$last_digit =substr($date,-5);
	if($last_digit=='00:00')
	{
		$last="23:59";
		$date=$first_digit.' '.$last;
	}
	$stdate = $_POST['st_date'];
	 $detail = mysqli_escape_mimic($_POST['detail']);
	 

	$sqll="select * from notification where ((start_date between '$stdate' and '$date') OR  (date_ex between '$stdate' and '$date')) and nid!='$nid'";
	$res=mysqli_query($sqll);
	$result=mysqli_num_rows($res);
	$sql4="select * from notification where nid='$nid'";
	$res4=mysqli_query($sql4);
	$rows=mysqli_fetch_array($res4);
	$s_date=$rows['start_date'];
	$e_date=$rows['date_ex'];
	//if($stdate!=$s_date or $date1!=$e_date)
	//{
	if($result>0)
	{
			$data['message'] = 'You cant edit notification under this date'; 
	}
	else
 
	{
		if($date1<$stdate)
	{
			$data['message'] = 'You cant add Expiry date less than Start date'; 
	}
	else
	{
     $sql="UPDATE notification SET title='$title',date_ex='$date',detail='$detail',start_date='$stdate' WHERE nid=$nid";
  $row=mysqli_query($sql);
   $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','13','','$date11','$admin_name')";
 $row1=mysqli_query($log_sql);
  $data['message'] = 'Notification Updated Successfully'; 
	}
	}
	//}
	//else
	//{
	//	$sql="UPDATE notification SET title='$title',date_ex='$date',detail='$detail',start_date='$stdate' WHERE nid=$nid";
	//	  $row=mysqli_query($sql);
	//	  $data['message'] = 'Notification Updated Successfully';
	//}
 echo json_encode($data);
 
  ?>














