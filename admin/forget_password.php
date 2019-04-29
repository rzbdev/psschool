<!DOCTYPE html>
<?php 

error_reporting(0);
session_start();
include_once('config.php');
if(isset($_POST['submit']))
{
         $email =$_POST['email'];
         $confirm_email =$_POST['confirm_email'];
		
		 $query="select * from admin_login where email='$email'";
		 $result=mysql_query($query);
		 if(!mysql_affected_rows($link)>0)
		 {
			 $msg="<font color='red'>You are not registered user with Psschool</font>";
		 }
		 else{	 
			 $row=mysql_fetch_array($result);
			 $password= base64_decode($row['password']);
			 /* $lid=$row['LID'];
			 $type=$row['user_type'];
					$qry="select*from user_info where LID='$lid'";
					$res=mysql_query($qry);
					$row1=mysql_fetch_array($res);
					$name=$row1['first_name']; */	
				$msg= "<font color='green'>Your password reset conformation has successfully sent on your email,please check for the further details. </font>";			
							$touser = $email; 
							$subjectAdmin= "Forgot password";
							$headersAdmin = "From: psschool<noreply@psschool.com>"."\r\n"; 
							
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
										Dear '.$email.',
										<br><br>
										Following are your login details:-
										<div style="clear:both;width:100%;"></div><br>
										<b>Email:&nbsp;</b>'.$email.'<br>
										<b>Password:&nbsp;</b>'.$password.'<br><br>
									Click <a href="http://psschool.stpreview.com/admin/login.php">here</a> to Login. <br><br>
										Warm Regards<br>
										Psschool.com
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
  	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,700italic,600italic,400italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,400italic,600,300italic,600italic,700,700italic,900,900italic|Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<script src="../js/angular.js"></script>
	<!--<script src="../js/jquery.min.js"></script>-->
	<script src="../js/angular_23sept.js"></script>
	
	
	
  </head>
  <body>
<div class="wrapper">
	    <div class="header-blue">
			<div class="container">
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

<div class="clearfix"></div>
<div class="container">
	<div class="login">
		<div class="row form-outer">
				<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Forgot Password</h1></div>
			<div class="col-md-12">
			<span style="color:red;margin-top:10px;display:block;text-align:center;"><?php  echo $msg; ?></span>
			<form class="online-form" method="post" id="forgot_form">
				<div class="form-group">
					<label for="">Email Address</label>
					<input type="email" class="form-control" id="email" placeholder="Your Email Address" name="email" required>
				</div>
				<div class="form-group">
					<label for="">Confirm Email Address</label>
					<input type="email" class="form-control" id="confirm_email" placeholder="Confirm Email Address" name="confirm_email" required>
				</div>
				<p class="text-center">
				<a onClick="parent.location='login.php'"><input type="button"  class="btn btn-grey" value="Cancel" name="cancel" style="margin-top:0px;"></a>
				<input type="submit" class="btn btn-blue" value="Submit" name="submit" style="margin-top:0px;margin-left:10px;">
				</p>
			</form>
			</div>
		</div>
	</div>
</div>
</div>
<div class="clearfix"></div>				
<?php include_once('admin_footer.php');?>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $('#forgot_form').validate(
 {
  rules: {
	
	email: {
      required: true,
      email: true
    },
	confirm_email:
	{
		required:true,
		equalTo:'#email',
	}
	
  },
 });
});
</script>
