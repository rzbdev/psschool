<?php
ob_start();
require('fpdf/fpdf.php');
$server = $_SERVER["DOCUMENT_ROOT"];
error_reporting(0);
include_once('../config.php');
$id = $_REQUEST['id'];
	
$examination_passedA = array();
$year_of_passingA = array();
$subject_offeredA = array();
$medium_of_insructionA = array();
$max_marksA = array();
$marks_obtainA = array();
$marks_percentageA = array();
$divisionA = array();
$schoolA = array();
$boardA = array();
$instituteA = array();
$designationA = array();
$period_fromA = array();
$period_toA = array();
$sub_taughtA = array();
$dutiesA = array();
$employee_infoA= array();
$bussinessA= array();
$postA= array();
$nature_of_dutiesA= array();
$period_fromAA= array();
$period_toAA= array();
$salaryA= array();
$schoolAA= array();
$responsibilitiesA= array();
$for_classA= array();
$no_of_yearA= array();
$nameA= array();
$bussinessA= array();
$dob1A= array();
$occupationA= array();
$dependentA= array();
$disabilityA= array();
$relationshipA= array();
$name1A= array();
$relationA= array();
$live_withA= array();
$diabilityA= array();
$name2A= array();
$address2A= array();
$relation2A= array();
$departmentA= array();
$joining_dateA= array();
$h_pA= array();
$salary22A= array();
$age2A= array();
$child_nameA= array();
$child_dobA= array();
$child_married_statusA= array();
$child_qualification_detailA= array();
$child_genderA= array();

				$query="select * from  personal_details where id=$id";
				  $row1=mysql_query($query);
				  while($row=mysql_fetch_array($row1))
				  {
					 $first_name=$row['first_name'];
					  $Middle_Name=$row['middle_name'];
					 $Last_Name=$row['last_name'];
					 $Post_Applied=$row['post_applied'];
					 $dob=$row['dob'];
					  $timestamp = strtotime($dob);
                     $age= date('d/m/Y', $timestamp);
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

$age1= " " . $diff->y . "  " ;
	}
	else
	{
		$age1= " ";
	}
					 
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
					 	$gender=$row['gender'];
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
					 echo $per_address1=$row['per_address1'];
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
						$image1='default.jpg';
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
						 $spouse_name=$name11; 
						  $spouse_dob=$dob;
					 $spouse_profession11=$row3['profession'];
				     $spouse_designation11=$row3['designation'];
					 $spouse_place_of_posting11=$row3['place_of_posting'];
	$spouse_monthly_income11=number_format($row3['monthly_income'], 2, '.', ',');
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
				     $child_name=$row4['name'];
					 $child_dob=$dob; 
					 $child_married_status=$row4['married_status'];
					 $child_qualification_detail=$row4['qualification_detail'];
					 $child_gender=$row4['gender'];
					 $Children_detail1='DETAIL OF CHILDREN';
					}
					array_push($child_nameA,$child_name);
					array_push($child_dobA,$child_dob);
					array_push($child_married_statusA,$child_married_status);
					array_push($child_qualification_detailA,$child_qualification_detail);
					array_push($child_genderA,$child_gender);
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
					  
					 $examination_passed = $row5['examination_passed'];
					 $year_of_passing = $row5['year_of_passing'];
					 $subject_offered = $row5['subject_offered'];
					 $medium_of_insruction=$row5['medium_of_insruction'];
					 $max_marks=$row5['max_marks'];
					 $marks_obtain=$row5['marks_obtain'];
					 $abc=$row5['marks_obtain']/$row['max_marks']*100;
					 $marks_percentage=number_format((float)$abc, 2, '.', '').'%';
					 $division=$row5['division']; 
					 $school=$row5['school'];
					  $board=$row5['board'];
					    
					array_push($examination_passedA,$examination_passed);
					array_push($year_of_passingA,$year_of_passing);
					array_push($subject_offeredA,$subject_offered);
					array_push($medium_of_insructionA,$medium_of_insruction);
					array_push($max_marksA,$max_marks);
					array_push($marks_obtainA,$marks_obtain);
					array_push($marks_percentageA,$marks_percentage);
					array_push($divisionA,$division);
					array_push($schoolA,$school);
					array_push($boardA,$board);
					   }
					
					  	
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
					
					 $institute=$row6['institute'];
					 $designation=$row6['designation'];
					 $period_from=$from_date;
					 $period_to=$to_date;
					 $sub_taught=$row6['sub_taught'];
					 $duties=$row6['duties'];
					 $total_experience='Total Experience :&nbsp;'.$total_years."Years ".$total_months."months";
					 $techexp='DETAIL OF TEACHING EXPERIENCE';
					  }
					
					array_push($instituteA,$institute);
					array_push($designationA,$designation);
					array_push($period_fromA,$period_from);
					array_push($period_toA,$period_to);
					array_push($sub_taughtA,$sub_taught);
					array_push($dutiesA,$duties);
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
					 $employee_info=$row7['employee_info'];
					 $bussiness=$row7['bussiness'];
					 $post=$row7['post'];
					 $nature_of_duties=$row7['nature_of_duties'];
					 $period_from=$from_date;
					 $period_to=$to_date;
					$salary=number_format($row7['salary'], 2, '.', ',');
					 $total_experience1='Total Experience :&nbsp;'.$total_years1."Years ".$total_months1."months";
					$emp_info='DETAIL OF NON-TEACHING EXPERIENCE';	
								  
				  }
					array_push($employee_infoA,$employee_info);
					array_push($bussinessA,$bussiness);
					array_push($postA,$post);
					array_push($nature_of_dutiesA,$nature_of_duties);
					array_push($period_fromAA,$period_from);
					array_push($period_toAA,$period_to);
					array_push($salaryA,$salary);
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
					 $name1=$row8['name'];
					 $relation=$row8['relation'];
					 $live_with=$row8['live_with'];
					 $diability=$row8['diability'];
					 $acc_detail='WHETHER ACCOMMODATION REQUIRED';
				  }
						array_push($name1A,$name1);
					array_push($relationA,$relation);
					array_push($live_withA,$live_with);
					array_push($diabilityA,$diability);
		
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
					 $name=$row9['name'];
					 $dob1=$row9['dob'];
					 $relationship=$row9['relationship'];
					 $occupation=$row9['occupation'];
					 $dependent=$row9['dependent'];
					 $disability=$row9['disability'];
					 $depdetail='DEPENDENT MEMBER(S) OF THE FAMILY STAY WITH CANDIDATE';
				  }
					array_push($nameA,$name);
					array_push($dob1A,$dob1);
					array_push($relationshipA,$relationship);
					array_push($occupationA,$occupation);
					array_push($dependentA,$dependent);
					array_push($disabilityA,$disability);
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
					 $school=$row['school'];
					 $responsibilities=$row['responsibilities'];
					 $for_class=$row['for_class'];
					 $no_of_year=$row['no_of_year'];
					 $total_experience2=$row['total_experience'];
					 $adminexp='DETAIL OF ADMINSTRATIVE EXPERIENCE';
				  }
					array_push($schoolAA,$school);
					array_push($responsibilitiesA,$responsibilities);
					array_push($for_classA,$for_class);
					array_push($no_of_yearA,$no_of_year);
					}
					
					$query="select * from  other_employee where id=$id";
				          $row1=mysql_query($query);
                            $i=0;
				  while($row=mysql_fetch_array($row1))
				  {
					 $n=++$i;
					 $name2=$row['name'];
					  if($name2!='')
					 {
					 $address2=$row['address'];
					 $age2=$row['age'];
					 $relation2=$row['relation'];
					 $department=$row['department'];
					 $joining_date=$row['joining_date'];
					 $h_p=$row['h_p'];
					 $salary22=$row['salary'];
					
						 
				  }
				  array_push($name2A,$name2);
					array_push($address2A,$address2);
					array_push($relation2A,$relation2);
					array_push($departmentA,$department);
					array_push($joining_dateA,$joining_date);
					array_push($h_pA,$h_p);
					array_push($salary22A,$salary22);
					array_push($age2A,$age2);
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
					 $f_name_ref=$row['f_name'];
					 $l_name_ref=$row['l_name'];
					  $address_ref=$row['address'];
					  $address_reff=$row['ref_address1'];
					  $ref_city=$row['city'];
					   $pin_ref=$row['pin'];
					  $ref_state=$row['state'];
					  $ref_country=$row['country'];
					 $designation_ref=$row['designation'];
					 $mobile_ref=$row['mobile'];
					 $telephone_ref=$row['telephone'];
					 $email_ref=$row['email']; 
					   }
					 if($f_name1!=''){
					 $f_name1_ref=$row['f_name1'];
					 $l_name1_ref=$row['l_name1'];
					 $designation1_ref=$row['designation1'];
					 $address1_ref=$row['address1'];
					 $address1_reff=$row['ref_address2'];
					 $ref_city1=$row['city1'];
					   $ref_state1=$row['state1'];
					  $ref_country1=$row['country1'];
					 $pin_ref1=$row['pin1'];
					 $telephone1_ref=$row['telephone1'];
					 $mobile1_ref=$row['mobile1'];
					 $email_ref1=$row['email1'];
					 $ref_detail='REFRENCE DETAIL';
				  }
				  }
				  }
				 $imag_name= 'http://careers.pathseekers.education/uploads/'.$image1.'';
				  
				
