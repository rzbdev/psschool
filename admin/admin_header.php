<!DOCTYPE html>
<?php
session_start();
$alid=$_SESSION['alid'];
$admin=$_SESSION['admin'];
$super_admin=$_SESSION['super_admin'];
 $timeout = 30; // Set timeout minutes
	

	$timeout = $timeout * 60; // Converts minutes to seconds
	
	if ( isset($_SESSION['start_time'])){
		if ( isset($_SESSION['alid'])){
		$elapsed_time = time() - $_SESSION['start_time'];
		if($admin=='admin')
		{
		if ($elapsed_time >= $timeout) {
			session_destroy();
			echo '<script type="text/javascript">'; 
			echo 'window.location="logout.php"';
			echo '</script>';
		}
		}
		else
		{
			if ($elapsed_time >= $timeout) {
			session_destroy();
			echo '<script type="text/javascript">'; 
			echo 'window.location="../admin/logout.php"';
			echo '</script>';
		}
		}
	}
	}
	$_SESSION['start_time']=time();

include_once('config.php');
ob_start();
date_default_timezone_set('Asia/Kolkata');
$exchn_date= date("Y-m-d H:i"); 	
$to_arr = explode(" ",$exchn_date);
$current_date=date("Y-m-d H:i"); 	 
$sql_date="update notification set status='1' where (start_date<='$current_date' AND date_ex>'$current_date') AND en_status='1'";
$result=mysql_query($sql_date);	
$sql_date1="update notification set status='0' where en_status='0'";
$result1=mysql_query($sql_date1);													
// deactivate notification
$sql_de="select * from notification where status='1'";
$deact=mysql_query($sql_de);
$deact_row= mysql_fetch_array($deact);
$nid_deact=$deact_row['nid'];
$start_date2=$deact_row['start_date'];
$date_deact=$deact_row['date_ex'];
if($date_deact<=$current_date)
{
$update_deact="update notification set status='0' where nid='$nid_deact'";
$result=mysql_query($update_deact);
}
$sql_de1="select * from notification where status='1'";
$deact1=mysql_query($sql_de1);
while($deact_row2=mysql_fetch_array($deact1))
{
$nid_deact2=$deact_row2['nid'];
$start_date2=$deact_row2['start_date'];
$date_deact=$deact_row2['date_ex'];
if($current_date<$start_date2 and $current_date<$date_deact)
{
$update_deact1="update notification set status='0' where nid='$nid_deact2'";
$result1=mysql_query($update_deact1);
}
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>PS | Home</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	  <link href="chart.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,700italic,600italic,400italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,400italic,600,300italic,600italic,700,700italic,900,900italic|Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<script src="../js/angular.js"></script>
	<!--<script src="../js/jquery.min.js"></script>-->
	<script src="../js/angular_23sept.js"></script>
  </head>
  <body>
<div class="wrapper">
	    <div class="header-blue">
			<div class="container-fluid">
					<div class="header">
					<div class="row">
						<div class="logo col-md-2 col-sm-2 col-xs-12">
	     	<a href="#"><img class="img-responsive" src="../images/logo.png" alt="logo"/>	</a>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 nolftpdng">
							<nav class="navbar">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									  </button>
									 <a class="navbar-brand" href="#"> </a>
								</div>
								<div id="navbar" class="navbar-collapse collapse">
								
							 
								
								<?php if($super_admin =='super_admin') { ?>
								<ul class="nav navbar-nav navbar-right" style="margin-right:20px;">
								<li><a href="../admin/chart.php">Dashboard</a></li>
								
								<li><a href="../admin/search.php">Search</a></li>
									
	<li class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users  <span class="cret"><i class="fa fa-angle-down"></i></span>
										</a>
										<ul class="dropdown-menu my-m">
											<li><a href="../super_admin/add_admin.php">Add Users</a></li>
										<li><a href="../super_admin/super_admin.php">Manage Users</a></li>
									
									  </ul>
									</li>										
											<li class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifications  <span class="cret"><i class="fa fa-angle-down"></i></span>
										</a>
										<ul class="dropdown-menu my-m">
										<li><a href="../admin/add_new_notification.php">Add Notifications</a></li>
										<li><a href="../admin/manage_notification.php">Manage Notifications</a></li>
										
									  </ul>
									</li>
									<li class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jobs  <span class="cret"><i class="fa fa-angle-down"></i></span>
										</a>
										<ul class="dropdown-menu my-m">
										<li><a href="../admin/jobs.php?page=1">New Jobs</a></li>
										<li><a href="../admin/old_jobs.php">Old Jobs</a></li>
									  </ul>
									</li>
									<li class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown"   role="button" aria-haspopup="true" aria-expanded="false">Applicants  <span class="cret"><i class="fa fa-angle-down"></i></span>
										</a>
										<ul class="dropdown-menu my-m">
										<li><a href="../admin/admin.php">New Applicants</a></li>
										<li><a href="../admin/old_applicants.php">Old Applicants</a></li>
										<li><a href="../admin/result_page.php">Final Results</a></li>
									  </ul>
									</li>
			
										<!--<li><a href="">Change Password</a></li>-->
										<li><a href="../super_admin/edit_sprofile.php"> Profile</a></li>
										<li class="dropdown">
										<a href="" class="dropdown-toggle"  data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false"> Email Notification  <span class="cret"><i class="fa fa-angle-down"></i></span>
										</a>
										<ul class="dropdown-menu my-m">
											<li><a href="../super_admin/add_email.php">Add Email</a></li>
										<li><a href="../super_admin/manage_email.php">Manage Email</a></li>
									
									  </ul>
									</li>
											 <li><a href="../super_admin/logging.php">Logging</a></li>										
										<li><a href="../admin/logout.php">Signout</a></li>	
									
										<!--<div class="ntfy pull-right ntffyy">
										<?php 
										//$get_jobs="Select * from personal_details WHERE Notification IN (SELECT title  FROM notification WHERE date_ex >='$exchn_date')";
										//$result_jobs=mysql_query($get_jobs);
										//$num_rows = mysql_num_rows($result_jobs); ?>
										<li><a class="note-circle" href="../admin/notifications.php?page=1"><i class="fa fa-bell"></i><span class="notification-circle"><?php //echo $num_rows; ?></span></a></li>
										
										</div>-->
										</ul>
										<?php } ?>
										
									<ul class="nav navbar-nav navbar-right" style="margin-right:20px;">
										<!--<li><a href="#">Home</a></li>-->
										<?php if($admin=='admin') { ?>
										<!--<li><a href="manage_notification.php?page=1">Manage Notification</a></li>	
										<li><a href="jobs.php?page=1">Manage Jobs</a></li>-->
														<li><a href="search.php">Search</a></li>
										<li><a href="chart.php">Dashboard</a></li>
										 <li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Applicants  <span class="cret"><i class="fa fa-angle-down"></i></span>
				</a>
				<ul class="dropdown-menu my-m">
				<li><a href="admin.php">New Applicants</a></li>
				<li><a href="old_applicants.php">Old Applicants</a></li>
			  </ul>
				</li>
				
										<!--<li><a href="change-password.php">Change Password</a></li>-->
										<li><a href="edit_adminprofile.php"> Profile</a></li>	
										<li><a href="logout.php">Signout</a></li>	
										
									
									<!--	<div class="ntfy pull-right ntffyy">
									<?php 
								//$get_jobs="Select * from personal_details WHERE Notification IN (SELECT title  FROM notification WHERE date_ex >='$exchn_date')";
								//$result_jobs=mysql_query($get_jobs);
								//$num_rows = mysql_num_rows($result_jobs); ?>
								<li><a class="note-circle" href="notifications.php?page=1"><i class="fa fa-bell"></i><span class="notification-circle"><?php// echo $num_rows; ?></span></a></li>
								</div>-->
								</ul>
								<?php } ?>
								</div>
						</nav>
							
						</div>
						</div>
						<!-- <div class="col-md-12 brdr-bt"></div> -->
					</div>
				<div class="clearfix"></div>
			</div>
			<?php if($admin=='admin') {
				?>
		</div><!--main-header-->
	
<?php
			}?>
			
			<?php if($admin!='admin') {
				?>
		</div><!--main-header-->
	
<?php
			}?>
