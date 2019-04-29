<html>
<head>  

  <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,700italic,600italic,400italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,400italic,600,300italic,600italic,700,700italic,900,900italic|Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	</head>
<?php   
error_reporting(0);
include_once('../config.php');
$id = $_REQUEST['id'];
	?>
	  <?php 
	  
				$query="select * from  personal_details where id=$id";
				  $row1=mysqli_query($query);
				  while($row=mysqli_fetch_array($row1))
				  {
					 $first_name=$row['first_name'];
					 $Middle_Name=$row['middle_name'];
					 $Last_Name=$row['last_name'];
					 $Post_Applied=$row['post_applied'];
					 $dob=$row['dob'];
					 $age=$row['age'];
					 $FATHER=$row['father_name'];
					 $husband=$row['husband'];
					 $PERMANENT_ADDRESS=$row['address'];
					
					 $MARITAL=$row['marital_status'];
					 $NATIONALITY=$row['nationality'];
					 $DOMICILE=$row['state_of_domicile'];
					 
				$address=$row['address'];
					 $communication_address=$row['communication_address'];
					 
					 $pin=$row['pin'];
					 $contact_no=$row['contact_no'];
					 $comm_telephoneno=$row['comm_telephoneno'];
					 
					  $comm_mobileno=$row['comm_mobileno'];
					 $comm_email=$row['comm_email'];
					 $comm_pin=$row['comm_pin'];
					 
					 	 $present_post=$row['present_post'];
					 $present_salary=$row['present_salary'];
					 $present_employer=$row['present_employer'];
					  $regional_language=$row['regional_language'];
					 $teach_language=$row['teach_language'];
					 $ctet_tet_detail=$row['ctet_tet_detail']; 
						$pay_band=$row['pay_band'];
					 $grade_pay=$row['grade_pay'];
					 $criminalcharged_detail=$row['criminalcharged_detail'];
					 $casepending_detail=$row['casepending_detail'];
					 $noticeperiod_detail=$row['noticeperiod_detail'];
					 $eariler_applied_employement_ps=$row['eariler_applied_employement_ps'];
				$image=$row['image'];	
	$ncc_detail=$row['ncc_detail'];
	$foregin_language_detail=$row['foregin_language_detail']; 
	$techosavvy_computerliterate_detail=$row['techosavvy_computerliterate_detail'];
	 $awards_detail=$row['awards_detail'];
	 $other_info=$row['other_information'];
	 $dt_created =$row['dt_created'];
	 $submit_place=$row['submit_place'];
							
				  }
				  	
				?>

