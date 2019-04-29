<?php
$server = $_SERVER['SERVER_NAME'];
error_reporting(0);
require('WriteHTML.php');
 include_once('../config.php');
$id =299;
	
	  
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
					 if($FATHER !='')
					 {
						 $fathus=$FATHER;
						 $fathus1='FATHER NAME';
					 }
					 else
					 {
						 $fathus=$husband;
						  $fathus1='HUSBAND NAME';
					 }
					 $PERMANENT_ADDRESS=$row['address'];
					 $MARITAL=$row['marital_status'];
					 $NATIONALITY=$row['nationality'];
					 $DOMICILE=$row['state_of_domicile']; 
				$address=$row['address'];
					 $communication_address=$row['communication_address'];
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
					 $pin=$row['pin'];
					  $post_type=$row['post_type'];
					 $contact_no=$row['contact_no'];
					 $comm_telephoneno=$row['comm_telephoneno'];
					  $comm_mobileno=$row['comm_mobileno'];
					 $comm_email=$row['comm_email'];
					 $comm_pin=$row['comm_pin'];
					 	 $present_post=$row['present_post'];
					 $present_salary=number_format($row['present_salary'], 2, '.', ',');
					 $present_employer=ucfirst(strtolower($row['present_employer']));
					  $regional_language=ucfirst(strtolower($row['regional_language']));
					   $fresher_exp1=$row['fresher_exp'];
					 if($fresher_exp1!='')
					 {
						$fresher_exp='Fresher';
					 }
					 else{
						$fresher_exp='Experienced'; 
					 }
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
					 $filename='../../uploads/'.$image;
					if (file_exists($filename))
					{
						
						$image1=$image;
						$image1=str_replace(' ','%20',$image);
					}
					else
					{
						$image1='default.png';
					}
							
				  }
				  $query3="select * from  spouse_detail where id='$id'";
				  $spouse_detail1='DETAIL OF SPOUSE';
				  $result3=mysql_query($query3);
				while($row3=mysql_fetch_array($result3))
				  {
					  $name11=$row3['name'];
					  $dob=$row3['age'];
					   $from_array = explode("/",$dob);
								   $dob=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
						   if($name11!='')
					  {
						 $spouse_name='Name :&nbsp;'.$name11; 
						  $spouse_dob='Date Of Birth :&nbsp;'.$dob;
					 $spouse_profession11='Profession :&nbsp;'.$row3['profession'];
				     $spouse_designation11='Designation :&nbsp;'.$row3['designation'];
					 $spouse_place_of_posting11='Place Of Posting :&nbsp;'.$row3['place_of_posting'];
	$spouse_monthly_income11='Monthly Income :&nbsp;'.number_format($row3['monthly_income'], 2, '.', ',');
					 $spouse_detail1='DETAIL OF SPOUSE';
					  }
					  else
					  {
						  $spouse_name=''; 
						  $spouse_dob=''; 
						  $spouse_profession11=''; 
						  $spouse_designation11=''; 
						  $spouse_place_of_posting11=''; 
						  $spouse_monthly_income11=''; 
						  $spouse_detail1='DETAIL OF SPOUSE';
					 
					  }
					
					  }
					  $query4="select * from  children_detail where id='$id'";
				  $result4=mysql_query($query4);
				  
				   $Children_detail1='DETAIL OF CHILDREN';
				    $allChildren="";
					$allChildrenTr="";
					 $check1=0;
				    while($row4=mysql_fetch_array($result4))
				  {
					  
					  $name=$row4['name'];
					  $dob=$row4['dob'];
					   $from_array = explode("/",$dob);
								   $dob=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
						 if($name!='')
					{
				     $child_name='Name :&nbsp;'.$row4['name'];
					 $child_dob='Date Of Birth :&nbsp;'.$dob; 
					 $child_married_status='Marital Status :&nbsp;'.$row4['married_status'];
					 $child_qualification_detail='Qualification Detail :&nbsp;'.$row4['qualification_detail'];
					 $child_gender='Gender :&nbsp;'.$row4['gender'];
					 $Children_detail1='DETAIL OF CHILDREN';
					}
					else
					{
					$child_name='';	
					$child_dob='';	
					$child_married_status='';	
					$child_qualification_detail='';	
					$child_gender='';	
					$Children_detail1='DETAIL OF CHILDREN';	
					}
					 $allChildren = $child_name.'<br>'.$child_dob.'<br>'.$child_married_status.'<br>'.$child_qualification_detail.'<br>'.$child_gender.'<br>';
					 if($check1==0)
{
	$child_detail=$Children_detail1;
}	
else{
	$child_detail="";
}
		
					  	$allChildrenTr .='<TR><td><h2>'.$child_detail.'</h2></td>	
<TD>'.$allChildren.'</TD>
</TR>'; 
$check1++;
					
}	

