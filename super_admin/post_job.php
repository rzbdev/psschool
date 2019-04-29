<?php 
include('../config.php');
session_start();
date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d h:i:s"); 
echo $admin_name=$_SESSION['admin_name'];
echo $admin_id=$_SESSION['alid'];
echo  $admin_id_email=$_SESSION['admin1'];
extract($_POST);
$user_id=$id1;


$status=$checked;

 $post=$post1;

if($post=='post1')
{
	 $sql=mysql_query("UPDATE manage_email SET email_send='$status' WHERE id=$user_id");
	
	 $select=mysql_query("select name from manage_email  WHERE id=$user_id");
	   $row12=mysql_fetch_array($select);
      $name=$row12['name'];
	
	 
	 
	  $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$name','','1','','$date','$admin_name')";
 $row=mysql_query($log_sql);
	
	  
	 
	 
	 
}

if($post=='post')
{
 $sql=mysql_query("UPDATE manage_email SET post='$status' WHERE id=$user_id");
 
  $select=mysql_query("select name from manage_email  WHERE id=$user_id");
	   $row12=mysql_fetch_array($select);
      $name=$row12['name'];
	
	 
	 
	  $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$name','','11','','$date','$admin_name')";
 $row=mysql_query($log_sql);
 
 
 
}
	if($post=='post2')
{
	echo"UPDATE manage_email SET send_email='$status'";
		 $sql=mysql_query("UPDATE manage_email SET send_email='$status'");
	} 


echo 1;
?>
