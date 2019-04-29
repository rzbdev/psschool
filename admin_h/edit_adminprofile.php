<?php 
error_reporting(0);
include_once('admin_header.php');
include_once('config.php');
$alid=$_SESSION['alid'];
if(!isset($_SESSION["admin"]))
{
	
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php"';
	echo '</script>';
}
if(isset($_POST['submit']))
{
	
    
  $name = $_POST['name'];
    $email = $_POST['email'];
    $password =base64_encode($_POST['password']);
	
	
	 $query = mysql_query("UPDATE `admin_login` SET `email`='$email',`password`=md5('$password') ,`name`='$name' WHERE alid = '$alid'");
	if($query)
	{	

		$msg="<font color='green' style='font-size:18px;'>Profile Updated Successfully</font>";
		?>
		 <script type="text/javascript"> 
	  $('#preloader').hide();
    </script>
		<?php
	}
	else
	{
		?><div class="message_del error"><?php echo "<b> Sorry</b>";?></div><?php
	}
}

	$sql="SELECT * FROM `admin_login` WHERE alid='$alid'";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result))
	{	
		$name = $row['name'];
		$email = $row['email'];
		$password = base64_decode($row['password']);
		
	}
?>
    <div class="container contain">
	 <div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Edit Profile</h1></div>
		<form class="form-signin online-form" method="POST" name="contact_form" id="register-form" action=" "> 
		<div style="text-align: center"><?php echo $msg;?></div>
		
	  <div class="col-md-12">
	   <div class="form-group">
        <label for="inputName">Name</label>
         <input type="text" id="inputname" class="form-control" placeholder="Name" name="name" value="<?php echo $name; ?>">
		</div> 
	  <div class="form-group">
		<label for="inputemail">Email*</label>
        <input type="text" id="inputemail" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>">
		</div>
		<div class="form-group">
		<label for="inputemail">Password*</label>
        <input type="password" id="inputpassword" class="form-control" placeholder="Password" name="password" value="<?php echo $password;?>">
		</div>
		<div class="form-group">
		<label for="inputemail">Confirm Password*</label>
        <input type="password" id="inputc_password" class="form-control" placeholder="Confirm Password" name="c_password" value="<?php echo $password;?>">
		</div>
		<div class="col-md-12 text-center">
		<button class="btn btn-md btn-blue load" name="submit" type="submit" style="margin-bottom:20px;">SAVE</button>
		</div>
		</div>
      </form>
    
			</div>
			</div><!---col-md-8---->
			<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
		</div><!----row---->
	<div class="clearfix"></div>
	<?php include_once('admin_footer.php');?>
</div> <!-- /container -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$(".load").click(function(){	
$('#preloader').show();
});
 $('#register-form').validate(
 {
  rules: {
	/* first_name: {
      required: true
    }, */
	email: {
      required: true,
      email: true
    },
	password: {
      required: true
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