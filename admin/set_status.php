<?php 
session_start();
include_once('config.php');
extract($_POST);
$noti_id=$id1;
$status=$checked;
$date11= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
if($status=='true')
{
	$status1='1';
}
else
{
	$status1='0';
}
$sql="update notification set  en_status='$status1' where nid='$noti_id' ";
$res=mysql_query($sql);
$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','19','','$date11','$admin_name')";
 $row1=mysql_query($log_sql);
?>