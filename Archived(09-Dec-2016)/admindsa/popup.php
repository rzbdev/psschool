
<style>
.view-table th > strong { font-size: 13px;text-transform:capitalize;line-height: 18px;}
.view-table th  { font-size: 12px;text-transform:captilize;line-height: 18px;}
.view-table td > strong { font-size: 13px;text-transform:captilize;line-height: 18px;}
.close{ background: #000 none repeat scroll 0 0 !important;
    border-radius: 50%;
    color: #fff;
    height: 34px;
    line-height: 33px;
    padding-top: 0 !important;
    position: absolute;
    right: -9px;
    top: -20px;
    width: 34px;
    z-index: 9999;
	opacity:1;
	text-shadow: none;
}
.close:hover{opacity:1;color:#fff;}
.next {
     bottom: 0;
    color: #000;
    font-size: 30px;
    font-weight: 700;
    position: fixed;
    right: -30px;
    top: 48%;
	z-index:1;
	height:20px;

}
.prev {
    color: #000;
    font-size: 30px;
    font-weight: 700;
	position: fixed;
    top: 48%;
	z-index:1;
	height:20px;
left:-30px;
}
.fa {
	color:#fff;
}
</style>
	<?php   

error_reporting(0);
session_start();
include_once('config.php');
$id = $_REQUEST['id'];
 $idnxt=$id+1;
 $idprev=$id-1;
	?>
	  <?php 
	  
				$query="select * from  personal_details where id=$id";
				  $row1=mysql_query($query);
				  while($row=mysql_fetch_array($row1))
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
					$gender=$row['gender'];
					 $MARITAL=$row['marital_status'];
					 $NATIONALITY=$row['nationality'];
					 $DOMICILE=$row['state_of_domicile'];
					
					 	 $comm_address1=$row['comm_address1'];
					
					 $comm_city=$row['comm_city'];
					 $comm_state=$row['comm_state'];
					 $comm_country=$row['comm_country'];
					 $tele_no=$row['per_mobile'];
					 $per_mobile1=$row['contact_no'];
					 
					 
					  $per_address1=$row['per_address1'];
					
					 $city=$row['city'];
					 $state=$row['state'];
					 $country=$row['country']; 
					 $per_mobile=$row['per_mobile'];
					 $fresher_exp1=$row['fresher_exp'];
					 if($fresher_exp1!='')
					 {
						$fresher_exp='Fresher';
					 }
					 else{
						$fresher_exp='Experienced'; 
					 }
					 $repate=$row['repate'];
					 $Notification=$row['Notification'];
					 
					
				$address=$row['address'];
					 $communication_address=$row['communication_address'];
					 
					 $pin=$row['pin'];
					 $contact_no=$row['contact_no'];
					 $comm_telephoneno=$row['comm_telephoneno'];
					 
					  $comm_mobileno=$row['comm_mobileno'];
					 $comm_email=$row['comm_email'];
					 $comm_pin=$row['comm_pin'];
					 $post_type=$row['post_type'];
					 $present_post=$row['present_post'];
					 $present_salary=$row['present_salary'];
					 $present_employer=ucfirst(strtolower($row['present_employer']));
					 $regional_language=ucfirst(strtolower($row['regional_language']));
					 $teach_language=ucfirst(strtolower($row['teach_language']));
					 $ctet_tet_detail=ucfirst(strtolower($row['ctet_tet_detail'])); 
					 $pay_band=$row['pay_band'];
					 $grade_pay=$row['grade_pay'];
					 $criminalcharged_detail=ucfirst(strtolower($row['criminalcharged_detail']));
					 $casepending_detail=ucfirst(strtolower($row['casepending_detail']));
					 $noticeperiod_detail=ucfirst(strtolower($row['noticeperiod_detail']));
					 $eariler_applied_employement_ps=ucfirst(strtolower($row['eariler_applied_employement_ps']));
					 $image=$row['image'];	
					 $ncc_detail=ucfirst(strtolower($row['ncc_detail']));
					$foregin_language_detail=ucfirst(strtolower($row['foregin_language_detail'])); 
	$techosavvy_computerliterate_detail=ucfirst(strtolower($row['techosavvy_computerliterate_detail']));
	 $awards_detail=ucfirst(strtolower($row['awards_detail']));
	 $other_info=ucfirst(strtolower($row['other_information']));
	 $dt_created =$row['dt_created'];
	 $submit_place=$row['submit_place'];
	 $rw=$row['Notification'];			
				  }  	
				?>
			<script type="text/javascript">
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><style type="text/css" media="print">table th, table td {border:1px solid #404040;}</style><title></title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.print();
        mywindow.close();
        return true;
    }

</script>
<body>
  <div class="modal-dialog " role="document">
    <div class="modal-content">
	<button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <a href="#" class="prev" data-id="<?php echo $idprev; ?>"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
