<!DOCTYPE html>
<?php
error_reporting(0);
include_once('config.php');

date_default_timezone_set('Asia/Kolkata');
$date= date("Y-m-d");
							
		$to_array = explode("-",$date);
$r=	$to_array[0]."-".$to_array[1]."-".$to_array[2];						
$current_date=date("Y-m-d H:i"); 	
//expiry 
$sql_date="update notification set status='1' where (start_date<='$current_date' AND date_ex>'$current_date') AND en_status='1'";
$result=mysql_query($sql_date);	
$sql_date1="update notification set status='0' where en_status='0'";
$result1=mysql_query($sql_date1);													
// deactivate notification
$sql_de="select * from notification where status='1'";
$deact=mysql_query($sql_de);
$deact_row= mysql_fetch_array($deact);
$nid_deact=$deact_row['nid'];
$date_deact=$deact_row['date_ex'];
if($date_deact<=$current_date)
{
$update_deact="update notification set status='0' where nid='$nid_deact'";
$result=mysql_query($update_deact);
}	
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags <span class="red">*</span>must<span class="red">*</span> come first in the head; any other head content must come <span class="red">*</span>after<span class="red">*</span> these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>PS | Application</title>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1_new.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
<div class="wrapper">
			<div class="container">
					<div class="header  col-md-12">
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-12 logo">
							<img class="img-responsive" src="images/logo1.png" alt="logo"/>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">
						    <h6><a href="notification47.html"><span class="bell"><img src="images/bell.png" /></span>Notification Detail </a></h6>
							<h1>Application for teaching staff</h1>
						</div>
					</div>
					</div><!---header----->
					<div class="clearfix"></div>
					<div class="col-md-12">
					<div class="form-main">
						<div class="panel-group" id="accordion">
						<form class="form-horizontal custm_form" name="form"  method="POST" id="ticketForm" enctype="multipart/form-data">
						  <div class="panel panel-default">
							<div class="panel-heading">
		<a class=""  href="#" data-check="1">
							  <h4 class="panel-title">
								<span class="fnt"> 1. Basic Information</span>
							  </h4>
							</a>
							</div>
							<div id="collapse1" class="panel-collapse collapse in">
							  <div class="panel-body">
								    <div class="">
									  <div class="col-md-10">
									  <div class="row shphn">
									     <div class="col-md-6 mbprght">
										    
										  </div>
									  </div>
									 
									 
									  <div class="row">
									  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="firstname" class="col-md-5 control-label pdngrht">First Name<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control" name="f_name" id="f_name" placeholder="">
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Lastname" class="col-md-4 control-label pdngrht">Last Name<span class="red">*</span></label>
											<div class="col-md-8 smtp">
											  <input type="text" class="form-control" name="l_name" id="l_name" placeholder="" >
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="firstname" class="col-md-5 control-label pdngrht">Post Applied For<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control" name="f_name" id="f_name" placeholder="">
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Date" class="col-md-4 control-label pdngrht">Date of Birth<span class="red">*</span></label>
											<div class="col-md-8 smtp">
											  <input type="text" class="form-control" name="person_dob" id="person_dob" placeholder="" >
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Email" class="col-md-5 control-label pdngrht">Email<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="email" class="form-control" name="mail" id="mail" placeholder="" >
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Gender" class="col-md-4 control-label pdngrht">Gender<span class="red">*</span></label>
											<div class="col-md-8 smtp">
											 <select class="form-control" name="gender" id="gender" >
											    <option value="">Select</option>
												  <option value="Male">Male</option>
												  <option value="Female">Female</option>
												</select>
											</div>
										  </div>
										  </div>
										  </div><!---row-->
										  </div><!---col-md-10-->
										  <div class="col-md-2 mbprght shodesk">
										    <div class="pro_pic">
												<img class="img-responsive" src="uploads/<?php if($image!=""){ echo $image;} else { echo "default.png"; }?>"  alt="" id="output"/>
							<div class="chng-pic">
								<div class="image-preview-input inputWrapper img-responsive">
									<input class="fileInput" type="file" name="file1" id="file2" accept="image/*" onchange="loadFile(event)"/>
									<span class="input-browser-img"></span>
								</div>	
							</div>
							<div class="pic_pro"></div>
											</div>
										  </div><!---col-md-2-->
										  <div class="col-md-12">
									  <div class="col-md-5 pdngrht clr">
										  <div class="form-group">
											<label for="firstname" class="col-md-5 control-label pdngrht mbhgt"></label>
											<div class="col-md-7 lftpdng mtpp">
											  <label class="radio-inline">
											  <input type="radio" name="husband_father" id="father" value="father" onclick="show_father()"> Father Name
											</label>
											<label class="radio-inline">
											  <input type="radio" name="husband_father" id="husband" value="husband" onclick="show_father()" > Husband Name
											</label>
											</div>
											<div class="col-md-7 lftpdng errhf"></div>
										  </div>
										  </div>
										   
										   <div class="col-md-7 pdngrht">
										  
										   <div class="form-group" id="div_father1">
											<label for="choose_p" class="col-md-3 control-label pdngrht mblyt"></label>
											<div class="col-md-6 nopdng mbprght">
											  
											</div>
										  </div>
										  
										   <div style="display:none;" class="form-group" id="div_father">
											<label for="choose_p" class="col-md-3 control-label pdngrht mblyt">Father's Name<span class="red">*</span></label>
											<div class="col-md-6 nopdng mbprght">
											  <input type="text" class="form-control" name="person_father" id="person_father" placeholder="" >
											</div>
										  </div>
										     <div style="display:none;" class="form-group" id="div_husband">
											<label for="choose_p" class="col-md-3 control-label pdngrht mblyt">Husband's Name<span class="red">*</span></label>
											<div class="col-md-6 nopdng mbprght">
											  <input type="text" class="form-control" name="person_husband" id="person_husband" placeholder="" >
											</div>
										  </div>
										  </div>
										  <div class="col-md-5 pdngrht">
										   <div class="form-group">
											<label for="Mobile" class="col-md-5 control-label mblyt">Mobile<span class="red">*</span></label>
											<div class="col-md-7 lftpdng mbp mbprght">
											  <input type="text" class="form-control lftpdng commonField" name="mnum" id="mnum" placeholder="" >
											</div>
										  </div>
										  </div>
										   <div class="col-md-7 pdngrht">
										  <div class="form-group">
											<label for="Nationality" class="col-md-3 control-label pdngrht mblyt">Nationality<span class="red">*</span></label>
											<div class="col-md-6 nopdng mbprght">
											  <input type="text" class="form-control" name="nationality" id="nationality">
											 
											</div>
										  </div>
										  </div>
										  <div class="col-md-5 pdngrht">
										  <div class="form-group">
											<label for="State" class="col-md-5 control-label mblyt">Domicile State<span class="red">*</span></label>
											<div class="col-md-7 lftpdng mbp mbprght">
											 <select class="form-control" name="domicile" id="domicile" >
												 <option value="">Select</option>
												 <?php 
							
							$select_state="SELECT * FROM state";
							$rows_state=mysql_query($select_state);
							 $r=mysql_num_rows($rows_state);
							while($row=mysql_fetch_array($rows_state))
							{
							?>
							<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName']; ?></option>
							<?php 
							}  
							?>
							 <option value="Other">OTHER</option>
												</select>
											</div>
										  </div>
										  </div>
										  <div class="col-md-7 pdngrht">
										     <div class="form-group">
											<label for="" class="col-md-3 control-label"></label>
											<div class="col-md-9 lftpdng">
												
												
