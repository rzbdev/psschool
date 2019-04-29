<?php 
error_reporting(0);
session_start();
include_once('admin_header.php');
include_once('config.php');
$id=$_GET['id'];
 if(!isset($_SESSION["alid"]))
{
	
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} ?>
<?php 
	/* select from personal_detail table */
	$sel1="SELECT * FROM `personal_details` WHERE id='$id'";
	$query1=mysqli_query($sel1);
	if($row1=mysqli_fetch_array($query1))
	{
		$first_name=$row1['first_name'];
		$middle_name=$row1['middle_name'];
		$last_name=$row1['last_name'];
		$post_applied=$row1['post_applied'];
		$dob=$row1['dob'];
		$age=$row1['age'];
		$gender=$row1['gender'];
		$father_name=$row1['father_name'];
		$husband=$row1['husband'];
		$address3=$row1['address'];
		$pin10=$row1['pin'];
		$contact_no=$row1['contact_no'];
		$communication_address=$row1['communication_address'];
		$comm_telephoneno=$row1['comm_telephoneno'];
		$comm_mobileno=$row1['comm_mobileno'];
		$comm_email=$row1['comm_email'];
		$comm_pin=$row1['comm_pin'];
		$marital_status=$row1['marital_status'];
		$nationality=$row1['nationality'];
		$state_of_domicile=$row1['state_of_domicile'];
		$present_post=$row1['present_post'];
		$present_salary=$row1['present_salary'];
		$pay_band=$row1['pay_band'];
		$grade_pay=$row1['grade_pay'];
		$present_employer=$row1['present_employer'];
		$teach_language=$row1['teach_language'];
		$regional_language=$row1['regional_language'];
		$ctet_tet_detail=$row1['ctet_tet_detail'];
		$ncc_detail=$row1['ncc_detail'];
		$foregin_language_detail=$row1['foregin_language_detail'];
		$techosavvy_computerliterate_detail=$row1['techosavvy_computerliterate_detail'];
		$awards_detail=$row1['awards_detail'];
		$noticeperiod_detail=$row1['noticeperiod_detail'];
		$casepending_detail=$row1['casepending_detail'];
		$criminalcharged_detail=$row1['criminalcharged_detail'];
		$other_info=$row1['other_information'];
		$eariler_applied_employement_ps=$row1['eariler_applied_employement_ps'];
		$image=$row1['image'];
		//$sign=$row1['sign'];
		//$applicant_name=$row1['applicant_name'];
		//$submit_date=$row1['submit_date'];
		$submit_place=$row1['submit_place'];
		$dt_created=$row1['dt_created'];
		$a=explode(" ",$dt_created);
		$year=$a[0];
		$time=$a[1];
	}

	
	/* select from refrence_detail table */
	
	$sel2="SELECT * FROM `refrence_detail` WHERE id='$id'";
	$query2=mysqli_query($sel2);
	if($row2=mysqli_fetch_array($query2))
	{
		$f_name=$row2['f_name'];
		$l_name=$row2['l_name'];
		$designation=$row2['designation'];
		$address=$row2['address'];
		$pin=$row2['pin'];
		$telephone=$row2['telephone'];
		$email=$row2['email'];
		$f_name1=$row2['f_name1'];
		$l_name1=$row2['l_name1'];
		$designation1=$row2['designation1'];
		$address1=$row2['address1'];
		$pin1=$row2['pin1'];
		$telephone1=$row2['telephone1'];
		$email1=$row2['email1'];
		
	}
	$sel3="SELECT * FROM `spouse_detail` WHERE id='$id'";
	$query3=mysqli_query($sel3);
	if($row3=mysqli_fetch_array($query3))
	{
		$spouse_name=$row3['name'];
		$spouse_age=$row3['age'];
		$spouse_profession=$row3['profession'];
		$spouse_designation=$row3['designation'];
		$spouse_place_of_posting=$row3['place_of_posting'];
		$spouse_monthly_income=$row3['monthly_income'];
	}
	$sel4="SELECT * FROM `acadmic_detail` WHERE id='$id'";
	$query4=mysqli_query($sel4);
	$sel5="SELECT * FROM `teaching_experience_detail` WHERE id='$id'";
	$query5=mysqli_query($sel5);
	$sel6="SELECT * FROM `children_detail` WHERE id='$id'";
	$query6=mysqli_query($sel6);
	
	$sel7="SELECT * FROM `administrative_exp_detail` WHERE id='$id'";
	$query7=mysqli_query($sel7);
	$sel8="SELECT * FROM `nonteaching_staff_exp` WHERE id='$id'";
	$query8=mysqli_query($sel8);
	$sel9="SELECT * FROM `dependent_member_detail` WHERE id='$id'";
	$query9=mysqli_query($sel9);
	$sel10="SELECT * FROM `accomodation_detail` WHERE id='$id'";
	$query10=mysqli_query($sel10);
	$sel11="SELECT * FROM `other_employee` WHERE id='$id'";
	$query11=mysqli_query($sel11);
	
	
