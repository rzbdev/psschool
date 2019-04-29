<?php
session_start();

include_once('config.php');
echo $job_id=$_REQUEST['job_id'];
 $date11= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
echo $sql = "DELETE FROM `notification` where nid='$job_id'";
mysqli_query($sql);
$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','14','','$date11','$admin_name')";
 $row1=mysqli_query($log_sql);
?> 