<Button class="btn success-btn pull-right next" data-id="1" name="submit" type="button" style="margin-top:0px;">Next</button>
										</a>	
												
											</div>
											</div>
										  </div>
										  </div><!---col-md-10-->
									   </div><!---row-->
									  
									   
									</div><!---row-->
								
							  </div>
							</div>
						  <div class="panel panel-default">
							<div class="panel-heading">
								<a class=""  href="#" data-check="2">
								<h4 class="panel-title">
								<span class="fnt"> 2. Address Details</span>
							  </h4>
							  </a>
							</div>
							<div id="collapse2" class="panel-collapse collapse">
							  <div class="panel-body">
							 
								<div class="col-md-12 req_false">
								<h4>Permanent Address<span class="red">*</span></h4>
									  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-5 control-label pdngrht linehght addre">Address line 1<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control" id="addr" name="addrr" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-3 control-label pdngrht linehght addre">Address line 2<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="addr2" name="addr2" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="City" class="col-md-5 control-label pdngrht">City<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control" id="city1" name="city1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Pin" class="col-md-3 control-label pdngrht">Pin<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="pin1" name="pin1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="State" class="col-md-5 control-label pdngrht">State<span class="red">*</span></label>
											<div class="col-md-7">
											 <select class="form-control" name="state1" id="state1" >
												  <option value="">Select</option>
												  <?php 
							
							$select_state="SELECT * FROM state";
							$rows_state=mysql_query($select_state);
							 $r=mysql_num_rows($rows_state);
							while($row=mysql_fetch_array($rows_state))
							{
							?>
							<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName']; ?></option>
							<?php 
							}  
							?>
							 <option value="Other">OTHER</option>
												</select>
											</div>
										  </div>
										  </div>
										 
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Telephone" class="col-md-3 control-label pdngrht">Telephone<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="Telephone1" name="telephone1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Mobile" class="col-md-5 control-label pdngrht">Mobile<span class="red"></span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control" id="Mobile1" name="mobile1" placeholder="">
											</div>
										  </div>
										  </div>
									</div>
									<div class="col-md-12 req_false">
									<div class="col-md-7 mtp">
										  <div class="form-group">
										  <div class="col-md-5 pdngrht lftpdng">
											<h4 class=" pdngrht linehght" style="text-align:left;margin-top:4px;">Communication Address<span class="red">*</span></h4>
											</div>
											<div class="col-md-7 lftpdng" >
												<label class="checkbox-inline ngtv" >
												  <input type="checkbox" name="chk_add" id="chk_add" onclick="Filladd(this.form)"> Same as permanent address
												</label>
											</div>
										  </div>
										  </div>
										  <div class="clearfix"></div>
									  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-5 control-label pdngrht linehght addre">Address line 1<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control addressatt" id="comm_addr" name="comm_addrr" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-3 control-label pdngrht linehght addre">Address line 2<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control addressatt" id="comm_addr1" name="comm_addr1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="City" class="col-md-5 control-label pdngrht">City<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control addressatt " name="comm_city1" id="comm_city1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Pin" class="col-md-3 control-label pdngrht ">Pin<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control addressatt" id="comm_pin" name="comm_pin" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="State" class="col-md-5 control-label pdngrht">State<span class="red">*</span></label>
											<div class="col-md-7">
											  <select class="form-control addressatt commonField addressattd" name="comm_state" id="comm_state">
												  <option value="">Select</option>
												  <?php 
							
							$select_state="SELECT * FROM state";
							$rows_state=mysql_query($select_state);
							 $r=mysql_num_rows($rows_state);
							while($row=mysql_fetch_array($rows_state))
							{
							?>
							<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName']; ?></option>
							<?php 
							}  
							?>
							 <option value="Other">OTHER</option>
												</select>
											</div>
										  </div>
										  </div>
										 
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Telephone" class="col-md-3 control-label pdngrht">Telephone<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control addressatt" id="comm_telephone" name="comm_telephone" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-12 ">
										  <div class="form-group">
											<label for="" class="col-md-3 control-label"></label>
											<div class="col-md-9 lftpdng">
											
												<button data-id="2" class="btn success-btn pull-right next">Next</button>
												
												<button data-id="2" class="btn back-btn pull-right back">Back</button>
											</div>
										  </div>
										  </div>
										  
									</div>
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading">
								<a class=""  href="#" data-check="3">
								<h4 class="panel-title">
								<span class="fnt"> 3. Family Details</span>
							  </h4>
							  </a>
							</div>
							<div id="collapse3" class="">
							  <div class="panel-body">
							  
								<div class="col-md-12">
									  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Marital" class="col-md-5 control-label pdngrht linehght">Marital Status<span class="red">*</span></label>
											<div class="col-md-7">
											  <select class="form-control" name="status" id="status">
												  <option value="">Select</option>
												  <option value="Unmarried">Un-married</option>
												  <option value="Married">Married</option>
												  <option value="Widower">Widow(er)</option>
												  <option value="Divorcee">Divorcee</option>
												</select>
											</div>
										  </div>
										  </div>
										  </div>
										  <div style="display:none" class="col-md-12 spouse_detail">
											<div class="col-md-6 pdngrht">
										  <div class="form-group">
												<h4 class="col-md-5 pdngrht linehght" style="text-align:right;margin-top:4px;">Spouse Details<span class="red">*</span></h4>
											<div class="col-md-7">
											</div>
										  </div>
										  </div>
										  </div>
										    <div style="display:none" class="col-md-12 spouse_detail">
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Name" class="col-md-5 control-label pdngrht">Full Name<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control comm_sp" id="spouse_name" name="spouse_name" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Birthdate" class="col-md-3 control-label pdngrht linehght">Date Of Birth<span class="red">*</span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control comm_sp" id="spouse_age" name="spouse_age" placeholder="dd/mm/yyyy">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Profession" class="col-md-5 control-label pdngrht linehght">Profession (Department)<span class="red"></span></label>
											<div class="col-md-7">
											 <input type="text" class="form-control " id="spouse_proffession" name="spouse_proffession" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Designation" class="col-md-3 control-label pdngrht linehght">Designation<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control " id="spouse_post" name="spouse_post"placeholder="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Posting" class="col-md-5 control-label pdngrht linehght">Place of Posting<span class="red"></span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control " id="spouse_posting_place" name="spouse_posting_place" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Income" class="col-md-3 control-label pdngrht linehght1">Monthly Income<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control " id="spouse_income" name="spouse_income" placeholder="">
											</div>
										  </div>
										  </div>
									</div>
									
									<div class="col-md-12 child_detail" style="display:none;">
									    <h4 style="margin-top:30px;">Children Details <span span data-id="tab_logic9" class="plus add_row17"><a class="add">Add Child</a></span></h4>
										<div class="clearfix"></div>
										<div class="table-responsive mtp mrgin-tp">
											<table class="table table-bordered custm-table" id="tab_logic9">
												<thead>
												<tr>
												<th class="text-center">Name</th>
												<th class="text-center">Gender</th>
												<th class="text-center">Date of Birth</th>
												<th class="text-center">WHETHER MARRIED & SETTLED</th>
												<th class="text-center">WHETHER STUDYING, IF <br/>SO, STATE CLASS</th>
												<th></th>
												</tr>
												</thead>
												<tbody>
												
												<tr id="addr0tab_logic9"  data-id="0" class="hidden">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								
								<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
							</tr>
												</tbody>
											</table>
										</div>	
									</div>
								<div class="clearfix"></div>
									<div class="col-md-12">
										  <div class="form-group">
											<label for="" class="col-md-3 control-label"></label>
											<div class="col-md-9 lftpdng">
												<button data-id="3" class="btn success-btn pull-right next">Next</button>
												
												<button data-id="3" class="btn back-btn pull-right back">Back</button>
											</div>
										  </div>
									</div>
							  </div>
							</div>
						  </div>
						  <div class="panel panel-default">
							<div class="panel-heading">
								<a class="" href="#" data-check="4">
								<h4 class="panel-title">
								<span class="fnt"> 4. Academic Details</span>
								</h4>
								</a>
							</div>
							<div id="collapse4" class="">
							  <div class="panel-body">
								<div class="col-md-12">
								<h4>Academic / Professional Qualifications  <br/>(Starting with highest degree obtained – Examinations from secondary onwards)<span class="red">*</span><span span data-id="tab_logic6" class="plus add_row_exam"><a class="add">Add Qualification</a></span></h4>
								<div class="table-responsive mtp nmargn">
							<table class="table table-bordered custm-table" id="tab_logic6">
								<thead>
									<tr>
										<th class="text-center" rowspan="2">EXAMINATION PASSED (WRITE COMPLETE NAME OF COURSE PASSED)</th>
										<th class="text-center" rowspan="2">YEAR OF PASSING</th>
										<th class="text-center" rowspan="2">SUBJECTS OFFERED</th>
										<th class="text-center" rowspan="2">MEDIUM OF INSTRUCTION</th>
										<th class="text-center" colspan="2">AGGREGATE MARKS</th>
										<th class="text-center" rowspan="2">DIVISION</th>
										<th class="text-center" rowspan="2">SCHOOL/COLLEGE</th>
										<th class="text-center" rowspan="2">BOARD/UNIVERSITY</th>
										<th class="text-center" rowspan="2"></th>
									</tr>
									<tr>
										<th class="text-center">MAX MARKS</th>
										<th class="text-center">MARKS OBTAINED</th>
									</tr>
								</thead>
								<tbody>
									<tr  id="addr0tab_logic6"  data-id="0" class="hidden">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
									<td></td>
									<td></td>
									<td></td>
									<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
								</tr>
							
								</tbody>
							</table>
							    </div>
								<div class="clearfix"></div>
							    </div>
								<div class="col-md-12">
								  <div class="col-md-12 pdngrht">
								  <div class="form-group">
									<label for="Name" class="col-md-5 mblyt control-label pdngrht linehght1 scrn-mrgn">N.C.C./N.S.S./National scout training, if any?</label>
									<div class="col-md-7 mblyt">
									  <input type="text" class="form-control" id="ncc_nss_training" name="ncc_nss_training" placeholder="">
									</div>
								  </div>
								  </div>
								   <div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-5 mblyt control-label pdngrht linehght1 scrn-mrgn">Knowledge of foreign language (Give Details)</label>
										<div class="col-md-7 mblyt">
										  <input type="text" class="form-control" id="Forign_lang_experince" placeholder="" name="Forign_lang_experince">
										</div>
									  </div>
									</div>
									<div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-5 mblyt control-label pdngrht linehght1 scrn-mrgn">Are you techno-savvy?/Computer literate (Give Details)</label>
										<div class="col-md-7 mblyt">
										  <input type="text" class="form-control" id="tachno_savvy" placeholder="" name="tachno_savvy">
										</div>
									  </div>
									</div>
									<div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-5 mblyt control-label pdngrht linehght1 lyft ">Literary, Cultural, Sports or other activities in which the applicant has Distinctions/Awards</label>
										<div class="col-md-7 mblyt">
										  <input type="text" class="form-control" id="awards" placeholder="" name="awards">
										</div>
									  </div>
									</div>
								</div>
								<div class="col-md-12 lftpdng">
												<button data-id="4" class="btn success-btn pull-right next">Next</button>
												<button data-id="4" class="btn back-btn pull-right back">Back</button>
											</div>
							  </div>
							</div>
						  </div>
						    <div class="panel panel-default">
							<div class="panel-heading">
								<a class=""  href="#" data-check="5">
								<h4 class="panel-title">
								 <span class="fnt"> 5. Current Job Details</span>
							  </h4>
							  	</a>
							</div>
							<div id="collapse5" class="">
							  <div class="panel-body">
								<div class="col-md-12">
									  <div class="col-md-7 pdngrht">
										  <div class="form-group">
											<label for="Marital" class="col-md-4 control-label mbhgt"></label>
											<div class="col-md-8 lftpdng">
											  <label class="checkbox-inline algn" >
												  <input type="checkbox" id="chk_exp" name="chk_exp" onclick="chkexp(this.form)" value="Fresher"> I am a fresh passout and have no experience.
												</label>
											</div>
										  </div>
										  </div>
										  </div>
										  <div class="col-md-12 chk_emp_exp ">
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Post" class="col-md-5 control-label pdngrht">Post<span class="red">*</span></label>
											<div class="col-md-7">
											 <select class="form-control" id="present_post" name="present_post">
												  <option value="">Select</option>
												  <option value="CONFIRMED">CONFIRMED</option>
												  <option value="PROBATION">PROBATION</option>
												  <option value="TEMPORARY">TEMPORARY</option>
												</select>
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Post_Type" class="col-md-3 control-label pdngrht">Present Post<span class="red">*</span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="Post_Type" name="Post_Type" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Salery" class="col-md-5 control-label pdngrht linehght">Present Salary (Per Month)<span class="red">*</span></label>
											<div class="col-md-7">
											 <input type="text" class="form-control commonField" id="present_salary" name="present_salary" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="PayBand" class="col-md-3 control-label pdngrht">Pay Band</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="pay_band" name="pay_band" placeholder="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Present_Employer" class="col-md-5 control-label pdngrht linehght">Present Employer<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="present_employee" name="present_employee" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="GradeBand" class="col-md-3 control-label pdngrht linehght">Grade Band</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="grade_pay" name="grade_pay" placeholder="">
											</div>
										  </div>
										  </div>
									</div>
									<div class="col-md-12">
									<div class="col-md-6 pdngrht">
								    <div class="form-group">
									<label for="dependent" class="col-md-5 control-label pdngrht">Are you able to teach through </label>
									  <div class="col-md-7">
												  <label class="radio-inline">
												  <input type="radio" id="eng" value="English" name="teach_status"> English
												</label>
												<label class="radio-inline">
												  <input type="radio" id="hindi" name="teach_status" value="Hindi"> Hindi
												</label>
												<label class="radio-inline">
												  <input type="radio" id="hindi" name="teach_status" value="Punjabi" > Punjabi
												</label>
									  </div>
									</div>
									</div>
									<div class="col-md-6 pdngrht">
										<div class="form-group regional">
											<label class="col-md-3 control-label pdngrht linehght1">Regional Language </label>
										<div class="col-md-9">
										<input type="text"  name="regionalstatus" class="form-control" value="" id="regionalstatus">
										
										</div>
										</div>
									  </div>
								</div>
								<div class="col-md-12">
									<div class="col-md-6 pdngrht">
								    <div class="form-group">
									<label for="dependent" class="col-md-5 control-label pdngrht">Are you CTET/TET qualified  </label>
									  <div class="col-md-7">
												  <label class="radio-inline">
												  <input type="radio" name="ctet_status" id="" value="Yes"> Yes
												</label>
												<label class="radio-inline">
												  <input type="radio" name="ctet_status" id="" value="No" > No
												</label>
									  </div>
									</div>
									</div>
									</div>
									  <div class="col-md-6 pdngrht"></div>
									<div class="col-md-6 pdngrht">
									<label for="GradeBand" class="col-md-3 control-label"></label>
									<div class="col-md-9 lftpdng">
												<button id="btn-5"  data-id="5" data-fresh="false" class="btn success-btn pull-right next fresh_next">Next</button>
												<button data-id="5" class="btn back-btn pull-right back">Back</button>
											</div>
											</div>
							  </div>
							</div>
						  </div>
						   <div class="panel panel-default">
							<div class="panel-heading">
								<a class=""  href="#" data-check="6">
								 <h4 class="panel-title">
								<span class="fnt"> 6. Experience Details</span>
								   </h4>
								</a>
							</div>
							<div id="collapse6" class="">
							  <div class="panel-body">
								<div class="col-md-12">
									 <h4>For teachers post- teaching experience (In recognized schools only) & for vocational courses teaching/work experience <br/>
