<?php
session_start();
ob_start();
include_once('../config.php');
 $a_id=$_GET['id'];
 $name=$_GET['name'];
date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
 $sql = "DELETE FROM `manage_email` where  id='$a_id'";

mysqli_query($sql);
$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$name','','3','','$date','$admin_name')";
 $row=mysqli_query($log_sql);
?> 