?>
<?php 
	if(isset($_POST['submit']))
	{
		/* update personal_detail table */
		$first_name=$_POST['first_name'];
		$middle_name=$_POST['middle_name'];
		$last_name=$_POST['last_name'];
		$post_applied=$_POST['post_applied'];
				$dob=$_POST['dob'];
		
$person_dob0=(explode("/",$dob));
$person_dob =$person_dob0[2].'-'.$person_dob0[1].'-'.$person_dob0[0];

		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$father_name=$_POST['father_name'];
		$husband=$_POST['husband'];
		$address3=$_POST['address3'];
		$pin1=$_POST['pin1'];
		$contact_no=$_POST['contact_no'];
		$communication_address=$_POST['communication_address'];
		$comm_telephoneno=$_POST['comm_telephoneno'];
		$comm_mobileno=$_POST['comm_mobileno'];
		$comm_email=$_POST['comm_email'];
		$comm_pin=$_POST['comm_pin'];
		$marital_status=$_POST['marital_status'];
		$nationality=$_POST['nationality'];
			$other=$_POST['other'];
		$state_of_domicile=$_POST['state_of_domicile'];
		$present_post=$_POST['present_post'];
		$present_salary=$_POST['present_salary'];
		$pay_band=$_POST['pay_band'];
		$grade_pay=$_POST['grade_pay'];
		$present_employer=$_POST['present_employer'];
		$teach_language=$_POST['teach_language'];
		$regional_language=$_POST['regional_language'];
		$ctet_tet_detail=$_POST['ctet_tet_detail'];
		$ncc_detail=$_POST['ncc_detail'];
		$foregin_language_detail=$_POST['foregin_language_detail'];
		$techosavvy_computerliterate_detail=$_POST['techosavvy_computerliterate_detail'];
		$awards_detail=$_POST['awards_detail'];
		$noticeperiod_detail=$_POST['noticeperiod_detail'];
		$casepending_detail=$_POST['casepending_detail'];
		$criminalcharged_detail=$_POST['criminalcharged_detail'];
		$eariler_applied_employement_ps=$_POST['eariler_applied_employement_ps'];
		$image=$_POST['image'];
		//$sign=$_POST['sign'];
		//$applicant_name=$_POST['applicant_name'];
		//$submit_date=$_POST['submit_date'];
		$submit_place=$_POST['submit_place'];
		
		/* select from personal_detail table */
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$designation=$_POST['designation'];
		$address=$_POST['address'];
		$pin=$_POST['pin'];
		$telephone=$_POST['telephone'];
		$email=$_POST['email'];
		$f_name1=$_POST['f_name1'];
		$l_name1=$_POST['l_name1'];
		$designation1=$_POST['designation1'];
		$address1=$_POST['address1'];
		$pin1=$_POST['pin1'];
		$telephone1=$_POST['telephone1'];
		$email1=$_POST['email1'];
		 $cr_radio=$_POST['cr_radio'];
		$case_radio=$_POST['case_radio']; 
		/* select from spouse_detail table */
		
		
		$spouse_name=$_POST['spouse_name'];
		$spouse_age=$_POST['spouse_age'];
		$spouse_profession=$_POST['spouse_profession'];
		$spouse_designation=$_POST['spouse_designation'];
		$spouse_place_of_posting=$_POST['spouse_place_of_posting'];
		$spouse_monthly_income=$_POST['spouse_monthly_income'];
		
		/* select from acedmic table */
		$exam_pass=$_POST['1tab_logic6'];
		if($exam_pass=='NULL')
		{
			$exam_pass=$_POST['1tab_logic6'];
			$pass_year=$_POST['2tab_logic6'];
			$subject=$_POST['3tab_logic6'];
			$medium=$_POST['4tab_logic6'];
			$max_marks=$_POST['5tab_logic6'];
			$marks_obtain=$_POST['6tab_logic6'];
			$percentage=$_POST['7tab_logic6'];
			$division=$_POST['8tab_logic6'];
			$school=$_POST['9tab_logic6'];
			$board=$_POST['10tab_logic6'];
			for($i=0; $i<count($exam_pass); $i++)
			{
				$query1="INSERT INTO `acadmic_detail`(`examination_passed`, `year_of_passing`, `subject_offered`, `medium_of_insruction`, `max_marks`, `marks_obtain`, 
				`marks_percentage`, `division`, `school`, `board`, `id`) VALUES ( '$exam_pass[$i] ','$pass_year[$i]','$subject[$i]','$medium[$i]','$max_marks[$i]','$marks_obtain[$i]','$percentage[$i]','$division[$i]','$school[$i]','$board[$i]','$id')";
				$res1=mysqli_query($query1);
			}	
		}
		$acadmic_id=$_POST['acadmic_id'];
		$examination_passed=$_POST['examination_passed'];
		$year_of_passing=$_POST['year_of_passing'];
		$subject_offered=$_POST['subject_offered'];
		$medium_of_insruction=$_POST['medium_of_insruction'];
		$max_marks=$_POST['max_marks'];
		$marks_obtain=$_POST['marks_obtain'];
		$marks_percentage=$_POST['marks_percentage'];
		$division=$_POST['division'];
		$school=$_POST['school'];
		$board=$_POST['board'];
		for($i=0; $i<count($acadmic_id); $i++)
		{
			$update4="UPDATE `acadmic_detail` SET `examination_passed`='$examination_passed[$i]',`year_of_passing`='$year_of_passing[$i]',`subject_offered`='$subject_offered[$i]',
			`medium_of_insruction`='$medium_of_insruction[$i]',`max_marks`='$max_marks[$i]',`marks_obtain`='$marks_obtain[$i]',`marks_percentage`='$marks_percentage[$i]',`division`='$division[$i]',
			`school`='$school[$i]',`board`='$board[$i]' WHERE acadmic_id='$acadmic_id[$i]'";
			$query4=mysqli_query($update4);
		}	
		
		
		/* select from teacher experience table */
		$exp_id=$_POST['exp_id'];
		$institute=$_POST['institute'];
		$designation=$_POST['designation'];
		$period_from=$_POST['period_from'];
		$period_to=$_POST['period_to'];
		$sub_taught=$_POST['sub_taught'];
		$duties=$_POST['duties'];
		$total_experience1=$_POST['total_experience1'];
		for($i=0; $i<count($exp_id); $i++)
		{
			$update5="UPDATE `teaching_experience_detail` SET `institute`='$institute[$i]',`designation`='$designation[$i]',`period_from`='$period_from[$i]',`period_to`='$period_to[$i]',
			`sub_taught`='$sub_taught[$i]',`duties`='$duties[$i]',`total_experience`='$total_experience1[$i]' WHERE exp_id='$exp_id[$i]'";
			$query5=mysqli_query($update5);
		}
		
		
		/* update adminstrative exp table */
		$administrative_id=$_POST['administrative_id'];
		$school2=$_POST['school2'];
		$responsibilities=$_POST['responsibilities'];
		$for_class=$_POST['for_class'];
		$no_of_year=$_POST['no_of_year'];
		$total_experience2=$_POST['total_experience2'];
		for($i=0; $i<count($administrative_id); $i++)
		{
			$update6="UPDATE `administrative_exp_detail` SET `school`='$school2[$i]',`responsibilities`='$responsibilities[$i]',`for_class`='$for_class[$i]',
			`no_of_year`='$no_of_year[$i]',`total_experience`='$total_experience2[$i]' WHERE administrative_id=$administrative_id[$i]";
			$query6=mysqli_query($update6);
		}
		
		/* select from non teaching table */
		$ntse_id=$_POST['ntse_id'];
		$employee_info=$_POST['employee_info'];
		$bussiness=$_POST['bussiness'];
		$post=$_POST['post'];
		$nature_of_duties=$_POST['nature_of_duties'];
		$period_from1=$_POST['period_from1'];
		$period_to1=$_POST['period_to1'];
		$salary=$_POST['salary'];
		$total_experience3=$_POST['total_experience3'];
		for($i=0; $i<count($ntse_id); $i++)
		{
			$update7="UPDATE `nonteaching_staff_exp` SET `employee_info`='$employee_info[$i]',`bussiness`='$bussiness[$i]',`post`='$post[$i]',`nature_of_duties`='$nature_of_duties[$i]',
			`period_from`='$period_from1[$i]',`period_to`='$period_to1[$i]',`salary`='$salary[$i]',`total_experience`='$total_experience3[$i]' WHERE ntse_id='$ntse_id[$i]'";
			$query7=mysqli_query($update7);
		}
		
		
		
		
		/* update dependent member table */
		$member_id=$_POST['member_id'];
		$name=$_POST['name'];
		$dob1=$_POST['dob1'];
		$relationship=$_POST['relationship'];
		$occupation=$_POST['occupation'];
		$dependent=$_POST['dependent'];
		$disability=$_POST['disability'];
		for($i=0; $i<count($member_id); $i++)
		{
			$update8="UPDATE `dependent_member_detail` SET `name`='$name[$i]',`dob`='$dob1[$i]',`relationship`='$relationship[$i]',`occupation`='$occupation[$i]',
		`dependent`='$dependent[$i]',`disability`='$disability[$i]' WHERE member_id='$member_id[$i]'";
		$query8=mysqli_query($update8);
		}
		
		
		
		
		/* select from personal_detail table */
		$acc_id=$_POST['acc_id'];
		$name1=$_POST['name1'];
		$relation=$_POST['relation'];
		$live_with=$_POST['live_with'];
		$not_live_wih=$_POST['not_live_wih'];
		$diability=$_POST['diability'];
		
		for($i=0; $i<count($acc_id); $i++)
		{
			$update9="UPDATE `accomodation_detail` SET `name`='$name1[$i]',`relation`='$relation[$i]',`live_with`='$live_with[$i]',`not_live_wih`='$not_live_wih[$i]',
		`diability`='$diability[$i]' WHERE acc_id='$acc_id[$i]'";
		$query9=mysqli_query($update9);
		}
		/* select from other_detail table */
		$other_id=$_POST['other_id'];
		$name2=$_POST['name2'];
		$address2=$_POST['address2'];
		$age2=$_POST['age2'];
		$relation1=$_POST['relation1'];
		$department=$_POST['department'];
		$joining_date=$_POST['joining_date'];
		$h_p=$_POST['h_p'];
		$salary1=$_POST['salary1'];
		for($i=0; $i<count($other_id); $i++)
		{
			$update10="UPDATE `other_employee` SET `name`='$name2[$i]',`address`='$address2[$i]',`age`='$age2[$i]',`relation`='$relation1[$i]',`department`='$department[$i]',
		`joining_date`='$joining_date[$i]',`h_p`='$h_p[$i]',`salary`='$salary1[$i]' WHERE other_id='$other_id[$i]'";
		$query10=mysqli_query($update10);
		}
		
		
		$update1="UPDATE `personal_details` SET `first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`post_applied`='$post_applied',
		`dob`='$person_dob',`age`='$age',`gender`='$gender',`father_name`='$father_name',`husband`='$husband',`address`='$address3',`pin`='$pin1',`contact_no`='$contact_no',
		`communication_address`='$communication_address',`comm_telephoneno`='$comm_telephoneno',`comm_mobileno`='$comm_mobileno',`comm_email`='$comm_email',`comm_pin`='$comm_pin',
		`marital_status`='$marital_status',`nationality`='$nationality',`state_of_domicile`='$state_of_domicile',`present_post`='$present_post',`present_salary`='$present_salary',
		`pay_band`='$pay_band',`grade_pay`='$grade_pay',`present_employer`='$present_employer',`teach_language`='$teach_language',`regional_language`='$regional_language',
		`ctet_tet_detail`='$ctet_tet_detail',`ncc_detail`='$ncc_detail',`foregin_language_detail`='$foregin_language_detail',`techosavvy_computerliterate_detail`='$techosavvy_computerliterate_detail',
		`awards_detail`='$awards_detail',`noticeperiod_detail`='$noticeperiod_detail',`casepending_detail`='$cr_radio',`criminalcharged_detail`='$case_radio',`eariler_applied_employement_ps`='$eariler_applied_employement_ps',
		`image`='$image',`other_information` ='$other',`submit_place`='$submit_place' WHERE id='$id'";
		$query1=mysqli_query($update1);
		
		$update2="UPDATE `refrence_detail` SET `f_name`='$f_name',`l_name`='$l_name',`designation`='$designation',`address`='$address',`pin`='$pin',
		`telephone`='$telephone',`email`='$email',`f_name1`='$f_name1',`l_name1`='$l_name1',`designation1`='$designation1',`address1`='$address1',`pin1`='$pin1',
		`telephone1`='$telephone1',`email1`='$email1' WHERE id='$id'";
		$query2=mysqli_query($update2);
		
		
		
		$update3="UPDATE `spouse_detail` SET `name`='$spouse_name',`age`='$spouse_age',`profession`='$spouse_profession',`designation`='$spouse_designation',
		`place_of_posting`='$spouse_place_of_posting',`monthly_income`='$spouse_monthly_income' WHERE id='$id'";
		$query3=mysqli_query($update3);
		
		
		
		$child_id5=$_POST['child_id5'];
		$child_name5=$_POST['child_name5'];
		$child_dob5=$_POST['child_dob5'];
		$child_status5=$_POST['child_status5'];
		$child_study5=$_POST['child_study5'];
		for($i=0; $i<count($child_id5); $i++)
		{
		$update11="UPDATE `children_detail` SET `name`='$child_name5[$i]',`dob`='$child_dob5[$i]',`married_status`='$child_status5[$i]',
			`qualification_detail`='$child_study5[$i]' WHERE child_id='$child_id5[$i]' ";
			$query11=mysqli_query($update11);
		}