in an Organization (In chronological order starting with the most recent) <span data-id="tab_logic5" class="plus add_row15"><a class="add nw1">Add Experience</a></span></h4>
									<div class="table-responsive mtp">
										<table class="table table-bordered custm-table" id="tab_logic5">
								<thead>
									<tr>
										<th  class="text-center" rowspan="2">NAME & ADDRESS OF </br>THE INSTITUTION</th>
										<th  class="text-center" rowspan="2">DESIGNATION</th>
										<th class="text-center" colspan="2">PERIOD</th>
										<th class="text-center" rowspan="2">CLASSES/SUBJECTS TAUGHT</th>
										<th class="text-center" rowspan="2">NATURE OF DUTIES</th>
										<th class="text-center" rowspan="2"></th>
									</tr>
									<tr>
										<th class="text-center">From</th>
										<th class="text-center">TO</th>
									</tr>
								</thead>
								<tbody>
								<tr  id="addr0tab_logic5"  data-id="0" class="hidden">
							
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
								</tr>
							 
									<!--<tr>
									
										<td colspan="7">Total Experience :</td>
									</tr>--> 
								</tbody>
							</table>
									</div>
									 <h4>Details of administrative experience, if any: <br/>
                 (As class coordinator, activity coordinator, examination dept. head, CCE coordinator)<span data-id="tab_logic4" class="plus add_row152"><a class="add nw1">Add Experience</a></span></h4>
	                        <div class="table-responsive mtp">
							<table class="table table-bordered custm-table" id="tab_logic4">
								<thead>
									<tr>
										<th class="text-center">NAME OF THE SCHOOL/BOARD</th>
										<th class="text-center">RESPONSIBILITIES HELD</th>
										<th class="text-center">FOR CLASSES</th>
										<th class="text-center">NO. OF YEARS</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>
									<tr  id="addr0tab_logic4"  data-id="0" class="hidden">
							
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
								</tr>
									<!--<tr>
										<td colspan="5">Total Experience :</td>
									</tr>-->
								</tbody>
							</table>
						</div>
						 <h4>Experience of non teaching staff (Administrative/Technical/Clerical/Office Staff/Drivers/Helpers etc.) <span  data-id="tab_logic3" class="plus add_row151"><a class="add nw">Add Experience</a></span></h4>
						 <div class="table-responsive mtp">
							<table class="table table-bordered custm-table" id="tab_logic3">
								<thead>
									<tr>
										<th class="text-center" rowspan="2">NAME, ADDRESS & CONTACT NO. OF THE EMPLOYER</th>
										<th class="text-center" rowspan="2">PROFESSION/</br>BUSINESS</th>
										<th class="text-center" rowspan="2">DESIGNATION/</br>POST</th>
										<th class="text-center" rowspan="2">NATURE OF DUTIES</th>
										<th class="text-center" colspan="2">PERIOD</th>
										<th class="text-center" rowspan="2">MONTHLY SALARY / INCOME</th>
										<th class="text-center"rowspan="2"></th>
									</tr>
									<tr>
										<th class="text-center">Form</th>
										<th class="text-center">TO</th>
									</tr>
								</thead>
								<tbody>
								<tr  id="addr0tab_logic3"  data-id="0" class="hidden">
								
									<td rowspan="2"></td>
									<td rowspan="2"></td>
									<td rowspan="2"></td>
									<td rowspan="2"></td>
									<td></td>
									<td ></td>
									<td></td>
									<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
								</tr>
									<!--<tr>
										<td colspan="9">Total Experience :</td>
									</tr>-->
								</tbody>
							</table>
						</div>
								</div>
								<div class="col-md-12 ">
										  <div class="form-group">
											<label for="Salery" class="col-md-5 control-label pdngrht linehght">If selected, the earliest you can join by (Notice Period)<span class="red">*</span></label>
											<div class="col-md-7">
											 <input type="text" class="form-control commonField"  value=""    name="notice_period">
											</div>
										  </div>
								</div>
								<div class="col-sm-12 lftpdng">
									<button data-id="6" class="btn success-btn pull-right next">Next</button>
									<button  data-id="6" class="btn back-btn pull-right back">Back</button>
								</div>
							  </div>
							</div>
						  </div>
						     
						 <div class="panel panel-default">
							<div class="panel-heading">
								<a class="" href="#" data-check="7">
								<h4 class="panel-title">
								<span class="fnt">7. References</span>
								  </h4>
								</a>
							</div>
							<div id="collapse7" class="">
							  <div class="panel-body">
								 <div class="col-md-12">
										    <h4>First Reference</h4>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Name" class="col-md-5 control-label pdngrht">First Name<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_fname" name="ref_fname" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="LastName" class="col-md-3 control-label pdngrht">Last Name<span class="red">*</span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control commonField" id="ref_lname" name="ref_lname" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Designation" class="col-md-5 control-label pdngrht linehght">Designation<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_designation" name="ref_designation" placeholder="">
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Mobile" class="col-md-3 control-label pdngrht">Mobile<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control " id="ref_mobile" name="ref_mobile" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-5 control-label pdngrht linehght">Address Line 1<span class="red">*</span></label>
											<div class="col-md-7">
											 <input type="text" class="form-control commonField" id="ref_address" name="ref_address" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-3 control-label pdngrht linehght">Address Line 2</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_address2" name="ref_address2" placeholder="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="City" class="col-md-5 control-label pdngrht">City<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_city" name="ref_city" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Pin" class="col-md-3 control-label pdngrht">Pin</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_Pin" name="ref_Pin" placeholder="">
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="State" class="col-md-5 control-label pdngrht">State<span class="red">*</span></label>
											<div class="col-md-7">
											   <select class="form-control commonField" name="ref_state" id="ref_state">
												  <option value="">Select</option>
												  <?php 
							
							$select_state="SELECT * FROM state";
							$rows_state=mysql_query($select_state);
							 $r=mysql_num_rows($rows_state);
							while($row=mysql_fetch_array($rows_state))
							{
							?>
							<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName']; ?></option>
							<?php 
							}  
							?>
							 <option value="Other">OTHER</option>
												</select>
											</div>
										  </div>
										  </div>
									
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Telephone" class="col-md-3 control-label pdngrht">Telephone</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_ph" name="ref_ph" placeholder="">
											</div>
										  </div>
										  </div>
										 
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Email" class="col-md-5 control-label pdngrht">Email<span class="red"></span></label>
											<div class="col-md-7">
											  <input type="email" class="form-control" id="ref_email" name="ref_email" placeholder="">
											</div>
										  </div>
										  </div>
										  
									</div>
									<div class="col-md-12">
										    <h4>Second Reference</h4>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Name" class="col-md-5 control-label pdngrht">First Name<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_fname1" name="ref_fname1"placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="LastName" class="col-md-3 control-label pdngrht">Last Name<span class="red">*</span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control commonField" id="ref_lname1" name="ref_lname1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Designation" class="col-md-5 control-label pdngrht">Designation<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_designation1" name="ref_designation1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Mobile" class="col-md-3 control-label pdngrht">Mobile<span class="red"></span></label>
											<div class="col-md-9">
											  <input type="text" class="form-control " id="ref_mobile1" name="ref_mobile1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-5 control-label pdngrht linehght">Address Line 1<span class="red">*</span></label>
											<div class="col-md-7">
											 <input type="text" class="form-control commonField" id="ref_address1" name="ref_address1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Address" class="col-md-3 control-label pdngrht linehght">Address Line 2</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_address12" name="ref_address12" placeholder="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="City" class="col-md-5 control-label pdngrht">City<span class="red">*</span></label>
											<div class="col-md-7">
											  <input type="text" class="form-control commonField" id="ref_city1" name="ref_city1" placeholder="">
											</div>
										  </div>
										  </div>
										  <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Pin" class="col-md-3 control-label pdngrht">Pin</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_Pin1" name="ref_Pin1" placeholder="">
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="State" class="col-md-5 control-label pdngrht">State<span class="red">*</span></label>
											<div class="col-md-7">
											   <select class="form-control commonField" name="ref_state1" id="ref_state1">
												  <option value="">Select</option>
												 <?php 
							
							$select_state="SELECT * FROM state";
							$rows_state=mysql_query($select_state);
							 $r=mysql_num_rows($rows_state);
							while($row=mysql_fetch_array($rows_state))
							{
							?>
							<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName']; ?></option>
							<?php 
							}  
							?>
							 <option value="Other">OTHER</option>
												</select>
											</div>
										  </div>
										  </div>
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Telephone" class="col-md-3 control-label pdngrht">Telephone</label>
											<div class="col-md-9">
											  <input type="text" class="form-control" id="ref_ph1" name="ref_ph1" placeholder="">
											</div>
										  </div>
										  </div>
										  
										   <div class="col-md-6 pdngrht">
										  <div class="form-group">
											<label for="Email" class="col-md-5 control-label pdngrht">Email<span class="red"></span></label>
											<div class="col-md-7">
											  <input type="email" class="form-control" id="ref_email1" name="ref_email1" placeholder="">
											</div>
										  </div>
										  </div>
										  
									</div>
									<div class="col-md-12 lftpdng">
									<button data-id="7" class="btn success-btn pull-right next">Next</button>
									<button data-id="7" class="btn back-btn pull-right back">Back</button>
								</div>
							  </div>
							</div>
						  </div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<a class="" href="#" data-check="8">
								 <h4 class="panel-title">
								<span class="fnt">8.  Accommodation Details</span>
								 </h4>
								</a>
							</div>
							<div id="collapse8" class="">
							  <div class="panel-body">
							  <div class="col-md-12 show_memb text-center">
										  <div class="form-group">
											  <label class="checkbox-inline" >
												  <input type="checkbox" id="chk_member" name="chk_member" onclick="chkmember(this.form)" value="nomember">No family member will stay with me in the accommodation to be provided.
												</label>
										  </div>
										  </div>
								<div class="col-md-12 chk_memb">
									 <h4>Dependent member(s) of family to stay with the candidate (Other than spouse & dependent children) <span data-id="tab_logic2" class="plus add_row7"><a  class="add nw">Add Dependent Member</a></span></h4>
									<div class="table-responsive mtp">
										<table class="table table-bordered custm-table" id="tab_logic2">
								<thead>
									<tr>
										<th class="text-center"colspan="2">NAME</th>
										<th class="text-center" colspan="2">Date of Birth / AGE</th>
										<th class="text-center" colspan="2">Relationship</th>
										<th colspan="2" class="text-center">OCCUPATION WITH</br> MONTHLY INCOME</th>
										<th colspan="2" class="text-center">ECONOMICALLY OR</br> PHYSICALLY DEPENDENT OR</br> ANY OTHER JUSTIFICATION OF</br> THEIR STAY</th>
										<th colspan="2" class="text-center">ANY CHRONIC ILLNESS</br>OR</br> PHYSICAL DISABILITY</th>
										<th colspan="2"></th>
									</tr>
								</thead>
								<tbody>
									<tr  id="addr0tab_logic21"  data-id="0" class="hidden">
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
									</tr>
									</tbody>
							    </table>
									</div>
								<div class="row">
									<div style="display:none;" class="col-md-12 dep_memb">
									<label for="dependent" class="col-md-6 control-label pdngrht linehght1" style="text-align:left;padding-left:0px;">For dependent parents: state if he/she is the only child of parents:</label>
									  <div class="col-md-4" style="margin-top:-3px">
												  <label class="radio-inline">
												  <input type="radio" name="dependent" id="" value="yes"> Yes
												</label>
												<label class="radio-inline">
												  <input type="radio" name="dependent" id="" value="NO" > No
												</label>
									  </div>
									</div>
								</div>
										 <h4>Whether accommodation required (state number of family members)<span data-id="tab_logic1" class="plus add_row4"><a class="add nw" >Add Accommodation</a></span></h4>
										 <div class="table-responsive">
							<table class="table table-bordered custm-table " id="tab_logic1">
								<thead>
									<tr>
										<th class="text-center" colspan="2">NAME</th>
										<th class="text-center" colspan="2">Relation</th>
										<th class="text-center"colspan="2">Will live in Dera(Yes/No)</th>
										<th class="text-center" colspan="2">ANY CHRONIC ILLNESS OR </br>PHYSICAL DISABILITY</th>
										<th class="text-center" colspan="2"></th>
									</tr>
								</thead>
								<tbody>
									<tr  id="addr0tab_logic1"  data-id="0" class="hidden">
									
										<td colspan="2"></td>
										<td colspan="2"></td>
										
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
									</tr>
								</tbody>
							</table>
						</div>
									</div>
									<div class="col-md-12 lftpdng">
												<button data-id="8" class="btn success-btn pull-right next">Next</button>
												<button data-id="8" class="btn back-btn pull-right back">Back</button>
											</div>
							  </div>
							</div>
						  </div>
						   <div class="panel panel-default">
							<div class="panel-heading">
								<a class=""  href="#" data-check="9">
								 <h4 class="panel-title">
								<span class="fnt">9. Other Information</span>
								 </h4>
								</a>
							</div>
							<div id="collapse9" class="">
							  <div class="panel-body">
								<div class="col-md-12">
								
						<div class="col-md-12 pdngrht">
								  <div class="form-group">
									<label for="Name" class="col-md-6 control-label linehght1" style="padding-top:0px;">Is any criminal case pending against you?<span class="red">*</span></label>
									<div class="col-md-6 lftpdng mtpn">
											  <label class="radio-inline">
											  <input type="radio" name="criminal_case" id="case_yes" value="Yes" onclick="ch2()"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="criminal_case" id="case_no" value="No" onclick="ch2()"> No
											</label>
											</div>
											<div class="col-md-8 lftpdng c_case" style="margin-top:-20px;"></div>
										<div class="col-md-12">
					<div id="case_detail" style="display:none;"  class="form-group">
					<label for="Name" class="col-md-6 control-label linehghtt2 lyft">(If Yes, Please Give Details):<span class="red">*</span></label>
						<div class="col-md-6 lftpdng">
										  <input type="text" class="form-control mtsm commonField" id="casedetail" name="case_detail" placeholder="">
										</div>
					</div>
				</div><!--col-md-12-->
								  </div>
								  </div>
								   <div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-6 control-label linehght1">Have you ever been convicted in a criminal charge by any court?<span class="red">*</span></label>
										<div class="col-md-6 lftpdng">
											  <label class="radio-inline">
											  <input type="radio" name="criminal_charge" id="charge_yes" value="Yes" onclick="ch3()"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="criminal_charge" id="charge_no" value="No" onclick="ch3()"> No
											</label>
											</div>
											<div class="col-md-8 lftpdng c_charge " style="margin-top:-20px;"></div>
											<div class="col-md-12">
					<div id="charge_detail" style="display:none;"  class="form-group">
					<label for="Name" class="col-md-6 control-label linehght1 lyft">(If Yes, Please Give Details):<span class="red">*</span></label>
						<div class="col-md-6 lftpdng">
										  <input type="text" class="form-control mtsm commonField" id="chargedetail" name="charge_detail" placeholder="">
										</div>
					</div>
				</div><!--col-md-12-->
									  </div>
									  
									</div>
									<div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-6 control-label linehght1 lyft">Have you earlier applied for sewa in dera or for employment in pathseekers/RSSB/
