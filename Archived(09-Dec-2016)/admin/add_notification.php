<?php
session_start();
$data = array();
date_default_timezone_set('Asia/Kolkata');
 $date11= date("Y-m-d h:i:s"); 
ob_start();
function mysqli_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
} 


include_once('config.php');
$admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
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
 	$st_date = $_POST['st_date'];
	$detail = mysqli_escape_mimic($_POST['detail']);
	$sql4="select * from notification where title='$title'";
	$res4=mysqli_query($con,$sql4);
	$result4=mysqli_num_rows($res4);
	if($result4>0)
	{
		$data['message'] = 'Notification name already Exist'; 
	}
	else {
	$sqll="select * from notification where (start_date between '$st_date' and '$date1') OR  (date_ex between '$st_date' and '$date1')";
	$res=mysqli_query($con,$sqll);
	$row = mysqli_fetch_array($res);
	$result=mysqli_num_rows($res);
	if($result>0)
	{
			$data['message'] = 'You cant add notification under this date'; 
	}
	else
	{
	if($date1<$st_date)
	{
			$data['message'] = 'You cant add Expiry date less than Start date'; 
	}
	else
	{
    $sql="INSERT INTO  notification(`title`, `date_ex`, `detail`,`created`,`start_date`) VALUES ('$title','$date','$detail','$date11','$st_date')";
  $row=mysqli_query($con,$sql);
  $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','12','','$date11','$admin_name')";
 $row1=mysqli_query($con,$log_sql);
  $data['message'] = 'Notification Added Successfully'; 
	}
	}
	}
 echo json_encode($data);
  ?>