<body>

  <div class="" role="">
  	

    <div class="">
	
	
      <div class="">
        <h4 class="modal-title" id="myModalLabel">APPLICATION FORM FOR THE POST OF TEACHING/NON-TEACHING STAFF</h4>
	</div>
        <div id="printableArea">
	  
      <div class="modal-body" style="max-height:550px;">
	
		<div class="col-md-12">
			<div class=""> 
				<table class="view-table">
				  <tbody>
					<tr>
					  <td><strong>First Name</strong></td>
					  <td><strong>Middle Name</strong></td>
					  <td><strong>Last Name</strong></td>
					  <td rowspan="2">
						<div class="pro-pic" style="width:165px;">
								<img class="img-responsive" height="100px;" width="100px;" src="../../uploads/1444232786IMG_20150501_171412_1.jpg"  alt="" id="output"/></div>
					  </td>
					</tr>
					<tr>
					  <td><?php echo $first_name; ?> </td>
					  <td><?php echo $Middle_Name; ?></td>
					  <td><?php echo $Last_Name; ?></td>
					</tr>
					<tr>
					  <td><strong>Post Applied For</strong></td>
					   <td><strong>DATE OF BIRTH (WITH PROOF) </strong></td>
					   <td><strong>AGE</strong></td>
					   <?php 
					if($FATHER!='')
					{
						?>					
					  <td><strong>FATHER’S NAME</strong></td>
					   
					<?php 
					}
					else
					{
						?>
					  <td><strong>HUSBAND’S NAME</strong></td>
					  
					<?php 
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $Post_Applied; ?></td>
                      <td>
					  <?php 
					 $timestamp = strtotime($dob);
                      echo date('d/m/Y', $timestamp);
		               ?>
					  </td>
					    <td>
							
												<?php	
							$to_arr = explode("-",$dob);
	
	   $r8=$to_arr[0];
	   $r9=$to_arr[1];
	   $r10=$to_arr[2];	
	if((strlen($r8)=='4' && $r8>0)&&(strlen($r9)=='2' && $r9>0 && $r9<=12)&& (strlen($r10)=='2' && $r10>0 && $r10<=31))
	{
	 			
		$to_array = explode("-",$dob);
 	 $r=	$to_array[2]."-".$to_array[1]."-".$to_array[0];									 
$to=date("Y-m-d");
$date1 = new DateTime("$to");
$date2 = new DateTime("$r");
$diff = $date1->diff($date2);

echo " " . $diff->y . "  " ;
	}
	else
	{
		echo " ";
	}
					?>								
			        </td>
					 <?php 
					if($FATHER!='')
					{
						?>					
					  
					   <td><?php echo $FATHER; ?></td>
					<?php 
					}
					else
					{
						?>
					  
					  <td><?php echo $husband; ?></td>
					<?php 
					}
					?>
					</tr>
					<tr>
					  <td><strong>PERMANENT HOME ADDRESS</strong></td>
					  <td><strong>ADDRESS FOR COMMUNICATION</strong></td>
					  <td colspan="2"><strong>Email-Address</strong></td>
					</tr>
					<tr>
					 <td>
					  <?php echo $communication_address; ?>
					   <br>Pincode : <?php echo $pin;?>
							<br>Phone : <?php echo $comm_mobileno;  ?>
					 </td>
					 <td><?php echo $address; ?>
					 <br>Pincode : <?php echo $comm_pin;?>
							<br>Phone : <?php echo $contact_no;  ?>
					</td>
					<td colspan="2">
							<?php echo $comm_email;  ?>
					</td>
					</tr>
					<tr>
					  <td><strong>MARITAL STATUS </strong></td>
					  <td><strong>NATIONALITY</strong></td>
					  <td colspan="2"><strong>STATE OF DOMICILE</strong></td>
					</tr>
					<tr>
					<td><?php echo $MARITAL;  ?></td>
					 <td><?php echo $NATIONALITY;  ?></td>
					 <td colspan="2"><?php echo $DOMICILE;  ?></td>
					</tr>
					
				<?php  $query="select * from  spouse_detail where id='$id'";
				  $row1=mysqli_query($query);
				  while($row=mysqli_fetch_array($row1))
				  {
					  
					 $name11=$row['name'];
					 $dob=$row['age'];
					 $profession11=$row['profession'];
				     $designation11=$row['designation'];
					 $place_of_posting11=$row['place_of_posting'];
					 $monthly_income11=$row['monthly_income'];
										
				  }
				  ?>
				 <?php if($name11!='')
				 {
					 ?>
					<tr>
					  <td colspan="4"><strong>DETAILS OF SPOUSE</strong></td>
					  </tr>
					  <tr>
					   <td colspan="4">
					   <table class="view-table" style="margin:0;">
						<tr>
							<td><strong>Name</strong></td>
							<td><strong>DATE OF BIRTH</strong></td>
							<td><strong>AGE</strong></td>
							<td><strong>PROFESSION (DEPARTMENT)</strong></td>
							<td><strong>DESIGNATION</strong></td>
							<td><strong>PLACE OF POSTING</strong></td>
							<td><strong>INCOME(Monthly)</strong></td>
						</tr>
						<tr>
							<td><span class="d_txt"><?php echo $name11;  ?></span></td>
							<td><span class="d_txt"><?php echo $dob;  ?> </span></td>
							<td><span class="d_txt">
							
							
						<?php	
					
					
						$to_array = explode("/",$dob);
	$r=	$to_array[2]."-".$to_array[1]."-".$to_array[0];	
	 $r1=$to_array[2];
	 $r2=$to_array[1];
	 $r3=$to_array[0];	
	if((strlen($r1)=='4' && $r1>0)&&(strlen($r2)=='2' && $r2>0 && $r2<=12)&& (strlen($r3)=='2' && $r3>0 && $r3<=31))
	{
						
						$to_array = explode("/",$dob);
	$r=	$to_array[2]."-".$to_array[1]."-".$to_array[0];			
	
$to=date("Y-m-d");
$date1 = new DateTime("$to");
$date2 = new DateTime("$r");
$diff = $date1->diff($date2);

echo " " . $diff->y . "  " ;
	}
	else
	{
		echo "";
	}
							
							?>
						
							</span></td>
							<td><span class="d_txt"><?php echo $profession11;  ?> </span></td>
							<td><span class="d_txt"><?php echo $designation11;  ?> </span></td>
							<td><span class="d_txt"> <?php echo $place_of_posting11;  ?> </span></td>
							<td><span class="d_txt">  <?php echo $monthly_income11;  ?></span></td>
						</tr>
					   </table>
					  </td>
					</tr>
					<?php 
				 }
				 ?>
					<tr>
					  <td colspan="4"><strong>PARTICULARS OF CHILDREN </strong></td>
					</tr> 
						<?php $query="select * from  children_detail where id='$id'";
				  $row1=mysqli_query($query);
				  ?>
					<tr> 
					<td colspan="4">
						<table class="view-table" style="margin:0;">
						<tr>
						<td><strong>Gender</strong></td>
							<td><strong>Name</strong></td>
							<td><strong>DATE OF BIRTH</strong></td>
							<td><strong>AGE</strong></td>
							<td><strong>WHETHER MARRIED & SETTLED</strong></td>
							<td><strong>WHETHER STUDYING, IF SO, STATE CLASS</strong></td>
					
							
						</tr>
						<?php
						

				  while($row=mysqli_fetch_array($row1))
				  {
					  
					 $name=$row['name'];
					 $dob=$row['dob']; 
					 $married_status=$row['married_status'];
					 
					
					 $qualification_detail=$row['qualification_detail'];
					
					 $gender=$row['gender'];
					 ?>
							<tr>
				<td><span class="d_title"> <?php echo $gender;  ?></span></td>
				<td><span class="d_title"><?php echo $name;?></span></td>
				<td><span class="d_title"><?php echo $dob;?></span></td>
				<td><span class="d_title"><?php 
					 	$to_arra = explode("/",$dob);
	
	  $r5=$to_arra[2];
	  $r6=$to_arra[1];
	  $r7=$to_arra[0];	
	if((strlen($r5)=='4' && $r5>0)&&(strlen($r6)=='2' && $r6>0 && $r6<=12)&& (strlen($r7)=='2' && $r7>0 && $r7<=31))
	{
	 			
		$to_array = explode("/",$dob);
 	$r=	$to_array[2]."-".$to_array[1]."-".$to_array[0];									 
$to=date("Y-m-d");
$date1 = new DateTime("$to");
$date2 = new DateTime("$r");
$diff = $date1->diff($date2);

echo " " . $diff->y . "  " ;
	}
	else
	{
		echo "";
	}
				?> 
				</span></td>
				<td><span class="d_title"> <?php echo $married_status;  ?></span></td>
				<td><span class="d_title"> <?php echo $qualification_detail;  ?></span></td>				
					  </tr>					
				
<?php 				}

	
				  ?>
                   </table>
				   </td>
					</tr>
					<tr>
					  <td><strong>PRESENT POST</strong></td>
					  <td><strong> PRESENT SALARY (PER MONTH)</strong></td>
					   <td><strong> PAY BAND</strong></td>
					    <td><strong> GRADE PAY</strong></td>
					</tr>
					<tr>
					  <td><?php echo $present_post;  ?> </td>
					  <td><?php echo $present_salary;  ?></td>
					  <td><?php echo $pay_band;  ?> </td>
					<td><?php echo $grade_pay;  ?> </td>
					</tr>
					<tr>
					  <td><strong> PRESENT EMPLOYER</strong></td>
					  <td><strong> ARE YOU ABLE TO TEACH THROUGH </strong></td>
					  <td colspan="2"><strong> ARE YOU CTET/TET QUALIFIED </strong></td>
					</tr>
					<tr>
					   <td><?php echo $present_employer;  ?> </td>
					   <td><?php echo $teach_language;  ?> </td>
					   <td colspan="2"><?php echo $ctet_tet_detail;  ?> </td>
					</tr>
					<tr>
					  <td colspan="4"><strong> ACADEMIC / PROFESSIONAL QUALIFICATIONS </strong></td>
					</tr>
					<tr>
					  <td colspan="4">
					  <div class="table-responsive"> 
						<table class="view-table" style="margin:0;">
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
							<tbody>
								
								<?php 
				  $query="select * from  acadmic_detail where id='$id'";
				  $row1=mysqli_query($query);
				  while($row=mysqli_fetch_array($row1))
				  {
					  
					 $examination_passed=$row['examination_passed'];
					 $year_of_passing=$row['year_of_passing'];
					 $subject_offered=$row['subject_offered'];
					 
					 $medium_of_insruction=$row['medium_of_insruction'];
					 $max_marks=$row['max_marks'];
					 $marks_obtain=$row['marks_obtain'];
					  $abc=$row['marks_obtain']/$row['max_marks']*100;
					 $marks_percentage=number_format((float)$abc, 2, '.', '').'%';
					 
					
					 $division=$row['division'];
					  
					 $school=$row['school'];
					  $board=$row['board'];
					
								?>
								<tr>
								<td>	<?php echo $examination_passed;  ?></td>
									<td>	<?php echo $year_of_passing;  ?></td>
									<td>	<?php echo $subject_offered;  ?></td>
									<td>	<?php echo $medium_of_insruction;  ?></td>
									
									<td>	<?php echo $max_marks;  ?></td>
									<td>	<?php echo $marks_obtain;  ?></td>
									<td>	<?php echo   $marks_percentage;?></td>
									<td>	<?php  echo $division ?></td>
									<td>	<?php  echo $school;?></td>
									<td>	<?php  echo $board;?></td>
								</tr>
								<?php 
								 }
				  
					 ?>
							</tbody>
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td colspan="4"><strong>FOR TEACHERS POST- TEACHING EXPERIENCE </strong></td>
					</tr>
					<tr>
					  <td colspan="4">
					    <div class="table-responsive">
						<table class="view-table" style="margin:0;">
							<thead>
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">NAME & ADDRESS OF THE INSTITUTION</th>
									<th rowspan="2">DESIGNATION</th>
																		<th class="text-center" colspan="2">PERIOD</th>
									<th rowspan="2">CLASSES/SUBJECTS TAUGHT</th>
									<th rowspan="2">NATURE OF DUTIES</th>
								</tr>
								<tr>
									<th class="text-center">From</th>
									<th class="text-center">To</th>
								</tr>
								
							</thead>
							<tbody>
							<?php 
							$query="select * from teaching_experience_detail where id=$id";
				  $row1=mysqli_query($query);
				  $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					  $n=++$i;
					 $institute=$row['institute'];
					 $designation=$row['designation'];
				
					 
					 $period_from=$row['period_from'];
					 $period_to=$row['period_to'];
					 $sub_taught=$row['sub_taught'];
					 $duties=$row['duties'];
					 
					
					
					
					
					?>
							<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $institute;?>  </td>
									<td><?php echo $designation;?></td>
									<td><?php echo $period_from; ?></td>
									<td><?php echo $period_to; ?></td>
									<td><?php echo $sub_taught; ?></td>
									<td><?php echo $duties; ?></td>
								</tr>
								
				  <?php
				  }
				  ?>
								
							</tbody>
							<tfoot>
							<tr>
							<?php 
							 $query1="select * from teaching_experience_detail where id=$id";
							 $rowt=mysqli_query($query1);
							   while($row=mysqli_fetch_array($rowt))
							 {
								
								 
								    $from =  $row['period_from'];
								    $from_array = explode("/",$from);
								   
								    $to =   $row['period_to'];
    
									$to_array = explode("/",$to);
									
									 $year_differ = $to_array[2]-$from_array[2];
									
								if($year_differ>=0)
									{
										if($from_array[1]<$to_array[1])
										{
											$months = $to_array[1]-$from_array[1];
											if($year_differ!=0)
											{
												$years=$year_differ;
											}
											else{
												$years=0;
											}
										}
										else if($from_array[1]==$to_array[1]){
											$months = 0;
											$years=$year_differ;
										}
										else{
											$months = (12-($from_array[1]-$to_array[1]));
											$years=$year_differ-1;
										}
									}
									  $total_months = $total_months+$months;
									  $total_years = $total_years+$years;
									

							 }
							 if($total_months>=12)
							 {
								   $total_years = ($total_years + floor($total_months/12));
								  $total_months = ($total_months%12);
								
							 }
							 
							 ?>
							<td>Total Experience</td>
							<td colspan="7"><?php if($institute)	{echo $total_years." years ";
							
							echo $total_months." months";} else{ echo "0 month 0 year";} ?></td>
							</tr>
							<tfoot>
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td colspan="4"><strong>EXPERIENCE OF NON TEACHING STAFF</strong></td>
					 </tr>
					 <tr>
					   <td colspan="4">
					      <div class="table-responsive"> 
							<table class="view-table" style="margin:0;">
							<thead>
								
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">NAME, ADDRESS & CONTACT NO. OF THE EMPLOYER</th>
									<th rowspan="2">PROFESSION/BUSINESS</th>
									<th rowspan="2">DESIGNATION/POST</th>
									<th rowspan="2">NATURE OF DUTIES</th>
									<th class="text-center" colspan="2">PERIOD</th>
									<th rowspan="2">MONTHLY SALARY / INCOME</th>
								
								</tr>
								<tr>
									<th class="text-center">From</th>
									<th class="text-center">To</th>
								</tr>
							</thead>
							<tbody>
							<?php 
						$query="select * from  nonteaching_staff_exp where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 $n=++$i;
					 $employee_info=$row['employee_info'];
					 $bussiness=$row['bussiness'];
					 $post=$row['post'];
					 $nature_of_duties=$row['nature_of_duties'];
					 $period_from=$row['period_from'];
					 $period_to=$row['period_to'];
				
					 $salary=$row['salary'];
					 $period_to=$row['period_to'];
					
				  
				  ?>
				 				
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $employee_info;?>  </td>
									<td><?php echo $bussiness;?></td>
									<td><?php echo $post; ?></td>
									<td><?php echo $nature_of_duties; ?></td>
										<td><?php echo $period_from; ?></td>
									<td><?php echo $period_to; ?></td>
									<td><?php echo $salary; ?></td>
								</tr>
								<?php 
				  }
				  ?>
							</tbody>
							<tfoot>
							<tr>
							
							<?php
							 $query2="select * from nonteaching_staff_exp where id=$id";
							 $rowtt=mysqli_query($query2);
							 $total_years=0;
							 $total_months=0;
							   while($row11=mysqli_fetch_array($rowtt))
							 {
								
								 
								    $from =  $row11['period_from'];
								    $from_array = explode("/",$from);
								   
								    $to =   $row11['period_to'];
    
									$to_array = explode("/",$to);
									
									 $year_differ = $to_array[2]-$from_array[2];
									
									if($year_differ>=0)
									{
										if($from_array[1]<$to_array[1])
										{
											$months = $to_array[1]-$from_array[1];
											if($year_differ!=0)
											{
												$years=$year_differ;
											}
											else{
												$years=0;
											}
										}
										else if($from_array[1]==$to_array[1]){
											$months = 0;
											$years=$year_differ;
										}
										else{
											$months = (12-($from_array[1]-$to_array[1]));
											$years=$year_differ-1;
										}
									}
									  $total_months = $total_months+$months;
								
									  $total_years = $total_years+$years;
									
									

							 }
							 if($total_months>=12)
							 {
								  $total_years = ($total_years + (floor($total_months/12)));
								  $total_months = ($total_months%12);
								
								 
								
							 }
							 
							 ?>
							<td>Total Experience</td>
							<td colspan="7"><?php  if($employee_info){	echo $total_years." years ";
							
							echo $total_months." months";} else { echo "0 month 0 year ";} ?></td>
							</tr>
							</tfoot>
						</table>
					 </div>
					  </td>
					</tr>
					<tr>
					  <td colspan="4"><strong>EXPERIENCE OF Administrative Detail</strong></td>
					</tr>
					<tr>
					 <td colspan="4">
					      <div class="table-responsive"> 
							<table class="view-table" style="margin:0;">
							<thead>
								
								<tr>
								
									<th rowspan="2" style="width:10%;">#</th>
									<th rowspan="2">Name Of The School/Board</th>
									<th rowspan="2">Responsibilities Held</th>
									<th  rowspan="2">For Classes</th>
									<th  rowspan="2">No. Of Years</th>
							
								</tr>
								
							</thead>
							<tbody>
							<?php 
						$query="select * from  `administrative_exp_detail` where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 $n=++$i;
					 $school=$row['school'];
					 $responsibilities=$row['responsibilities'];
					 $for_class=$row['for_class'];
					 $no_of_year=$row['no_of_year'];
					
					 $total_experience2=$row['total_experience'];
				  
				  ?>
				 				
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $school;?>  </td>
									<td><?php echo $responsibilities;?></td>
									<td><?php echo $for_class; ?></td>
									<td><?php echo $no_of_year; ?></td>
							
								
									
								</tr>
								<?php 
				  }
				  ?>

							</tbody>
							<tfoot>
							<tr>
							<td>Total Experience</td>
							<td colspan="4"><?php echo $total_experience2; ?></td>
							</tr>
							<tfoot>
						</table>
					 </div>
					  </td>
					</tr>
					<tr>
					  <td><strong> N.C.C./N.S.S./NATIONAL SCOUT TRAINING, IF ANY?</strong></td>
					  <td><strong>KNOWLEDGE OF FOREIGN LANGUAGE (GIVE DETAILS)</strong></td>
					  <td colspan="2"><strong>ARE YOU TECHNO-SAVVY /COMPUTER LITERATE (GIVE DETAILS)</strong></td>
					</tr>
					<tr>
					<td><?php echo $ncc_detail;?></td>
					 <td><?php echo $foregin_language_detail;?></td>
					  <td colspan="2"><?php echo $techosavvy_computerliterate_detail;?></td>
					</tr>			
					<?php
							$query="select * from  refrence_detail where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 
					 $f_name=$row['f_name'];
					 $l_name=$row['l_name'];
					 $designation=$row['designation'];
					 $address=$row['address'];
					 $pin=$row['pin'];
					 $telephone=$row['telephone'];
				
					 $email=$row['email'];
					 
					 $f_name1=$row['f_name1'];
					 $l_name1=$row['l_name1'];
					 $designation1=$row['designation1'];
					 $address1=$row['address1'];
					 $pin1=$row['pin1'];
					 $telephone1=$row['telephone1'];
				
					 $email1=$row['email1'];
					 
					?>
					<tr>
					  <td colspan="2"><strong>NAME AND ADDRESS OF REFERENCES 1:</strong></td>
					   <td colspan="2"><strong>NAME AND ADDRESS OF REFERENCES 2:</strong></td>
					</tr>
					<tr>
					    <td colspan="2">
						<b>Name    </b> : <?php echo $f_name1.' '.$l_name1 ;?>          <br/>
					       <b>Address </b> : <?php echo $address1;?><br/>
							<b>Designation</b> : <?php echo $designation1;?><br/>
							<b>Phone </b>: <?php echo $telephone1;?> </br>
							<b>Email</b> : <?php echo $email1;?>
						</td>
						<td colspan="2"><b>Name    </b> : <?php echo $f_name.' '.$l_name ;?>          <br/>
					       <b>Address </b> : <?php echo $address;?><br/>
							<b>Designation</b> : <?php echo $designation;?><br/>
							<b>Phone </b>: <?php echo $telephone;?> </br>
							<b>Email</b> : <?php echo $email;?>
						</td>
					</tr>
				  <?php } ?>
					
					
					
					<tr>
					  <td colspan="2"><strong>LITERARY, CULTURAL, SPORTS OR OTHER ACTIVITIES IN WHICH THE APPLICANT HAS DISTINCTIONS/AWARDS</strong></td>
					  <td colspan="2"><strong>IF SELECTED, THE EARLIEST YOU CAN JOIN BY (NOTICE PERIOD)</strong></td>
					</tr>
					<tr>
					 <td colspan="2"><?php echo $awards_detail;?></td>
					 <td colspan="2"><?php echo $noticeperiod_detail; ?></td>
					</tr>
					<tr>
					  <td colspan="4"><strong>DEPENDENT MEMBERS (S) OF FAMILY TO STAY WITH THE CANDIDATE</strong></td>
					  </tr>
					  <tr>
					  <td colspan="4">
					  <div class="table-responsive"> 
							<table class="view-table" style="margin:0;">
							<thead>
								<tr>
									<th rowspan="2">NAME</th>
									<th rowspan="2">Date of Birth / AGE</th>
									<th rowspan="2">Relationship</th>
									<th rowspan="2">OCCUPATION WITH MONTHLY INCOME</th>
									<th rowspan="2">ECONOMICALLY OR PHYSICALLY DEPENDENT <br>OR  <br>ANY OTHER JUSTIFICATION OF THEIR STAY</th>
									<th rowspan="2">ANY CHRONIC ILLNESS  <br>OR <br> PHYSICAL DISABILITY</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$query="select * from  dependent_member_detail where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 $n=++$i;
					 $name=$row['name'];
					 $dob=$row['dob'];
					 $relationship=$row['relationship'];
					 $occupation=$row['occupation'];
					 $dependent=$row['dependent'];
					 $disability=$row['disability'];
				
					
					 
					?>
							
								<tr>
									<td><?php echo $name; ?></td>
									<td><?php echo $dob ; ?></td>
									<td><?php echo $relationship ; ?></td>
									<td><?php echo $occupation ; ?></td>
									<td><?php echo $dependent ; ?></td>
									<td><?php echo $disability ; ?></td>
								</tr>
				  <?php } ?>
							</tbody>
						</table>
						</div>
					  </td>
					</tr>
					
					<tr>
					 <td  colspan="4"><strong>WHETHER ACCOMMODATION REQUIRED</strong></td>
					 </tr>
					 <tr>
					 
					 <td colspan="4">
					  <div class="table-responsive"> 
							<table class="view-table" style="margin:0;">
							<thead>
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">NAME</th>
									<th rowspan="2">Relation</th>
									<th rowspan="2">Will live in Dera</th>
									
									<th rowspan="2">ANY CHRONIC ILLNESS <br/>OR <br/>PHYSICAL DISABILITY</th>
								</tr>
							</thead>
							<tbody>
							<?php
						
							
							$query="select * from  accomodation_detail where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 $n=++$i;
					 $name1=$row['name'];
					 $relation=$row['relation'];
					 $live_with=$row['live_with'];
					
					 $diability=$row['diability'];
					 if($name1!='')
					 {
				?>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $name1; ?></td>
									<td><?php echo $relation; ?></td>
									<td><?php echo $live_with; ?></td>
							
									<td><?php echo $diability; ?></td>
								</tr>
				  <?php } }?>
							</tbody>
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td><strong>IS ANY CRIMINAL CASE PENDING AGAINST YOU?</strong></td>
					  <td><strong>HAVE YOU EVER BEEN CONVICTED IN A CRIMINAL CHARGE BY ANY COURT?</strong></td>
					   <td colspan="2"><strong>HAVE YOU EARLIER APPLIED FOR EMPLOYMENT IN PS SCHOOL </strong></td>
					   
					</tr>
					<tr>
					
					
					  <td><?php echo $casepending_detail; ?></td>
					  
					   <td><?php echo $criminalcharged_detail; ?></td>
					    <td colspan="2"><?php echo $eariler_applied_employement_ps; ?></td>
					</tr>
					
					<tr>
					  <td colspan="4"><strong>Specify, if spouse/parents/any other relative doing sewa</strong></td>
					  </tr>
					  <tr>
					   <td colspan="4">
					   <div class="table-responsive"> 
					  <table class="view-table" style="margin:0;">
							<thead>
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">NAME</th>
									<th rowspan="2">Age</th>
									<th rowspan="2">Address</th>
									<th rowspan="2">Relation</th>
									<th rowspan="2">DEPARTMENT</th>
									<th rowspan="2">DATE OF JOINING</th>
									<th rowspan="2">Hony./Parshadi.</th>
									<th rowspan="2">MONTHLY SALARY</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
					
							$query="select * from  other_employee where id=$id";
				          $row1=mysqli_query($query);
                            $i=0;
				  while($row=mysqli_fetch_array($row1))
				  {
					 $n=++$i;
					 $name2=$row['name'];
					 $address2=$row['address'];
					 $age2=$row['age'];
					 $relation2=$row['relation'];
					 $department=$row['department'];
					 $joining_date=$row['joining_date'];
					 $h_p=$row['h_p'];
					 $salary=$row['salary'];
					 if($name2!='')
					 {
				?>
				
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $name2; ?></td>
									<td><?php echo $age2; ?></td>
									<td><?php echo $address2; ?><br/>
										
									<td><?php echo $relation2; ?></td>
									<td><?php echo $department; ?></td>
									<td><?php echo $joining_date; ?></td>
									<td><?php echo $h_p; ?></td>
									<td><?php echo $salary; ?></td>
								</tr>
				  <?php } }?>
							</tbody>
						</table>
						</div>
							</td>
					</tr>
					 <tr>
					  <td><strong>Other Information </strong></td>
					   <td><strong>Date </strong></td>
					   <td colspan="2"><strong>Place </strong></td>  
					</tr>
					<tr>
					  <td><?php echo $other_info; ?></td>
					   <td><?php 
					   
					   $timestamp = strtotime($dt_created);
          echo date('d/m/Y', $timestamp);
					   
					   
					   
					   
					   
					   
					  ?></td>
					   <td colspan="2"><?php echo $submit_place; ?></td>
					</tr>
					
				  </tbody>
				</table>
				<?php 
				$queryttt="select * from  eligible where ulid=$id";
				          $ro=mysqli_query($queryttt);
                          $nnnn=mysqli_num_rows($ro);  
						  while($row11=mysqli_fetch_array($ro))
				  {
					  
			    	$e1=$row11['eligibilty'];
					$c=$row11['comment'];
				
				
				  }
				 if(1==1)
				 {
					 ?>
				<div class="eligble-bg">
					<form class="online-form" action="add_eligible.php" method="POST" id="form">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					
				  <div class="form-group">
				   <label  class="control-label">Your Eligibility</label>	
  <?php 
				  if($e1=='E')
				  {
					  ?>				   
				  <div class="radio">
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" checked>
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE">
					  Non-Eligible
					  </label>
					  
					</div>
					<?php 
				  }
				  else if($e1=='NE')
				  {
					  ?>
					   <div class="radio">
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" >
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE" checked>
					  Non-Eligible
					  </label>
					  
					</div>
					<?php   
				  }
				  else
				  {
					  ?>
					  <div class="radio">
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" >
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio"  class="eligible" name="optionsRadios" id="optionsRadios2" value="NE">
					  Non-Eligible
					  </label>
					  
					</div>
					  
					  
					 <?php  
				  }
				  ?>
					</div>
					
					
					<div class="form-group">
					 <label  class="control-label">Comments</label>
					<textarea class="form-control" rows="3" name="comment"><?php echo $c; ?></textarea>
				  </div>
				  <input type="submit" class="btn btn-blue" name="submit" value="Save" />
				  <div class="message" id="testdiv" style="display:none" >Information Updated Successfully.</div>
				</form>
				
				</div>
				<?php
				}
			
				
				else if($nnnn>0)
				 {
					 ?>
				<div class="eligble-bg">
					<form class="online-form" action="add_eligible.php" method="POST" id="form">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					
				  <div class="form-group">
				   <label  class="control-label">Your Eligibility</label>	
  <?php 
				  if($e1=='E')
				  {
					  ?>				   
				  <div class="radio">
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" checked>
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE">
					  Non-Eligible
					  </label>
					  
					</div>
					<?php 
				  }
				  else if($e1=='NE')
				  {
					  ?>
					   <div class="radio">
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" >
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE" checked>
					  Non-Eligible
					  </label>
					  
					</div>
					<?php   
				  }
				  else
				  {
					  ?>
					  <div class="radio" >
				
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" >
				  Eligible
				  </label>
				  
				</div>
					<div class="radio">
					
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE">
					  Non-Eligible
					  </label>
					  
					</div>
					  
					  
					 <?php  
				  }
				  ?>
					</div>
					
					
					<div class="form-group">
					 <label  class="control-label">Comments</label>
					<textarea class="form-control" rows="3" name="comment"><?php echo $c; ?></textarea>
				  </div>
				  <input type="submit" class="btn btn-blue eligible1" name="submit" value="Save" />
				  <div class="message" id="testdiv" style="display:none" >Information Updated Successfully.</div>
				</form>
				
				</div>
				<?php
				}
				?>
				
				
				</div>
			</div>
			</div>
      <div class="modal-footer">
        <a href="admin.php" class="btn btn-default" data-dismiss="modal" >Close</a>
      </div>
    </div>
  </div>
  </div>

  </body>
  	</html>
  