Hospital units of MJSMRS or any other society of Dera (Details Thereof)?<span class="red">*</span></label>
										<div class="col-md-6 lftpdng">
											  <label class="radio-inline">
											  <input type="radio" name="earlier_employed" id="earlier_employed_yes" value="Yes" onclick="ch4()"> Yes
											</label>
											<label class="radio-inline">
											  <input type="radio" name="earlier_employed" id="earlier_employed_no" value="No" onclick="ch4()"> No
											</label>
											</div>
											<div class="col-md-8 lftpdng c_apply" style="margin-top:-20px;"></div>
													<div class="col-md-12">
					<div id="earlier_employed_detail" style="display:none;"  class="form-group">
					<label for="Name" class="col-md-6 control-label linehght1 lyft"></label>
						<div class="col-md-6 lftpdng">
										  <input type="text" class="form-control mtsm commonField" id="earlier_employed1" name="earlier_employed_detail" placeholder="">
										</div>
					</div>
				</div><!--col-md-12-->
									  </div>
									</div>
									<div class="col-md-12  pdngrht linehght1 mtp">
									 <h4>Specify, if spouse/parents/any other relative doing sewa in dera or is employee/sewadar in the school or hospital units of MJSMRS <span data-id="tab_logic"  class="plus add_row41"><a class="add nw1">Add Member</a></span></h4>
									<div class="table-responsive mtp">
										<table class="table table-bordered custm-table " id="tab_logic">
											<thead>
											    <tr>
													<th class="text-center" colspan="2">NAME</th>
													<th class="text-center" colspan="2">AGE</th>
													<th class="text-center" colspan="2">ADDRESS</th>
													<th class="text-center" colspan="2">Relation</th>
													<th class="text-center" colspan="2">DEPARTMENT</th>
													<th class="text-center" colspan="2">DATE OF JOINING</th>
													<th class="text-center" colspan="2">H/P</th>
													<th class="text-center" colspan="2">MONTHLY SALARY</th>
													<th colspan="2"></th>
												</tr>
											</thead>
											<tbody>
									<tr  id="addr0tab_logic" data-id="0" class="hidden">
									
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td colspan="2"></td>
										<td data-name="del">
										<span class="del row-remove"><img src="images/delete.png" /></span>
									</td>
									</tr>
								</tbody>
										</table>
									</div>
									</div>
									<div class="col-md-12 pdngrht">
									  <div class="form-group">
										<label for="Name" class="col-md-5 control-label ">	Any other information (Date of Initiation)?</label>
										<div class="col-md-7 lftpdng">
										  <input type="text" class="form-control" id="other_info" name="other_info" placeholder="">
										</div>
									  </div>
									</div>
									<div class="dependent-box">
					<div class="col-md-12">
					<h4>Declaration By The Candidate</h4>
					<p>I hereby declare that the information provided by me in the application is true, complete and correct to the best of my knowledge and belief and that nothing has been concealed or distorted. If at any time, I am found to have concealed/distorted any information or given any false statement, my application/appointment shall liable to be summarily rejected/terminated without notice.</p>
					</div>
					<div class="clearfix"></div>
					 <div class="col-md-12 mtp">
					 
						
					<div class="col-md-12" style="margin-top:10px;">
					<div class="row">
						   <div class="col-md-4 col-md-ow pdngrht lftpdng">
						  <div class="form-group">
							<label for="Place" class="col-md-2 control-label text-left pdngrht mblyt">Place<span class="red">*</span></label>
							<div class="col-md-10 lftpdng mblyt">
							  <input type="text" class="form-control commonField" id="sub_place" name="sub_place" placeholder="">
							</div>
						  </div>
						  </div>
						  <div class="col-md-7 col-md-tt pdngrht ">
						  <div class="form-group" style="">
								<button id="submit_form" class="btn success-btn pull-right next sub">Register</button>
							    <button data-id="9" class="btn back-btn pull-right back">Back</button>
						  </div>
						  </div>
					</div>
				  </div>
				 
				  </div>
				 
				  <div class="col-md-12 mtp">
					<h4>Note</h4>
					<p class="nt">1. Degrees, Testimonials, Divorce Papers and Certificates need to be provided when asked.<br/>
						2. Only shortlisted applications will be acknowledged.<br/>
						3. Applicant called for interview to come at her/his own expense.<br/>
						4. Medical check-up will be mandatory for all the family members and dependent children.</p>
					</div>
				</div>
				
									</div>
							  </div>
							</div>
						  </div>
						  </form>
						</div>
					</div><!----form-main---->
					</div><!----col-md-12---->
			
			
			</div>
			<br/><br/><br/>
		
			<footer>
			® All Rights Reserved.
			</footer>
			
</div><!--wrapper-->
		<div id='loadingmessage' style='display:none'><img src='images/Floatingrays.gif'/></div>
  <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
<script src="js/custom.validation.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script>
$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find("a").removeClass("collapsed");
}).on('hidden.bs.collapse', function(){
$(this).parent().find("a").addClass("collapsed");
});
</script>

