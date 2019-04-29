<?php
session_start();
$server = $_SERVER['SERVER_NAME'];
date_default_timezone_set('Asia/Kolkata');
$date= date("Y-m-d h:i:s"); 
include_once('config.php');
 $id = $_POST['id'];
 $radio = $_POST['optionrejected'];
  //$admin=$_SESSION['admin'];
 $admin1= $_SESSION['admin1'];
 $admin_name= $_SESSION['admin_name'];
$adminid=$_SESSION["alid"];
$comment = $_POST['comment'];
 $sqll1="select * from personal_details where id=$id";
 $roww=mysql_query($sqll1);
 if($row=mysql_fetch_array($roww))
 {
$name=$row['first_name'];
$emailsend=$row['comm_email'];
 }
 
 if($radio=='')
 {
	 
$eligible = $_POST['optionsRadios'];
$comment = $_POST['comment'];
$sqll="select * from eligible where ulid=$id";
$roww=mysql_query($sqll);
$n=mysql_num_rows($roww);
if($eligible=='E')
{
	$eligibl='Eligible';
}
else if($eligible=='NE')
{
	$eligibl='Non-Eligible';
}
if($n>0)
{
	if($eligible!='')
	{
		 $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin1','$adminid','$name','$id','$comment','$eligibl','$date','$admin_name')";
 $row=mysql_query($log_sql);
  $sql="UPDATE eligible SET eligibilty='$eligible',comment='$comment' where ulid='$id'";
  $row=mysql_query($sql);
 
  $sql1="UPDATE personal_details SET eligibilty='$eligible' where id='$id'";
  $row1=mysql_query($sql1);
	}
	else
	{

	}
 // $touser ="rocky.t1001@gmail.com"; 
 
 
 
 
 $sql_email="select email from manage_email WHERE status='1' and email_send='true' ";
 $row_email=mysql_query($sql_email);
 while($row1=mysql_fetch_array($row_email))
 {
$email=$row1['email'];
 
 if($eligible!='')
 {
echo $touser =$email;
		$subjectAdmin= "Application Form";
		$headersAdmin = "From: careers.pathseekers.education<noreply@pathseekers.education>"."\r\n"; 
		//$headersAdmin  .= 'MIME-Version: 1.0' . "\r\n";
		$headersAdmin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$messageuser ='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
			Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
			<html lang="en"> 
				<head>
					<title></title> 
				</head> 
				<body> 
					<div style="margin:0 auto;">
						Dear Admin,
						<br><br>						
				'.$admin_name.' changed the status of applicant with Name "<a href=http://'.$server.'/admin/applicant_info.php?id='.$id.'>'.$name.'</a>" as '.$eligibl.'.<br><br>Comment: '.$comment.'<br><br>
						Thanks and Regards,<br>
					    Pathseekers
						<div style="clear:both;font-size:14px; text-align:left; width:100%;"> 
						<br/>
						</div>
					</div>
				</body>
			</html>'; 
			//$emailSend = mail('gsstpreview@gmail.com',$subjectAdmin,$messageAdmin,$headersAdmin);
			$emailSenduser = mail($touser,$subjectAdmin,$messageuser,$headersAdmin); 
 }
 } 
} 
else
{
	 $sqln="INSERT INTO  eligible(`eligibilty`,`comment`,`ulid`) VALUES ('$eligible','$comment','$id')";
	  $sql1="UPDATE personal_details SET eligibilty='$eligible' where id='$id'";
 $row1=mysql_query($sql1);
   $row=mysql_query($sqln);
   
 
$touser ="test1@sarnatechnologies.com";

		$subjectAdmin= "Application Form";
		$headersAdmin = "From: careers.pathseekers.education<noreply@pathseekers.education>"."\r\n"; 
		//$headersAdmin  .= 'MIME-Version: 1.0' . "\r\n";
		$headersAdmin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$messageuser ='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
			Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
			<html lang="en"> 
				<head>
					<title></title> 
				</head> 
				<body> 
					<div style="margin:0 auto;">
						Dear Admin,
						<br><br>						
				'.$admin_name.' changed the status of applicant with Name "<a href=http://'.$server.'/admin/applicant_info.php?id='.$id.'>'.$name.'</a>" as '.$eligibl.'.<br><br>Comment: '.$comment.'<br><br>
						Thanks and Regards,<br>
					    Pathseekers
						<div style="clear:both;font-size:14px; text-align:left; width:100%;"> 
						<br/>
						</div>
					</div>
				</body>
			</html>'; 
			//$emailSend = mail('gsstpreview@gmail.com',$subjectAdmin,$messageAdmin,$headersAdmin);
			$emailSenduser = mail($touser,$subjectAdmin,$messageuser,$headersAdmin); 

   
}
 }
 else
 {
	 $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin1','$adminid','$name','$id','$comment','$radio','$date','$admin_name')";
 $row=mysql_query($log_sql);
	 
   $sql="UPDATE eligible SET hired='$radio' where ulid='$id'";
  $row=mysql_query($sql);
 
   $sql1="UPDATE personal_details SET hired='$radio' where id='$id'";
  $row1=mysql_query($sql1);
	 
 }


  ?>
