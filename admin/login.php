<?php 
error_reporting(0);
session_start();
include_once('config.php');
$userid=$_GET['id'];

function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
}

?>
<!DOCTYPE html>

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
  	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,700italic,600italic,400italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,400italic,600,300italic,600italic,700,700italic,900,900italic|Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<script src="../js/angular.js"></script>
	<!--<script src="../js/jquery.min.js"></script>
	<script src="../js/angular_23sept.js"></script>-->
	
  </head>
  <body>
<div class="wrapper">
	    <div class="header-blue">
			<div class="container-fluid">
					<div class="header">
						<div class="col-md-4 col-sm-4 col-xs-12 logo ">
		                   <img class="img-responsive" src="../images/logo.png" alt="logo"/>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<nav class="navbar  navbar-right">
							<div class="">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									  </button>
									 <a class="navbar-brand" href="#"> </a>
								</div>
						
							</div>
						</nav>
						</div>
						<!-- <div class="col-md-12 brdr-bt"></div> -->
					</div>
				
				<div class="clearfix"></div>
			</div>
		</div><!--main-header-->


<?php
if(isset($_POST['submit']))
{
date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d h:i:s");
	$email=mysql_escape_mimic($_POST['email']);
    $password=base64_encode($_POST['password']);
	$sel="SELECT * FROM `admin_login` WHERE email='$email' AND password='$password'";
	$query=mysql_query($sel);
	if($row=mysql_fetch_array($query))
	{
		$_SESSION['alid']=$row['alid'];
		if($row['user_type']==1 && $row['status']==1 )
		{
			
			$_SESSION['admin']='admin';
			$_SESSION['admin1']=$row['email'];
			$_SESSION['admin_name']=$row['name'];
			if($userid=='')
			{
			echo '<script type="text/javascript">'; 
			echo 'window.location.href = "chart.php"';
			echo '</script>';
			}
	else{
	echo '<script type="text/javascript">'; 
			echo 'window.location.href = "applicant_info.php?id='.$userid.'"';
			echo '</script>';
}			
		
			$name = $row['name'];
			$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
	$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name,ipaddress) values('$email','','','','15','','$date','$name','$ipaddress')";
 $row=mysql_query($log_sql);
		}
		else
		{
			$msg= "Your account is deactivated."; 
		}
		
		if($row['user_type']==2)
		{
			
			$_SESSION['super_admin']='super_admin';
			$_SESSION['admin1']=$row['email'];
			$_SESSION['admin_name']=$row['name'];
			if($userid=='')
			{
			echo '<script type="text/javascript">'; 
			echo 'window.location.href = "chart.php"';
			echo '</script>';
			}
else{
	echo '<script type="text/javascript">'; 
			echo 'window.location.href = "applicant_info.php?id='.$userid.'"';
			echo '</script>';
}			
			$name = $row['name'];
			$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
	$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name,ipaddress) values('$email','','','','15','','$date','$name','$ipaddress')";
 $row=mysql_query($log_sql);
		}
	}
	else
	{
		$msg= "Invalid Email or Password."; 
	}
}
?>
<div class="container">
	<div class="login">
		<div class="row form-outer">
			<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Login</h1></div>
			<div class="col-md-12">
			<span style="color:red;margin-top:10px;display:block;text-align:center;"><?php if(isset($_POST['submit'])) { echo $msg; } ?></span>
			<form class="online-form" action="" method="post">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Your Email Address" name="email" required >
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
				</div>
				<p class="blu"><a href="forget_password.php">Forgot Password ?</a></p>
				<p class="text-center"><input type="submit" class="btn btn-blue" value="Login" name="submit"></p>
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div>		
<?php include_once('admin_footer.php');?>   