</a>
 <a href="#" class="next" data-id="<?php echo $idnxt; ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
</a>
  
      <div class="modal-body">
		<div class="col-md-12">
		<input type="hidden" data-id="<?php echo $id; ?>" >
			<div id="printableArea">
				<input type="button" class="btn btn-primary print-btn" value="Print" onclick="PrintElem('#printableArea')" />
			<div class="table-responsive"> 
				<table class="view-table">
				  <tbody>
				  <tr class="hdng">
				  <td colspan="5" style="padding:12px 15px;">Basic Information</td>
				  </tr>
					<tr>
					  <td style="width:25%"><strong>First Name</strong></td>
					  <td colspan="3" ><strong>Last Name</strong></td>
					  <td rowspan="3" style="width:10%">
						<div class="pro-pic" style="width:145px;">
								<img class="img-responsive" height="100px;" width="100px;" src="../uploads/<?php echo $image; ?>"  alt="" id="output"/></div>
					  </td>
					</tr>
					<tr>
					  <td><?php echo $first_name; ?> </td>
					  <td colspan="3"><?php echo $Last_Name; ?></td>
					</tr>
					<tr>
					  <td><strong>Post Applied For</strong></td>
					   <td style="width:30%"><strong>Date of Birth</strong></td>
					   <td colspan="2" style="width:20%"><strong>Age</strong></td>
					   </tr>
					   <tr>
					  <td><?php echo $Post_Applied; ?></td>
                      <td>
					  <?php 
					 $timestamp = strtotime($dob);
                      echo date('d/m/Y', $timestamp);
		               ?>
					  </td>
					    <td colspan="3">
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
					</tr>
					<tr>
					   <td><strong>Email</strong></td>
					   <td><strong>Gender</strong></td>
					   <?php 
					if($FATHER!='')
					{
						?>					
					  <td colspan="3"><strong>Father's Name</strong></td>
					   
					<?php 
					}
					else
					{
						?>
					  <td colspan="3"><strong>Husband's Name</strong></td>
					  
					<?php 
					}
					?>
				
					</tr>
					<tr>
					<td ><?php echo $comm_email; ?></td>
					<td><?php echo $gender; ?></td>
					 <?php 
					if($FATHER!='')
					{
						?>			
					   <td colspan="3"><?php echo $FATHER; ?></td>
					<?php 
					}
					else
					{
						?>
					  <td colspan="3"><?php echo $husband; ?></td>
					<?php 
					}
					?>
					</tr>
					<tr>
					   <td><strong>Mobile No.</strong></td>
					   <td><strong>Nationality</strong></td>
					   <td colspan="3"><strong>Domicile State</strong></td>
					</tr>
					<tr>
					<td><?php echo $comm_mobileno; ?></td>
					<td><?php echo $NATIONALITY; ?></td>
					<td colspan="3"><?php echo $DOMICILE; ?></td>
					</tr>
					  </tbody>
					  </table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
					 <tr class="hdng">
				  <td colspan="3" style="padding:12px 15px;">Address Detail</td>
				  </tr>
					<tr>
					  <td><strong> Permanent Address</strong></td>
					  <td><strong>Communication Address</strong></td>
					  <td><strong>Marital Status</strong></td>
					</tr>
					<tr>
					 <td>
					  Address Line1 : <?php echo $address; ?>
					 <br>Address Line2 :<?php echo  $per_address1;?>
					 <br>City :<?php echo  $city;?>
					   <br>Pincode : <?php echo $pin;?>
					   <br>State :<?php echo  $state;?>
					   <br>Country :<?php echo  $country;?>
						<br>Telephone : <?php echo $per_mobile1;  ?>
						<br>Mobile No. : <?php echo $tele_no;  ?>
					 </td>
					 <td>Address Line1 :<?php echo $communication_address; ?>
					 <br>Address Line2 :<?php echo  $comm_address1;?>
					 <br>City :<?php echo  $comm_city;?>
					 <br>Pincode : <?php echo $comm_pin;?>
					 <br>State :<?php echo  $comm_state;?>
					<br>Country :<?php echo  $comm_country;?>
					<br>Phone : <?php echo $comm_telephoneno;  ?>
					</td>
					<td>
					<?php echo $MARITAL;  ?>
					</td>
