<?php 
error_reporting(0);
include_once('../admin/admin_header.php');
include_once('config.php');
$alid=$_SESSION['alid'];
 $id = $_REQUEST['id'];
  date_default_timezone_set('Asia/Kolkata');
 $date= date("Y-m-d H:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href = "../admin/login.php"';
	echo '</script>';
}
	?>
	<?php
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = base64_encode($_POST['password']);
	$name = $_POST['name'];
	$sqlemail="select * from admin_login where email='$email' AND alid != '$id' ";
		 $row2=mysqli_query($sqlemail);
  if(mysqli_num_rows($row2)>0)
  {
	
  }
  else
  {
	
	$query = mysqli_query("UPDATE `admin_login` SET `email`='$email',`password`='$password',`name`='$name' WHERE alid = '$id'");
  }
	$log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','$name','','6','','$date','$admin_name')";
 $row=mysqli_query($log_sql);
	if($query)
	{	

		$msg="<font color='green' style='font-size:18px;'>User Updated Successfully</font>";
		echo '<script type="text/javascript">'; 
		echo 'setTimeout(function(){
			window.location = "super_admin.php";
			}, 5000);'; 
		echo '</script>'; 
			?>
		 <script type="text/javascript"> 
	  $('#preloader').hide();
    </script>
		<?php
	}
	else
	{
	$msg="<font color='red' style='font-size:18px;'>Email name already exist</font>";
	}
}

	 $sql="SELECT email,password,name FROM `admin_login` WHERE alid='$id'";
	$result=mysqli_query($sql);
	if($row = mysqli_fetch_array($result))
	{	
		$email = $row['email'];
	$password1 = $row['password'];
	$password=base64_decode($password1);
		$name = $row['name'];
		
	}
?>

    <div class="container contain">
      <div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Edit User</h1></div>
		<form class="form-signin online-form" method="POST" name="contact_form" id="register-form" action=" "> 
		<div style="text-align: center"><?php echo $msg;?></div>
	<div class="col-md-12">
	<div class="form-group">
		<label for="inputemail">Name</label>
        <input type="text" id="inputemail" class="form-control" placeholder="Name" name="name" value="<?php echo $name ?>">
		</div>
	<div class="form-group">
		<label for="inputemail"> Enter Email*</label>
        <input type="text" id="inputemail" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>">
		</div>
			<div class="form-group">
		<label for="inputemail">Password*</label>
        <input type="password" id="inputpassword" class="form-control" placeholder="Password" name="password" value="<?php echo $password;?>">
		</div>
		<div class="form-group">
		<label for="inputemail">Confirm Password*</label>
        <input type="password" id="inputc_password" class="form-control" placeholder="Confirm Password" name="c_password" value="<?php echo $password;?>">
		</div>
		<div class="row" style="margin-bottom:20px;">
		<div class="col-md-6">
		 <a href="javascript:history.go(-1)"  class="btn-default btn btn-md btn-block">Go Back</a>
		</div>
		<div class="col-md-6">
		<button class="btn btn-md btn-blue btn-block load" name="submit" type="submit" style="margin-top:0;">SAVE</button>
		</div>
		</div>
      </form>
	  	  <div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
       </div>
			</div><!---col-md-8---->
		</div><!----row---->
	</div><!---main-bg-->
	</div><!---main-bg-->
	<div class="clearfix"></div>
	<?php include_once('../admin/admin_footer.php');?>
</div> <!-- /container -->
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
	password:{
		required:true,
	},
	c_password: {
	
      required: true,
	  equalTo: "#inputpassword"
    }
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
       
