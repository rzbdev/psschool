<?php 

error_reporting(0);
include_once('../admin/admin_header.php');
include_once('config.php');
$alid=$_SESSION['alid'];
 date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href = "../admin/login.php"';
	echo '</script>';
}
if(isset($_POST['submit']))
{
    
  
    $email = $_POST['email'];
$password= base64_encode($_POST['password']);
 $Name= $_POST['Name'];
	 $chk=$_POST['chkbox1'];
	 $chk1=$_POST['chkbox2'];
	 $chk2=$_POST['chkbox3'];
	 $chk3=$_POST['chkbox4'];
	 $chk33='0';
	 if($chk1==1)
	 {
		  $chk33='1';
		 $chk11='true';
	 }
	 else
	 {
		  $chk11='false';
	 }
	 if($chk2==1)
	 {
		  $chk33='1';
		 $chk22='true';
	 }
	 else
	 {
		  $chk22='false';
	 }
	 
	if($chk==1)
	{
	$sqlemail="select * from admin_login where email='$email' ";
		 $row2=mysqli_query($con,$sqlemail);
  if(mysqli_num_rows($row2)>0)
  {
	    ?>
	
	  <?php 
  }
  else
  {
	 $sql1= "INSERT INTO `admin_login`(`email`, `password`,`user_type`,`name`) VALUES ('$email','$password','2','$Name')";
	 $query = mysqli_query($con,$sql1);
	 $sql2=  "INSERT INTO `manage_email`(`email`, `alid`,`name`,`post`,`email_send`,`status`) VALUES ('$email','$alid','$Name','$chk11','$chk22','$chk33')";
	 	$query1 = mysqli_query($con,$sql2);
	}
	}
	else
	{
		$sqlemail="select * from admin_login where email='$email' ";
		 $row2=mysqli_query($con,$sqlemail);
  if(mysqli_num_rows($row2)>0)
  {
	    ?>
	
	  <?php 
  }
  else
  {
	 $sql3="INSERT INTO `admin_login`(`email`, `password`,`user_type`,`name`) VALUES ('$email','$password','1','$Name')";
		 $query = mysqli_query($con,$sql3);
		 
	$sql4= "INSERT INTO `manage_email`(`email`, `alid`,`name`,`post`,`email_send`,`status`) VALUES ('$email','$alid','$Name','$chk11','$chk22','$chk33')";
		 $query1 = mysqli_query($con,$sql4);
	}
	}
		$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$Name','','5','','$date','$admin_name')";
 $row=mysqli_query($con,$log_sql);
	if($query)
	{	

		$msg="<font color='green'>User Added Successfully</font>";
		echo '<script type="text/javascript">'; 
		echo 'setTimeout(function(){
		window.location = "super_admin.php";
			}, 3000);'; 
	echo '</script>';
		?>
		 <script type="text/javascript"> 
	  $('#preloader').hide();
    </script>
		<?php
	}
	else
	{
		$msg="<font color='red'>Email address already exists.</font>";
	}
}

?>
    <div class="container contain">
	
    <div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Add User</h1></div>
		<form class="form-signin online-form" method="POST" name="contact_form" id="register-form" action=" "> 
		<div class="message1" style="text-align:center;"><?php echo $msg;?></div>
		<div class="col-md-12">
		 <div class="form-group">
		<label for="inputname"> Enter Name</label>
        <input type="text" id="inputname" class="form-control" placeholder="Name" name="Name" value="">
		</div>
	    <div class="form-group">
		<label for="inputemail"> Enter Email*</label>
        <input type="text" id="inputemail" class="form-control" placeholder="Email" name="email" value="">
		</div>
		<div class="form-group">
		<label for="inputpassword"> Enter Password*</label>
        <input type="password" id="inputpassword" class="form-control" placeholder="Password" name="password" value="">
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label for="inputpassword">Job Notification   
        <input type="checkbox" id="chkbox" class="" placeholder="" name="chkbox2" value="1"></label>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label for="inputpassword">Eligibility Notification
        <input type="checkbox" id="chkbox" class="" placeholder="" name="chkbox3" value="1"></label>
		</div>
		</div>
		</div>
		<div class="form-group">
		<label for="inputpassword">Super Admin Account    
        <input type="checkbox" id="chkbox" class="" placeholder="" name="chkbox1" value="1"></label>
		</div>
		<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
		<div class="row" style="margin-bottom:20px;">
		<div class="col-md-6">
		 <a  class="btn btn-md btn-default btn-block" href="javascript:history.go(-1)"  class="btn-primary">Go Back</a>
		</div>
		<div class="col-md-6">
		<button class="btn btn-md btn-blue btn-block load" name="submit" type="submit" style="margin-top:0px;">SAVE</button>
		</div>
		</div>
		</div>
      </form>
        </div>
			</div><!---col-md-8---->
		</div><!----row---->
<br/><br/><br/><br/>
	</div>
	<?php include_once('../admin/admin_footer.php');?>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".load").click(function(){	
$('#preloader').show();
});
 $('#register-form').validate(
 {
  rules: {
	
	email: {
      required: true,
      email: true
    },
	password:
	{
		required:true,
	},

	
  },
  highlight: function(element) {
	  $(element).closest('.form-group').find("i").remove();
    $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback').append('<i class="fa fa-remove form-control-feedback" id="lbl"></i>');
		$('#preloader').hide();
  },
  success: function(element) {
	  element
    .closest('.form-group').find("i").remove();
    element
    .closest('.form-group').removeClass('has-error has-feedback error').addClass('has-success has-feedback').append('<i class="fa fa-check form-control-feedback"></i>').remove(".fa fa-remove form-control-feedback");
  }
 });
}); // end document.ready
	</script>
	
</body>
</html>
