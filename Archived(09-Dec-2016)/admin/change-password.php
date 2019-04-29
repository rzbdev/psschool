<?php 
error_reporting(0);
session_start();

include_once('admin_header.php');
include_once('config.php');
$alid=$_SESSION['alid'];
 if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php"';
	echo '</script>';
} 


?>
<?php
if(isset($_POST['submit']))
{ 	
	
	$current_password=$_POST["current_password"];
	$new_password=$_POST["new_password"];
	$confirm_password=$_POST["confirm_password"];
	$query="select * from admin_login where alid='$alid'";
	$result=mysqli_query($query);
	$row=mysqli_fetch_array($result);
	if($new_password==$confirm_password and $row['password']==$current_password)
	{
		$query1="update admin_login set password='$new_password' where password='$current_password' AND alid='$alid'";
		$result1=mysqli_query($query1);
		if($result1)
		{
			/* echo '<script type="text/javascript">'; 
			echo 'alert("Password change succesfully");'; 
			echo 'window.location.href = "sub_company_login.php?apid='.$apid.'&p='.$price.'&ulid='.$ulid.'&d='.$download.'"';
			echo '</script>'; */
			$msg="<font color='green'>Password Changed Successfully</font>";
		}
	}
	else
	{
		$msg="<font color='red'>Password doesn't match.</font>";
	}
}

?>
<div class="clearfix"></div>
<div class="container contain">
	<div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Change Password</h1></div>
			<div style="text-align: center" class="message1"><?php if(isset($_POST['submit'])) { echo $msg; } ?></div>
			<div class="col-md-12">
				<form class="online-form" action="" method="post">
					<div class="form-group">
						<label for="">Current Password</label>
						<input type="password" class="form-control" id="current_password" placeholder="" name="current_password" required>
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input type="password" class="form-control" id="new_password" placeholder="" name="new_password" required>
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control" id="confirm_password" placeholder="" name="confirm_password" required>
					</div>
					<div class="row">
						<div class="col-md-3"><input type="submit" class="btn btn-blue" name="submit" value="Save"></div>
						<div class="col-md-3"><input type="reset" class="btn btn-grey" value="Cancel"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<br/><br/>
<div class="clearfix"></div>
<?php include_once('admin_footer.php');?>