$child_name1=$_POST['child_name1'];
 $child_dob1=$_POST['child_dob1'];
 $child_status1=$_POST['child_status1'];
 $child_study1=$_POST['child_study1'];
$child_name2=$_POST['child_name2'];
$child_dob2=$_POST['child_dob2'];
$child_status2=$_POST['child_status2'];
$child_study2=$_POST['child_study2'];
$child_name3=$_POST['child_name3'];
$child_dob3=$_POST['child_dob3'];
$child_status3=$_POST['child_status3'];
$child_study3=$_POST['child_study3'];
$child_name4=$_POST['child_name4'];
$child_dob4=$_POST['child_dob4'];
$child_status4=$_POST['child_status4'];
$child_study4=$_POST['child_study4'];
		
	if ($child_name1!='')
				{
					
 $sql7="insert into children_detail(name,dob,married_status,qualification_detail,id) values('$child_name1','$child_dob1','$child_status1','$child_study1',$id) ";
		
		$res8=mysqli_query($sql7);
				}
				if (!($child_name2 == NULL))
				{
		$sql72="insert into children_detail(name,dob,married_status,qualification_detail,id) values('$child_name2','$child_dob2','$child_status2','$child_study2',$id) ";
		
		$res82=mysqli_query($sql72);
				}
				if (!($child_name3 == NULL))
				{
		$sql33="insert into children_detail(name,dob,married_status,qualification_detail,id) values('$child_name3','$child_dob3','$child_status3','$child_study3',$id) ";
		
		$res83=mysqli_query($sql33);
				}
				if (!($child_name4 == NULL))
				{
		$sql74="insert into children_detail(name,dob,married_status,qualification_detail,id) values('$child_name4','$child_dob4','$child_status4','$child_study4',$id) ";
	
		$res84=mysqli_query($sql74);
				}	
		
	if($spouse_name!='')	
{
$spouse_name=$_POST['spouse_name1'];
$spouse_age=$_POST['spouse_age1'];
$spouse_proffession=$_POST['spouse_proffession1'];
$spouse_post=$_POST['spouse_post1'];
$spouse_posting_place=$_POST['spouse_posting_place1'];
$spouse_income=$_POST['spouse_income1'];
$sql8="insert into spouse_detail(name,age,profession,designation,place_of_posting,monthly_income,id) values('$spouse_name','$spouse_age','$spouse_proffession','$spouse_post','$spouse_posting_place','$spouse_income','$id')";
$res9=mysqli_query($sql8);
		
		
	}
	echo"<script>
alert('Record update successfully')
window.location= 'edit.php?id=$id'
</script>";
	}
	