class PDF_result extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin =20) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);
		$this->SetAutoPageBreak(true, $margin);
	}

function generate_Table($fathus1,$first_name,$Last_Name,$Post_Applied,$dob,$fathus,$PERMANENT_ADDRESS,$per_address1,$city,$pin,$state,$country,$tele_no,$per_mobile1,$communication_address,$comm_address1,$comm_city,$comm_pin,$comm_state,$comm_country,$comm_telephoneno,$comm_email,$MARITAL,$NATIONALITY,$imag_name,$examination_passedA,$year_of_passingA,$subject_offeredA,$medium_of_insructionA,$max_marksA,$marks_obtainA,$marks_percentageA,$divisionA,$schoolA,$boardA,$ncc_detail,$foregin_language_detail,$DOMICILE,$gender,$age,$comm_mobileno,$age1,$fresher_exp,$present_employer,$present_post,$post_type,$present_salary,$pay_band,$grade_pay,$teach_language,$regional_language,$ctet_tet_detail,$instituteA,$designationA,$period_fromA,$period_toA,$sub_taughtA,$dutiesA,$employee_infoA,$bussinessA,$postA,$nature_of_dutiesA,$period_fromAA,$period_toAA,$salaryA,$total_years1,$total_months1,$total_years,$total_months,$schoolAA,$responsibilitiesA,$for_classA,$no_of_yearA,$no_of_year,$f_name_ref,$l_name_ref,$f_name1_ref,$l_name1_ref,$address_ref,$address1_ref,$address_reff,$address1_reff,$ref_city,$ref_city1,$pin_ref,$pin_ref1,$ref_state,$ref_state1,$ref_country,$ref_country1,$telephone_ref,$telephone1_ref,$mobile_ref,$mobile1_ref,$email_ref,$email_ref1,$designation_ref,$designation1_ref,$nameA,$dob1A,$relationshipA,$occupationA,$dependentA,$disabilityA,$name1A,$relationA,$live_withA,$diabilityA,$eariler_applied_employement_ps,$criminalcharged_detail,$casepending_detail,$name2A,$age2A,$address2A,$relation2A,$departmentA,$joining_dateA,$h_pA,$salary22A,$other_info,$submit_place,$dt_created,$noticeperiod_detail,$spouse_name,$spouse_dob,$spouse_profession11,$spouse_designation11,$spouse_place_of_posting11,$spouse_monthly_income11,$child_nameA,$child_dobA,$child_married_statusA,$child_qualification_detailA,$child_genderA) {
	// main heading
	$this->SetFont('Arial', 'B', 15);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"",'',0,'L');	
	
	//block one line one
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$current_x=$this->GetX();
	$current_y=$this->GetY();
	$this->Cell(190, 25, "FIRST NAME", 'TLR',0, 'C'); 
	$this->Cell(190, 25, "LAST NAME", 'TLR',0, 'C');	
	$this->Cell(190, 25, "", 'TLR',0, 'C');	
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 50,  $first_name, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 50,  $Last_Name, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 50, $this->Image($imag_name,450,50,70,70), 'LR', 0, 'C' );	//$pdf->Image('',164,13,16);
	$this->Ln();
	
	//block two line two
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Cell(190, 25, "POST APPLIED FOR", 'TLR', 0, 'C');
	$this->Cell(190, 25, "DATE OF BIRTH", 'TLR', 0, 'C');
	$this->Cell(190, 25, "AGE", 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 20,  $Post_Applied, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 20,  $age, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 20,  $age1, 'TLR', 0, 'C', $fill);
	$this->Ln();
	
	//block three line three
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Cell(190, 25, "Email", 'TLR', 0, 'C');
	$this->Cell(190, 25, "Gender", 'TLR', 0, 'C');
	$this->Cell(190, 25, $fathus1, 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 20,  $comm_email, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 20,  $gender, 'TLR', 0, 'C', $fill);
	$this->Cell(190, 20,  $fathus, 'TLR', 0, 'C', $fill);
	$this->Ln();
	
	//block four line four
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Cell(190, 25, "Mobile No.", 'TLR', 0, 'C');
	$this->Cell(190, 25, "Nationality", 'TLR', 0, 'C');
	$this->Cell(190, 25, "Domicile State", 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 20,  $comm_mobileno, 'TLRB', 0, 'C', $fill);
	$this->Cell(190, 20,  $NATIONALITY, 'TLRB', 0, 'C', $fill);
	$this->Cell(190, 20,  $DOMICILE, 'TLRB', 0, 'C', $fill);
	$this->Ln();
	$this->Ln();

	//block five line five
	$this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"Address Detail",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->Cell(190, 25, 'Premanent Address', 'TLR', 0, 'C');
	$this->Cell(190, 25, 'Communication Address', 'TLR', 0, 'C');
	$this->Cell(190, 25, 'Marital Status', 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 15,  $PERMANENT_ADDRESS, 'TLR', 0, 'L', $fill);
	$this->Cell(190, 15,  $communication_address, 'TLR', 0, 'L', $fill);
	$this->Cell(190, 15,  $MARITAL, 'TLR', 0, 'L', $fill);
	$this->Ln();
	$this->Cell(190, 15,  $per_address1, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  $comm_address1, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LR', 0, 'C', $fill);
	$this->Ln();
	$this->Cell(190, 15,  'City:-'.$city, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  'City:-'.$city, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LR', 0, 'L', $fill);
		$this->Ln();
	$this->Cell(190, 15,  'Pincode:-'.$pin, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  'Pincode:-'.$pin, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LR', 0, 'L', $fill);
	$this->Ln();
	$this->Cell(190, 15,  'State:-'.$State, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  'State:-'.$State, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LR', 0, 'L', $fill);
	$this->Ln();
	$this->Cell(190, 15,  'Telephone:-'.$tele_no, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  'Telephone:-'.$tele_no, 'LR', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LR', 0, 'C', $fill);
	$this->Ln();
	$this->Cell(190, 15,  'Mobile No.:-'.$per_mobile1, 'LRB', 0, 'L', $fill);
	$this->Cell(190, 15,  'Mobile No.:-'.$per_mobile1, 'LRB', 0, 'L', $fill);
	$this->Cell(190, 15,  '', 'LRB', 0, 'C', $fill);
	$this->Ln();
	$this->Ln();
	$fill = !$fill;
	

	 if($MARITAL== 'Married'){
	 //block TTTTTT line TTTTTT
	$this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"DETAILS OF SPOUSE",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->Cell(50, 25, 'Name', 'TLR', 0, 'C');
	$this->Cell(70, 25, 'Date Of Birth', 'TLR', 0, 'C');
	$this->Cell(110, 25, 'Profession (Department)', 'TLR', 0, 'C');
	$this->Cell(125, 25, 'Designation', 'TLR', 0, 'C');
	$this->Cell(125, 25, 'Place Of Posting', 'TLR', 0, 'C');
	$this->Cell(90, 25, 'Income(Monthly)', 'TLR', 0, 'C');
	$this->Ln();
	$this->Cell(50, 25, $spouse_name, 'TBLR', 0, 'C');
	$this->Cell(70, 25, $spouse_dob, 'TBLR', 0, 'C');
	$this->Cell(110, 25, $spouse_profession11, 'TBLR', 0, 'C');
	$this->Cell(125, 25, $spouse_designation11, 'TBLR', 0, 'C');
	$this->Cell(125, 25, $spouse_place_of_posting11, 'TBLR', 0, 'C');
	$this->Cell(90, 25, $spouse_monthly_income11, 'TBLR', 0, 'C');
	$this->Ln();
	
	
	$this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"PARTICULARS OF CHILDREN ",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->Cell(70, 25, 'Gender', 'TLRB', 0, 'C');
	$this->Cell(70, 25, 'Name', 'TLRB', 0, 'C');
	$this->Cell(70, 25, 'Date Of Birth', 'TLRB', 0, 'C');
	$this->Cell(180, 25, 'Whether Married & Settled', 'TLRB', 0, 'C');
	$this->Cell(180, 25, 'Whether Studying, If So, State Class', 'TLRB', 0, 'C');
	$this->Ln();
	for ($j = 0; $j < count($child_nameA); $j++) {
	$this->Cell(70, 25, $child_genderA[$j], 'TLRB', 0, 'C');
	$this->Cell(70, 25, $child_nameA[$j], 'TLRB', 0, 'C');
	$this->Cell(70, 25, $child_dobA[$j], 'TLRB', 0, 'C');
	$this->Cell(180, 25, $child_married_statusA[$j], 'TLRB', 0, 'C');
	$this->Cell(180, 25, $child_qualification_detailA[$j], 'TLRB', 0, 'C');
	$this->Ln();
	}
	
	
	}
	 
	 
	 
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"ACADEMIC / PROFESSIONAL QUALIFICATIONS ",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(65, 15,  'Examination', 'TLRB', 0, 'L', $fill);
	$this->Cell(60, 15,  'Passing Year', 'TLRB', 0, 'L', $fill);
	$this->Cell(70, 15,  'Subjects Offered', 'TLRB', 0, 'L', $fill);
	$this->Cell(80, 15,  'Medium Of Instruction', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'Max Marks', 'TLRB', 0, 'L', $fill);
	$this->Cell(70, 15,  'Marks Obtained', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  '% Of Marks', 'TLRB', 0, 'L', $fill);
	$this->Cell(40, 15,  'Division', 'TLRB', 0, 'L', $fill);
	$this->Cell(35, 15,  'College', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'University', 'TLRB', 0, 'L', $fill);
	$this->Ln();
	$this->SetFont('Arial', '',8);

for ($j = 0; $j < count($examination_passedA); $j++) {
	$this->Cell(65, 20,  $examination_passedA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(60, 20,  $year_of_passingA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(70, 20,  $subject_offeredA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(80, 20,  $medium_of_insructionA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $max_marksA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(70, 20,  $marks_obtainA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $marks_percentageA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(40, 20,  $divisionA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(35, 20,  $schoolA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $boardA[$j], 'LRB', 0, 'L', $fill);

	$this->Ln();

	} 
////block seven line seven
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Cell(285, 25, "N.C.C./N.S.S./NATIONAL SCOUT TRAINING, IF ANY?", 'TLR', 0, 'L');
	$this->Cell(285, 25, "KNOWLEDGE OF FOREIGN LANGUAGE (GIVE DETAILS)", 'TLR', 0, 'L');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(285, 20,  $ncc_detail, 'LRB', 0, 'L', $fill);
	$this->Cell(285, 20,  $foregin_language_detail, 'LRB', 0, 'L', $fill);
	$this->Ln();

////block eight line eight
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(285, 25, "ARE YOU TECHNO-SAVVY /COMPUTER LITERATE (GIVE DETAILS)", 'TLR', 0, 'L');
	$this->Multicell(285, 15,"LITERARY, CULTURAL, SPORTS OR OTHER ACTIVITIES IN WHICH THE APPLICANT HAS DISTINCTIONS/AWARDS", 'TLR', 1, 'L');
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(285, 20,  $ncc_detail, 'LRB', 0, 'L', $fill);
	$this->Cell(285, 20,  $foregin_language_detail, 'LRB', 0, 'L', $fill);
	$this->Ln();
	$this->Ln();

	//block six line six
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"Current Job Details",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(285, 25, "FRESHER/EXPERIENCE", 'TLRB', 0, 'L');
	$this->Cell(285, 25, $fresher_exp ,'TLRB', 0, 'L');
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(190, 25, "Present Employer", 'TLR', 0, 'L');
	$this->Cell(190, 25, "Present Post", 'TLR', 0, 'L');
	$this->Cell(190, 25, "Post", 'TLR', 0, 'L');
	$this->Ln();
	$this->Cell(190, 25, $present_employer ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $present_post ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $post_type ,'TLRB', 0, 'L');
	$this->Ln();
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(190, 25, "PRESENT SALARY (PER MONTH)", 'TLR', 0, 'L');
	$this->Cell(190, 25, "PAY BAND", 'TLR', 0, 'L');
	$this->Cell(190, 25, "GRADE PAY", 'TLR', 0, 'L');
	$this->Ln();
	$this->Cell(190, 25, $present_salary ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $pay_band ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $grade_pay ,'TLRB', 0, 'L');
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(190, 25, "ARE YOU ABLE TO TEACH THROUGH", 'TLR', 0, 'L');
	$this->Cell(190, 25, "REGIONAL LANGUAGE", 'TLR', 0, 'L');
	$this->Cell(190, 25, "ARE YOU CTET/TET QUALIFIED", 'TLR', 0, 'L');
	$this->Ln();
	$this->Cell(190, 25, $teach_language ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $regional_language ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $ctet_tet_detail ,'TLRB', 0, 'L');
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(285, 25, "IF SELECTED, THE EARLIEST YOU CAN JOIN BY (NOTICE PERIOD)", 'TLRB', 0, 'L');
	$this->Cell(285, 25, $noticeperiod_detail ,'TLRB', 0, 'L');
	
	 //teaching exp
	 $this->Ln();$this->Ln();
	  $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"Experience Details ",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"FOR TEACHERS POST- TEACHING EXPERIENCE ",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(20, 15,  '#', 'TLRB', 0, 'C', $fill);
	$this->Cell(120, 15,  'Name & Address Of The Institution', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Designation', 'TLRB', 0, 'L', $fill);
	$this->Cell(60, 15,  'Period From', 'TLRB', 0, 'L', $fill);
	$this->Cell(60, 15,  'Period To', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Classes/Subjects Taught', 'TLRB', 0, 'L', $fill);
	$this->Cell(110, 15,  'Nature Of Duties', 'TLRB', 0, 'L', $fill);
	$this->Ln();
	$this->SetFont('Arial', '',8);

for ($j = 0; $j < count($instituteA); $j++) {
	$this->Cell(20, 20,  $j+'1', 'LRB', 0, 'L', $fill);
	$this->Cell(120, 20,  $instituteA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $designationA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(60, 20,  $period_fromA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(60, 20,  $period_toA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $sub_taughtA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(110, 20,  $dutiesA[$j], 'LRB', 0, 'L', $fill);
	$this->Ln();

	}
$this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(285, 25,"Total Experience",'TLRB',0,'L');	
	$this->Cell(285, 25,$total_years.'Years '.$total_months.'Months (system generated)','TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);	
	
	
	 //non teaching exp
	 $this->Ln();
	 $this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"FOR NON TEACHERS POST- NON TEACHING EXPERIENCE ",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(20, 15,  '#', 'TLRB', 0, 'C', $fill);
	$this->Cell(110, 15,  'Employer Information', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Profession', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Designation', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Duties', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'From', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'To', 'TLRB', 0, 'L', $fill);
	$this->Cell(40, 15,  'Salary', 'TLRB', 0, 'L', $fill);
	$this->Ln();
	$this->SetFont('Arial', '',8);

for ($j = 0; $j < count($employee_infoA); $j++) {
	$this->Cell(20, 20,  $j+'1', 'LRB', 0, 'L', $fill);
	$this->Cell(110, 20,  $employee_infoA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $bussinessA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $postA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $nature_of_dutiesA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $period_fromAA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $period_toAA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(40, 20,  $salaryA[$j], 'LRB', 0, 'L', $fill);
	$this->Ln();

	} 
		 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(285, 25,"Total Experience",'TLRB',0,'L');	
	$this->Cell(285, 25,$total_years1.'Years '.$total_months1.'Months (system generated)','TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	
	 //non teaching exp
	 $this->Ln();
	 $this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"FOR ADMINSTRATIVE EXPERIENCE ",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(20, 15,  '#', 'TLRB', 0, 'C', $fill);
	$this->Cell(150, 15,  'Name Of The School/Board', 'TLRB', 0, 'L', $fill);
	$this->Cell(150, 15,  'Responsibilities Held', 'TLRB', 0, 'L', $fill);
	$this->Cell(150, 15,  'For Classes', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'No. Of Years', 'TLRB', 0, 'L', $fill);
	$this->Ln();
	$this->SetFont('Arial', '',8);

for ($j = 0; $j < count($schoolAA); $j++) {
	$this->Cell(20, 20,  $j+'1', 'LRB', 0, 'L', $fill);
	$this->Cell(150, 20,  $schoolAA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(150, 20,  $responsibilitiesA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(150, 20,  $for_classA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $no_of_yearA[$j], 'LRB', 0, 'L', $fill);
	$this->Ln();

	} 
		 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(285, 25,"Total Experience",'TLRB',0,'L');	
	$this->Cell(285, 25,$no_of_year.'Years (Enter by user)','TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();$this->Ln();
	
	//refrence detail
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"REFRENCES",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->Cell(285, 25, 'FIRST REFERENCE :', 'TLRB', 0, 'L');
	$this->Cell(285, 25, 'SECOND REFERENCE :', 'TLRB', 0, 'L');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(285, 15,  'Name:-'.$f_name_ref.' '.$l_name_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'Name:-'.$f_name1_ref.' '.$l_name1_ref, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  $address_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  $address1_ref, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  $address_reff, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  $address1_reff, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  'City:-'.$ref_city, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'City:-'.$ref_city1, 'LR', 0, 'L', $fill);
		$this->Ln();
	$this->Cell(285, 15,  'Pincode:-'.$pin_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'Pincode:-'.$pin_ref1, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  'State:-'.$ref_state, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'State:-'.$ref_state1, 'LR', 0, 'L', $fill);
	$this->Ln();
	$this->Cell(285, 15,  'Telephone:-'.$telephone_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'Telephone:-'.$telephone1_ref, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  'Mobile No.:-'.$mobile_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'Mobile No.:-'.$mobile1_ref, 'LR', 0, 'L', $fill);

	$this->Ln();
	$this->Cell(285, 15,  'Email:-'.$email_ref, 'LR', 0, 'L', $fill);
	$this->Cell(285, 15,  'Email:-'.$email_ref1, 'LR', 0, 'L', $fill);
	
	$this->Ln();
	$this->Cell(285, 15,  'Designation:-'.$designation_ref, 'LRB', 0, 'L', $fill);
	$this->Cell(285, 15,  'Designation:-'.$designation1_ref, 'LRB', 0, 'L', $fill);
	$this->Ln();
	$this->Ln();
	$fill = !$fill;
	
	 //Dependent member 
	 $this->Ln();
	 $this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"DEPENDENT MEMBERS (S) OF FAMILY TO STAY WITH THE CANDIDATE",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(50, 15,  'Name', 'TLR', 0, 'L', $fill);
	$this->Cell(50, 15,  'Date Of Birth', 'TLR', 0, 'L', $fill);
	$this->Cell(50, 15,  'Relationship', 'TLR', 0, 'L', $fill);
	$this->Cell(130, 15,  'Occupation With Monthly Income', 'TLR', 0, 'L', $fill);
	$this->Cell(145, 15,  'Economically Or Physically Justification' , 'TLR', 'J', $fill);
	$this->Cell(145, 15,  'Any Chronic Illness Or Physical', 'TLR', 0, 'L', $fill);
	$this->Ln();
	$this->Cell(50, 15,  '', 'LRB', 0, 'L', $fill);
	$this->Cell(50, 15,  '', 'LRB', 0, 'L', $fill);
	$this->Cell(50, 15,  '', 'LRB', 0, 'L', $fill);
	$this->Cell(130, 15,  '', 'LRB', 0, 'L', $fill);
	$this->Cell(145, 15,  'Of Their Stay', 'LRB', 'J', $fill);
	$this->Cell(145, 15,  'Disability', 'LRB', 0, 'L', $fill);
	$this->Ln();
	$this->SetFont('Arial', '',8);

for ($j = 0; $j < count($nameA); $j++) {
	$this->Cell(50, 20,  $nameA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $dob1A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $relationshipA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(130, 20,  $occupationA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(145, 20,  $dependentA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(145, 20,  $disabilityA[$j], 'LRB', 0, 'L', $fill);
	$this->Ln();

	} 
	
	$this->Ln();
 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25,"Accommodation Details",'',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"WHETHER ACCOMMODATION REQUIRED",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(50, 15,  '#', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'Name', 'TLRB', 0, 'L', $fill);
	$this->Cell(150, 15,  'Relationship', 'TLRB', 0, 'L', $fill);
	$this->Cell(150, 15,  'Will live in Dera', 'TLRB', 0, 'L', $fill);
	$this->Cell(170, 15,  'Any Chronic Illness (Or) Physical Disability' , 'TLRB', 'J', $fill);
	$this->SetFont('Arial', '',8);
	$this->Ln();

for ($j = 0; $j < count($nameA); $j++) {
	$this->Cell(50, 20,  $j+'1', 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $name1A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(150, 20,  $relationA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(150, 20,  $live_withA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(170, 20,  $diabilityA[$j], 'LRB', 0, 'L', $fill);
	$this->Ln();
	} 
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(190, 25, "IS ANY CRIMINAL CASE PENDING AGAINST YOU?", 'TLR', 0, 'L');
	$this->Cell(190, 25, " CONVICTED IN A CRIMINAL CHARGE", 'TLR', 0, 'L');
	$this->Cell(190, 25, "HAVE YOU EARLIER APPLIED FOR EMPLOYMENT  ", 'TLR', 0, 'L');
$this->Ln();
	$this->Cell(190, 25, $casepending_detail ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $criminalcharged_detail ,'TLRB', 0, 'L');
	$this->Cell(190, 25, $eariler_applied_employement_ps ,'TLRB', 0, 'L');
	
	// specify spouse_designation11
	
		$this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"Specify, if spouse/parents/any other relative doing sewa",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(238);
	$this->Cell(20, 15,  '#', 'TLRB', 0, 'L', $fill);
	$this->Cell(50, 15,  'Name', 'TLRB', 0, 'L', $fill);
	$this->Cell(30, 15,  'Age', 'TLRB', 0, 'L', $fill);
	$this->Cell(100, 15,  'Address', 'TLRB', 0, 'L', $fill);
	$this->Cell(90, 15,  'Relation' , 'TLRB', 'J', $fill);
	$this->Cell(90, 15,  'Department' , 'TLRB', 'J', $fill);
	$this->Cell(70, 15,  'Date Of Joining' , 'TLRB', 'J', $fill);
	$this->Cell(60, 15,  'Hony./Parshadi.' , 'TLRB', 'J', $fill);
	$this->Cell(60, 15,  'Monthly Salary' , 'TLRB', 'J', $fill);
	$this->SetFont('Arial', '',8);
	$this->Ln();

for ($j = 0; $j < count($nameA); $j++) {
	$this->Cell(20, 20,  $j+'1', 'LRB', 0, 'L', $fill);
	$this->Cell(50, 20,  $name2A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(30, 20,  $age2A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(100, 20,  $address2A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(90, 20,  $relation2A[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(90, 20,  $departmentA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(70, 20,  $joining_dateA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(60, 20,  $h_pA[$j], 'LRB', 0, 'L', $fill);
	$this->Cell(60, 20,  $salary22A[$j], 'LRB', 0, 'L', $fill);


	$this->Ln();
	}

//block two line two
$this->Ln();
	 $this->SetFont('Arial', 'B', 10);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(570, 25,"Other Information ",'TLRB',0,'L');	
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Ln();
	$this->SetFont('Arial', 'B', 7);
	$this->SetFillColor(94, 188, 225);
	$this->Cell(190, 25, "Other Information ", 'TLR', 0, 'C');
	$this->Cell(190, 25, "Date ", 'TLR', 0, 'C');
	$this->Cell(190, 25, "Place ", 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->Cell(190, 20,  $other_info, 'TLRB', 0, 'C', $fill);
	$this->Cell(190, 20,  $submit_place, 'TLRB', 0, 'C', $fill);
	$this->Cell(190, 20,  $dt_created, 'TLRB', 0, 'C', $fill);
	$this->Ln();	
	
		$this->SetX(400);
		$fill = !$fill;     
}	 	
	
}

	
$pdf = new PDF_result();
$pdf->AddPage();
$pdf->SetFont('Arial', 'I');
$pdf->generate_Table($fathus1,$first_name,$Last_Name,$Post_Applied,$dob,$fathus,$PERMANENT_ADDRESS,$per_address1,$city,$pin,$state,$country,$tele_no,$per_mobile1,$communication_address,$comm_address1,$comm_city,$comm_pin,$comm_state,$comm_country,$comm_telephoneno,$comm_email,$MARITAL,$NATIONALITY,$imag_name,$examination_passedA,$year_of_passingA,$subject_offeredA,$medium_of_insructionA,$max_marksA,$marks_obtainA,$marks_percentageA,$divisionA,$schoolA,$boardA,$ncc_detail,$foregin_language_detail,$DOMICILE,$gender,$age,$comm_mobileno,$age1,$fresher_exp,$present_employer,$present_post,$post_type,$present_salary,$pay_band,$grade_pay,$teach_language,$regional_language,$ctet_tet_detail,$instituteA,$designationA,$period_fromA,$period_toA,$sub_taughtA,$dutiesA,$employee_infoA,$bussinessA,$postA,$nature_of_dutiesA,$period_fromAA,$period_toAA,$salaryA,$total_years1,$total_months1,$total_years,$total_months,$schoolAA,$responsibilitiesA,$for_classA,$no_of_yearA,$no_of_year,$f_name_ref,$l_name_ref,$f_name1_ref,$l_name1_ref,$address_ref,$address1_ref,$address_reff,$address1_reff,$ref_city,$ref_city1,$pin_ref,$pin_ref1,$ref_state,$ref_state1,$ref_country,$ref_country1,$telephone_ref,$telephone1_ref,$mobile_ref,$mobile1_ref,$email_ref,$email_ref1,$designation_ref,$designation1_ref,$nameA,$dob1A,$relationshipA,$occupationA,$dependentA,$disabilityA,$name1A,$relationA,$live_withA,$diabilityA,$eariler_applied_employement_ps,$criminalcharged_detail,$casepending_detail,$name2A,$age2A,$address2A,$relation2A,$departmentA,$joining_dateA,$h_pA,$salary22A,$other_info,$submit_place,$dt_created,$noticeperiod_detail,$spouse_name,$spouse_dob,$spouse_profession11,$spouse_designation11,$spouse_place_of_posting11,$spouse_monthly_income11,$child_nameA,$child_dobA,$child_married_statusA,$child_qualification_detailA,$child_genderA);

$dir= "$server/admin/Generate_pdf/";
$filename= "actionpdf.pdf";
$pdf ->Output($dir.$filename); 
header("Location:actionpdf.pdf?id=$id");     
?>