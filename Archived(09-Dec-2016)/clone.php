<?php
date_default_timezone_set('Asia/Kolkata');
  $date= date("Y-m-d H:i:s"); 
ob_start();
error_reporting(0);
include("conn.php");
include_once('config.php');
$current_date=date("Y-m-d H:i"); 
$errors = array();
$data = array();	
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
		  $data['message'] = 'Please check the the captcha form'; 
          
        }
       else
	   {
		   $secretKey = "6LcHDx4TAAAAAL3wWSmSkgQfnUu6k7LaKd05Yb0Y";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          $data['message'] = 'You are a spammer'; 
        } else {
//expiry 
$sql_date="update notification set status='1' where (start_date<='$current_date' AND date_ex>'$current_date') AND en_status='1'";
$result=mysqli_query($sql_date);	
$sql_date1="update notification set status='0' where en_status='0'";
$result1=mysqli_query($sql_date1);													
// deactivate notification
$sql_de="select * from notification where status='1'";
$deact=mysqli_query($sql_de);
$deact_row= mysqli_fetch_array($deact);
$nid_deact=$deact_row['nid'];
$date_deact=$deact_row['date_ex'];
if($date_deact<=$current_date)
{
$update_deact="update notification set status='0' where nid='$nid_deact'";
$result=mysqli_query($update_deact);
}


	 	  $select="SELECT *  FROM notification WHERE status ='1'";
							$rows=mysqli_query($select);
							 $rr=mysqli_num_rows($rows);
							

if($rr>0)
{


  $select1="SELECT *  FROM notification WHERE status ='1'";
	$row1=mysqli_query($select1);
   
	$ro=mysqli_fetch_array($row1);
	
		 $rw=$ro['title'];
	

// Getting posted data and decodeing json
//$_POST = json_decode(file_get_contents('php://input'), true);
//1============personal detal info=============

function mysqli_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
} 
$dependent=mysqli_escape_mimic($_POST['dependent']);
$f_name=mysqli_escape_mimic($_POST['f_name']);
$m_name=mysqli_escape_mimic($_POST['m_name']);
$l_name=mysqli_escape_mimic($_POST['l_name']);
$apply_post=mysqli_escape_mimic($_POST['apply_post']);
$person_dob1=mysqli_escape_mimic($_POST['person_dob']);
$person_dob0=(explode("/",$person_dob1));
$person_dob =$person_dob0[2].'-'.$person_dob0[1].'-'.$person_dob0[0];
$age='my_age';
$gender=mysqli_escape_mimic($_POST['gender']);
$person_father=mysqli_escape_mimic($_POST['person_father']);
$person_husband=mysqli_escape_mimic($_POST['person_husband']);
$address=mysqli_escape_mimic($_POST['addrr']);
$per_address1=mysqli_escape_mimic($_POST['addr2']);
$city=mysqli_escape_mimic($_POST['city1']);
$state=mysqli_escape_mimic($_POST['state1']);
$country='India';
$per_mobile=mysqli_escape_mimic($_POST['mobile1']);
$pin=mysqli_escape_mimic($_POST['pin1']);
$tele_no=mysqli_escape_mimic($_POST['telephone1']);
$comm_address=mysqli_escape_mimic($_POST['comm_addrr']);
$comm_address1=mysqli_escape_mimic($_POST['comm_addr1']);
$comm_city=mysqli_escape_mimic($_POST['comm_city1']);
$comm_state=mysqli_escape_mimic($_POST['comm_state1']);
$comm_country='India';
$comm_pin=mysqli_escape_mimic($_POST['comm_pin']);
$comm_tele_no=mysqli_escape_mimic($_POST['comm_telephone']);
$mnum=mysqli_escape_mimic($_POST['mnum']);
$mail=mysqli_escape_mimic($_POST['mail']);
$Marital_Status=mysqli_escape_mimic($_POST['status']);
$nationality=mysqli_escape_mimic($_POST['nationality']);
$domicile=mysqli_escape_mimic($_POST['domicile']);
$present_post=mysqli_escape_mimic($_POST['present_post']);
$post_type=mysqli_escape_mimic($_POST['Post_Type']);
$present_salary=mysqli_escape_mimic($_POST['present_salary']);
$pay_band=mysqli_escape_mimic($_POST['pay_band']);
$grade_pay=mysqli_escape_mimic($_POST['grade_pay']);
$fresher=mysqli_escape_mimic($_POST['chk_exp']);
$present_employee=mysqli_escape_mimic($_POST['present_employee']);
$teach_status=mysqli_escape_mimic($_POST['teach_status']);
$regionalstatus=mysqli_escape_mimic($_POST['regionalstatus']);
$ctet_status=mysqli_escape_mimic($_POST['ctet_status']);
$ncc_nss_training=mysqli_escape_mimic($_POST['ncc_nss_training']);
$Forign_lang_experince=mysqli_escape_mimic($_POST['Forign_lang_experince']);
$tachno_savvy=mysqli_escape_mimic($_POST['tachno_savvy']);
$awards=mysqli_escape_mimic($_POST['awards']);
$notice_period=mysqli_escape_mimic($_POST['notice_period']);
$crimal_case=mysqli_escape_mimic($_POST['criminal_case']).', '.mysqli_escape_mimic($_POST['case_detail']);
$criminal_charge=mysqli_escape_mimic($_POST['criminal_charge']).', '.mysqli_escape_mimic($_POST['charge_detail']);
$earlier_employed=mysqli_escape_mimic($_POST['earlier_employed']).', '.mysqli_escape_mimic($_POST['earlier_employed_detail']);
$submit_place=mysqli_escape_mimic($_POST['sub_place']);
$other_info=mysqli_escape_mimic($_POST['other_info']);
$experience_status=mysqli_escape_mimic($_POST['experience_status']);
//2=========acadmic info=============
$exam_pass=mysqli_escape_mimic($_POST['0tab_logic6']);
$pass_year=mysqli_escape_mimic($_POST['1tab_logic6']);
$subject=mysqli_escape_mimic($_POST['2tab_logic6']);
$medium=mysqli_escape_mimic($_POST['3tab_logic6']);
$max_marks=$_POST['4tab_logic6'];
$marks_obtain=$_POST['5tab_logic6'];
//$percentage=$_POST['6tab_logic6'];
$division=mysqli_escape_mimic($_POST['6tab_logic6']);
$school=mysqli_escape_mimic($_POST['7tab_logic6']);
$board=mysqli_escape_mimic($_POST['8tab_logic6']);
//3==============experience teacher detail================
$institute_name=mysqli_escape_mimic($_POST['0tab_logic5']);
$designation=mysqli_escape_mimic($_POST['1tab_logic5']);
$teach_from=mysqli_escape_mimic($_POST['2tab_logic5']);
$teach_to=mysqli_escape_mimic($_POST['3tab_logic5']);
$teach_subject=mysqli_escape_mimic($_POST['4tab_logic5']);
$subject_nature=mysqli_escape_mimic($_POST['5tab_logic5']);
$teach_experince=mysqli_escape_mimic($_POST['teach_experince']);
//4=============administrative exp detail==============
$ad_school=mysqli_escape_mimic($_POST['0tab_logic4']);
$ad_responsibility=mysqli_escape_mimic($_POST['1tab_logic4']);
$ad_classes=mysqli_escape_mimic($_POST['2tab_logic4']);
$ad_years=mysqli_escape_mimic($_POST['3tab_logic4']);
$ad_experince=mysqli_escape_mimic($_POST['ad_experience']);
//5============non teaching staff exp info===============
$nonteach_name=mysqli_escape_mimic($_POST['0tab_logic3']);
$nonteach_profession=mysqli_escape_mimic($_POST['1tab_logic3']);
$nonteach_post=mysqli_escape_mimic($_POST['2tab_logic3']);
$nonteach_dutynature=mysqli_escape_mimic($_POST['3tab_logic3']);
$nonteach_from=mysqli_escape_mimic($_POST['4tab_logic3']);
$nonteach_to=mysqli_escape_mimic($_POST['5tab_logic3']);
$nonteach_sal=mysqli_escape_mimic($_POST['6tab_logic3']);
$nonteach_experience=mysqli_escape_mimic($_POST['nonteach_experience']);
//6============dependent member detail=================
$dep_name=mysqli_escape_mimic($_POST['0tab_logic2']);
$dep_dob=mysqli_escape_mimic($_POST['1tab_logic2']);
$dep_relation=mysqli_escape_mimic($_POST['2tab_logic2']);
$dep_occupation=mysqli_escape_mimic($_POST['3tab_logic2']);
$dep_ed=mysqli_escape_mimic($_POST['4tab_logic2']);
$dep_pd=mysqli_escape_mimic($_POST['5tab_logic2']);
//7================accomodation detail==========
$acc_name=mysqli_escape_mimic($_POST['0tab_logic1']);
$acc_relation=mysqli_escape_mimic($_POST['1tab_logic1']);
$acc_livewith=mysqli_escape_mimic($_POST['2tab_logic1']);
$acc_notlivewith=mysqli_escape_mimic($_POST['5tab_logic1']);
$acc_pd=mysqli_escape_mimic($_POST['3tab_logic1']);
//8=============inschool other employee detail=============
$inschool_name=mysqli_escape_mimic($_POST['0tab_logic']);
$inschool_age=mysqli_escape_mimic($_POST['1tab_logic']);
$inschool_address=mysqli_escape_mimic($_POST['2tab_logic']);
$inschool_relation=mysqli_escape_mimic($_POST['3tab_logic']);
$inschool_dept=mysqli_escape_mimic($_POST['4tab_logic']);
$inschool_doj=mysqli_escape_mimic($_POST['5tab_logic']);
$inschool_hp=mysqli_escape_mimic($_POST['6tab_logic']);
$inschool_sal=mysqli_escape_mimic($_POST['7tab_logic']);
//9=============children detail===============
$child_name1=mysqli_escape_mimic($_POST['0tab_logic9']);
$child_gender=mysqli_escape_mimic($_POST['1tab_logic9']);
$child_dob1=mysqli_escape_mimic($_POST['2tab_logic9']);
$child_status1=mysqli_escape_mimic($_POST['3tab_logic9']);
$child_study1=mysqli_escape_mimic($_POST['4tab_logic9']);

//10===================spouse detail======================
$spouse_name=mysqli_escape_mimic($_POST['spouse_name']);
$spouse_age=mysqli_escape_mimic($_POST['spouse_age']);
$spouse_proffession=mysqli_escape_mimic($_POST['spouse_proffession']);
$spouse_post=mysqli_escape_mimic($_POST['spouse_post']);
$spouse_posting_place=mysqli_escape_mimic($_POST['spouse_posting_place']);
$spouse_income=mysqli_escape_mimic($_POST['spouse_income']);
//=============refrence detail===============
$ref_fname=mysqli_escape_mimic($_POST['ref_fname']);
$ref_lname=mysqli_escape_mimic($_POST['ref_lname']);
$ref_designation=mysqli_escape_mimic($_POST['ref_designation']);
$ref_address=mysqli_escape_mimic($_POST['ref_address']);
$ref_address11=mysqli_escape_mimic($_POST['ref_address2']);
$ref_city=mysqli_escape_mimic($_POST['ref_city']);
$ref_state=mysqli_escape_mimic($_POST['ref_state']);
$ref_country='India';
$ref_mobile=mysqli_escape_mimic($_POST['ref_mobile']);
$ref_Pin=mysqli_escape_mimic($_POST['ref_Pin']);
$ref_ph=mysqli_escape_mimic($_POST['ref_ph']);
$ref_email=mysqli_escape_mimic($_POST['ref_email']);
$ref_fname1=mysqli_escape_mimic($_POST['ref_fname1']);
$ref_lname1=mysqli_escape_mimic($_POST['ref_lname1']);
$ref_designation1=mysqli_escape_mimic($_POST['ref_designation1']);
$ref_address1=mysqli_escape_mimic($_POST['ref_address1']);
$ref_address12=mysqli_escape_mimic($_POST['ref_address12']);
$ref_city1=mysqli_escape_mimic($_POST['ref_city1']);
$ref_state1=mysqli_escape_mimic($_POST['ref_state1']);
$ref_country1='India';
$ref_mobile1=mysqli_escape_mimic($_POST['ref_mobile1']);
$ref_Pin1=mysqli_escape_mimic($_POST['ref_Pin1']);
$ref_ph1=mysqli_escape_mimic($_POST['ref_ph1']);
$ref_email1=mysqli_escape_mimic($_POST['ref_email1']);


// checking for blank values.

 // Image			
								$ImageName      = str_replace(' ','-',strtolower($_FILES["file1"]["name"]));
								
								$ImageExt2 = substr($ImageName, strrpos($ImageName, '.'));
								$ImageExt2 = str_replace('.','',$ImageExt2);
								
								$Imagename3 = substr($ImageName, 0 , (strrpos($ImageName, ".")));
								 $Imagename4 = str_replace('.','-',$Imagename3);
								 $Imagename5 = preg_replace("/[^a-zA-Z0-9]/", "", $Imagename4);
								 $newname=$Imagename5.'.'.$ImageExt2;
								
								$temp_name=$_FILES["file1"]["tmp_name"];
								$imagename=time().'-'.$newname;
								 $imagename_l=strtolower($imagename);
								$target_path = "uploads/".$imagename_l;
								move_uploaded_file($temp_name, $target_path);

									

    $rep="select * from personal_details where (first_name='$f_name' AND last_name='$l_name' AND dob='$person_dob' ) AND Notification='$rw' AND ((father_name='' AND husband='$person_husband') OR (father_name='$person_father' AND husband=''))"; 
   $ress=mysqli_query($rep);
   $rep1="select * from personal_details where (first_name='$f_name' AND last_name='$l_name' AND dob='$person_dob' ) AND Notification!='$rw' AND ((father_name='' AND husband='$person_husband') OR (father_name='$person_father' AND husband=''))"; 
   $res1=mysqli_query($rep1);
								$checkrepeat="";
								 if((mysqli_num_rows($ress)>0) && (mysqli_num_rows($res1)>0))
								 {
									 $checkrepeat="RR";
								 }
								 else if((mysqli_num_rows($ress)>0))
								 {
									 $checkrepeat="R";
								 $rep11="update personal_details set repate='s' where (first_name='$f_name' AND last_name='$l_name' AND dob='$person_dob' ) AND Notification='$rw' AND ((father_name='' AND husband='$person_husband') OR (father_name='$person_father' AND husband='')) AND repate=''"; 
                               $res11=mysqli_query($rep11);								
								 } 
								 else if((mysqli_num_rows($res1)>0))
								 {
									 $checkrepeat="OR";
								 }								
								  $sql="insert into personal_details(first_name,middle_name,last_name,post_applied,dob,age,gender,father_name,husband,address,per_address1,city,state,country,per_mobile,pin,contact_no,communication_address,comm_address1,comm_city,comm_state,comm_country,comm_telephoneno,comm_mobileno,comm_email,comm_pin,marital_status,nationality,state_of_domicile,fresher_exp,present_post,post_type,present_salary,pay_band,grade_pay,present_employer,teach_language,regional_language,ctet_tet_detail,ncc_detail,foregin_language_detail,techosavvy_computerliterate_detail,awards_detail,noticeperiod_detail,casepending_detail,criminalcharged_detail,eariler_applied_employement_ps,submit_place,other_information,image,dt_created,Notification,repate) values ('$f_name','$m_name','$l_name','$apply_post','$person_dob','$age','$gender','$person_father','$person_husband','$address','$per_address1','$city','$state','$country','$per_mobile','$pin','$tele_no','$comm_address','$comm_address1','$comm_city','$comm_state','$comm_country','$comm_tele_no','$mnum','$mail','$comm_pin','$Marital_Status','$nationality','$domicile','$fresher','$present_post','$post_type','$present_salary','$pay_band','$grade_pay','$present_employee','$teach_status','$regionalstatus','$ctet_status','$ncc_nss_training','$Forign_lang_experince','$tachno_savvy','$awards','$notice_period','$crimal_case','$criminal_charge','$earlier_employed','$submit_place','$other_info','$imagename_l','$date','$rw','$checkrepeat')";

	//$data['sql']=$sql;
	$res=mysqli_query($sql);
	
 $last_id = mysqli_insert_id();
						

 
 
	//1==========personal details==============

   //2===============acadamic details==============
		for($i=0; $i<50; $i++)
{
	if($exam_pass[$i]!='')
		{
  $query1="INSERT INTO `acadmic_detail`( `examination_passed`, `year_of_passing`, `subject_offered`, `medium_of_insruction`, `max_marks`, `marks_obtain`, `division`, `school`, `board`, `id`) VALUES ( '$exam_pass[$i] ','$pass_year[$i]','$subject[$i]','$medium[$i]','$max_marks[$i]','$marks_obtain[$i]','$division[$i]','$school[$i]','$board[$i]','$last_id')";
	$res1=mysqli_query($query1);
		//$data['sql']=$query1;
}	
		}

	//3=================teaching experince detail==============
	for($i=0; $i<50; $i++)
	{
		if($institute_name[$i]!='')
		{
	$sql1="insert into teaching_experience_detail(institute,designation,period_from,period_to,sub_taught,duties,total_experience,id) values('$institute_name[$i]','$designation[$i]','$teach_from[$i]','$teach_to[$i]','$teach_subject[$i]','$subject_nature[$i]','$teach_experince','$last_id')";
		//$data['sql1']=$sql1;
		$res2=mysqli_query($sql1);
	}		
	}		
    //4=======administrative details=================
	
	for($i=0; $i<50; $i++)
{
	if($ad_school[$i]!='')
	{
    $sql2="insert into  administrative_exp_detail(school,responsibilities,for_class,no_of_year,total_experience,id) values('$ad_school[$i]','$ad_responsibility[$i]','$ad_classes[$i]','$ad_years[$i]','$ad_experince','$last_id')";
		//$data['sql2']=$sql2;
		$res3=mysqli_query($sql2);
}
}
			
	//5============non teaching staff experienc detail==============
		for($i=0; $i<50; $i++)
	{
		if($nonteach_name[$i]!='')
	{
	$sql3="insert into  nonteaching_staff_exp(employee_info,bussiness,post,nature_of_duties,period_from,period_to,salary,total_experience,id) values('$nonteach_name[$i]','$nonteach_profession[$i]','$nonteach_post[$i]','$nonteach_dutynature[$i]','$nonteach_from[$i]','$nonteach_to[$i]','$nonteach_sal[$i]','$nonteach_experience','$last_id')";
			//$data['sql3']=$sql3;
			$res4=mysqli_query($sql3);
	}
	}
	//6=========dependent member details=================
	for($i=0; $i<50; $i++)
	{
		if($dep_name[$i]!='')
	{
	$sql4="insert into dependent_member_detail(name,dob,relationship,occupation,dependent,disability,id) values('$dep_name[$i]','$dep_dob[$i]','$dep_relation[$i]','$dep_occupation[$i]','$dep_ed[$i]','$dep_pd[$i]','$last_id')";
		//$data['sql4']=$sql4;
		$res5=mysqli_query($sql4);
		}
	}
	//7==============accomodation detail==================
		for($i=0; $i<50; $i++)
	{
		if($acc_name[$i]!='')
	{
	$sql5="insert into accomodation_detail(name,relation,live_with,not_live_wih,diability,dependent,id ) values('$acc_name[$i]','$acc_relation[$i]','$acc_livewith[$i]','$acc_notlivewith[$i]','$acc_pd[$i]','$dependent','$last_id')";
		//$data['sql5']=$sql5;
		$res6=mysqli_query($sql5);
	}
	}
		//8============other employee detail==================
	for($i=0; $i<50; $i++)
	{
		if($inschool_name[$i]!='')
	{
		$sql6="insert into other_employee(name,address,age,relation,department,joining_date,h_p,salary,id) values('$inschool_name[$i]','$inschool_address[$i]','$inschool_age[$i]','$inschool_relation[$i]','$inschool_dept[$i]','$inschool_doj[$i]','$inschool_hp[$i]','$inschool_sal[$i]',$last_id)";
		//	$data['sql6']=$sql6;
			$res7=mysqli_query($sql6);
	}
	}
		//9==================children detail==================
if($Marital_Status=="Married" || $Marital_Status=="Divorcee" || $Marital_Status=="Widower")
			{
				
					for($i=0; $i<50; $i++)
					{
						if($child_name1[$i]!='')
	{
		$sql7="insert into children_detail(name,dob,married_status,qualification_detail,id,gender) values('$child_name1[$i]','$child_dob1[$i]','$child_status1[$i]','$child_study1[$i]',$last_id,'$child_gender[$i]') ";
		//$data['sql7']=$sql7;
		$res8=mysqli_query($sql7);
				}
				}
			
		
	}
		
		//10========================spouse detail===============
		if($Marital_Status=="Married")
			{
		$sql8="insert into spouse_detail(name,age,profession,designation,place_of_posting,monthly_income,id) values('$spouse_name','$spouse_age','$spouse_proffession','$spouse_post','$spouse_posting_place','$spouse_income','$last_id')";
		//$data['sql8']=$sql8;
		$res9=mysqli_query($sql8);
	}
		//11===============refrence detail=====================
		$sql9="insert into refrence_detail(f_name,l_name,designation,address,ref_address1,city, 	state,country,mobile,pin,telephone,email,f_name1,l_name1,designation1,address1,ref_address2,city1,state1,country1,mobile1,pin1,telephone1,email1,id) values('$ref_fname','$ref_lname','$ref_designation','$ref_address','$ref_address11','$ref_city','$ref_state','$ref_country','$ref_mobile','$ref_Pin','$ref_ph','$ref_email','$ref_fname1','$ref_lname1','$ref_designation1','$ref_address1','$ref_address12','$ref_city1','$ref_state1','$ref_country1','$ref_mobile1','$ref_Pin1','$ref_ph1','$ref_email1','$last_id')";
		$res10=mysqli_query($sql9);
		
		$sqlee2="INSERT INTO eligible(`eligibilty`,`comment`,`ulid`) VALUES ('NR','','$last_id')";
  	$res1=mysqli_query($sqlee2);
	if( $res)
	{
		
		
		
	$sql_email="SELECT * FROM `manage_email` WHERE post='true'";
 $row_email=mysqli_query($sql_email);
 while($row1=mysqli_fetch_array($row_email))
 {
	 $name=$row1['name'];
$email=$row1['email'];
 
$touser =$email;
		$subjectAdmin= "New Application Received.";
		$headersAdmin = "From: careers.pathseekers.education<noreply@careerspathseekerseducation.com>"."\r\n"; 
		//$headersAdmin  .= 'MIME-Version: 1.0' . "\r\n";
		$headersAdmin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$messageuser ='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
			Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
			<html lang="en"> 
				<head>
					<title></title> 
				</head> 
				<body> 
					<div style="margin:0 auto;">
						Dear '.$name.',
						<br><br>						
				 '.$f_name.' '.$l_name.' has applied for the Post of '.$apply_post.'.<br><br>
						Thanks and Regards,<br>
					    Pathseekers
						<div style="clear:both;font-size:14px; text-align:left; width:100%;"> 
						<br/>
						</div>
					</div>
				</body>
			</html>'; 
			//$emailSend = mail('gsstpreview@gmail.com',$subjectAdmin,$messageAdmin,$headersAdmin);
			$emailSenduser = mail($touser,$subjectAdmin,$messageuser,$headersAdmin); 

 } 
  $sql_email1="select send_email from manage_email";
 $row_email1=mysqli_query($sql_email1);
 $row12=mysqli_fetch_array($row_email1);
 $email_send=$row12['send_email']; 
 if($email_send=='true')
 {
 
  $touser =$mail;
		$subjectAdmin= "Application Form";
		$headersAdmin = "From: careers.pathseekers.education<noreply@pathseekers.education>"."\r\n"; 
		//$headersAdmin  .= 'MIME-Version: 1.0' . "\r\n";
		$headersAdmin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$messageuser ='<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01  
			Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
			<html lang="en"> 
				<head>
					<title></title> 
				</head> 
				<body> 
					<div style="margin:0 auto;">
						Dear '.$f_name.' '.$l_name.',
						<br><br>						
						Your application form has been received successfully.<br><br>
						Thanks and Regards<br>
					    Pathseekers.
						<div style="clear:both;font-size:14px; text-align:left; width:100%;"> 
						<br/>
						</div>
					</div>
				</body>
			</html>'; 
			//$emailSend = mail('gsstpreview@gmail.com',$subjectAdmin,$messageAdmin,$headersAdmin);
			$emailSenduser = mail($touser,$subjectAdmin,$messageuser,$headersAdmin); 

 }	
	
		$data['message']='Form Submitted Successfully';
		
	}
	else
	{
  $data['message'] = 'Form Not Submitted Successfully'; 
}
}
else
{
	
	$data['message'] = 'Sorry Notification Expired'; 
}
	   }
	   }

// response back.

echo json_encode($data);
?>