</tr>
				<?php  $query="select * from  spouse_detail where id='$id'";
				  $row1=mysql_query($query);
				  while($row=mysql_fetch_array($row1))
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
					  <td colspan="4"><strong>Details of Spouse</strong></td>
					  </tr>
					  <tr>
					   <td colspan="4">
					   <table class="view-table"  style="margin:10px 0;">
						<tr>
							<td><strong>Name</strong></td>
							<td><strong>Date Of Birth</strong></td>
							<td><strong>Age</strong></td>
							<td><strong>Profession (Department)</strong></td>
							<td><strong>Designation</strong></td>
							<td><strong>Place Of Posting</strong></td>
							<td><strong>Income(Monthly)</strong></td>
						</tr>
						<tr>
							<td><span class="d_txt"><?php echo $name11;  ?></span></td>
							<td><span class="d_txt"><?php echo $dob;  ?> </span></td>
							<td>
							<span class="d_txt">
							
							
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
							</span>
							</td>
							<td><span class="d_txt"><?php echo $profession11;  ?> </span></td>
							<td><span class="d_txt"><?php echo $designation11;  ?> </span></td>
							<td><span class="d_txt"> <?php echo $place_of_posting11;  ?> </span></td>
							<td><span class="d_txt">  <?php 					 
 $subtotal =  number_format($monthly_income11, 2, '.', ',');
					  
					  echo $subtotal;?></span></td>
						</tr>
					   </table>
					  </td>
					</tr>
					<?php 
				 }
				 if($MARITAL!='Unmarried')
				 {
				 ?>
					<tr>
					  <td colspan="4"><strong>Particulars of Children </strong></td>
					</tr> 
						<?php $query="select * from  children_detail where id='$id'";
				  $row1=mysql_query($query);
				  ?>
					<tr> 
					<td colspan="4">
						<table class="view-table"  style="margin:10px 0;">
						<tr>
						<td><strong>Gender</strong></td>
							<td><strong>Name</strong></td>
							<td><strong>Date Of Birth</strong></td>
							<td><strong>Age</strong></td>
							<td><strong>Whether Married & Settled</strong></td>
							<td><strong>Whether Studying, If So, State Class</strong></td>
						</tr>
						<?php
				  while($row=mysql_fetch_array($row1))
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

echo " " . $diff->y .  " Y " .$diff->m ." M " ;
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
<?php 	
		}
				  ?>
                   </table>
				   </td>
					</tr>
					<?php
				 }
					?>
					</tbody>
					</table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
					 <tr class="hdng">
				  <td colspan="4" style="padding:12px 15px;"> ACADEMIC / PROFESSIONAL QUALIFICATIONS </td>
				  </tr>
					<tr>
					  <td colspan="4">
					  <div class="table-responsive"> 
						<table class="view-table acc"  style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2">Examination Passed</th>
									<th rowspan="2">Year Of Passing</th>
									<th rowspan="2">Subjects Offered</th>
									<th rowspan="2">Medium Of Instruction</th>
									<th class="text-center">Max Marks</th>
									<th class="text-center">Marks Obtained</th>
									<th class="text-center">% Of Marks</th>
									<th rowspan="2">Division</th>
									<th rowspan="2">School/College</th>
									<th rowspan="2">Board/University</th>
								</tr>
							</thead>
								<?php 
				  $query="select * from  acadmic_detail where id='$id'";
				  $row1=mysql_query($query);
				  while($row=mysql_fetch_array($row1))
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
								<tbody>
								<tr>
									<td><?php echo $examination_passed;  ?></td>
									<td><?php echo $year_of_passing;  ?></td>
									<td><?php echo $subject_offered;  ?></td>
									<td><?php echo $medium_of_insruction;  ?></td>
									<td><?php echo $max_marks;  ?></td>
									<td><?php echo $marks_obtain;  ?></td>
									<td><?php echo $marks_percentage;?></td>
									<td><?php echo $division ?></td>
									<td><?php echo $school;?></td>
									<td><?php echo $board;?></td>
								</tr>
								</tbody>
								<?php 
								 }
					 ?>
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td colspan="2"><strong> N.C.C./N.S.S./National Scout Training, If Any? </strong></td>
					  <td colspan="2"><strong>Knowledge Of Foreign Language (Give Details)</strong></td>
					  </tr>
					  <tr>
					<td colspan="2"><?php echo $ncc_detail;?></td>
					 <td colspan="2"><?php echo $foregin_language_detail;?></td>
					 </tr>
					  <tr>
					  <td colspan="2"><strong>Are You Techno-Savvy / Computer Literate (Give Details)</strong></td>
					  <td colspan="2"><strong>Literary, Cultural, Sports or Other  Activities in which the Applicants has Distinctions/Awards</strong></td>
					</tr>
					 <tr>
					  <td colspan="2"><?php echo $techosavvy_computerliterate_detail;?></td>
					   <td colspan="2"><?php echo $awards_detail;?></td>
					</tr>
					<tr>
					   <td style="width:30%"><strong>Are you able to teach through</strong></td>
					   <td style="width:30%"><strong>Are you CIET/TET Qualified</strong></td>
					   <td style="width:30%"><strong>Regional Language</strong></td>
					</tr>
					<tr> 
					  <td><?php echo $teach_language;  ?> </td>
                      <td><?php echo $ctet_tet_detail;  ?> </td>				
                      <td><?php echo $regional_language;  ?> </td>				
					</tr>
					</tbody>
					</table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
				<tr class="hdng">
				  <td colspan="4" style="padding:12px 15px;"> Current Job Details </td>
				  </tr>
					<tr>
					  <td colspan="1"><strong> Fresher/Experience</strong></td>
					  	 <td colspan="3"><?php echo $fresher_exp; ?></td>
					</tr>
					<?php
					if($fresher_exp!='Fresher')
					{
					?>		
					<tr>
					<td><strong> Present Employer</strong></td>
					 <td><strong>Present Post</strong></td>
					  <td><strong>Post</strong></td>
					  </tr>
					  <tr>
						<td><?php echo $present_employer;  ?> </td> 
						<td><?php echo $post_type;  ?> </td>					 
						<td><?php echo $present_post;  ?> </td> 
					  </tr>
					  <tr>
					  <td><strong>Present Salary (Per Month)</strong></td>
					   <td><strong> Pay Band</strong></td>
					    <td><strong> Grade Pay</strong></td>
					</tr>
					<tr> 
					<td><?php 
 $subtotal =  number_format($present_salary, 2, '.', ',');	  
					  echo $subtotal;  ?></td>
					  <td><?php echo $pay_band;  ?> </td>
					<td><?php echo $grade_pay;  ?> </td>
					</tr>
					
					<tr>
					<td colspan="3"><strong>If Selected, the earliest you can join by (Notice Period)</strong></td>
					</tr>
					<tr>
					<td colspan="3"><?php echo $noticeperiod_detail;?></td>
					</tr>
				</tbody>
				</table>
				</div>
				<div class="table-responsive">
				<table class="view-table" style="margin-top:10px;">
							<thead>
				<tr class="hdng">
				  <td colspan="4" style="padding:12px 15px;"> Experience Details </td>
				  </tr>
				<tr>
					<td colspan="4"><strong> For Teachers Experience</strong></td>
					</tr>
					<tr>
					  <td colspan="4">
					    <div class="table-responsive">
						<table class="view-table" style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2" style="width:2%;">#</th>
									<th rowspan="2" style="width:35%;">Name & Address Of The Institution</th>
									<th rowspan="2" style="width:15%;">Designation</th>
									<th class="text-center">From</th>
									<th class="text-center">To</th>
									<th rowspan="2" style="width:20%;">Classes/Subjects Taught</th>
									<th rowspan="2" style="width:15%;">Nature Of Duties</th>
								</tr>
							</thead>
							<?php 
							$query="select * from teaching_experience_detail where id=$id";
				  $row1=mysql_query($query);
				  $i=0;
				  while($row=mysql_fetch_array($row1))
				  {
					  $n=++$i;
					 $institute=$row['institute'];
					 $designation=$row['designation'];
					 $period_from=$row['period_from'];
					 $period_to=$row['period_to'];
					 $sub_taught=$row['sub_taught'];
					 $duties=$row['duties'];
					?>
					<tbody>
							<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $institute;?>  </td>
									<td><?php echo $designation;?></td>
									<td><?php echo $period_from; ?></td>
									<td><?php echo $period_to; ?></td>
									<td><?php echo $sub_taught; ?></td>
									<td><?php echo $duties; ?></td>
						    </tr>
								</tbody>	
				  <?php
				  }
				  ?>
							<tfoot>
							<tr>
							<?php 
							 $query1="select * from teaching_experience_detail where id=$id";
							 $rowt=mysql_query($query1);
							   while($row=mysql_fetch_array($rowt))
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
							<td colspan="2">Total Experience</td>
							<td colspan="6"><?php if($institute)	{echo $total_years." years ";
							
							echo $total_months." months (System calculated)";} else{ echo "0 year 0 month (System calculated)";} ?></td>
							</tr>
							</tfoot>
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td colspan="4"><strong>Experience of Non Teaching Staff </strong></td>
					 </tr>
					 <tr>
					   <td colspan="4">
					      <div class="table-responsive"> 
							<table class="view-table" style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">Name, Address & Contact No. Of The Employer</th>
									<th rowspan="2">Profession/Business</th>
									<th rowspan="2">Designation/Post</th>
									<th rowspan="2">Nature Of Duties</th>
									<th class="text-center">From</th>
									<th class="text-center">To</th>
									<th rowspan="2">Monthly Salary / Income</th>
								</tr>
							</thead>
							<?php 
						$query="select * from  nonteaching_staff_exp where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
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
				 				<tbody>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $employee_info;?>  </td>
									<td><?php echo $bussiness;?></td>
									<td><?php echo $post; ?></td>
									<td><?php echo $nature_of_duties; ?></td>
										<td><?php echo $period_from; ?></td>
									<td><?php echo $period_to; ?></td>
									<td><?php 
									 $subtotal =  number_format($salary, 2, '.', ',');
					  echo $subtotal;?></td>
								</tr>
								</tbody>
								<?php 
				  }
				  ?>
							<tfoot>
							<tr>
							<?php
							 $query2="select * from nonteaching_staff_exp where id=$id";
							 $rowtt=mysql_query($query2);
							 $total_years=0;
							 $total_months=0;
							   while($row11=mysql_fetch_array($rowtt))
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
											else
											{
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
							<td colspan="2">Total Experience</td>
							<td colspan="6"><?php  if($employee_info){	echo $total_years." years ";
							
							echo $total_months." months (System calculated)";} else { echo "0 year 0 month (System calculated) ";} ?></td>
							</tr>
							</tfoot>
						</table>
					 </div>
					  </td>
					</tr>
					<tr>
					  <td colspan="4"><strong>Experience of Administrative Detail</strong></td>
					</tr>
					<tr>
					 <td colspan="4">
					      <div class="table-responsive"> 
							<table class="view-table"  style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2" style="width:3%;">#</th>
									<th rowspan="2">Name Of The School/Board</th>
									<th rowspan="2">Responsibilities Held</th>
									<th  rowspan="2">For Classes</th>
									<th  rowspan="2">No. Of Years</th>
                                </tr>
							</thead>
							<?php 
						$query="select * from  `administrative_exp_detail` where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
				  {
					 $n=++$i;
					 $school=$row['school'];
					 $responsibilities=$row['responsibilities'];
					 $for_class=$row['for_class'];
					 $no_of_year=$row['no_of_year'];
					
					 $total_experience2=$row['total_experience'];
				  
				  ?>
				 			<tbody>	
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $school;?>  </td>
									<td><?php echo $responsibilities;?></td>
									<td><?php echo $for_class; ?></td>
									<td><?php echo $no_of_year; ?></td>
								</tr>
								</tbody>
								<?php 
				  }
				  ?>
							<tfoot>
							<tr>
							<td colspan="2">Total Experience</td>
							<td colspan="3"><?php 
			$select1="select sum(no_of_year) AS su from administrative_exp_detail where id=$id";
						 $row1=mysql_query($select1);	
							while($row=mysql_fetch_array($row1))
				  {
					  echo $row['su'].'year (As entered by user)';
				  }
							?> 
							</td>
							</tr>
							</tfoot>
						</table>
					</div>
					  </td>
					</tr>		
					<?php
					}
					else{
						
					}
							$query="select * from  refrence_detail where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
				  { 
					 $f_name=$row['f_name'];
					 $l_name=$row['l_name'];
					 $designation=$row['designation'];
					 $address=$row['address'];
					 $pin=$row['pin'];
					 $telephone=$row['telephone'];
					 $email=$row['email'];  
					 $city=$row['city'];
					 $state=$row['state'];
					 $country=$row['country'];
					 $mobile=$row['mobile'];
					 $ref_address1=$row['ref_address1']; 
					 $f_name1=$row['f_name1'];
					 $l_name1=$row['l_name1'];
					 $designation1=$row['designation1'];
					 $address1=$row['address1'];
					 $pin1=$row['pin1'];
					 $telephone1=$row['telephone1'];
					 $email1=$row['email1']; 
					  $city1=$row['city1'];
					 $state1=$row['state1'];
					 $country1=$row['country1'];
					 $mobile1=$row['mobile1'];	
					 $ref_address2=$row['ref_address2'];	 
					?>
					</tbody>
					</table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
					<tr class="hdng">
				  <td colspan="4" style="padding:12px 15px;"> References </td>
				  </tr>
					<tr>
					  <td colspan="2"><strong>First Reference:</strong></td>
					   <td colspan="2"><strong>Second Reference :</strong></td>
					</tr>
					<tr>
					    <td colspan="2">
						<b> Name</b> : <?php echo $f_name.' '.$l_name ;?><br/>
					       <b>Address Line1 </b> : <?php echo $address;?><br/>
					       <b>Address Line2 </b> : <?php echo $ref_address1;?><br/>
						   <b>City </b>: <?php echo $city;?> </br>
						   <b>Pin </b>: <?php echo $pin;?> </br>
						   <b>State </b>: <?php echo $state;?> </br>
							<b>Country </b>: <?php echo $country;?> </br>
							<b>Telephone </b>: <?php echo $telephone;?> </br>
							<b>Mobile </b>: <?php echo $mobile;?> </br>
							<b>Email</b> : <?php echo $email;?></br>
							<b>Designation</b> : <?php echo $designation;?><br/>
						
						</td>
						<td colspan="2"><b>Name    </b> : <?php echo $f_name1.' '.$l_name1 ;?>          <br/>
					        <b>Address Line1 </b> : <?php echo $address1;?><br/>
					       <b>Address Line2 </b> : <?php echo $ref_address2;?><br/>
						   <b>City </b>: <?php echo $city1;?> </br>
						   <b>Pin </b>: <?php echo $pin1;?> </br>
						   <b>State </b>: <?php echo $state1;?> </br>
							<b>Country </b>: <?php echo $country1;?> </br>
							<b>Telephone </b>: <?php echo $telephone1;?> </br>
							<b>Mobile </b>: <?php echo $mobile1;?> </br>
							<b>Email</b> : <?php echo $email1;?></br>
							<b>Designation</b> : <?php echo $designation1;?><br/>
						</td>
					</tr>
				  <?php } ?>
					<tr>
					  <td colspan="4"><strong>Dependent Member(s) of family to stay with the candidate </strong></td>
					  </tr>
					  <tr>
					  <td colspan="4">
					  <div class="table-responsive"> 
							<table class="view-table"  style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2">Name</th>
									<th rowspan="2">Date Of Birth</th>
									<th rowspan="2">Relationship</th>
									<th rowspan="2">Occupation With Monthly Income</th>
									<th rowspan="2">Economically Or Physically Dependent <br>Or<br>Any Other Justification Of Their Stay</th>
									<th rowspan="2">Any Chronic Illness<br>Or<br> Physical Disability</th>
								</tr>
							</thead>
							
							<?php
							$query="select * from  dependent_member_detail where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
				  {
					 $n=++$i;
					 $name=$row['name'];
					 $dob=$row['dob'];
					 $relationship=$row['relationship'];
					 $occupation=$row['occupation'];
					 $dependent=$row['dependent'];
					 $disability=$row['disability'];
				
					?>
							<tbody>
								<tr>
									<td><?php echo $name; ?></td>
									<td><?php echo $dob ; ?></td>
									<td><?php echo $relationship ; ?></td>
									<td><?php echo $occupation ; ?></td>
									<td><?php echo $dependent ; ?></td>
									<td><?php echo $disability ; ?></td>
								</tr>
								</tbody>
				  <?php } ?>
							
						</table>
						</div>
					  </td>
					</tr>
					</tbody>
					</table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
					<tr class="hdng">
				  <td colspan="4" style="padding:12px 15px;">  Accommodation Details </td>
				  </tr>
					<tr>
					 <td  colspan="4"><strong> Whether Accommodation Required</strong></td>
					 </tr>
					 <tr>
					 
					 <td colspan="4">
					  <div class="table-responsive"> 
							<table class="view-table"  style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2" style="width:2%;">#</th>
									<th rowspan="2" style="width:20%;">Name</th>
									<th rowspan="2" style="width:16%;">Relation</th>
									<th rowspan="2" style="width:20%;">Will live in Dera</th>
									<th rowspan="2">Any Chronic Illness (Or) Physical Disability</th>
								</tr>
							</thead>
							<?php
							$query="select * from  accomodation_detail where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
				  {
					 $n=++$i;
					 $name1=$row['name'];
					 $relation=$row['relation'];
					 $live_with=$row['live_with'];
					 $diability=$row['diability'];
					 if($name1!='')
					 {
				?>               
				<tbody>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $name1; ?></td>
									<td><?php echo $relation; ?></td>
									<td><?php echo $live_with; ?></td>
							
									<td><?php echo $diability; ?></td>
								</tr>
								</tbody>
				  <?php } }?>
							
						</table>
						</div>
					  </td>
					</tr>
					<tr>
					  <td><strong>Is any criminal case pending against you?</strong></td>
					  <td><strong>Have you ever been convicted in a criminal charge by any court?</strong></td>
					   <td colspan="2"><strong>Have you earlier applied for employment in Pathseekers</strong></td>
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
					  <table class="view-table"  style="margin:10px 0;">
							<thead>
								<tr>
									<th rowspan="2">#</th>
									<th rowspan="2">Name</th>
									<th rowspan="2">Age</th>
									<th rowspan="2">Address</th>
									<th rowspan="2">Relation</th>
									<th rowspan="2">Department</th>
									<th rowspan="2">Date Of Joining</th>
									<th rowspan="2">Hony./Parshadi.</th>
									<th rowspan="2">Monthly Salary</th>
								</tr>
							</thead>
							<?php
					
							$query="select * from  other_employee where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
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
				<tbody>
								<tr>
									<td><?php echo $n; ?></td>
									<td><?php echo $name2; ?></td>
									<td><?php echo $age2; ?></td>
									<td><?php echo $address2; ?><br/>
										
									<td><?php echo $relation2; ?></td>
									<td><?php echo $department; ?></td>
									<td><?php echo $joining_date; ?></td>
									<td><?php echo $h_p; ?></td>
				<td><?php $subtotal =  number_format($salary, 2, '.', ',');
					  echo $subtotal;?></td>
								</tr>
								</tbody>
				  <?php } }?>
							
						</table>
						</div>
							</td>
					</tr>
					</tbody>
					</table>
					</div>
					<div class="table-responsive">
					<table class="view-table" style="margin-top:10px;">
					<tbody>
					<tr class="hdng">
				  <td colspan="3" style="padding:12px 15px;"> Other Information </td>
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
				</div>
					<div class="col-md-12 log_maintain">
						<div class="table-responsive">
					<table>
					<?php
					 $rep1="select id from personal_details where (first_name='$first_name' AND last_name='$Last_Name' AND dob='$dob' ) AND Notification='$rw' AND ((father_name='' AND husband='$husband') OR (father_name='$FATHER' AND husband='')) ORDER BY id DESC LIMIT 1,1"; 
							$row_rep1=mysql_query($rep1);
					if($log_row11=mysql_fetch_array($row_rep1))
					{
						$rep_applicant_id=$log_row11['id'];
				 $rep_rec="select * from eligible where ulid=$rep_applicant_id";		$row_rec=mysql_query($rep_rec);
				$rep_log_row11=mysql_fetch_array($row_rec);
				 $rep_comment=$rep_log_row11['comment'];
				 $rep_eligibility=$rep_log_row11['eligibilty'];
				 $rep_rec1="select * from log_eligible_table where user_id=$rep_applicant_id";		
				$row_rec1=mysql_query($rep_rec1);
				$rep_log_row12=mysql_fetch_array($row_rec1);
				 $rep_admin=$rep_log_row12['name'];
					}
				$rep="select * from personal_details where id=$id";
				$row_rep=mysql_query($rep);