<script>
$(document).ready(function(){	
$.validator.addMethod("usernameRegex", function(value, element) {
                return this.optional(element) || /^[^\s][a-zA-Z ]*$/i.test(value);
            }, "Name must contain letters only");
			$.validator.addMethod("numberRegex", function(value, element) {
                return this.optional(element) || /^[0-9 ]*$/i.test(value);
            }, " Field must contain numbers only");
			$.validator.addMethod("numberrRegex", function(value, element) {
                return this.optional(element) || /^[0-9?=.*!@#$%^&*]*$/i.test(value);
            }, " Field must contain numbers only");
    
var check = 1;
var m = 0;
$('.next').click(function(e){
    e.preventDefault();
	 
	 // adding rules for inputs with class 'comment'
             $('.commonField').each(function() {
				
                $(this).rules("add", 
                    {
                        required: true,
							messages: {
							required: "Required."
							}
                    })
            });             

			 $('td.condRequired').each(function(){
				 var type = $(this).children().first().prop('tagName');
				if(type=='INPUT')
				{
					
				 var val = $(this).children('input').val();
				if(val!="")
				{
					var parentTr = $(this).parent('tr');
					
					$(parentTr).find('input').each(function(index, ele){
					var inputValue = $(ele);
				if($(inputValue).parent('td').hasClass('condRequired'))
				{
					
				}
				else{
                 $(inputValue).rules("add", 
                    {
                        required: true,
                    	messages: {
							required: "Required"
							}
						}); 
				}
					})	
					
					
					$(parentTr).find('select').each(function(index, ele){
					var inputValue1 = $(ele);
				
                 $(inputValue1).rules("add", 
                    {
                        required: true,
                    	messages: {
							required: "Required"
							}
						}); 
					})
					
				}
				else{
					var parentTr = $(this).parent('tr');
					
					$(parentTr).find('input[type="text"]').each(function(index, ele){
					var inputValue = $(ele);
				
                 $(inputValue).rules("remove"); 
			
					});
					
						 $(parentTr).remove();
				}
				}
				else{
					 var val = $(this).children('select').val();
				if(val!="")
				{
					var parentTr = $(this).parent('tr');
					$(parentTr).find('input').each(function(index, ele){
					var inputValue = $(ele);
				
                 $(inputValue).rules("add", 
                    {
                        required: true,
						messages: {
							required: "Required"
							}
                    
						}); 
					})
					
				}
					else{
					var parentTr = $(this).parent('tr');
					
					$(parentTr).find('input[type="text"]').each(function(index, ele){
					var inputValue = $(ele);
				
                 $(inputValue).rules("remove"); 
			
					});
				
					$(parentTr).remove();
						 $(".add-experience").hide();
				}
				}
				
			}) 
        
    var sectionValid = true;

    var collapse = $(this).closest('.panel-collapse.collapse');
	var data_next_top = $(this).attr('data-id');
	
	var numOfVisibleRows = $('#tab_logic6').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;		
	if(data_next_top==='4' && numOfVisibleRows==2)
	{
		sectionValid = false;
		
	}
	if(data_next_top==='4')
	{
	alert('Please ensure that you have added your complete education as it may affect your eligibility.');	
	}

	var numOfVisibleRowss = $('#tab_logic5').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;
var numOfVisibleRowsss = $('#tab_logic4').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;

var numOfVisibleRowssss = $('#tab_logic3').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;
if(data_next_top==='6')
{
	if(numOfVisibleRowss==2 || numOfVisibleRowsss==1 || numOfVisibleRowssss==2)
			{
 				var type1 = $("#tab_logic5").find('tbody').find('tr').next().find('input:first-child').val();
				var type2 = $("#tab_logic4").find('tbody').find('tr').next().find('input:first-child').val();
				var type3 = $("#tab_logic3").find('tbody').find('tr').next().find('input:first-child').val();

				if((typeof type1==="undefined" || type1==='') && (typeof type2==="undefined" || type2==='') && (typeof type3==="undefined" || type3===''))
							{
							
								sectionValid = false;
								alert('Please ensure that you have added your complete experience as it may affect your eligibility.');
							}
							else{
									alert('Please ensure that you have added your complete experience as it may affect your eligibility.');	
							}
 			 
}		
		}

	var data_next_topp = $(this).attr('data-id');
	var VisibleRows = $('#tab_logic2').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;	
var VisibleRow = $('#tab_logic1').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;	

	if(data_next_topp==='8')
	{
		var mrd_status = $( "#status option:selected" ).text();
		if(mrd_status=='Un-married')
		{
			if($("#chk_member").is(':checked'))
			{
				
			}
				else{
					 var type = $("#tab_logic2").find('tbody').find('tr').next().find('input:first-child').val();
								var type2 = $("#tab_logic1").find('tbody').find('tr').next().find('input:first-child').val();
					if(VisibleRows==1 || VisibleRow==1)
						{
							if((typeof type==="undefined" || type==='') && (typeof type2==="undefined" || type2===''))
							{
							
								sectionValid = false;
								alert('Please check either checkbox or fill the details.');
							}
							else{
								
							}
						}
				}
		}
		else{
			if(VisibleRows==1 || VisibleRow==1)
			{
				var type1 = $("#tab_logic2").find('tbody').find('tr').next().find('input:first-child').val();
				var type2 = $("#tab_logic1").find('tbody').find('tr').next().find('input:first-child').val();
			
				if((typeof type1==="undefined" || type1==='') && (typeof type2==="undefined" || type2===''))
							{
							
								sectionValid = false;
								alert('Please fill the required detail to continue.');
							}
							else{
								
							}
 			
			}
		}
		
		
	}
    $.each(collapse.find('input, select, textarea'), function(){
        if(!$(this).valid()){
            sectionValid = false;
        }
		else{
			 $(this).parent().find('label').removeClass('has-error1');
		}
    });
    if(sectionValid){
		
		if($(this).attr('id')==="submit_form")
		{ 
		var response = grecaptcha.getResponse();

if(response.length == 0)
{
   $(".response_res").show();
   setTimeout(function(){
		$(".response_res").hide("slow");
			}, 5000);
}
else
{
 $(".response_res").hide();
	 

	var se_country = $('#comm_country').val();
	var se_state = $('#comm_state').val();
			$('#loadingmessage').show();
			$('.sub').prop("disabled", true);
			 var formData = new FormData($('#ticketForm')[0]);
			 formData.append("comm_country1",se_country);
			 formData.append("comm_state1",se_state);
			 $.ajax({
				
                type:"POST",
                data: formData,
                url:"clone.php",
				  //async: false,
				
                success: function(data) {
				
						$('#loadingmessage').hide();  // show the loading message.
					var data = JSON.parse(data);
					alert(data.message);
				$("#ticketForm").trigger('reset');
				$('.sub').prop("disabled", false);
			window.location='index.php';
		},
		
		cache: false,
                        contentType: false,
                        processData: false
		 });
		}
	}
		else{
		var data_next = $(this).attr('data-id');
		if(parseInt(data_next)===parseInt(check))
		{
		  check++;
		}
		if(data_next==5)
		{
			if($(this).attr('data-fresh')=='true')
			{
				collapse.collapse('toggle');
				collapse.parents('.panel').next().next().find('.panel-collapse.collapse').collapse('toggle');
				if(m==0)
				{
					check++;
				}
				m++;
			}
			else{
				collapse.collapse('toggle');
				collapse.parents('.panel').next().find('.panel-collapse.collapse').collapse('toggle');
			}
		}
		else{
			collapse.collapse('toggle');
			collapse.parents('.panel').next().find('.panel-collapse.collapse').collapse('toggle');
		}
		}
		if(data_next==3)
		{
			var checkk=0;
			  $("#tab_logic1").find('tbody').find('tr').each(function(ind, valu){
				if(checkk!=0) $(valu).remove();  
				checkk++;
			});  
			
			var status = $('#status').val();
			if(status === 'Married' || status==='Divorcee' || status==='Widower')
			{
				
				if(status==='Married')
				{
					var spouse = $('#spouse_name').val();
					
					$(".add_row4").trigger("click");
						
					$("#tab_logic1").find('tbody').find('tr').next().find('td:first-child').find('input').val(spouse);	
					$("#tab_logic1").find('tbody').find('tr').next().find('td:nth-child(2)').find('input').val('Spouse');
					$("#tab_logic1").find('tbody').find('tr').next().find('td:nth-child(5)').remove();
					 
					
					
				}
					$('input[name^="0tab_logic9"]').each(function(indexx,val) {
						$(".add_row4").trigger("click");
						$("#tab_logic1").find('tbody').find('tr').each(function(index, ele){
						var inputValue = $(ele);
						if($(inputValue).find('td:first-child').find('input').val()=="")
						{
							$(inputValue).find('td:first-child').find('input').val($(val).val());
							$(inputValue).find('td:nth-child(2)').find('input').val("Child");
							$(inputValue).find('td:nth-child(5)').remove();	 
						}
					});
					});
			}
			
		}
		
    }	
});
$('.toggle_link').click(function(e){
    e.preventDefault();
	 
	var link_id = $(this).attr('data-check');
	if(link_id=='6' && $('.fresh_next').attr('data-fresh')=='true')
	{
		
	}else{
		if(parseInt(link_id)<=parseInt(check))
	
	{
	//$('#collapse'+id2).collapse('toggle');
    $('#collapse'+link_id).collapse('toggle');
	}
	}
});

$('.back').click(function(e){
    e.preventDefault();
	var id = $(this).attr('data-id');
	var id2 = parseInt(id) - parseInt(1);
    
	if($(this).attr('data-id')==7)
		{
			
			if($('#btn-5').attr('data-fresh')=='true')
			{
				
				var id3 = parseInt(id)-parseInt(2);
				$('#collapse'+id3).collapse('toggle');
				$('#collapse'+id).collapse('toggle');
			}
			else{
				$('#collapse'+id2).collapse('toggle');
    $('#collapse'+id).collapse('toggle');
			}
		}
		else{
			$('#collapse'+id2).collapse('toggle');
    $('#collapse'+id).collapse('toggle');
		}
	
});
$("#ticketForm").validate({
  
    errorClass: "error text-warning",
    validClass: "success text-success",
    highlight: function (element) {
      
    $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-erro  has-feedback');
    },
	success: function(element) {
	  element
    .closest('.form-group').find("i").remove();
    element
    .closest('.form-group').removeClass('has-error has-erro  has-feedback error').addClass('has-success has-succ has-feedback');
  }
	,
    rules: {
		file1: {
                required: true,
				extension: "jpeg|jpg|png",
				
                
            }, 
		f_name: {
			required:true,
			  usernameRegex: true,
			
		},
        l_name: {
			required:true,
			  usernameRegex: true,
		},
        
        mail: {
            required: true,
            email: true,
        },
        apply_post: {
                required: true, 
            },
			person_dob: {
              required:true,
			 },
			 mnum:{
				 
				 maxlength:12,
				 minlength:10,
				 numberRegex:true,
			 },
			 husband_father:{
				 required:true,
				
			 },
			 person_father:{
				 required:true,
				 usernameRegex: true,
				
			 },
			 person_husband:{
				 required:true,
				 usernameRegex: true,
				
			 },
			 nationality:
			 {
				 required:true,
			 },
			 domicile:{
				 required:true,
			 },
			 gender:{
				 required:true,
			 },
			 addrr:{
				 required:true,
			 },
			 comm_addrr:{
				 required:true,
			 },
			 city1:{
				 required:true,
			 },
			comm_city1:{
				 required:true,
				 
			 },
			 comm_country:{
				 required:true,
				 messages: {
							required: "Required."
							}
			 },
			 mobile1:{
				 
				 maxlength:12,
				 minlength:10,
				 numberRegex:true,
			 },
			notice_period:{
				
				 required:true,
			},
			 telephone1:{
				
				 maxlength:12,
				 minlength:10,
				 numberRegex:true,
			 },
			 comm_telephone:{
				
				 maxlength:12,
				 minlength:10,
				 numberRegex:true,
			 },
			 pin1:{
				
				 maxlength:6,
				 minlength:6,
				 numberRegex:true,
			 },
		comm_pin:{
				 
				 maxlength:6,
				 minlength:6,
				 numberRegex:true,
			 },
			 state1:
			 {
				 required:true,
			 },
			 country1:{
				 required:true,
			 },
			 status:
			 {
				 required:true,
			 },
			 present_post:
			 {
				 required:true,
			 },
			 Post_Type:
			 {
				 required:true,
			 },
			 criminal_charge:{
				 required:true,
			 },
			 criminal_case:{
				 required:true,
			 }, 
			 earlier_employed:{
				 required:true,
			 },
			 ref_Pin:{
				maxlength:6,
				 minlength:6,
				 numberRegex:true, 
			 },
			 ref_Pin1:{
				maxlength:6,
				 minlength:6,
				 numberRegex:true, 
			 },
			 ref_email:{
				 email:true,
			 },
			 ref_email1:{
				email:true, 
			 },
			 ref_mobile:{
				 maxlength:12,
				 minlength:10,
				 numberRegex:true, 
			 },
			 ref_mobile1:{
				  maxlength:12,
				 minlength:10,
				 numberRegex:true, 
			 },
			 ref_fname:{
				usernameRegex: true, 
			 },
			 ref_lname:{
				 usernameRegex: true,
			 },
			 ref_fname1:{
				 usernameRegex: true,
			 },
			 ref_lname1:{
				 usernameRegex: true,
			 },
			 spouse_income:{
				 numberrRegex:true,
			 },
			 present_salary:{
				 numberrRegex:true,
			 }
			 
    },
		 messages: {
     file1: {
       extension: "Please Upload The Image In jpeg or png Format. "
	 }
     },
	errorPlacement: function(error, element){
		if(element.attr('name')=='file1')
			{
				error.appendTo('.pic_pro');
			}
			else if(element.attr('name')=='criminal_case')
			{
				error.appendTo('.c_case');
			}
			else if(element.attr('name')=='criminal_charge')
			{
				error.appendTo('.c_charge');
			}
			else if(element.attr('name')=='earlier_employed')
			{
				error.appendTo('.c_apply');
			}
			else if(element.attr('name')=='husband_father')
			{
				error.appendTo('.errhf');
			}
			else{
				error.insertAfter(element);
			}
		},
	
    // submitHandler: function (form) {
        // var a = $(form).serialize();
        // alert(a);
    // },
});
});


</script>
  <script>
  
	   function keyCheck(){
  	$('input').live('keyup',function(){
    var tmpval = $(this).val();
	
  if($(this).valid()){
          $(this).parent().find('label').removeClass('has-error1');
		 
        }
		else
		{
			
			if($(this).parent('td').hasClass('condRequired'))
			{
           $(this).parent().find('label').remove();
			}
			else{
			$(this).parent().find('label').addClass('has-error1');
			}
			
		}
});
$('select').live('change',function(){
    var tmpval = $(this).val();
  if($(this).valid()){
          $(this).parent().find('label').removeClass('has-error1');
		 
        }
		else
		{
			$(this).parent().find('label').addClass('has-error1');
			
		}
});
	
  }
  $("input:file").live('change',function (){
         var fileName = $(this).val();
		 if($(this).valid()){
     	  $(this).parent().parent().next().find('label').removeClass('has-error1');
		 }else
		 {
			 
			$(this).parent().parent().next().find('label').removeClass('has-error1');
			 
		 }
     });

   $(document).ready(function(){
	   $('#status').on('change',function(){
		   var i= $('#status').val();
		   if(i=="Married")
		   {
			   $(".show_memb").hide();
			    $(".spouse_detail").show();
			    $(".child_detail").show();
			  $('.comm_sp').each(function() {
                $(this).rules("add", 
                    {
                        required: true
                    })
              });   
		   }
		   else if(i=="Divorcee" || i=="Widower")
		   {
			   $(".show_memb").hide();
			   $(".spouse_detail").hide(); 
			 $(".child_detail").show();  
		   }
		    else if(i=="Widower")
		   {
			    $(".show_memb").hide();
			   $(".spouse_detail").hide(); 
			 $(".child_detail").show();  
		   }
		   else{
			        $(".show_memb").show();  
			        $(".spouse_detail").hide();  
					$(".child_detail").hide(); 
					 $('.comm_sp').each(function() {
						 $(this).rules("remove");
			$(this).removeClass("error");
			$(this).removeClass("text-warning");
			});  
		   
	   }
	   
   })
   });
   </script> 
	<script>
$(function() {
  var transition = false;
  var $active = true;

  $('.panel-heading > a').click(function(e) {
    e.preventDefault();
  });
  
  $('#accordion').on('show.bs.collapse',function(){
    if($active){
    	$('#accordion .in').collapse('hide');
    }
  });
  
  $('#accordion').on('hidden.bs.collapse',function(){
    if(transition){
      	transition = false;
    	$('.panel-collapse').collapse('show');
    }
  });

  $('.collapse-init').on('click', function() {
    $('.collapse-init').prop('disabled','true');
    if(!$active) {
      $active = true;
      $('.panel-heading > a').attr('data-toggle', 'collapse');
      $('.panel-collapse').collapse('hide');
      $(this).html('Click to disable accordion behavior');
    } else {
      $active = false;
      if($('.panel-collapse.in').length){
        transition = true;
      	$('.panel-collapse.in').collapse('hide');       
      }
      else{
      	$('.panel-collapse').collapse('show');
      }
      $('.panel-heading > a').attr('data-toggle','');
      $(this).html('Click to enable accordion behavior');
    }
    setTimeout(function(){
  	    $('.collapse-init').prop('disabled','');
    },800);
  });
});

</script>
<script>
$(document).ready(function() {
   
//========================children detail===========================
 $(".add_row17").on("click", function() {
	 
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td ></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
				var val = newid-1;
				if(field_name==1)
				{
					 var td = $("<td><select class=' form-control  "+field_name+" tbl17"+field_name+" memb"+field_name+""+newid+" helo"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'><option value='' >Select</option><option value='M' >Male</option><option value='F'>Female</option></select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else if(field_name==3)
				{
					 var td = $("<td><select class=' form-control  "+field_name+" tbl17"+field_name+" memb"+field_name+""+newid+" helo"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'><option value='' >Select</option><option value='Yes' >Yes</option><option value='No'>No</option></select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else{
					var val = newid-1;
					
				if(field_name==0)
					{
							
						 var td = $("<td class='condRequired'><input type='text' class='tb_input "+field_name+" tbl17"+field_name+" memb"+field_name+""+newid+" helo"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
					}
					else{
						 var td = $("<td><input type='text' class='tb_input "+field_name+" tbl17"+field_name+" memb"+field_name+""+newid+" helo"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
					}
					
               
            }
			}
			
			field_name++;
        });
        
        
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
	show_place();	
	keyCheck();
});
//============================accomodation required========================
    $(".add_row4").on("click", function() {
		
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td colspan='2'></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
					var val = newid-1;
				if(field_name==2)
				{
				
					 var td = $("<td colspan='2'><select class='valid tb_input' name='"+field_name+""+table_id+"["+val+"]"+"'><option value=''>SELECT</option><option value='Yes'>YES</option><option value='No'>NO</option> </select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else{
					var val = newid-1;
				if(field_name==0)
					{
							
						var td = $("<td colspan='2' class='condRequired'><input type='text' class='tb_input "+field_name+" tbl4"+field_name+" member4"+field_name+""+newid+" hello4"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>",  {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td colspan='2'><input type='text' class='tb_input "+field_name+" tbl4"+field_name+" member4"+field_name+""+newid+" hello4"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>",  {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
				
					
				}
            }
			field_name++;
        });
        
       
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
		keyCheck();
});
//========================specify spouse================================
$(".add_row41").on("click", function() {
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td colspan='2'></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
				var val = newid-1;
				if(field_name==6)
				{
					 var td = $("<td colspan='2'><select class='valid tb_input' name='"+field_name+""+table_id+"["+val+"]"+"'><option value=''>Select</option><option value='Honorary'>Honorary</option><option value='Parshadi'>Parshadi</option> </select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else{
					
					
				if(field_name==0)
					{
							
						var td = $("<td colspan='2'   class='condRequired'><input type='text' class='tb_input "+field_name+" tbl41"+field_name+" member41"+field_name+""+newid+" hello41"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td colspan='2'><input type='text' class='tb_input "+field_name+" tbl41"+field_name+" member41"+field_name+""+newid+" aaa"+field_name+" hello41"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					
               
            }
			}
			field_name++;
        });
        
      
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
	show_place();
keyCheck();	
});

//===============================dependent member=====================
   $(".add_row7").on("click", function() {
        // Dynamic Rows Code
		$('.dep_memb').show();
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td colspan='2'></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
				var val = newid-1;
				if(field_name==0)
					
					{
							
						var td = $("<td colspan='2' class='condRequired'><input type='text' class='tb_input "+field_name+" tbl7"+field_name+" member"+field_name+""+newid+" hello"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>",  {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td colspan='2'><input type='text' class='tb_input "+field_name+" tbl7"+field_name+" member"+field_name+""+newid+" hello"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>",  {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
				
            }
			field_name++;
        });
        
      
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
			  var VisibleRows = $('#tab_logic2').find('tr').filter(function() {
  return $(this).css('display') !== 'none';
}).length;	
if(VisibleRows==1)
{
	$('.dep_memb').hide();
}
else{
	$('.dep_memb').show();
}
			 
        });
	show_place();
keyCheck();	
});

//====================================teaching experience=================
$(".add_row15").on("click", function() {
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
				
				var val = newid-1;
				if(field_name==0)
					{
							
						var td = $("<td class='condRequired'><input type='text'  data-new="+newid+" class='tb_input addattr "+field_name+" tbl5"+field_name+" member15"+field_name+""+newid+"  hello15"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td><input data-new="+newid+" type='text' class='tb_input addattr "+field_name+" tbl5"+field_name+" member15"+field_name+""+newid+"  hello15"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
            }
			field_name++;
        });
        
      
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
		show_place();
		keyCheck();
});
//===================non teaching===========================

$(".add_row151").on("click", function() {
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
					var val = newid-1;
				if(field_name==0)
					{
							
						var td = $("<td rowspan='1'   class='condRequired'><input type='text' data-new="+newid+" class=' tb_input addattr "+field_name+" tbl51"+field_name+" member151"+field_name+""+newid+" hello151"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td rowspan='1'><input type='text' data-new="+newid+" class='tb_input addattr "+field_name+" tbl51"+field_name+" member151"+field_name+""+newid+" hello151"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
				
				
                
            }
			field_name++;
        });
        
      
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
		show_place();
		keyCheck();
});

