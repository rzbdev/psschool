<?php 
error_reporting(0);
include_once('../admin/admin_header.php');
include_once('config.php');
$alid=$_SESSION['alid'];
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href = "../admin/login.php"';
	echo '</script>';
}
if(isset($_POST['submit']))
{
    
  
    $email = $_POST['email'];

	
	
	$query = mysql_query("INSERT INTO `post_email`(`email`, `alid`) VALUES ('$email','$alid')");
	if($query)
	{	

		$msg="<font color='green' style='font-size:18px;'>Email Add Successfully</font>";
		echo '<script type="text/javascript">'; 
		echo 'setTimeout(function(){
			window.location = "manage_email.php";
			}, 3000);'; 
		echo '</script>';
	}
	else
	{
		?><div class="message_del error"><?php echo "<b> Sorry</b>";?></div><?php
	}
}

?>
    <div class="container contain">
		<div style="text-align: center" class="message1"><?php echo $msg;?></div>
    <div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Add Email</h1></div>
		<form class="form-signin online-form" method="POST" name="contact_form" id="register-form" action=" "> 
		<div class="col-md-12">
	<div class="form-group">
		<label for="inputemail"> Enter Email*</label>
        <input type="text" id="inputemail" class="form-control" placeholder="Email" name="email" value="">
		</div>
		<div class="row" style="margin-bottom:20px;">
			<div class="col-md-6 text-center">
			 <a  class="btn btn-md btn-default btn-block" href="javascript:history.go(-1)"  class="btn-primary">Go Back</a>
			</div>
			<div class="col-md-6 text-center">
			<button class="btn btn-md btn-blue btn-block" name="submit" type="submit" style="margin-top:0px;">SAVE</button>
			</div>
		</div>
      </form>
        </div>
			</div><!---col-md-8---->
		</div><!----row---->
	</div><!---main-bg-->
	<div class="clearfix"></div>
	<br/></br/><br/></br/><br/>
</div> <!-- /container -->
<?php include_once('../admin/admin_footer.php');?>
</div> <!-- /container -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

<!--<script language="JavaScript" src="js/gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(document).ready(function(){
 $('#register-form').validate(
 {
  rules: {
	
	email: {
      required: true,
      email: true
    },
	
  },
  highlight: function(element) {
	  $(element).closest('.form-group').find("i").remove();
    $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback').append('<i class="fa fa-remove form-control-feedback" id="lbl"></i>');
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