if($rep_eligibility=='E')
{
	$eligibl1='Eligible';
}
else if($rep_eligibility=='NE')
{
	$eligibl1='Non-Eligible';
}
 while($log_row1=mysql_fetch_array($row_rep)) 
 {
	 $rep_applicant=$log_row1['repate'];
	 if($rep_applicant=='R')
	 {
	 ?>
	 <tr>
	<td><?php //echo "The Candidate has already applied earlier and marked ".$eligibl1." by ".$rep_admin." with comment ".$rep_comment.""?><br><br></td>
	<tr>
	<?php
	 }
	 else
	 { 
	 }
 }				?>
			<tr>
			<th>Comments</th>
			</tr>
				<?php
				 $log_sqll1="select * from log_eligible_table where user_id=$id";
 $log_result=mysql_query($log_sqll1);
$nnn=mysql_num_rows($log_result);
 while($log_row=mysql_fetch_array($log_result))
 {
	 echo "<tr><td>";
	 $name=$log_row['admin_email'];
	 $admin_name=$log_row['name'];
$user_name=$log_row['user_name'];
$comment=$log_row['comment'];
$status=$log_row['eligible_status'];
$dtcreated=$log_row['dt_created'];
$timestamp = strtotime($dtcreated);
if($status=='Eligible' || $status=='Non-Eligible')
{
echo " ".$admin_name." changed the status of applicant ".$status.".<br>Comment: ".ucfirst(strtolower($comment)).". Date:".date('d/m/Y', $timestamp)."  <br><br> </td></tr>";
 }
 }
  $log_sqll11="select * from eligible where ulid=$id";
 $log_result1=mysql_query($log_sqll11);
 while($log_row1=mysql_fetch_array($log_result1))
 {
	 echo "<tr><td>";
$comment1=$log_row1['comment'];
$status1=$log_row1['eligibilty'];
if($status1=='E')
{
	$eligibl='Eligible';
}
else if($status1=='NE')
{
	$eligibl='Non-Eligible';
}
if($nnn <=0)
{
if($comment1!='')
{
echo " The  status of applicant is ".$eligibl." <br>Comment: ".ucfirst(strtolower($comment1))." <br><br> </td></tr>";
 }
 }
 }
 $log_sqll11="select * from eligible where ulid=$id";
 $log_result1=mysql_query($log_sqll11);
 while($log_row1=mysql_fetch_array($log_result1))
 {
	 $status1=$log_row1['eligibilty'];
	 $hired=$log_row1['hired'];
	 if($status1=='E' &&  $hired!='')
	 {
	 echo " The  Final status of applicant is ".$hired."." ;
	 }
 }
 ?>
 </table>
				</div>
				</div>
							<?php 
				$queryttt="select * from  eligible where ulid=$id";
				          $ro=mysql_query($queryttt);
                          $nnnn=mysql_num_rows($ro);  
						  while($row11=mysql_fetch_array($ro))
				  {
			    	$e1=$row11['eligibilty'];
					$c=$row11['comment'];
				  }
				 if(1==1)
				 {
					 ?>
				<div class="eligble-bg col-md-12" style="margin-bottom:30px;">
					<form class="online-form" style="padding-top:10px;" action="add_eligible.php" method="POST" id="form">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				  <div class="form-group">
				  <div class=" row">
				  <div class="col-md-3">
				   <label  class="control-label"><strong style="color:black;">Eligibility</strong></label></div>
			<?php 
				if($e1=='E')
				  {
					  ?>
				   <div class="col-md-9">
					<label  class="control-label"><strong style="color:black;">Final Status</strong></label>	</div>
					<?php 
				  }
				  ?>
</div>		
<div class="clearfix"></div>			
  <?php 
				  if($e1=='E')
				  {
					  ?>
<div class="col-md-12 row">					  
				  <div class="radio col-md-3">
				  <label>
					<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="E" >
				  Eligible
				  </label>
				</div>
				<div class="radio chkbox col-md-2">
				  <label>
					<input type="radio" class="eligible" name="optionrejected" id="optionrejected" value="rejected" >
				  Rejected
				  </label>
				</div>
				<div class="radio chkbox col-md-3">
				  <label>
					<input type="radio" class="eligible" name="optionrejected" id="optionrejected" value="Rejected In Telephonic" >
				  Rejected In Telephonic
				  </label>
				</div>
				<div class="radio chkbox col-md-3">
				  <label>
					<input type="radio" class="eligible id" name="optionrejected" id="optionrejected" value="Absent From Interview" >
				  Absent From Interview
				  </label>
				</div>
				<div class="radio chkbox col-md-1">
				  <label>
					<input type="radio" class="eligible" name="optionrejected" id="optionrejected" value="Hired" >
				  Hired
				  </label>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<div class="radio">
					  <label>
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE">
					  Non-Eligible
					  </label>
					</div>
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
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE" >
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
					<textarea class="form-control" rows="3" name="comment"></textarea>
				  </div>
				  <div class="row">
				  <div class="col-md-12">
				  <a href="admin.php" class="btn btn-close pull-right" data-dismiss="modal" >Close</a>
				  <input type="submit" class="btn btn-blue pull-right" name="submit" value="Save" />
				  </div>
				  </div>
				  <div class="message" id="testdiv" style="display:none" >Information Updated Successfully.</div>
				   <div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
				</form>
				</div>
				<?php
				}
				else if($nnnn>0)
				 {
					 ?>
				<div class="eligble-bg col-md-6">
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
						<input type="radio" class="eligible" name="optionsRadios" id="optionsRadios2" value="NE" >
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
					<textarea class="form-control" rows="3" name="comment"></textarea>
				  </div>
				  <input type="submit" class="btn btn-blue eligible1" name="submit" value="Save" />
				  <div class="message" id="testdiv" style="display:none" >Information Updated Successfully.</div>
				  <div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
				</form>
				</div>
				<?php
				}
				?>
				</div>
			</div>
  </div>
  </div>
 <?php  $sss="select eligibilty from personal_details where id='$id'";
  $sss1=mysql_query($sss);
  $sss11=mysql_fetch_array($sss1);
 $ee=$sss11['eligibilty'] ;?>
<input type="hidden" value="<?php  if($_POST['optionsRadios'] =='' ){ echo $ee; } ?>" id="status_hidden">
<script type="text/javascript">
$(document).ready(function (e) {
    $('#form').on('submit',(function(e) {
        e.preventDefault();
		 $('#preloader').show();
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
		var status_id = "<?php echo $id; ?>";
		var result = $("#status_hidden").val();
	
		$("#status"+status_id).html(result);
 $('#testdiv').show();
 $('#preloader').hide();
setTimeout(function() { $("#testdiv").fadeOut(1500); }, 5000)
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));
	$(".eligible").on("click",function(){
		var status_id = "<?php echo $id; ?>";
		var value = $(this).val();
		var result = "";
		if(value=="E")
		{
			result = "E";
		}
		else if(value=="NE")
		{
			result = "NE";
		}
		
		else if(value=="rejected")
		{
			result = "E,R";
		}
		else if(value=="Absent From Interview")
		{
			result = "E,A";
		}
		else if(value=="Hired")
		{
			result = "E,H";
		}
		else if(value=="Rejected In Telephonic")
		{
			result = "E,RT";
		}
		$("#status_hidden").val(result);
	});
});
//for prev button
$(function(){ 
$('.next').click(function(e) {
		$("#preloader").show();
	var element = $(this);
	var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "popup.php",
        data: {id:id},
        success: function(data)
          {   
		   $('#preloader').hide();
		  $("#myModal").html(data);
		   
	}
});
   
return false;});
}); 
 //for prev button 
$(function(){ 
$('.prev').click(function(e) {
		$("#preloader").show();
	var element = $(this);
    var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "popup.php",
        data: {id:id},
        success: function(data)
          {   
		   $('#preloader').hide();
		  $("#myModal").html(data);
		   
	}
});
   
return false;});
}); 
</script>
<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
  </body>