?>
		</div><!--container-->
		<div class="clearfix"></div>
		<div class="container contains">
			<div class="row form-outer">
				<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;font-size:18px;">APPLICATION FORM FOR THE POST OF TEACHING/NON-TEACHING STAFF</h1></div>
				<div class="col-md-12">
					<form class="online-form" action="" method="post">
						<div class="row">
							<!--<div class="col-md-12">
								<label>Name in use (Mr. / Mrs. /Ms )  (* CAPITAL LETTERS)</label>
							</div>-->
							<div class="col-md-10 col-sm-10">
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-6">
										<div class="form-group">
											<label for="">First Name</label>
											<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
										</div>
									</div>
								 <div class="col-md-4 col-sm-4 col-xs-6">
									  <div class="form-group">
										<label for="">Middle Name</label>
										<input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>">
									  </div>
								  </div>
								 <div class="col-md-4 col-sm-4 col-xs-6">
										<div class="form-group">
											<label for="">Last Name</label>
											<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
										</div>
								  </div>
								  <div class="col-md-6 col-sm-5 col-xs-12"> 
										<div class="form-group">
											<label for="">Post Applied For</label>
											<input type="text" class="form-control" id="post_applied" name="post_applied" value="<?php echo $post_applied; ?>">
										</div>
								  </div>
						  <div class="col-md-6 col-sm-5 col-xs-12"> 
						  <div class="form-group">
							<label for="">DATE OF BIRTH </label>
							
							
		<input type="text" class="form-control" id="dob" name="dob" value="<?php 

		$timestamp = strtotime($dob);
        echo  date('d/m/Y', $timestamp);
		  ?>">
						  </div>
						  </div>
								</div>
							</div>
						   <div class="col-md-2">
						  <div class="form-group">
						  <div class="user-pic">
							<img class="img-responsive" src="../uploads/<?php echo $image;?>" alt="<?php echo $image;?>" />
							<input type="hidden" class="form-control" id="image" name="image" value="<?php echo $image; ?>">
						  </div>
						  </div>
						  </div>
						  <div class="col-md-6 col-sm-5 col-xs-12"> 
						  <?php if($father_name!='')
					{
						?>
						  <div class="form-group">
							<label for="">FATHER’S NAME</label>
							<div class="relative">
							
							<input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $father_name; ?>">
							</div>
						  </div>
						  <?php 
					}
					else
					{
						
						?><div class="form-group">
							<label for="">HUSBAND’S NAME</label>
							<div class="relative">
							
							<input type="text" class="form-control" id="father_name" name="husband" value="<?php echo $husband; ?>">
							</div>
						  </div>
						<?php 
						
					}
					?>
						  
						  </div>
						    <div class="col-md-6 col-sm-5 col-xs-12"> 
						  <div class="form-group">
							<label for="">AGE</label>
							<?php function ageCalculator($dob){
	if(!empty($dob)){
		$birthdate = new DateTime($dob);
		$today   = new DateTime('today');
		$age = $birthdate->diff($today)->y;
		return $age;
	}else{
		return 0;
	}
}
$dob =$dob;
ageCalculator($dob);
?>
							<input type="text" class="form-control" id="age" name="age" value="<?php echo ageCalculator($dob); ?>">
							
						  </div>
						  </div>
						   <div class="col-md-6 col-sm-5 col-xs-12">
						  <div class="form-group">
							<label for="">PERMANENT HOME ADDRESS</label>
							<input type="text" class="form-control" id="address" name="address3" value="<?php echo $address3; ?>">
						  </div> 
						  <div class="form-group">
							<label for="">Pin</label>
							<input type="text" class="form-control" id="pin" name="pin1" value="<?php echo $pin10; ?>">
						  </div>
						  <div class="form-group">
							<label for="">TELEPHONE NO</label>
							<input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>">
						  </div>
						  <div class="form-group">
						<label>Gender  </label>
						<div id="gender_message">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<label class="radio-inline">
									<?php if($gender=='Male' || $gender=='male') { ?>
										<!--<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">--><input type="radio" name="gender" id="male"  value="Male" checked> MALE
									<?php } else { ?>
									<!--<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">--><input type="radio" name="gender" id="male"  value="Male"> MALE
									<?php } ?>
									</label>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<label class="radio-inline">
									<?php if($gender=='Female' || $gender=='female') { ?>
										<!--<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">--><input type="radio" name="gender" id="female"  value="Female"  checked> FEMALE
									<?php } else { ?>	
										<!--<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">--><input type="radio" name="gender" id="female"  value="Female"  > FEMALE
									<?php } ?>
									</label>
								</div>
						</div>
					</div>
						  </div>
						   <div class="col-md-6 col-sm-5 col-xs-12"> 
						  <div class="form-group">
							<label for="">ADDRESS FOR COMMUNICATION</label>
							<input type="text" class="form-control" id="communication_address" name="communication_address" value="<?php echo $communication_address; ?>">
						  </div> 
						  <div class="form-group">
							<label for="">PIN</label>
							<input type="text" class="form-control" id="comm_pin" name="comm_pin" value="<?php echo $comm_pin; ?>">
						  </div>
						  <div class="form-group">
							<label for="">TELEPHONE NO</label>
							<input type="text" class="form-control" id="comm_telephoneno" name="comm_telephoneno" value="<?php echo $comm_telephoneno; ?>">
						  </div>
				         <div class="form-group">
							<label for="">Mobile</label>
							<input type="text" class="form-control" id="comm_mobileno" name="comm_mobileno" value="<?php echo $comm_mobileno; ?>">
						  </div>
						  </div>
						   <div class="col-md-6 col-sm-5 col-xs-12"> 
						  <div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="comm_email" name="comm_email" value="<?php echo $comm_email; ?>">
						  </div>
						  </div>
						  <div class="col-md-6 col-sm-5 col-xs-12"> 
						    <div class="row"> 
						  <div class="col-md-12 col-sm-12 col-xs-12"> 
							<label>MARITAL STATUS  </label>
						</div>
						  <div class="col-md-6 col-sm-6 col-xs-12"> 
						  
							<label class="radio-inline">
							<?php if($marital_status=='Married' || $marital_status=='married') { ?>
							  <input type="radio" name="marital_status" id="marital_status" value="Married"  checked> MARRIED
							<?php } else { ?>
							<input type="radio" name="marital_status" id="married" value="Married" onclick="check_maritalstatus()" > MARRIED
							<?php } ?>
							</label>
						  </div>
						  <div class="col-md-6 col-sm-6 col-xs-12"> 
							<label class="radio-inline">
							<?php if($marital_status=='Unmarried' || $marital_status=='unmarried') { ?>
								<input type="radio" name="marital_status" id="unmarried" value="Unmarried"  onclick="check_maritalstatus()" checked> UNMARRIED
							<?php } else { ?>
								<input type="radio" name="marital_status" id="unmarried" value="Unmarried" onclick="check_maritalstatus()"> UNMARRIED
							<?php } ?>
							</label>
						  </div>
						     <div class="col-md-12 col-sm-12 col-xs-12"> 
							<label class="radio-inline">
							<?php if($marital_status=='Divorcee' || $marital_status=='divorcee') { ?>
								<input type="radio" name="marital_status" id="marital_status" value="DIVORCEE" checked>WIDOW(ER) /* DIVORCEE <small>( *IF DIVORCEE, LEGAL DOCUMENTARY PROOF TO BE ATTACHED)</small>
							<?php } else { ?>
							<input type="radio" name="marital_status" id="marital_status" value="DIVORCEE">WIDOW(ER) /* DIVORCEE <small>( *IF DIVORCEE, LEGAL DOCUMENTARY PROOF TO BE ATTACHED)</small>
							<?php } ?>
							</label>
						  </div>
						  </div>
						</div>
						 	<?php if($marital_status=='Married' || $marital_status=='married') { ?>
						
			<div class="col-md-12">
			 
			  <div class="table-responsive">
				<table class="table table-bordered custm-table" id="table_css_status" >
				 <label id="table_css_status">DETAILS OF SPOUSE</label>
					<thead>
					<tr>
					<th>Name</th>
					<th>DATE OF BIRTH</th>
					<th>PROFESSION (DEPARTMENT)</th>
					<th>DESIGNATION</th>
					<th>PLACE OF POSTING</th>
					<th>MONTHLY INCOME</th>
					</tr>
					</thead>
					<tbody>
						<tr>
						
							<td><input type="text" name="spouse_name" value="<?php echo $spouse_name; ?>" ></td>
							<td><input type="text" name="spouse_age" id="spouse" value="<?php echo $spouse_age; ?>"></td>
							<td><input type="text"  name="spouse_profession" value="<?php echo $spouse_profession; ?>"></td>
							<td><input type="text" name="spouse_designation" value="<?php echo $spouse_designation; ?>"></td>
							<td><input type="text" name="spouse_place_of_posting" value="<?php echo $spouse_place_of_posting; ?>"></td>
							<td><input type="text" name="spouse_monthly_income" value="<?php echo $spouse_monthly_income; ?>"></td>
						</tr>
					</tbody>
				</table>
				</div>
			  </div>
			  <div class="col-md-12">
			  <div class="table-responsive">
				<table class="table table-bordered custm-table" id="table_css_status1">
					<thead>
					<tr>
					<th>PARTICULARS OF CHILDREN </th>
					<th>DATE OF BIRTH (WITH AGE)</th>
					<th>WHETHER MARRIED & SETTLED</th>
					<th>WHETHER STUDYING, IF <br/>SO, STATE CLASS</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<th>CHILDREN</th>
					<td></td>
				<td></td>
				<td></td>
		
				
					</tr>
					<?php while($row6=mysqli_fetch_array($query6)) { ?>
					<tr>
					<input type="hidden" name="child_id5[]" value="<?php echo $row6['child_id']; ?>" >
					<th><input type="text" name="child_name5[]" value="<?php echo $row6['name']; ?>" ></th>
					<td><input type="text" name="child_dob5[]" value="<?php echo $row6['dob']; ?>"></td>
					<td><input type="text" name="child_status5[]" value="<?php echo $row6['married_status']; ?>"></td>
					<td><input type="text" name="child_study5[]"  value="<?php echo $row6['qualification_detail']; ?>"></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
				</div>
			  </div>
							<?php }
							?>
							
							
							
						  <div class="col-md-12">
			  <label>DETAILS OF SPOUSE</label>
			  <div class="table-responsive">
				<table class="table table-bordered custm-table" id="table_css_status" style="display:none">
				
					<thead>
					<tr>
					<th>Name</th>
					<th>DATE OF BIRTH</th>
					<th>PROFESSION (DEPARTMENT)</th>
					<th>DESIGNATION</th>
					<th>PLACE OF POSTING</th>
					<th>MONTHLY INCOME</th>
					</tr>
					</thead>
					<tbody>
					<tr>
		
						<td><input type="text" name="spouse_name1" value="" ></td>
						<td><input type="text" id="spouse1" name="spouse_age1"  value=""></td>
						<td><input type="text"  name="spouse_profession1" value=""></td>
						<td><input type="text" name="spouse_post1" value=""></td>
						<td><input type="text" name="spouse_posting_place1" value=""></td>
						<td><input type="text" name="spouse_income1" value=""></td>
					</tr>
					
					
					</tbody>
				</table>
				</div>
			  </div>
			   <div class="col-md-12" id="table_css_status1"  style="display:none">
			  <div class="table-responsive">
				<table class="table table-bordered custm-table" id="tab_logic5">
					<thead>
					<tr>
					<th>PARTICULARS OF CHILDREN </th>
					<th>DATE OF BIRTH (WITH AGE)</th>
					<th>WHETHER MARRIED & SETTLED</th>
					<th>WHETHER STUDYING, IF <br/>SO, STATE CLASS</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<th>I. DAUGHTERS [WRITE NAME(S)]</th>
					<td></td>
				<td></td>
				<td></td>
		
				
					</tr>
					<tr>
								<th><input placeholder="(1)"type="text" id="child_name" name="child_name1" value="" placeholder=""  ></th>
								<td><input type="text" name="child_dob1" id="child_dob" value="" ></td>
								<td><input type="text" name="child_status1" id="child_status"   value=""></td>
								<td><input type="text" name="child_study1" id="child_study"  value=""></td>
							</tr>
							<tr>
								<th><input placeholder="(2)" type="text" name="child_name2" value="" placeholder="" ></th>
								<td><input type="text" name="child_dob2" value="" ></td>
								<td><input type="text" name="child_status2"  value=""></td>
								<td><input type="text" name="child_study2"  value=""></td>
							</tr>
						<tr>
					<th>ii. SONS [WRITE NAME(S)]</th>
					<td></td>
					<td></td>
					<td></td>
					</tr>
					        <tr>
								<th><input placeholder="(1)" type="text" name="child_name3" value="" placeholder="" ></th>
								<td><input type="text" name="child_dob3" value=""></td>
								<td><input type="text" name="child_status3" value=""></td>
								<td><input type="text" name="child_study3" value=""></td>
							</tr>
							<tr>
								<th><input placeholder="(2)" type="text" name="child_name4" value="" placeholder="" ng-pattern="apply_post" ng-model="user.child_name"></th>
								<td><input type="text" name="child_dob4" value="" ></td>
								<td><input type="text" name="child_status4" value=""></td>
								<td><input type="text" name="child_study4"  value=""></td>
							</tr>
					</tbody>
				</table>
				</div>
			  </div>
						 <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">NATIONALITY</label>
							<input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $nationality; ?>">
						  </div>
						  </div>
						  <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">STATE OF DOMICILE</label>
							<input type="text" class="form-control" id="state_of_domicile" name="state_of_domicile" value="<?php echo $state_of_domicile; ?>">
						  </div>
						  </div>
						  <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">PRESENT POST (CONFIRMED / PROBATION /TEMPORARY)</label>
							<input type="text" class="form-control" id="present_post" name="present_post" value="<?php echo $present_post; ?>">
						  </div>
						  </div>
						 <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">PRESENT SALARY (PER MONTH)</label>
							<input type="text" class="form-control" id="present_salary" name="present_salary" value="<?php echo $present_salary; ?>">
						  </div>
						  </div>
						 <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">PAY BAND</label>
							<input type="text" class="form-control" id="pay_band" name="pay_band" value="<?php echo $pay_band; ?>">
						  </div>
						  </div>
						  <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">GRADE PAY</label>
							<input type="text" class="form-control" id="grade_pay" name="grade_pay" value="<?php echo $grade_pay; ?>">
						  </div>
						  </div>
						 <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">PRESENT EMPLOYER</label>
							<input type="text" class="form-control" id="present_employer" name="present_employer" value="<?php echo $present_employer; ?>">
						  </div>
						  </div>
						   <div class="col-md-6 col-sm-6 col-xs-12">
                             <label for="">ARE YOU CTET/TET QUALIFIED</label>
							   <div class="col-md-4 col-sm-4 col-xs-12"> 
							  <div class="form-group">
							<label class="checkbox-inline">
							<?php if($ctet_tet_detail=='YES' || $ctet_tet_detail=='YES') { ?>
							  <input type="radio" id="ctet_tet_detail" value="YES" name="ctet_tet_detail" checked> Yes
							<?php } else { ?>
								<input type="radio" id="ctet_tet_detail" value="YES" name="ctet_tet_detail"> Yes
							<?php } ?>
							</label>
						   </div>
						   </div>
						 <div class="col-md-4 col-sm-4 col-xs-12"> 
						  <div class="form-group">
							<label class="checkbox-inline">
							<?php if($ctet_tet_detail=='No' || $ctet_tet_detail=='NO') { ?>
							  <input type="radio" id="ctet_tet_detail" value="NO" name="ctet_tet_detail" checked> No
							<?php } else { ?>
								<input type="radio" id="ctet_tet_detail" value="NO" name="ctet_tet_detail"> No
							<?php } ?>
							</label>
						  </div>
						  </div>
						   </div>
						   <div class="clearfix"></div>
						   <div class="col-md-6 col-sm-6 col-xs-12"> 
							<label for="">ARE YOU ABLE TO TEACH THROUGH </label>
						   <div class="col-md-4 col-sm-4 col-xs-12"> 
						  <div class="form-group">
							<label class="checkbox-inline">
							<?php if($teach_language=='English' || $teach_language=='english') { ?>
							  <input type="radio" id="teach_language" value="English" name="teach_language" checked> English
							<?php } else { ?>
							<input type="radio" id="teach_language" value="English" name="teach_language"> English
							<?php } ?>
							</label>
						  </div>
						  </div>
						  <div class="col-md-4 col-sm-4 col-xs-12"> 
						  <div class="form-group">
							<label class="checkbox-inline">
							<?php if($teach_language=='Hindi' || $teach_language=='hindi') { ?>
							  <input type="radio" id="teach_language" value="Hindi" name="teach_language" checked> Hindi
							  <?php } else { ?>
							  <input type="radio" id="teach_language" value="Hindi" name="teach_language"> Hindi
							  <?php } ?>
							</label>
						  </div>
						  </div>
						  <div class="col-md-4 col-sm-4 col-xs-12"> 
						  <div class="form-group">
							<label class="checkbox-inline">
							<?php if($teach_language=='Both' || $teach_language=='both') { ?>
							  <input type="radio" id="teach_language" value="Both" name="teach_language" checked> Both
							<?php } else { ?>
								<input type="radio" id="teach_language" value="Both" name="teach_language"> Both
							<?php } ?>
							</label>
						  </div>
						  </div>
						  </div>
						   <div class="col-md-6 col-sm-6 col-xs-12"> 
						  <div class="form-group">
							<label for="">REGIONAL LANGUAGE</label>
							<input type="text" class="form-control" id="regional_language" name="regional_language" value="<?php echo $regional_language; ?>">
						</div>
						  </div>
						  <div class="col-md-6">
						  </div>
						  <div class="clearfix"></div>
							<div class="detail-box">
					<div class="col-md-12">
						  <label>ACADEMIC / PROFESSIONAL QUALIFICATIONS (STARTING WITH HIGHEST DEGREE OBTAINED – EXAMINATIONS FROM SECONDARY ONWARDS) 
						  <span span data-id="tab_logic6" class="plus add_row_exam"><img src="../images/plus.png" /></span>
						  </label>
						<div class="table-responsive">
							<table class="table table-bordered custm-table" id="tab_logic6">
								<thead>
									<tr>
										
										<th rowspan="2">EXAMINATION PASSED (WRITE COMPLETE NAME OF COURSE PASSED)</th>
										<th rowspan="2">YEAR OF PASSING</th>
										<th rowspan="2">SUBJECTS OFFERED</th>
										<th rowspan="2">MEDIUM OF INSTRUCTION</th>
										<th class="text-center" colspan="3">AGGREGATE MARKS</th>
										<th rowspan="2">DIVISION</th>
										<th rowspan="2">SCHOOL/COLLEGE</th>
										<th rowspan="2">BOARD/UNIVERSITY</th>
									</tr>
									<tr>
										<th class="text-center">MAX MARKS</th>
										<th class="text-center">MARKS OBTAINED</th>
										<th class="text-center">% OF MARKS</th>
									</tr>
								</thead>
								<tbody><?php
								
										
											
											while($row4=mysqli_fetch_array($query4))
											{
												$acadmic_id=$row4['acadmic_id'];
												$examination_passed=$row4['examination_passed'];
												$year_of_passing=$row4['year_of_passing'];
												$subject_offered=$row4['subject_offered'];
												$medium_of_insruction=$row4['medium_of_insruction'];
												$max_marks=$row4['max_marks'];
												$marks_obtain=$row4['marks_obtain'];
												$marks_percentage=$row4['marks_percentage'];
												$division=$row4['division'];
												$school=$row4['school'];
												$board=$row4['board'];
												?>
												<tr>
													<input type="hidden" name="acadmic_id[]" value="<?php echo $acadmic_id ;?>" >
													<td><input type="text" name="examination_passed[]" value="<?php echo $examination_passed ;?>" ></td>
													<td><input type="text" name="year_of_passing[]" value="<?php echo $year_of_passing ;?>" ></td>
													<td><input type="text" name="subject_offered[]" value="<?php echo $subject_offered ;?>" ></td>
													<td><input type="text" name="medium_of_insruction[]" value="<?php echo $medium_of_insruction ;?>" ></td>
													<td><input type="text" name="max_marks[]" value="<?php echo $max_marks ;?>" ></td>
													<td><input type="text" name="marks_obtain[]" value="<?php echo $marks_obtain ;?>" ></td>
													<td><input type="text" name="marks_percentage[]" value="<?php echo $marks_percentage ;?>" ></td>
													<td><input type="text" name="division[]" value="<?php echo $division ;?>" ></td>
													<td><input type="text" name="school[]" value="<?php echo $school ;?>" ></td>
													<td><input type="text" name="board[]" value="<?php echo $board ;?>" ></td>
													
												</tr>
													
											<?php }
										?>			
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
										<td></td>
										<td data-name="del">
											<button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div><!--detail-box-->
				<div class="detail-box">
					<div class="col-md-12">
						<label>FOR TEACHERS POST- TEACHING EXPERIENCE (IN RECOGNIZED SCHOOLS ONLY) & FOR VOCATIONAL COURSES TEACHING/ WORK EXPERIENCE IN AN  <!--<span data-id="tab_logic5" class="plus add_row1"><img src="../images/plus.png" /></span> --></label>
						<label>ORGANIZATION (IN CHRONOLOGICAL ORDER STARTING WITH THE MOST  RECENT) (ATTACH SEPARATE SHEET IF NECESSARY) </label>
						<div class="table-responsive">
							<table class="table table-bordered custm-table" id="tab_logic5">
								<thead>
									<tr>

										<th rowspan="2">NAME & ADDRESS OF </br>THE INSTITUTION</th>
										<th rowspan="2">DESIGNATION</th>
										<th class="text-center" colspan="2">PERIOD</th>
										<th class="text-center" rowspan="2">CLASSES/SUBJECTS TAUGHT</th>
										<th class="text-center" rowspan="2">NATURE OF DUTIES</th>
										<th class="text-center" rowspan="2">TOTAL EXPERIENCE</th>
									</tr>
									<tr>
										<th class="text-center">Form</th>
										<th class="text-center">TO</th>
									</tr>
								</thead>
								<tbody>
								<?php
								
									
											
											while($row5=mysqli_fetch_array($query5))
											{
												$exp_id=$row5['exp_id'];
												$institute=$row5['institute'];
												$designation=$row5['designation'];
												$period_from=$row5['period_from'];
												$period_to=$row5['period_to'];
												$sub_taught=$row5['sub_taught'];
												$duties=$row5['duties'];
												$total_experience1=$row5['total_experience'];
												
												
												?>
												<tr>
											<input type="hidden" name="exp_id[]" value="<?php echo $exp_id ;?>" >
													<td><input type="text" name="institute[]" value="<?php echo $institute ;?>" ></td>
													<td><input type="text" name="designation[]" value="<?php echo $designation ;?>" ></td>
													<td><input type="text" name="period_from[]" id="from" value="<?php echo $period_from ;?>" ></td>
													<td><input type="text" name="period_to[]" id="to" value="<?php echo $period_to ;?>" ></td>
													<td><input type="text" name="sub_taught[]" value="<?php echo $sub_taught ;?>" ></td>
													<td><input type="text" name="duties[]" value="<?php echo $duties ;?>" ></td>
													<td><input type="text" name="total_experience1[]" value="<?php echo $total_experience1;?>" ></td>
												</tr>
													
											<?php }
										?>	
									
								
								</tbody>
							</table>
						</div>
					</div>
				</div><!--detail-box-->
							<div class="detail-box">
								<div class="col-md-12">
									<label>DETAILS OF ADMINISTRATIVE EXPERIENCE, IF ANY: <!-- <span data-id="tab_logic4" class="plus add_row"><img src="../images/plus.png" /></span> --></label>
									<label>(AS CLASS COORDINATOR, ACTIVITY COORDINATOR, EXAMINATION DEPT. HEAD, CCE COORDINATOR)</label>
									<div class="table-responsive">
										<table class="table table-bordered custm-table" id="tab_logic4">
											<thead>
												<tr>
													
													<th>NAME OF THE SCHOOL/BOARD</th>
													<th>RESPONSIBILITIES HELD</th>
													<th class="text-center">FOR CLASSES</th>
													<th class="text-center">NO. OF YEARS</th>
													<th class="text-center" >Total Experience :</th>
												</tr>
											</thead>
											<tbody>
												<?php
								while($row7=mysqli_fetch_array($query7))
											{
												$administrative_id=$row7['administrative_id'];
												$school2=$row7['school'];
												$responsibilities=$row7['responsibilities'];
												$for_class=$row7['for_class'];
												$no_of_year=$row7['no_of_year'];
												$total_experience2=$row7['total_experience'];
												
												
												
												
												?>
												<tr>
											<input type="hidden" name="administrative_id[]" value="<?php echo $administrative_id ;?>" >
													<td><input type="text" name="school2[]" value="<?php echo $school2 ;?>" ></td>
													<td><input type="text" name="responsibilities[]" value="<?php echo $responsibilities ;?>" ></td>
													<td><input type="text" name="for_class[]" value="<?php echo $for_class ;?>" ></td>
													<td><input type="text" name="no_of_year[]" value="<?php echo $no_of_year ;?>" ></td>
													<td><input type="text" name="total_experience2[]" value="<?php echo $total_experience2 ;?>" ></td>
												</tr>
													
											<?php }
										?>	
												
												
												
											</tbody>
										</table>
									</div>
								</div>
							</div><!--detail-box-->
							<div class="detail-box">
								<div class="col-md-12">
									<label>EXPERIENCE OF NON TEACHING STAFF) (ADMINISTRATIVE / TECHNICAL/CLERICAL/OFFICE STAFF/DRIVERS/HELPERS ETC.) <!--<span data-id="tab_logic3" class="plus add_row"><img src="../images/plus.png" /></span>--> </label>
									<div class="table-responsive">
										<table class="table table-bordered custm-table" id="tab_logic3">
											<thead>
												<tr>
													
													<th rowspan="2">NAME, ADDRESS & CONTACT NO. OF THE EMPLOYER</th>
													<th rowspan="2">PROFESSION/</br>BUSINESS</th>
													<th rowspan="2">DESIGNATION/</br>POST</th>
													<th rowspan="2">NATURE OF DUTIES</th>
													<th class="text-center" colspan="2" >PERIOD</th>
													<th rowspan="2">MONTHLY SALARY / INCOME</th>
													<th rowspan="2" >Total Experience </th>
												</tr>
												<tr>
													<th class="text-center">Form</th>
													<th class="text-center">TO</th>
												</tr>
											</thead>
											<tbody>
											
												<?php
								while($row8=mysqli_fetch_array($query8))
											{
												$ntse_id=$row8['ntse_id'];
												$employee_info=$row8['employee_info'];
												$bussiness=$row8['bussiness'];
												$post=$row8['post'];
												$nature_of_duties=$row8['nature_of_duties'];
												$period_from1=$row8['period_from'];
												$period_to1=$row8['period_to'];
												$salary=$row8['salary'];
												$total_experience3=$row8['total_experience'];
												?>
												<tr>
													<input type="hidden" name="ntse_id[]" value="<?php echo $ntse_id ;?>" >
													<td><input type="text" name="employee_info[]" value="<?php echo $employee_info ;?>" ></td>
													<td><input type="text" name="bussiness[]" value="<?php echo $bussiness ;?>" ></td>
													<td><input type="text" name="post[]" value="<?php echo $post ;?>" ></td>
													<td><input type="text" name="nature_of_duties[]" value="<?php echo $nature_of_duties ;?>" ></td>
													<td><input type="text" name="period_from1[]" id="from1"value="<?php echo $period_from1 ;?>" ></td>
													<td><input type="text" name="period_to1[]" id="to1"value="<?php echo $period_to1 ;?>" ></td>
													<td><input type="text" name="salary[]" value="<?php echo $salary ;?>" ></td>
													<td><input type="text" name="total_experience3[]" value="<?php echo $total_experience3 ;?>" ></td>
												</tr>
													
											<?php }
										?>	
											
												
											</tbody>
										</table>
									</div>
								</div>
							</div><!--detail-box-->
							 <div class="col-md-6 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">N.C.C./N.S.S./NATIONAL SCOUT TRAINING, IF ANY?</label>
									<input class="form-control" type="text" id="ncc_detail" name="ncc_detail" value="<?php echo $ncc_detail; ?>">
								</div>
							</div><!--col-md-12-->
							 <div class="col-md-6 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">KNOWLEDGE OF FOREIGN LANGUAGE (GIVE DETAILS)</label>
									<input class="form-control" type="text" id="foregin_language_detail" name="foregin_language_detail" value="<?php echo $foregin_language_detail; ?>">
								</div>
							</div><!--col-md-12-->
							 <div class="col-md-5 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">ARE YOU TECHNO-SAVVY /COMPUTER LITERATE (GIVE DETAILS)</label>
									<input  class="form-control" type="text" id="techosavvy_computerliterate_detail" name="techosavvy_computerliterate_detail" value="<?php echo $techosavvy_computerliterate_detail; ?>">
									
								</div>
							</div><!--col-md-12-->
							 <div class="col-md-7 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">LITERARY, CULTURAL, SPORTS OR OTHER ACTIVITIES IN WHICH THE APPLICANT HAS DISTINCTIONS/AWARDS</label>
									<input  class="form-control" type="text" id="awards_detail" name="awards_detail" value="<?php echo $awards_detail; ?>">
								</div>
							</div><!--col-md-12-->
							<div class="clearfix"></div>
							 <div class="col-md-6 col-sm-6 col-xs-12"> 
								<label>NAME AND ADDRESS OF TWO REFERENCES:</label>
							</div>
							<div class="main-form">
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label for=""><span class="bold-a">A) </span> First Name</label>
											<input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo $f_name; ?>">
										</div>
									  </div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Last Name</label>
											<input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo $l_name; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Designation</label>
											<input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation; ?>">
										</div>
									</div>
										<div class="clearfix"></div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="">Address</label>
											<input  class="form-control" type="text" id="address" name="address" value="<?php echo $address; ?>"></br>
										</div>
									</div><!--col-md-12-->
									<div class="clearfix"></div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Pin</label>
											<input type="text" class="form-control" id="pin" name="pin" value="<?php echo $pin; ?>">
										</div>
									  </div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">TELEPHONE NO</label>
											<input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $telephone; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">E-Mail</label>
											<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
										</div>
									</div>
								</div><!--col-md-12-->
							</div><!--main-form-->
							<div class="main-form">
								<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label for=""><span class="bold-a">B) </span> First Name</label>
											<input type="text" class="form-control" id="f_name1" name="f_name1" value="<?php echo $f_name1; ?>">
										</div>
									  </div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Last Name</label>
											<input type="text" class="form-control" id="l_name1" name="l_name1" value="<?php echo $l_name1; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Designation</label>
											<input type="text" class="form-control" id="designation1" name="designation1" value="<?php echo $designation1; ?>">
										</div>
									</div>
										<div class="clearfix"></div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="">Address</label>
											<input  class="form-control" type="text" id="address1" name="address1" value="<?php echo $address1; ?>">
									
										</div>
									</div><!--col-md-12-->
									<div class="clearfix"></div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Pin</label>
											<input type="text" class="form-control" id="pin1" name="pin1" value="<?php echo $pin1; ?>">
										</div>
									  </div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">TELEPHONE NO</label>
											<input type="text" class="form-control" id="telephone1" name="telephone1" value="<?php echo $telephone1; ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">E-Mail</label>
											<input type="text" class="form-control" id="email1" name="email1" value="<?php echo $email1; ?>">
										</div>
									</div>
								</div><!--col-md-12-->
							</div><!--main-form-->
							<div class="clearfix"></div>
								<div class="dependent-box">
								<div class="col-md-12">
									<label>DEPENDENT MEMBERS (S) OF FAMILY TO STAY WITH THE CANDIDATE (OTHER THAN SPOUSE & DEPENDENT CHILDREN)  <!--<span data-id="tab_logic2" class="plus add_row"><img src="../images/plus.png" /></span> --></label>
									<div class="table-responsive">
										<table class="table table-bordered custm-table" id="tab_logic2">
											<thead>
												<tr>
													
													<th >NAME</th>
													<th >Date of Birth</th>
													<th >Relationship</th>
													<th >OCCUPATION WITH</br> MONTHLY INCOME</th>
													<th >ECONOMICALLY OR</br> PHYSICALLY DEPENDENT OR</br> ANY OTHER JUSTIFICATION OF</br> THEIR STAY</th>
													<th >ANY CHRONIC ILLNESS</br>OR</br> PHYSICAL DISABILITY</th>
												</tr>
											</thead>
											<tbody>
												<?php
											
								while($row9=mysqli_fetch_array($query9))
											{
												$member_id=$row9['member_id'];
												$name=$row9['name'];
												$dob1=$row9['dob'];
												$relationship=$row9['relationship'];
												$occupation=$row9['occupation'];
												$dependent=$row9['dependent'];
												$disability=$row9['disability'];
												
												
												?>
												<tr>
												<input type="hidden" name="member_id[]" value="<?php echo $member_id ;?>" >
													<td><input type="text" name="name[]" value="<?php echo $name ;?>" ></td>
													<td><input type="text" name="dob1[]" id="dep" value="<?php echo $dob1 ;?>" ></td>
													<td><input type="text" name="relationship[]" value="<?php echo $relationship ;?>" ></td>
													<td><input type="text" name="occupation[]" value="<?php echo $occupation ;?>" ></td>
													<td><input type="text" name="dependent[]" value="<?php echo $dependent ;?>" ></td>
													<td><input type="text" name="disability[]" value="<?php echo $disability ;?>" ></td>
													
												</tr>
													
											<?php }
										?>	
												
												
											</tbody>
										</table>
										<p>NOTE: FOR DEPENDENT PARENTS: STATE IF HE/SHE IS THE ONLY CHILD OF PARENTS</p>
									</div>
								</div>
							</div><!--dependent-box-->
							<div class="dependent-box">
								<div class="col-md-12">
									<label>WHETHER ACCOMMODATION REQUIRED (STATE NUMBER OF FAMILY MEMBERS) <!--<span id="" data-id="tab_logic1" class="plus add_row" ><img src="../images/plus.png" /></span> --></label>
									<div class="table-responsive">
										<table class="table table-bordered custm-table" id="tab_logic1">
											<thead>
												<tr>
													
													<th >NAME</th>
													<th >Relation</th>
													<th >Will live in Dera</th>
													
													<th >ANY CHRONIC ILLNESS OR </br>PHYSICAL DISABILITY</th>
													
												</tr>
											</thead>
											<tbody>
															<?php
										
								while($row10=mysqli_fetch_array($query10))
											{
												$acc_id=$row10['acc_id'];
												$name1=$row10['name'];
												$relation=$row10['relation'];
												$live_with=$row10['live_with'];
												
												$diability=$row10['diability'];
												
												
												?>
												<tr>
													<input type="hidden" name="acc_id[]" value="<?php echo $acc_id ;?>" >
													<td><input type="text" name="name1[]" value="<?php echo $name1 ;?>" ></td>
													<td><input type="text" name="relation[]" value="<?php echo $relation ;?>" ></td>
													<td><input type="text" name="live_with[]" value="<?php echo $live_with ;?>" ></td>
												
													<td><input type="text" name="diability[]" value="<?php echo $diability ;?>" ></td>
												</tr>
													
											<?php }
										?>	
												
											</tbody>
										</table>
									</div>
								</div>
							</div><!--dependent-box-->
							
							<div class="clearfix"></div>	
							 <div class="col-md-12 col-sm-6 col-xs-12"> 
							<label for="">IS ANY CRIMINAL CASE PENDING AGAINST YOU?</label>
							
								<div class="form-group criminal">
									<div  class="checkbox-inline"><label>
									<?php if($casepending_detail=='yes') { ?>
									<input name="cr_radio" id="casepending_detail" type="radio" value="yes" checked>Yes</label>
									
									<label><input name="cr_radio" id="casepending_detail" type="radio" value="no">No</label></div>
									<?php } else { ?>
									<div  class="checkbox-inline"><label>
									<input name="cr_radio" id="casepending_detail" type="radio" value="yes">Yes</label>
									<label><input name="cr_radio" id="casepending_detail" type="radio" value="no" checked>No</label>
									</div>
									<?php } ?>
									
								</div>
							<!--<div class="col-md-3 col-sm-3">
								<div class="form-group">
									<label class="checkbox-inline">
									<?php if($casepending_detail=='no') { ?>
									<input name="cr_radio" id="casepending_detail" type="radio" value="no" checked>
									<?php } else { ?>
									<input name="cr_radio" id="casepending_detail" type="radio" value="yes" >
									<?php } ?>
									No
									</label>
								</div>
							</div>-->
							</div>				
							<!-- <div class="col-md-6 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">(IF YES, PLEASE GIVE DETAILS):</label>
									<input class="form-control" type="text" id="casepending_detail" name="casepending_detail" value="<?php //echo $casepending_detail; ?>">
								</div>
							</div><!--col-md-12-->
							 <div class="col-md-6 col-sm-6 col-xs-12"> 
							<label for="">HAVE YOU EVER BEEN CONVICTED IN A CRIMINAL CHARGE BY ANY COURT?</label>
								<div class="form-group criminal">
									<label class="checkbox-inline">
									<?php if($criminalcharged_detail=='yes') { ?>
									<input name="case_radio" id="inlineCheckbox1" type="radio" value="yes" checked>Yes</label>
									<label><input name="case_radio" id="inlineCheckbox1" type="radio" value="no">No</label>
									<?php } else { ?>
									<label>
									<input name="case_radio" id="inlineCheckbox1" type="radio" value="yes">Yes</label>
									<label><input name="case_radio" id="inlineCheckbox1" type="radio" value="no" checked>No</label>
									<?php } ?>
									
								</div>
							<!--<div class="col-md-3 col-sm-3">
								<div class="form-group">
									<label class="checkbox-inline">
									<?php //if($criminalcharged_detail=='no') { ?>
									<input name="case_radio" id="inlineCheckbox1" type="radio" value="no" checked>
									<?php //} else { ?>
									<input name="case_radio" id="inlineCheckbox1" type="radio" value="yes">
									<?php //} ?>
									No
									</label>
								</div>
							</div>-->
							</div>
							 <!--<div class="col-md-6 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">(IF YES, PLEASE GIVE DETAILS):</label>
									<input  class="form-control" type="text" id="criminalcharged_detail" name="criminalcharged_detail" value="<?php //echo $criminalcharged_detail; ?>">
								</div>
							</div><!--col-md-12-->			
							 <div class="col-md-7 col-sm-6 col-xs-12"> 
								<div class="form-group">
									<label for="">Have you earlier applied for sewa in dera  or for employment in pathseekers/RSSB/Hospital units of MJSMRS or any other society of Dera (Details Thereof)</label>
									<input  class="form-control" type="text" id="eariler_applied_employement_ps" name="eariler_applied_employement_ps" value="<?php echo $eariler_applied_employement_ps; ?>">
								</div>
							</div><!--col-md-12-->
							 <div class="col-md-5 col-sm-6 col-xs-12">
                                 <div class="form-group">
									<label for="">IF SELECTED, THE EARLIEST YOU CAN JOIN BY (NOTICE PERIOD)</label>
									<input  class="form-control" type="text" id="noticeperiod_detail" name="noticeperiod_detail" value="<?php echo $noticeperiod_detail; ?>">
								</div>
							 </div>
							<div class="clearfix"></div>
									<div class="dependent-box">
								<div class="col-md-12">
									<label>Specify, if spouse/parents/any other relative doing sewa<!--<span id="" data-id="tab_logic" class="plus add_row"><img src="../images/plus.png" /></span> -->  
									</label>						
									<div class="table-responsive">
										<table class="table table-bordered custm-table " id="tab_logic">
											<thead>
												<tr>
													
													<th>NAME</th>
													<th >AGE</th>
													<th >ADDRESS</th>
													<th>Relation</th>
													<th >DEPARTMENT</th>
													<th >DATE OF JOINING</th>
													<th >H /P</th>
													<th >MONTHLY SALARY</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
										
										
								while($row11=mysqli_fetch_array($query11))
											{
												$other_id=$row11['other_id'];
												$name2=$row11['name'];
												$address2=$row11['address'];
												$age2=$row11['age'];
												$relation1=$row11['relation'];
												$department=$row11['department'];
												$joining_date=$row11['joining_date'];
												$h_p=$row11['h_p'];
												$salary1=$row11['salary'];
												
												
												?>
												<tr>
													<input type="hidden" name="other_id[]" value="<?php echo $other_id ;?>" >
													<td><input type="text" name="name2[]" value="<?php echo $name2 ;?>" ></td>
													<td><input type="text" name="address2[]" value="<?php echo $address2 ;?>" ></td>
													<td><input type="text" name="age2[]" value="<?php echo $age2 ;?>" ></td>
													<td><input type="text" name="relation1[]" value="<?php echo $relation1 ;?>" ></td>
													<td><input type="text" name="department[]" value="<?php echo $department ;?>" ></td>
													<td><input type="text" name="joining_date[]" value="<?php echo $joining_date ;?>" ></td>
													<td><input type="text" name="h_p[]" value="<?php echo $h_p ;?>" ></td>
													<td><input type="text" name="salary1[]" value="<?php echo $salary1 ;?>" ></td>
													
												</tr>
													
											<?php }
										?>	
													<!-- <tr  id="addr0tab_logic" data-id="0" class="hidden">
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td data-name="del" colspan="2">
														<button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
													</td>
												</tr>
											<tr id='addr1' data-id="1">
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2"></td>
													<td colspan="2">
														<button class="btn btn-danger glyphicon glyphicon-remove row-remove delete_row"  value="" name="del1"></button>
													</td>
												</tr>
												 -->
											</tbody>
										</table>
										
									</div>
								</div>
							</div><!--dependent-box-->
								<div class="col-md-12">
							<div class="form-group">
										<label for="">Other Information</label>
										<input  class="form-control" type="text"  name="other" value="<?php echo $other_info ?>">
									</div>
									</div>
							<div class="dependent-box">
								<div class="col-md-12">
								<label class="text-center">DECLARATION TO BE SIGNED BY THE CANDIDATE</label>
								<p>I HEREBY DECLARE THAT THE INFORMATION PROVIDED BY ME IN THE APPLICATION IS TRUE, COMPLETE AND CORRECT TO THE BEST OF MY KNOWLEDGE AND BELIEF AND
									THAT NOTHING HAS BEEN CONCEALED OR DISTORTED. IF AT ANY TIME, I AM FOUND TO HAVE CONCEALED/ DISTORTED ANY INFORMATION OR GIVEN ANY FALSE 
									STATEMENT, MY APPLICATION/APPOINTMENT SHALL LIABLE TO BE SUMMARILY REJECTED/ TERMINATED WITHOUT NOTICE.</p>
								</div>
								
								<div class="clearfix"></div>
								<div class="col-md-3 col-sm-3">
									
									<div class="form-group">
										<label for="">DATE</label>
										<input class="form-control" type="text" id="submit_date" name="submit_date" value="<?php
   $timestamp = strtotime($year);
          echo date('d/m/Y', $timestamp);
					   
					   
										?>">
									</div>
								
									<div class="form-group">
										<label for="">PLACE</label>
										<input  class="form-control" type="text" id="submit_place" name="submit_place" value="<?php echo $submit_place; ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6"></div>
								<!--<div class="col-md-3 col-sm-3">
									<div class="form-group">
										<label for="">SIGNATURE</label>
										<input class="form-control" type="text" id="sign" name="sign" value="<?php //echo $sign; ?>">
									</div>
									<div class="form-group">
										<label for="">NAME OF THE APPLICANT</label>
										<input class="form-control" type="text" id="applicant_name" name="applicant_name" value="<?php //echo $applicant_name; ?>">
									</div>
									
								</div>-->

								<div class="form-group">
										<input style="margin-top: 115px;" class="btn btn-success margin-top" type="submit" value="UPDATE" name="submit">
									</div>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
		</div>
		<div class="clearfix"></div>
		<?php include_once('admin_footer.php'); ?>