$query5="select * from  acadmic_detail where id='$id'";
				  $result5=mysql_query($query5);
				   $allsubject="";
				   $allTr="";
				   $allsubject1="";
				   $allsubject2="";
				   $check=0;
				  
				  while($row5=mysql_fetch_array($result5))
				  {
					  
					   $examination=$row5['examination_passed'];
					  
					  
					   if($examination!='')
					   {
					  
					 $examination_passed='Examination Passed :&nbsp;'.$row5['examination_passed'];
					 $year_of_passing='Year Of Passing :&nbsp;'.$row5['year_of_passing'];
					 $subject_offered='Subjects :&nbsp;'.$row5['subject_offered'];
					 
					 $medium_of_insruction='Medium :&nbsp;'.$row5['medium_of_insruction'];
					 $max_marks='Max Marks :&nbsp;'.$row5['max_marks'];
					 $marks_obtain='Marks Obtain :&nbsp;'.$row5['marks_obtain'];
					 // $abc=$row5['marks_obtain']/$row['max_marks']*100;
					 //$marks_percentage='Percentage :&nbsp;'.number_format((float)$abc, 2, '.', '').'%';
					 $division='Division :&nbsp;'.$row5['division']; 
					 $school='School :&nbsp;'.$row5['school'];
					  $board='Board :&nbsp;'.$row5['board'];
					  $exam_deail='EXAMINATION DETAIL';
					   }
					   else{
						 $examination_passed='';  
						 $year_of_passing='';  
						 $subject_offered='';  
						 $medium_of_insruction='';  
						 $max_marks='';  
						 $marks_obtain='';  
						 $marks_percentage='';  
						 $division='';  
						 $school='';  
						 $board=''; 
$exam_deail='';						 
					   }
 
					  $allsubject = $examination_passed.'<br>'.$year_of_passing.'<br>'.$subject_offered.'<br>'.$medium_of_insruction.'<br>'.$max_marks.'<br>'.$marks_obtain.'<br>'.$division.'<br>'.$school.'<br>'.$board.'<br><br>';
if($check==0)
{
	$exam_detail=$exam_deail;
}	
else{
	$exam_detail="";
}
		
					  	$allTr .='<TR><td><h2>'.$exam_detail.'</h2></td>	
<TD>'.$allsubject.'</TD>
</TR>'; 
$check++;
				  }
				 
				  	 $query1="select * from teaching_experience_detail where id=$id";
							 $rowt=mysql_query($query1);
							   while($row=mysql_fetch_array($rowt))
							 {
								
								 
								    $from =  $row['period_from'];
								    $from_array = explode("/",$from);
								   $from_date=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
								    $to =   $row['period_to'];
    $to_date=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
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

$query6="select * from teaching_experience_detail where id=$id";
				  $result6=mysql_query($query6);
			  $alltechexp="";
			  $alltechexpTr="";
			  $check2=0;
			   $techexp='DETAIL OF TEACHING EXPERIENCE'; 
				  while($row6=mysql_fetch_array($result6))
				  {
					  $insti=$row6['institute'];
					  
					  if($insti!='')
					  {
					
					 $institute='Institute :&nbsp;'.$row6['institute'];
					 $designation='Designation :&nbsp;'.$row6['designation'];
					 $period_from='From :&nbsp;'.$from_date;
					 $period_to='To :&nbsp;'.$to_date;
					 $sub_taught='Subject Taught :&nbsp;'.$row6['sub_taught'];
					 $duties='Duties :&nbsp;'.$row6['duties'];
					 $total_experience='Total Experience :&nbsp;'.$total_years."Years ".$total_months."months";
					 $techexp='DETAIL OF TEACHING EXPERIENCE';
					  }
					  else{
						  $institute=''; 
						  $designation=''; 
						  $period_from=''; 
						  $period_to=''; 
						  $sub_taught=''; 
						  $duties='';
$total_experience='';						  
						  $techexp='DETAIL OF TEACHING EXPERIENCE'; 
					  }
					  $alltechexp = $institute.'<br>'.$designation.'<br>'.$period_from.'<br>'.$period_to.'<br>'.$sub_taught.'<br>'.$duties.'<br>';
					   if($check2==0)
{
	$techexp1=$techexp;
}	
else{
	$techexp1="";
}
if($check2==(mysql_num_rows($result6)-1))
		{
			$total_experience12 = $total_experience;
		}else{
			$total_experience12="";
		}
		
					  	$alltechexpTr .='<TR><td><h2>'.$techexp1.'</h2></td>	
<TD>'.$alltechexp.''.$total_experience12.'</TD>

</TR>'; 
$check2++;
					
				  }

						
							 
							 
				   $query2="select * from nonteaching_staff_exp where id=$id";
							 $rowtt=mysql_query($query2);
							   $emp_info1='Total Experience';	
							 $total_years1=0;
							 $total_months1=0;
							   while($row11=mysql_fetch_array($rowtt))
							 {
								
								 
								    $from =  $row11['period_from'];
								    $from_array = explode("/",$from);
								   $from_date=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
								    $to =   $row11['period_to'];
    
									$to_array = explode("/",$to);
									  $to_date=$from_array[0].'-'.$from_array[1].'-'.$from_array[2];
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
									  $total_months1 = $total_months1+$months;
								
									  $total_years1 = $total_years1+$years;
									
									

							 }
							 if($total_months1>=12)
							 {
								  $total_years1 = ($total_years1 + (floor($total_months1/12)));
								  $total_months1 = ($total_months1%12);
							 }
				  
				  
							 
$query7="select * from  nonteaching_staff_exp where id=$id";
				          $result7=mysql_query($query7);
                           $allnontechexp="";
                           $allnontechexpTr="";
						   $check3=0;
						   $emp_info='DETAIL OF NON-TEACHING EXPERIENCE';	
				  while($row7=mysql_fetch_array($result7))
				  {
					  $emp_enfo=$row7['employee_info'];
					  if($emp_enfo!='')
					  {
					 $employee_info='Employee Information :&nbsp;'.$row7['employee_info'];
					 $bussiness='Bussiness :&nbsp;'.$row7['bussiness'];
					 $post='Post :&nbsp;'.$row7['post'];
					 $nature_of_duties='Nature of duties :&nbsp;'.$row7['nature_of_duties'];
					 $period_from='From :&nbsp;'.$from_date;
					 $period_to='To :&nbsp;'.$to_date;
					$salary='Salary :&nbsp;'.number_format($row7['salary'], 2, '.', ',');
					 $total_experience1='Total Experience :&nbsp;'.$total_years1."Years ".$total_months1."months";
					$emp_info='DETAIL OF NON-TEACHING EXPERIENCE';	
								  
				  }
					else
					{
					$employee_info='';	
					$bussiness='';	
					$post='';	
					$nature_of_duties='';	
					$period_from='';	
					$period_to='';	
					$salary='';	
					$total_experience1='';
					$emp_info='DETAIL OF NON-TEACHING EXPERIENCE';	
					}
					  $allnontechexp = $employee_info.'<br>'.$bussiness.'<br>'.$post.'<br>'.$nature_of_duties.'<br>'.$period_from.'<br>'.$period_to.'<br>'.$salary.'<br>';
					  if($check3==0)
{
	$nontechexp1=$emp_info;
}	
else{
	$nontechexp1="";
}
		
		if($check3==(mysql_num_rows($result7)-1))
		{
			$total_experience12 = $total_experience1;
		}else{
			$total_experience12="";
		}
		
					  	$allnontechexpTr .='<TR><td><h2>'.$nontechexp1.'</h2></td>	
<TD>'.$allnontechexp.''.$total_experience12.'</TD>

</TR>'; 
$check3++;
					
				  }
				  
				
				  
$query8="select * from  accomodation_detail where id=$id";
				          $result8=mysql_query($query8);
                      $allaccomodation ="";
					  $allaccomodationTr="";
					  $check6=0;
					   $acc_detail='WHETHER ACCOMMODATION REQUIRED';
				  while($row8=mysql_fetch_array($result8))
				  {
					  $name=$row8['name'];
						if($name!='')
						{
					 $name1='Name :&nbsp;'.$row8['name'];
					 $relation='Relation:&nbsp;'.$row8['relation'];
					 $live_with='Will live in dera :&nbsp;'.$row8['live_with'];
					 $diability='Diability :&nbsp;'.$row8['diability'];
					 $acc_detail='WHETHER ACCOMMODATION REQUIRED';
				  }
						else
						{
							$name1='';
							$relation='';
							$live_with='';
							$diability='';
							$acc_detail='WHETHER ACCOMMODATION REQUIRED';
						}
						  $allaccomodation = $name1.'<br>'.$relation.'<br>'.$live_with.'<br>'.$diability.'<br>';
						  		   			  if($check6==0)
{
	$acc_detail1=$acc_detail;
}	
else{
	$acc_detail1="";
}

		
					  	$allaccomodationTr .='<TR><td><h2>'.$acc_detail1.'</h2></td>	
<TD>'.$allaccomodation.'</TD>

</TR>'; 
$check6++;
				  }	
$query9="select * from  dependent_member_detail where id=$id";
				          $result9=mysql_query($query9);
               $alldepmember="";
               $alldepmemberTr="";
			   $check5=0;
			    $depdetail='DEPENDENT MEMBER(S) OF THE FAMILY STAY WITH CANDIDATE';
				  while($row9=mysql_fetch_array($result9))
				  {
					   $dep_name=$row9['name'];
					if($dep_name!='')
					{
					 $name='Name :&nbsp;'.$row9['name'];
					 $dob='Date of Birth :&nbsp;'.$row9['dob'];
					 $relationship='Relation :&nbsp;'.$row9['relationship'];
					 $occupation='Occupation :&nbsp;'.$row9['occupation'];
					 $dependent='Dependent Member :&nbsp;'.$row9['dependent'];
					 $disability='Diability :&nbsp;'.$row9['disability'];
					 $depdetail='DEPENDENT MEMBER(S) OF THE FAMILY STAY WITH CANDIDATE';
				  }
				  else{
					   $name='';
					   $dob='';
					   $relationship='';
					   $occupation='';
					   $dependent='';
					   $disability='';
					   $depdetail='DEPENDENT MEMBER(S) OF THE FAMILY STAY WITH CANDIDATE';
				  }
				   $alldepmember = $name.'<br>'.$dob.'<br>'.$relationship.'<br>'.$occupation.'<br>'.$dependent.'<br>'.$disability.'<br>';
				   			  if($check5==0)
{
	$alldepmember1=$depdetail;
}	
else{
	$alldepmember1="";
}
		
					  	$alldepmemberTr .='<TR><td><h2>'.$alldepmember1.'</h2></td>	
<TD>'.$alldepmember.'</TD>

</TR>'; 
$check5++;
				  }	

$query="select * from  `administrative_exp_detail` where id=$id";
				          $row1=mysql_query($query);
                             $alladmindetail="";
                             $alladmindetailTr="";
							 $check4=0;
							  $adminexp='DETAIL OF ADMINSTRATIVE EXPERIENCE';
				  while($row=mysql_fetch_array($row1))
				  {
					$school_detail=$row['school'];
					if($school_detail!='')
					{
					 $school='School :&nbsp;'.$row['school'];
					 $responsibilities='Responsibilities :&nbsp;'.$row['responsibilities'];
					 $for_class='For Casses :&nbsp;'.$row['for_class'];
					 $no_of_year='No. Of Year :&nbsp;'.$row['no_of_year'];
					 $total_experience2='Experience :&nbsp;'.$row['total_experience'];
					 $adminexp='DETAIL OF ADMINSTRATIVE EXPERIENCE';
				  }
					else
					{
						 $school='';
						 $responsibilities='';
						 $for_class='';
						 $no_of_year='';
						 $total_experience2='';
						 $adminexp='DETAIL OF ADMINSTRATIVE EXPERIENCE';
					}
					  $alladmindetail = $school.'<br>'.$responsibilities.'<br>'.$for_class.'<br>'.$no_of_year.'<br>';
					  if($check4==0)
{
	$adminexp1=$adminexp;
}	
else{
	$adminexp1="";
}
if($check4==(mysql_num_rows($row1)-1))
		{
			$total_experience12 = $total_experience2;
		}else{
			$total_experience12="";
		}
		
					  	$alladmindetailTr .='<TR><td><h2>'.$adminexp1.'</h2></td>	
<TD>'.$alladmindetail.''.$total_experience12.'</TD>

</TR>'; 
$check4++;
					}
					
					$query="select * from  refrence_detail where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
								 $ref_detail='REFRENCE DETAIL';
				  while($row=mysql_fetch_array($row1))
				  {
					   $ff_name=$row['f_name'];
					  
					    $f_name1=$row['f_name1'];
						
						if($ff_name!='' || $f_name1!=''){
					   if($ff_name!='')
					   {
					 $f_name_ref='First Name :&nbsp;'.$row['f_name'];
					 $l_name_ref='Last Name :&nbsp;'.$row['l_name'];
					  $address_ref='Address Line1 :&nbsp;'.$row['address'];
					  $address_reff='Address Line2 :&nbsp;'.$row['ref_address1'];
					  $ref_city='City :&nbsp;'.$row['city'];
					   $pin_ref='Pin :&nbsp;'.$row['pin'];
					  $ref_state='State :&nbsp;'.$row['state'];
					  $ref_country='Country :&nbsp;'.$row['country'];
					 $designation_ref='Designation :&nbsp;'.$row['designation'];
					 $mobile_ref='Mobile:&nbsp;'.$row['mobile'];
					 $telephone_ref='Telephone :&nbsp;'.$row['telephone'];
					 $email_ref='Email :&nbsp;'.$row['email']; 
					   }
					 if($f_name1!=''){
					 $f_name1_ref='First Name :&nbsp;'.$row['f_name1'];
					 $l_name1_ref='Last name :&nbsp;'.$row['l_name1'];
					 $designation1_ref='Designation :&nbsp;'.$row['designation1'];
					 $address1_ref='Address Line1 :&nbsp;'.$row['address1'];
					 $address1_reff='Address Line2 :&nbsp;'.$row['ref_address2'];
					 $ref_city1='City :&nbsp;'.$row['city1'];
					   $ref_state1='State :&nbsp;'.$row['state1'];
					  $ref_country1='Country :&nbsp;'.$row['country1'];
					 $pin_ref1='Pin :&nbsp;'.$row['pin1'];
					 $telephone1_ref='Telephone :&nbsp;'.$row['telephone1'];
					 $mobile1_ref='Mobile :&nbsp;'.$row['mobile1'];
					 $email_ref1='Email :&nbsp;'.$row['email1'];
					 $ref_detail='REFRENCE DETAIL';
				  }
				  }
				  else
				  {
					 $f_name_ref='';  
					 $l_name_ref='';  
					 $designation_ref='';  
					 $address_ref='';  
					 $pin_ref='';  
					 $telephone_ref='';  
					 $email_ref='';  
					 $f_name1_ref='';  
					 $l_name1_ref='';  
					 $designation1_ref='';  
					 $address1_ref='';  
					 $pin_ref1='';  
					 $telephone1_ref='';  
					 $email_ref1='';  
					 $ref_detail='REFRENCE DETAIL';  
				  }
				  }
		$image11 = "http://localhost/psschool/uploads/'.$image1.'";		  
 $pdf=new PDF_HTML();
 
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
 
$pdf->AddPage();
$pdf->Image('http://localhost/psschool/uploads/'.$image1.'',164,13,16);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<h1>PS SCHOOL</h1>');
$pdf->SetFont('Arial','B',7);  
$htmlTable='
<br>
<h1>PERSONAL DETAILS</h1>
<TABLE class="tbl">
<tbody>
<TR>
<td><strong>FIRST NAME</strong></td>
<td><strong>LAST NAME</strong></td>
</tr>
<tr>				 
<TD>'.$first_name.'</TD>
<TD>'.$Last_Name.'</TD>
</tr>
<tr>
<td><strong>POST APPLIED FOR</strong></td>
					 
<TD>'.$Post_Applied.'</TD>
</TR>
<TR>
<td><strong>DATE OF BIRTH</strong></td>
					 
<TD>'.$dob.'</TD>
</TR>
<TR>
<td><strong>'.$fathus1.'</strong></td>
					 
<TD>'.$fathus.'</TD>
</TR>
<TR>
<td><strong>PERMANENT HOME ADDRESS</strong></td>
					 
<TD>Address Line1 :&nbsp;'.$PERMANENT_ADDRESS.'<br>Address Line2 :&nbsp;'.$per_address1.'<br>City :&nbsp;'.$city.'<br>Pincode :&nbsp;'.$pin.'<br>State :&nbsp;'.$state.'<br>Country :&nbsp;'.$country.'<br>Telephone :&nbsp;'.$tele_no.'<br>Mobile No. :&nbsp;'.$per_mobile1.'</TD>
</TR>
<TR>
<td><strong>ADDRESS FOR COMMUNICATION</strong></td>
<TD>Address Line1 :&nbsp;'.$communication_address.'<br>Address Line2 :&nbsp;'.$comm_address1.'<br>City :&nbsp;'.$comm_city.'<br>Pincode :&nbsp;'.$comm_pin.'<br>State :&nbsp;'.$comm_state.'<br>Country :&nbsp;'.$comm_country.'<br>Telephone :&nbsp;'.$comm_telephoneno.'</TD>					 
</TR>
<TR>
<td><strong>EMAIL-ADDRESS</strong></td>
					 
<TD>'.$comm_email.'</TD>
</TR>
<TR>
<td><strong>MARITAL STATUS </strong></td>
					 
<TD>'.$MARITAL.'</TD>
</TR>
<TR>
<td><strong>NATIONALITY</strong></td>
					 
<TD>'.$NATIONALITY.'</TD>
</TR>
<TR>
<td><strong>STATE OF DOMICILE</strong></td>
					 
<TD>'.$DOMICILE.'</TD>
</TR>
<TR>
<td><strong>EXPERIENCE</strong></td>
					 
<TD>'.$fresher_exp.'</TD>
</TR>
<TR>
<td><strong>PRESENT POST</strong></td>
					 
<TD>'.$present_post.'</TD>
</TR>
<TR>
<td><strong>POST TYPE</strong></td>
					 
<TD>'.$post_type.'</TD>
</TR>
<TR>
<td><strong>PRESENT SALARY (PER MONTH)</strong></td>
					 
<TD>'.$present_salary.'</TD>
</TR>
<TR>
<td><strong>PRESENT EMPLOYER</strong></td>
					 
<TD>'.$present_employer.'</TD>
</TR>
<TR>
<td><strong>PAY BAND</strong></td>					 
<TD>'.$pay_band.'</TD>
</TR>
<TR>
<td><strong>GRADE PAY</strong></td>					 
<TD>'.$grade_pay.'</TD>
</TR>
<TR>
<td><strong>  N.C.C./N.S.S./NATIONAL SCOUT TRAINING, IF ANY? </strong></td>					 
<TD>'.$ncc_detail.'</TD>
</TR>
<TR>
<td><strong> KNOWLEDGE OF FOREIGN LANGUAGE  </strong></td>					 
<TD>'.$foregin_language_detail.'</TD>
</TR>
<TR>
<td><strong>ARE YOU TECHNO-SAVVY /COMPUTER LITERATE</strong></td>					 
<TD>'.$techosavvy_computerliterate_detail.'</TD>
</TR>
<TR>
<td><strong>LITERARY, CULTURAL, SPORTS OR OTHER ACTIVITIES IN WHICH THE APPLICANT HAS DISTINCTIONS/AWARDS</strong></td>					 
<TD>'.$awards_detail.'</TD>
</TR>
<TR>
<td><strong> ARE YOU ABLE TO TEACH THROUGH </strong></td>					 
<TD>'.$teach_language.'</TD>
</TR>
<TR>
<td><strong>REGIONAL LANGUAGE </strong></td>					 
<TD>'.$regional_language.'</TD>
</TR>
<TR>
<td><strong>  ARE YOU CTET/TET QUALIFIED </strong></td>					 
<TD>'.$ctet_tet_detail.'</TD>
</TR>
<TR>
<td><strong>IF SELECTED, THE EARLIEST YOU CAN JOIN BY (NOTICE PERIOD)</strong></td>					 
<TD>'.$noticeperiod_detail.'</TD>
</TR>
<TR>
<td><strong>IS ANY CRIMINAL CASE PENDING AGAINST YOU?</strong></td>					 
<TD>'.$casepending_detail.'</TD>
</TR>
<TR>
<td><strong>HAVE YOU EVER BEEN CONVICTED IN A CRIMINAL CHARGE BY ANY COURT?</strong></td>					 
<TD>'.$criminalcharged_detail.'</TD>
</TR>
<TR>
<td><strong>HAVE YOU EARLIER APPLIED FOR EMPLOYMENT IN PS SCHOOL</strong></td>					 
<TD>'.$eariler_applied_employement_ps.'</TD>
</TR>
<TR>
<td><strong>OTHER INFORMATION</strong></td>					 
<TD>'.$other_info.'</TD>
</TR>
<TR>
<td><strong>PLACE</strong></td>					 
<TD>'.$submit_place.'</TD>
</TR>
<TR>
<td><strong>APPLICATION RECEIPT DATE </strong></td>
					 
<TD>'.$dt_created.'</TD>
</TR>
<TR><h1>FAMILY DETAILS</h1></TR>
<TR>
<td><h2>'.$spouse_detail1.'</h2></td>	
<TD>'.$spouse_name.'<br>'.$spouse_dob.'<br>'.$spouse_profession11.'<br>'.$spouse_designation11.'<br>'.$spouse_place_of_posting11.'<br>'.$spouse_monthly_income11.'</TD>
</TR>
'.$allChildrenTr.'
'.$allTr.'
'.$alltechexpTr.'
'.$allnontechexpTr.'
'.$alladmindetailTr.';
'.$alldepmemberTr.';
'.$allaccomodationTr.'

<TR>
<td><h2>'.$ref_detail.'</h2></td>	
<TD>'.$f_name_ref.'<br>'.$l_name_ref.'<br>'.$address_ref.'<br>'.$address_reff.'<br>'.$ref_city.'<br>'.$pin_ref.'<br>'.$ref_state.'<br>'.$ref_country.'<br>'.$telephone_ref.'<br>'.$mobile_ref.'<br>'.$email_ref.'<br>'.$designation_ref.'<br></td>
</TR>
<tr>
<td></td>
<TD>'.$f_name1_ref.'<br>'.$l_name1_ref.'<br>'.$address1_ref.'<br>'.$address1_reff.'<br>'.$ref_city1.'<br>'.$pin_ref1.'<br>'.$ref_state1.'<br>'.$ref_country1.'<br>'.$telephone1_ref.'<br>'.$mobile1_ref.'<br>'.$email_ref1.'<br>'.$designation1_ref.'<br></td>
<tr>
</tbody>
</TABLE>';
$pdf->WriteHTML2("<br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>