//=================adminstrative===============================

$(".add_row152").on("click", function() {
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
				var val = newid-1;
					if(field_name==0)
					{
							
						var td = $("<td rowspan='1'   class='condRequired'><input type='text' class='tb_input addattr "+field_name+" tbl52"+field_name+" input"+field_name+" member152"+field_name+""+newid+" hello152"+newid+"'  name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						var td = $("<td rowspan='1'><input type='text' class='tb_input addattr "+field_name+" tbl52"+field_name+" yyy"+field_name+" member152"+field_name+""+newid+" hello152"+newid+"' name='"+field_name+""+table_id+"["+val+"]"+"'></td>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
				
			}
			field_name++;
        });
        
       
        
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
		keyCheck();
});

//========================acadamin details==================================

$(".add_row_exam").on("click", function(callback) {
        // Dynamic Rows Code
        var table_id = $(this).attr('data-id');
        // Get max row id and set new id
        var newid = 0;
        $.each($("#"+table_id+" tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid+""+table_id,
            "data-id": newid+""+table_id
        });
        var field_name=0;
        // loop through each td and create new elements with name of newid
        $.each($("#"+table_id+" tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td rowspan='1'></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            }

			else {
			
				var val = newid-1;
				
					if(field_name==0)
					{
						var td = $("<td rowspan='1'   class='condRequired'><input type='text'  class=' tb_input "+field_name+" input"+field_name+" tbl55"+field_name+""+newid+" exam"+field_name+""+newid+" add_exam"+newid+"' onBlur='exam_add("+field_name+","+newid+")' name='"+field_name+""+table_id+"["+val+"]"+"'>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
					}
					else{
						
							if(field_name==1)
				{
					 var td = $("<td rowspan='1'><select id='' class='valid form-control'  name='"+field_name+""+table_id+"["+val+"]"+"'><option value =''>Select the year </option><option value='1980'>1980</option><option value='1981'>1981</option><option value='1982'>1982</option><option value='1983'>1983</option><option value='1984'>1984</option><option value='1985'>1985</option><option value='1986'>1986</option><option value='1987'>1987</option><option value='1988'>1988</option><option value='1989'>1989</option><option value='1990'>1990</option><option value='1991'>1991</option><option value='1992'>1992</option><option value='1993'>1993</option><option value='1994'>1994</option><option value='1995'>1995</option><option value='1996'>1996</option><option value='1997'>1997</option><option value='1998'>1998</option><option value='1999'>1999</option><option value='2000'>2000</option><option value='2001'>2001</option><option value='2002'>2002</option><option value='2003'>2003</option><option value='2004'>2004</option><option value='2005'>2005</option><option value='2006'>2006</option><option value='2007'>2007</option><option value='2008'>2008</option><option value='2009'>2009</option><option value='2010'>2010</option><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option></select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else if(field_name==3)
				{
				  var td = $("<td rowspan='1'><select id='' class='valid form-control'  name='"+field_name+""+table_id+"["+val+"]"+"'><option value =''>Select medium </option><option value='English'>English</option><option value='Hindi'>Hindi</option><option value='Punjabi'>Punjabi</option><option value='Assamese'>Assamese</option><option value='Bengali'>Bengali</option><option value='Kannada'>Kannada</option><option value='Marathi'>Marathi</option><option value='Telugu'>Telugu</option><option value='Urdu'>Urdu</option><option value='Malayalam'>Malayalam</option><option value='Odia'>Odia</option><option value='Other'>Other</option></select></td>", {
                    'text': $('#'+table_id+' tr').length
                }).appendTo($(tr));
				}
				else
				{
					var td = $("<td rowspan='1'><input type='text' class=' tb_input  input"+field_name+" tbl55"+field_name+""+newid+" exam"+field_name+""+newid+" add_exam"+newid+"' onBlur='exam_add("+field_name+","+newid+")' name='"+field_name+""+table_id+"["+val+"]"+"'>", {
							'text': $('#'+table_id+' tr').length
						}).appendTo($(tr));
				}
				
			}
			}
			field_name++;
        });
		
        
      
        // add the new row
        $(tr).appendTo($('#'+table_id+''));
        
        $(tr).find("td span.row-remove").on("click", function(event) {
		event.preventDefault();
             $(this).closest("tr").remove();
        });
		keyCheck();

});
   // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();

});

</script>
<script>
function show_place()
	{
       $('.tbl172 ').attr("placeholder", "dd/mm/yyyy");
       $('.tbl1711').attr("placeholder", "dd/mm/yyyy");
       $('.tbl71').attr("placeholder", "dd/mm/yyyy");
       $('.tbl52').attr("placeholder", "dd/mm/yyyy");
       $('.tbl53').attr("placeholder", "dd/mm/yyyy");
       $('.tbl514').attr("placeholder", "dd/mm/yyyy");
       $('.tbl515').attr("placeholder", "dd/mm/yyyy");
       $('.tbl415 ').attr("placeholder", "dd/mm/yyyy");
	}
function exam_add(id1,id2)
	{
		if(id1=='4' || id1=='5')
		{
	
			 if(id1=='4')
			{
				
				var result = (Number(id1)+2); 
				var Obtained = (Number(id1)+1); 
			var max_marks=id1;
		
			}
			if(id1=='5')
			{
				var result = (Number(id1)+1);
				var Obtained = id1;
				var max_marks = (Number(id1)-1); 
			
			}
			
		var id_val= $('.tbl55'+max_marks+''+id2).val();
		var id_val2= $('.tbl55'+Obtained+''+id2).val();
		
			if(id_val=="")
			{
				
			}
			else if(id_val2=="")
			{
				
			}
			else{
					
		if(Number(id_val)<Number(id_val2))
		{
		alert("Marks Obtained should be less than Max Marks.");
			$('.tbl55'+Obtained+''+id2).val("");
			
		}
			}
		
		
		} 
		
	} 
	function chk_dt(val,type,dataNew)
	{
		var start =$('.member152'+dataNew).val();
			var end = $('.member153'+dataNew).val();
			var firstDate = start.split("/");
			var  demo=firstDate[2]+","+firstDate[1]+","+firstDate[0];
var second = end.split("/");
			var  demo1=second[2]+","+second[1]+","+second[0];
   var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(demo1);
var secondDate = new Date(demo);
var diffDays = (firstDate.getTime() - secondDate.getTime())/(oneDay);
	  if(diffDays<0)
      {
                alert("To Date must be greater than From Date");
                $('.member153'+dataNew).val('');
                 return false;
      }
	}
	function chk_dt1(val,type,dataNew)
	{
			var start =$('.member1514'+dataNew).val();
			var end = $('.member1515'+dataNew).val();
			var firstDate = start.split("/");
			var  demo=firstDate[2]+","+firstDate[1]+","+firstDate[0];
var second = end.split("/");
			var  demo1=second[2]+","+second[1]+","+second[0];
   var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(demo1);
var secondDate = new Date(demo);
var diffDays = (firstDate.getTime() - secondDate.getTime())/(oneDay);

	  if(diffDays<0)
	  {
                alert("To Date must be greater than From Date");
                $('.member1515'+dataNew).val('');
                 return false;
      }
	  }
	
</script>

   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  
  <script>
  $(function() {
var date = $('#person_dob').datepicker({changeMonth: true, maxDate: 0 ,changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' , onClose: function() {$(this).valid();$(this).focus(); }}).val();
var date = $('#spouse_age').datepicker({changeMonth: true, maxDate: 0, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
  });
	$('html').on('focus',".tbl172", function(){
   var this_val=$(this);
		   date_pck(this_val);
	});
$('html').on('focus',".tbl52", function(){
   $(this).datepicker({changeMonth: true , maxDate: 0, onClose:function(){ var val = $(this).val(); chk_dt(val,'start',$(this).attr('data-new')); if(val!="") { $(this).parent('td').children('label').hide(); $(this).removeClass("error"); }}, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
	$(this).attr("placeholder", "dd/mm/yy");
	});
	$('html').on('focus',".tbl53", function(){
   $(this).datepicker({changeMonth: true , maxDate: 0, onClose:function(){ var val = $(this).val(); chk_dt(val,'end',$(this).attr('data-new')); if(val!="") { $(this).parent('td').children('label').hide(); $(this).removeClass("error"); }}, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
	$(this).attr("placeholder", "dd/mm/yy");
	});
	$('html').on('focus',".tbl514", function(){
   $(this).datepicker({changeMonth: true , maxDate: 0, onClose:function(){ var val = $(this).val(); chk_dt1(val,'start',$(this).attr('data-new'));if(val!="") { $(this).parent('td').children('label').hide(); $(this).removeClass("error"); }}, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
	$(this).attr("placeholder", "dd/mm/yy");
	});
	$('html').on('focus',".tbl515", function(){
  $(this).datepicker({changeMonth: true , maxDate: 0, onClose:function(){ var val = $(this).val(); chk_dt1(val,'start',$(this).attr('data-new')); if(val!="") { $(this).parent('td').children('label').hide(); $(this).removeClass("error"); }}, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
	$(this).attr("placeholder", "dd/mm/yy");
	});
	$('html').on('focus',".tbl415 ", function(){
    var this_val=$(this);
		   date_pck(this_val);
	});
	$('body').on('focus',".tbl71", function(){
    var this_val=$(this);
		   date_pck(this_val);
	});
  </script>
<script>
	 	$(document).ready(function () {
       $('#person_dob').on('blur', function(){
		   var date = $(this).val();
		   var this_val=$(this);
		   if(date!="")
		   {
           var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
           var Val_date=date;
	var age=18;
               if(Val_date.match(dateformat)){
              var seperator1 = Val_date.split('/');
              var seperator2 = Val_date.split('-');

             if (seperator1.length>1)
              {
                  var splitdate = Val_date.split('/');
              }
              else if (seperator2.length>1)
              {
                  var splitdate = Val_date.split('-');
              }
			  var currdate = new Date();
currdate.setFullYear(currdate.getFullYear() - age);
			   var today = new Date();
              var dd = parseInt(splitdate[0]);
              var mm  = parseInt(splitdate[1]);
              var yy = parseInt(splitdate[2]);
			   useDate = new Date(splitdate[2], splitdate[1] - 1, splitdate[0]);
            if (useDate > today) {
			alert('Please Enter Correct date.');
			 $(this_val).val('');
			 setTimeout(function(){
            $(this_val).focus();
        }, 1);
			}
			if ((currdate < useDate) )
			{
				alert("Your date of birth doesn't appear to be correct, so please ensure that you have selected correct date of birth");
				$(this_val).val('');
			}
	
              var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
              if (mm==1 || mm>2)
              {
                  if (dd>ListofDays[mm-1])
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
              if (mm==2)
              {
                  var lyear = false;
                  if ( (!(yy % 4) && yy % 100) || !(yy % 400))
                  {
                      lyear = true;
                  }
                  if ((lyear==false) && (dd>=29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
                  if ((lyear==true) && (dd>29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
          } 
          else
          {
           alert('Invalid date format dd/mm/yyyy!');    
 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
              return false;
          }
       }
		});
		 $('#spouse_age').on('blur', function(){
		   var date = $(this).val();
		   var this_val=$(this);
		   if(date!="")
		   {
           var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
           var Val_date=date;
	var age=18;
               if(Val_date.match(dateformat)){
              var seperator1 = Val_date.split('/');
              var seperator2 = Val_date.split('-');

             if (seperator1.length>1)
              {
                  var splitdate = Val_date.split('/');
              }
              else if (seperator2.length>1)
              {
                  var splitdate = Val_date.split('-');
              }
			  var currdate = new Date();
currdate.setFullYear(currdate.getFullYear() - age);
			   var today = new Date();
              var dd = parseInt(splitdate[0]);
              var mm  = parseInt(splitdate[1]);
              var yy = parseInt(splitdate[2]);
			   useDate = new Date(splitdate[2], splitdate[1] - 1, splitdate[0]);
            if (useDate > today) {
			alert('Please Enter Correct date.');
			 $(this_val).val('');
			 setTimeout(function(){
            $(this_val).focus();
        }, 1);
			}
			if ((currdate < useDate) )
			{
				alert("Your date of birth doesn't appear to be correct, so please ensure that you have selected correct date of birth");
			}
	
              var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
              if (mm==1 || mm>2)
              {
                  if (dd>ListofDays[mm-1])
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
              if (mm==2)
              {
                  var lyear = false;
                  if ( (!(yy % 4) && yy % 100) || !(yy % 400))
                  {
                      lyear = true;
                  }
                  if ((lyear==false) && (dd>=29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
                  if ((lyear==true) && (dd>29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
          } 
          else
          {
           alert('Invalid date format dd/mm/yyyy!');    
 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
              return false;
          }
       }
		});
   }); 
function Filladd(f) {
       if(f.chk_add.checked == true) {   
         f.comm_addr.value = f.addr.value;
		f.comm_addr1.value=f.addr2.value;
		f.comm_pin.value=f.pin1.value;
		f.comm_telephone.value=f.telephone1.value;
		f.comm_state.value=f.state1.value;
		f.comm_city1.value=f.city1.value;
	$(".addressatt").addClass("addreadonly");
	$('.addressatt').prop('readonly', true);
	$('.addressattd').prop("disabled", true);

	
	    var sectionValid = true;
    var collapse = $('.req_false');
    $.each(collapse.find('input, select, textarea'), function(){
        if(!$(this).valid()){
            
        }
    });
	
	   }
	   else
	   {
		  f.comm_addr.value = "";
		  f.comm_addr1.value="";
		  f.comm_pin.value="";
		  f.comm_telephone.value="";
		  f.comm_state.value="";
		  f.comm_city1.value="";
		$(".addressatt").removeClass("addreadonly");
	$('.addressatt').prop('readonly', false);
	$('.addressattd').prop("disabled", false);
	   }
} 
function chkexp(t){
	if(t.chk_exp.checked == true) {
		t.Post_Type.value="";
		t.present_post.value="";
		t.present_salary.value="";
		t.pay_band.value="";
		t.present_employee.value="";
		t.grade_pay.value="";
		$('.fresh_next').attr('data-fresh','true');
$(".chk_emp_exp").hide();
$(".addattr").addClass("addreadonly");
    
}
else{
	$(".chk_emp_exp").show();  
$(".addattr").removeClass("addreadonly");	
$('.fresh_next').attr('data-fresh','false');
}
}
function chkmember(t){
	if(t.chk_member.checked == true) {

$(".chk_memb").hide();

    
}
else{
	$(".chk_memb").show();  

}
}  
function show_father()
{
	var chk = document.getElementById("father");
	var chk1 = document.getElementById("husband");
           var dvtable1 = document.getElementById("div_father");
           var dvtable2 = document.getElementById("div_husband");
           var dvtable3 = document.getElementById("div_father1");
        dvtable1.style.display = chk.checked ? "block" : "none";
        dvtable2.style.display = chk1.checked ? "block" : "none";
        dvtable3.style.display = chk1.checked ? "none" : "none";
} 
function ch2()
{
   var chkYes = document.getElementById("case_yes");
        var dvtable = document.getElementById("case_detail");
          
        dvtable.style.display = chkYes.checked ? "block" : "none";
		$('input[name="criminal_case"]').change(function () {
    if($("#case_yes").is(':checked')) {
        $('#casedetail').attr('required', true);
		 } else {
        $('#casedetail').removeAttr('required');
		 }
});
        
}
function ch3()
{
   var chkYes = document.getElementById("charge_yes");
        var dvtable = document.getElementById("charge_detail");
          
        dvtable.style.display = chkYes.checked ? "block" : "none";
		$('input[name="criminal_charge"]').change(function () {
    if($("#charge_yes").is(':checked')) {
        $('#chargedetail').attr('required', true);
		 } else {
        $('#chargedetail').removeAttr('required');
		 }
});
        
}
function ch4()
{
   var chkYes = document.getElementById("earlier_employed_yes");
        var dvtable = document.getElementById("earlier_employed_detail");
          
        dvtable.style.display = chkYes.checked ? "block" : "none";
		

        
}
		</script>
		<script type="text/javascript">
		function key_fun(e)
		{
		
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
		}
		$('body').on('focus',".input4", function(){
		 $(this).keydown(function (e) {
			key_fun(e);
		 });
});
$('body').on('focus',".input5", function(){
		 $(this).keydown(function (e) {
		key_fun(e);
    });
});
$('body').on('focus',".yyy3", function(){
		 $(this).keydown(function (e) {
		key_fun(e);
    });
});
$('body').on('focus',".aaa7", function(){
		 $(this).keydown(function (e) {
		key_fun(e);
    });
});
		</script>
		<script>
		$('body').on('blur',".tbl415", function(){
		  var date = $(this).val();
		var this_val=$(this);
		   dt_pc(date,this_val);
		});
		$('body').on('blur',".tbl515", function(){
		 var date = $(this).val();
		 var this_val=$(this);
		   dt_pc(date,this_val);
		});
		$('body').on('blur',".tbl71", function(){
		  var date = $(this).val();
		 var this_val=$(this);
		   dt_pc(date,this_val);
		});
		$('body').on('blur',".tbl711", function(){
		  var date = $(this).val();
		   var this_val=$(this);
		   dt_pc(date,this_val);
		});
		
		$('body').on('blur',".tbl172", function(){
		   var date = $(this).val();
		var this_val=$(this);
		   dt_pc(date,this_val);
		});
		
		$('body').on('blur',".tbl52", function(){
		  var date = $(this).val();
		  var this_val=$(this);
		   dt_pc(date,this_val);
		});
		$('body').on('blur',".tbl53", function(){
		  var date = $(this).val();
		  var this_val=$(this);
		   dt_pc(date,this_val);
		});
		$('body').on('blur',".tbl514", function(){
		 var date = $(this).val();
		var this_val=$(this);
		   dt_pc(date,this_val);
		});
		
		</script>
		<script>
		function dt_pc(date,this_val)
		{		   
		   if(date!="")
		   {
           var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
           var Val_date=date;
	
               if(Val_date.match(dateformat)){
              var seperator1 = Val_date.split('/');
              var seperator2 = Val_date.split('-');

             if (seperator1.length>1)
              {
                  var splitdate = Val_date.split('/');
              }
              else if (seperator2.length>1)
              {
                  var splitdate = Val_date.split('-');
              }
			   var today = new Date();
              var dd = parseInt(splitdate[0]);
              var mm  = parseInt(splitdate[1]);
              var yy = parseInt(splitdate[2]);
			   useDate = new Date(splitdate[2], splitdate[1] - 1, splitdate[0]);
            if (useDate > today) {
			alert('Please Enter Correct date.');
			 $(this_val).val('');
			 setTimeout(function(){
            $(this_val).focus();
        }, 1);
			}
              var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
              if (mm==1 || mm>2)
              {
                  if (dd>ListofDays[mm-1])
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
              if (mm==2)
              {
                  var lyear = false;
                  if ( (!(yy % 4) && yy % 100) || !(yy % 400))
                  {
                      lyear = true;
                  }
                  if ((lyear==false) && (dd>=29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
                  if ((lyear==true) && (dd>29))
                  {
                      alert('Invalid date format dd/mm/yyyy!');
					   
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
                      return false;
                  }
              }
          } 
          else
          {
           alert('Invalid date format dd/mm/yyyy!');    
 
					 $(this_val).val('');
					 setTimeout(function(){
            $(this_val).focus();
        }, 1);
              return false;
          }
       }
		}
		function date_pck(this_val)
		{
			$(this_val).datepicker({changeMonth: true , maxDate: 0, onClose:function(){ var val = $(this_val).val(); if(val!="") { $(this_val).parent('td').children('label').hide(); $(this_val).removeClass("error"); }}, changeYear: true,yearRange: '1900:+0', dateFormat: 'dd/mm/yy' }).val();
	$(this_val).attr("placeholder", "dd/mm/yy");
	
		}
		</script>
		<script>
		$(document).ready(function (e) {

    //reCaptch verified
			
       $('#mail').on('blur', function(){
        var sEmail = $('#mail').val();
      	if(sEmail!="")
		   {
        if (!validateEmail(sEmail)) {
        
           alert('Invalid Email Address');
			$('#mail').val('');
            e.preventDefault();
        }
		   }
    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

		   
		</script>
  <script>
			var loadFile = function(event) {
			var reader = new FileReader();
			reader.onload = function(){
					$('#file2').removeClass('error');
				$('label[for="file2"]').hide ();
			  var output = document.getElementById('output');
			  output.src = reader.result;
			};
			reader.readAsDataURL(event.target.files[0]);
		  };
	$(document).on('change','.fileInput',function(){
          files = this.files;
          size = files[0].size;
          //max size 5mb =>  5 * 1048576
          if( size > 5242880){
             alert('Please upload Image less than 5MB of file size');
			 $('#output').attr('src', '').css("display","none");
			  $('#file2').val('');
             return false;
			 output.src = "";
          }
		   $('#output').css("display","block");
          return true;
     });
	 
	  </script>

    
  </body>
</html>
