<?php 
session_start();
include('../config.php');
extract($_POST);
$user_id=$id;
$status=$status;
$u_name=$u_name;
date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
$sql=mysql_query("UPDATE admin_login SET status='$status' WHERE alid='$id'");
$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$u_name','','8','','$date','$admin_name')";
 $row=mysql_query($log_sql);
echo 1;
?>
