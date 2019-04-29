<?php
session_start();
error_reporting(0);
date_default_timezone_set('UTC');
require('fpdf/fpdf.php');
include_once('../config.php');
$dir_path=  $_SERVER["DOCUMENT_ROOT"];

$billperiod=$_SESSION['billperiod'];
//account
$billperiod=$_SESSION['billperiod'];
//account
$get_id = $_SESSION['loc'];
//location
$get_loc_id = $_SESSION['location_sub'];


$sql="select * from billing_period where id='$billperiod'";
$res=mysqli_query($sql);
$row=mysqli_fetch_array($res);
$from=$row['bill_start_date'];
$to=$row['bill_end_date'];

$view_Bill_sub="SELECT comp_id FROM account where a_id= '$get_id'";
$result_view_s = mysqli_query($view_Bill_sub);
$AccB1 = mysqli_fetch_array($result_view_s);
$c_id = $AccB1['comp_id'];
$view_loc1="SELECT * FROM company where comp_id = '$c_id'";
$result_view_loc1 = mysqli_query($view_loc1); 
$compL1 = mysqli_fetch_array($result_view_loc1);
$comp_name = $compL1['comp_name'];	
			
$location_emailG = '';
$z="0";
$check1=0;
$check11=0;
$total9s=0;
$totalps=0;
$totalbS=0;
$totalprevS=0;

$totalprev=0;
$totalprevM=0;
$total2=0;
$total2m=0;
$totalp=0;
$totalpm=0;
$totalbM=0;
$totalb=0;
		
$total=0;

							 	

	$f_name = Array();
	$l_name = Array();
	$loc_nameA = Array();
	$designation = Array();
	$mob_number = Array();
	$pendingA = Array();
	$bill_amountA = Array();
	$paymentA = Array();
	$balnceA = Array();
							 
	$view_U="SELECT * FROM user_info where account_number= '$get_id' and location_id = '$get_loc_id'"; 
	$result_view_U = mysqli_query($view_U); 

			
				while($AccB = mysqli_fetch_array($result_view_U)){
					$userid= $AccB['user_id'];
					$location_id  = $AccB['location_id'];
					$sl_id  = $AccB['sl_id'];
					$issue_date = $AccB['issue_date']; 
					
					$view_loc="SELECT * FROM location where location_id = '$location_id'";
					$result_view_loc = mysqli_query($view_loc); 
					$compL = mysqli_fetch_array($result_view_loc);
						$location_id = $compL['location_id'];
						$location_name = $compL['location_name'];
						$location_email = $compL['location_email'];
						
					$view_loc="SELECT * FROM sub_location where sl_id = '$sl_id'";
					$result_view_loc = mysqli_query($view_loc); 
					$compL = mysqli_fetch_array($result_view_loc);
						$sl_id = $compL['sl_id'];
						$sl_name = $compL['sl_name'];
						$sl_email = $compL['sl_email'];
							 		 
					$view_bp="SELECT min(id) as id FROM billing_period";
					$result_view_bp = mysqli_query($view_bp); 
					$bp = mysqli_fetch_array($result_view_bp);
					$id = $bp['id'];
						if($id != $billperiod){
						$bill_amountD = 0;
						$paymentD = 0;
						$pending_bill="SELECT * FROM bill where user_id = '$userid' and bill_period < '$billperiod'";
						$result_pending = mysqli_query($pending_bill); 
						while($pending = mysqli_fetch_array($result_pending)){
							$bill_amountC = $pending['bill_amount'];
							$bill_amountD= $bill_amountD + $bill_amountC ;
						} 
					
					$view_billS="SELECT * FROM  full_payment where location_id = '$location_id' and bill_period < $billperiod and user_id = '$userid'";
						$result_view_billS = mysqli_query($view_billS); 
						while($BILLS = mysqli_fetch_array($result_view_billS)){
							 $paymentC = $BILLS['payment'];
							 $paymentD= $paymentD + $paymentC ;	
						}	 					
						$pendingS = ($bill_amountD - $paymentD);
						$totalprevS=$pendingS+$totalprevS;
					}
					else{
						$pendingS ='0';
					}
						
							 
					$view_bill1="SELECT * FROM bill where user_id = '$userid' and bill_period ='$billperiod'";
					$result_view_bill1 = mysqli_query($view_bill1); 
					$compL = mysqli_fetch_array($result_view_bill1);
						$b_id = $compL['b_id'];
						$user_idd = $compL['user_id'];
						$bill_amount1 = $compL['bill_amount'];
						$total9s=$bill_amount1+$total9s;
						if($bill_amount1!='')
							{ $bill_amountS=$compL['bill_amount'];	}
						else
							{ $bill_amountS='0';	}
						 if($sl_name!='')
							 { $loc_name= $sl_name; }
						 else
							 { $loc_name= $location_name; }
							 
					$view_billS="SELECT * FROM  full_payment where location_id = '$location_id' and bill_period = '$billperiod' and user_id = '$userid'";
					$result_view_billS = mysqli_query($view_billS); 
					$BILLS = mysqli_fetch_array($result_view_billS);
					$paymentS = $BILLS['payment'];
					$totalps=$paymentS+$totalps;
					
							if($paymentS!='')
							{ $paymentS; }
							else
							{ $paymentS = '0';	}
	
						 $b_amount = $compL['bill_amount'];
						 //if($b_amount != 0){ $balnceS = (($b_amount+$pendingS)-$paymentS); } else{ $balnceS = "0"; }
						 $balnceS = (($b_amount+$pendingS)-$paymentS); 
						$totalbS = $balnceS+ $totalbS;

							 $check1++;
 		 	
				array_push($f_name,$AccB['f_name']);							
				array_push($l_name,$AccB['l_name']);							
				array_push($loc_nameA,$loc_name);							
				array_push($designation,$AccB['designation']);							
				array_push($mob_number,$AccB['mob_number']);							
				array_push($pendingA,$pendingS);							
				array_push($bill_amountA,$bill_amountS);							
				array_push($paymentA,$paymentS);							
				array_push($balnceA,$balnceS);							
				}
			//	print_r($loc_nameA);
				
$location_emailG = $location_email;

// code for multiple tables 
	$Sno = Array();
	$loc_nameM = Array();
	$f_nameM = Array();
	$l_nameM = Array();
	$designationM = Array();
	$mob_numberM = Array();
	$bill_amountM = Array();
	$pendingM = Array();
	$balnceM = Array();		
	$paymentM = Array();		
	$countS = 1;	
		$result_view_bill1 = mysqli_query($view_U);
		$view_Billl="SELECT comp_id FROM account where a_id= '$get_id'";
		$result_view_billl = mysqli_query($view_Billl);
		while($AccB1 = mysqli_fetch_array($result_view_billl)){
			$c_id = $AccB1['comp_id'];
			$view_loc1="SELECT * FROM company where comp_id = '$c_id'";
			$result_view_loc1 = mysqli_query($view_loc1); 
			$compL1 = mysqli_fetch_array($result_view_loc1);
				$comp_id = $compL1['comp_id'];	
				$comp_name = $compL1['comp_name'];	
		}
					//$z="0";
					$arrayVall = array();
					$arrayVal = array();
					$locid="";
				while($AccB = mysqli_fetch_array($result_view_bill1)){
					$userid= $AccB['user_id'];
							//$f_name = $AccB['f_name'];
							//$l_name = $AccB['l_name'];
							//$designation = $AccB['designation'];
							//$mob_number = $AccB['mob_number'];
							$location_id  = $AccB['location_id'];
							$sl_id  = $AccB['sl_id'];
							$issue_date = $AccB['issue_date']; 
					$view_loc="SELECT * FROM location where location_id = '$location_id'";
						$result_view_loc = mysqli_query($view_loc); 
						$compL = mysqli_fetch_array($result_view_loc);
							$location_id = $compL['location_id'];
							 $location_name = $compL['location_name'];
							 if($location_id!='')
{	
						$view_locc="SELECT distinct(location_id) FROM location where location_id = '$location_id'";
						$result_view_locc = mysqli_query($view_locc); 

						$compLc = mysqli_fetch_array($result_view_locc);
							$lid = $compLc['location_id'];
							$locid=$compLc['location_id'];
							$arrayVall = array_merge($arrayVall, explode("|",$compLc['location_id']));
							 //$lname = $compLc['location_name'];
}
					if($sl_id!='')
					{	
						$view_loc5="SELECT distinct(sl_id) FROM sub_location where sl_id = '$sl_id'";
						$result_view_loc5 = mysqli_query($view_loc5); 
						$compL5 = mysqli_fetch_array($result_view_loc5);
							$sl_id = $compL5['sl_id'];
							$subid=$compL5['sl_id'];
							$arrayVal = array_merge($arrayVal, explode("|",$compL5['sl_id']));
							//$sl_name = $compL['sl_name'];
					}
							 
							 
				}	 
$locationc=array_unique($arrayVall);
$sublocation=array_unique($arrayVal);
foreach ($locationc as $valuec) {
$result_view_bill1c = mysqli_query($view_U);
				$view_Bill_sub="SELECT comp_id FROM account where  a_id= '$get_id'";
				$result_view_s = mysqli_query($view_Bill_sub);
				while($AccB1 = mysqli_fetch_array($result_view_s)){
							$c_id = $AccB1['comp_id'];
					$view_loc1="SELECT * FROM company where comp_id = '$c_id'";
						$result_view_loc1 = mysqli_query($view_loc1); 
						$compL1 = mysqli_fetch_array($result_view_loc1);
							$comp_id = $compL1['comp_id'];	
							$comp_name = $compL1['comp_name'];	
				}
	 $z="0";
					 
				while($AccBc = mysqli_fetch_array($result_view_bill1c)){
					$userid= $AccBc['user_id'];
							//$f_name = $AccBc['f_name'];
							//$l_name = $AccBc['l_name'];
							//$designation = $AccBc['designation'];
							//$mob_number = $AccBc['mob_number'];
							$location_id  = $AccBc['location_id'];
							$sl_id  = $AccBc['sl_id'];
							$issue_date = $AccBc['issue_date']; 
				}
					 $view_locc="SELECT * FROM location where location_id = '$valuec'";
						$result_view_locc = mysqli_query($view_locc); 
				

					while($compL = mysqli_fetch_array($result_view_locc))
					{
							$locationid = $compL['location_id'];
							 $locationname = $compL['location_name'];
							  
							  
							  $view_Bill7="SELECT * FROM user_info where location_id= '$locationid'";
							  $result_view_bill197 = mysqli_query($view_Bill7);
							  while($AccB17 = mysqli_fetch_array($result_view_bill197)){
					$userid1= $AccB17['user_id'];
							$f_name1 = $AccB17['f_name'];
							$l_name1 = $AccB17['l_name'];
							$designation1 = $AccB17['designation'];
							$mob_number1 = $AccB17['mob_number'];
							$location_id1  = $AccB17['location_id'];
							$sl_id1  = $AccB17['sl_id'];
							$issue_date1 = $AccB17['issue_date'];
							 $view_loc9="SELECT * FROM location where location_id = '$location_id1'";
						$result_view_loc9 = mysqli_query($view_loc9); 
						$compL = mysqli_fetch_array($result_view_loc9);
							$location_id = $compL['location_id'];
							$location_name1 = $compL['location_name'];
							 
						$view_loc1="SELECT * FROM sub_location where sl_id = '$sl_id1'";
						$result_view_locs = mysqli_query($view_loc1); 
						$compL4 = mysqli_fetch_array($result_view_locs);
							$sl_id = $compL4['sl_id'];
							$sl_name1 = $compL4['sl_name'];
							 
					$view_bp="SELECT min(id) as id FROM billing_period";
					$result_view_bp = mysqli_query($view_bp); 
					$bp = mysqli_fetch_array($result_view_bp);
					$id = $bp['id'];
					if($id != $billperiod){
					$bill_amountD = 0;
					$paymentD = 0;
					$pending_bill="SELECT * FROM bill where user_id = '$userid1' and bill_period < '$billperiod'";
					$result_pending = mysqli_query($pending_bill); 
					while($pending = mysqli_fetch_array($result_pending)){
						$bill_amountC = $pending['bill_amount'];
						$bill_amountD= $bill_amountD + $bill_amountC ;
					} 
					
					$view_billS="SELECT * FROM  full_payment where location_id = '$location_id1' and bill_period < $billperiod and user_id = '$userid1'";
					$result_view_billS = mysqli_query($view_billS); 
						while($BILLS = mysqli_fetch_array($result_view_billS)){
							 $paymentC = $BILLS['payment'];
							 $paymentD= $paymentD + $paymentC ;
						}	 					
						$pending = ($bill_amountD - $paymentD);
						$totalprevM=$pending+$totalprevM;
					}
					else{
						$pending ='0';
					}	
							 

							  $view_bill19="SELECT * FROM bill where user_id = '$userid1'";
						$result_view_bill129 = mysqli_query($view_bill19); 
						$compL = mysqli_fetch_array($result_view_bill129);
							$b_id = $compL['b_id'];
							 $user_idd = $compL['user_id'];
							 $bill_amount12 = $compL['bill_amount'];
							 $total2m=$bill_amount12+$total2m;
							if($bill_amount12!='')
							{
								 $bill_amount111=$compL['bill_amount'];
							}
							else
							{
							 $bill_amount111='0';	
							}
							
								
							$loc_name1= $location_name1;
							
					$view_billS="SELECT * FROM  full_payment where location_id = '$location_id1' and bill_period = '$billperiod' and user_id = '$userid1'";
					$result_view_billS = mysqli_query($view_billS); 
					$BILLS = mysqli_fetch_array($result_view_billS);
					$payment = $BILLS['payment'];
					$totalpm=$payment+$totalpm;
					
							//if($bill_amount1!='')
							if($payment!='')
							{ $payment; }
							else
							{	$payment = '0';	}
							
							
						 $b_amount = $compL['bill_amount'];
						 if($b_amount != 0){ $balnceSM = (($b_amount+$pending)-$payment); } else{ $balnceSM = "0"; }
						$totalbM = $balnceSM+ $totalbM;
						
								
				array_push($Sno,$countS);	
				array_push($loc_nameM,$loc_name1);							
				array_push($f_nameM,$f_name1);							
				array_push($l_nameM,$l_name1);							
				array_push($designationM,$designation1);							
				array_push($mob_numberM,$mob_number1);							
				array_push($pendingM,$pending);							
				array_push($bill_amountM,$bill_amount111);							
				array_push($paymentM,$payment);							
				array_push($balnceM,$balnceSM);	
				$countS++;	
		}
}

$SP = Array();
$loc_nameP = Array();
$f_nameP = Array();
$l_nameP = Array();
$designationP = Array();
$mob_numberP = Array();
$bill_amountP = Array();
$pendingP = Array();
$balnceP = Array();		
$paymentP = Array();		
$countP = 1;	
$totalprevsub = 0;
foreach ($sublocation as $value) {
				
		
$result_view_bill19 = mysqli_query($view_U);
				$view_Bill_sub="SELECT comp_id FROM account where  a_id= '$get_id'";
				$result_view_s = mysqli_query($view_Bill_sub);
				while($AccB1 = mysqli_fetch_array($result_view_s)){
							$c_id = $AccB1['comp_id'];
					$view_loc1="SELECT * FROM company where comp_id = '$c_id'";
					$result_view_loc1 = mysqli_query($view_loc1); 
					$compL1 = mysqli_fetch_array($result_view_loc1);
					$comp_id = $compL1['comp_id'];	
					$comp_name = $compL1['comp_name'];	
				}
			$z="0";
				while($AccB1 = mysqli_fetch_array($result_view_bill19)){
					$userid= $AccB1['user_id'];
							//$f_name = $AccB1['f_name'];
							//$l_name = $AccB1['l_name'];
							//$designation = $AccB1['designation'];
							//$mob_number = $AccB1['mob_number'];
							$location_id  = $AccB1['location_id'];
							$sl_id  = $AccB1['sl_id'];
							$issue_date = $AccB1['issue_date']; 
					 $view_loc9="SELECT * FROM location where location_id = '$location_id'";
						$result_view_loc9 = mysqli_query($view_loc9); 
						$compL = mysqli_fetch_array($result_view_loc9);
							$location_id = $compL['location_id'];
							 $location_name = $compL['location_name'];
				}
				 $view_loc9="SELECT * FROM sub_location where sl_id = '$value'";
						$result_view_loc9 = mysqli_query($view_loc9); 
						
					while($compL = mysqli_fetch_array($result_view_loc9))
					{
						$sl_id1 = $compL['sl_id'];
						$sl_name = $compL['sl_name'];
							 
						$view_Bill7="SELECT * FROM user_info where sl_id= '$sl_id1' AND location_id='$valuec'";
						$result_view_bill197 = mysqli_query($view_Bill7);
						$affect=mysqli_num_rows($result_view_bill197);
						
						
					while($AccB17 = mysqli_fetch_array($result_view_bill197)){
					$userid1= $AccB17['user_id'];
						$f_name1 = $AccB17['f_name'];
						$l_name1 = $AccB17['l_name'];
						$designation1 = $AccB17['designation'];
						$mob_number1 = $AccB17['mob_number'];
						$location_id1  = $AccB17['location_id'];
						$sl_id1  = $AccB17['sl_id'];
						$issue_date1 = $AccB17['issue_date'];
						
						$view_loc9="SELECT * FROM location where location_id = '$location_id1'";
						$result_view_loc9 = mysqli_query($view_loc9); 
						$compL = mysqli_fetch_array($result_view_loc9);
							$location_id = $compL['location_id'];
							 $location_name1 = $compL['location_name'];
							 $view_loc1="SELECT * FROM sub_location where sl_id = '$sl_id1'";
						$result_view_locs = mysqli_query($view_loc1); 

						$compL4 = mysqli_fetch_array($result_view_locs);
							$sl_id = $compL4['sl_id'];
							 $sl_name1 = $compL4['sl_name'];
							 
							 
					$view_bp="SELECT min(id) as id FROM billing_period";
					$result_view_bp = mysqli_query($view_bp); 
					$bp = mysqli_fetch_array($result_view_bp);
					$id = $bp['id'];
					if($id != $billperiod){
					$bill_amountD = 0;
					$paymentD = 0;
					$pending_bill="SELECT * FROM bill where user_id = '$userid1' and bill_period < '$billperiod'";
					$result_pending = mysqli_query($pending_bill); 
					while($pending = mysqli_fetch_array($result_pending)){
						$bill_amountC = $pending['bill_amount'];
						$bill_amountD= $bill_amountD + $bill_amountC ;
					} 
					
					$view_billS="SELECT * FROM full_payment where location_id = '$location_id1' and bill_period < $billperiod and user_id = '$userid1'";
						$result_view_billS = mysqli_query($view_billS); 
						while($BILLS = mysqli_fetch_array($result_view_billS)){
							 $paymentC = $BILLS['payment'];
							 $paymentD= $paymentD + $paymentC ;
								
						}	 					
						$pending = ($bill_amountD - $paymentD);
						$totalprev=$pending+$totalprev;
				
					}
					else{
						$pending ='0';
					}
							 
						$view_bill19="SELECT * FROM bill where user_id = '$userid1'";
						$result_view_bill129 = mysqli_query($view_bill19); 
						$compL = mysqli_fetch_array($result_view_bill129);
							$b_id = $compL['b_id'];
							 $user_idd = $compL['user_id'];
							 $bill_amount12 = $compL['bill_amount'];
							 $total2=$bill_amount12+$total2;

							if($bill_amount12!='')
							{
								 $bill_amount11P=$compL['bill_amount'];
							}
							else
							{
							 $bill_amount11P='0';	
							}
							
								
							$loc_name1= $sl_name1;

					 $view_billS="SELECT * FROM  full_payment where location_id = '$location_id1' and bill_period = '$billperiod' and user_id = '$userid1'";
					$result_view_billS = mysqli_query($view_billS); 
					$BILLS = mysqli_fetch_array($result_view_billS);
					$payment = $BILLS['payment'];
					$totalp=$payment+$totalp;
					
							//if($bill_amount1!='')
							if($payment!='')
							{ $payment; }
							else
							{	$payment = '0';	}
							
							
				$b_amount = $compL['bill_amount'];
				 if($b_amount != 0){ $balnce = (($b_amount+$pending)-$payment); } else{ $balnce = "0"; }
				$totalb = $balnce+ $totalb
				;
												
				array_push($loc_nameP,$loc_name1);							
				array_push($f_nameP,$f_name1);							
				array_push($l_nameP,$l_name1);							
				array_push($designationP,$designation1);							
				array_push($mob_numberP,$mob_number1);							
				array_push($pendingP,$pending);	
				array_push($bill_amountP,$bill_amount11P);							
				array_push($paymentP,$paymentS);							
				array_push($balnceP,$balnce);	
				
		}
	
		
		}		
	}	
}

	$totalprev2ARR = Array();
	$bill_amountNP = Array();
	$totalBlnceNP = Array();
	$bill_paymentP = Array();
	
		$totalprev1 = 0;
		$totalprev2 = 0;
		$totalBlnceN = 0;
		$totalbillamountP = 0;
		$balnceb = 0;
		$balnceb1 = 0;
		$pendingPSend = 0;
		
		echo "<pre>";
		
		$loc_nameAP = array_unique($loc_nameP);
		foreach($loc_nameAP as $key=>$val)
		{
			$sliced_array = array_slice($pendingP, 0, $key);
			$totalprev2 = array_sum($sliced_array); 
			$totalprev2N =$totalprev2 - $totalprev2N;
			array_push($totalprev2ARR,$totalprev2N);	
				
			$sliced_billamountP = array_slice($bill_amountP, 0, $key);
			$totalbillamountP = array_sum($sliced_billamountP); 
			$totalbillamountP2 =$totalbillamountP - $totalbillamountP2;
			array_push($bill_amountNP,$totalbillamountP2);	
			
			$sliced_paymentP = array_slice($paymentP, 0, $key);
			$totalsliced_paymentP = array_sum($sliced_paymentP); 
			$sliced_sliced_paymentP =$totalsliced_paymentP - $sliced_sliced_paymentP;
			array_push($bill_paymentP,$sliced_sliced_paymentP);		
			
			$sliced_balnceP = array_slice($balnceP, 0, $key);
			$totalBlnceN = array_sum($sliced_balnceP); 
			$totalBlnceN2 =$totalBlnceN - $totalBlnceN2;
			array_push($totalBlnceNP,$totalBlnceN2);	

		}

		//array_shift($totalprev2ARR);
		//array_shift($totalBlnceNP);
		//print_r ($totalprev2ARR);
		$totalprev2ARRS = array_sum($totalprev2ARR); 
		$pendingPS = array_sum($pendingP); 
		$pendingPSend = $pendingPS - $totalprev2ARRS;
		
		//print_r ($bill_amountNP);
		$bill_amountNPARRS = array_sum($bill_amountNP); 
		$bill_amountPS = array_sum($bill_amountP); 
		$bill_amountPSend = $bill_amountPS - $bill_amountNPARRS;
		
		//print_r ($bill_paymentP);
		$totalpaymentPARRS = array_sum($bill_paymentP); 
		$paymentPS = array_sum($paymentP); 
		$paymentPSend = $paymentPS - $totalpaymentPARRS;
		
		//print_r ($bill_paymentP);
		$totalBlnceNPARRS = array_sum($totalBlnceNP); 
		$balncePS = array_sum($balnceP); 
		$balncePSend = $balncePS - $totalBlnceNPARRS;
		
	
// code to genetare pdf			
class PDF_result extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);
		$this->SetAutoPageBreak(true, $margin);
	}

function Generate_Table($comp_name,$from,$to, $loc_nameA,$f_name,$l_name, $designation,$mob_number,$pendingA, $bill_amountA,$paymentA,$balnceA,$totalprevS,$total9s,$totalps,$totalbS) {
	$this->SetFont('Arial', 'B', 7);
	$this->SetTextColor(0);
	$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(300, 25, "Company name:-  $comp_name      Bill Period:- $from to $to" , '',0, 'C');	
	$this->Ln();
	$this->Cell(20, 25, "Sno.", 'TLR',0, 'C');	
	$this->Cell(100, 25, "Location", 'TLR', 0, 'C');
	$this->Cell(100, 25, "Username", 'TLR', 0, 'C');
	$this->Cell(80, 25, "Designation", 'TLR', 0, 'C');
	$this->Cell(70, 25, "Mobile Number", 'TLR', 0, 'C');
	$this->Cell(50, 25, "Prev Balance", 'TLR', 0, 'C');
	$this->Cell(40, 25, "Bill", 'TLR', 0, 'C');
	$this->Cell(40, 25, "Payment", 'TLR', 0, 'C');
	$this->Cell(40, 25, "Balance", 'TLR', 0, 'C');
	$this->Ln();
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
	
	 $f_nameC = count($f_name);
	for ($i = 0; $i < count($f_name); $i++) {
		$this->Cell(20, 20,  $i+'1', 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20,  $loc_nameA[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20, $f_name[$i].''.$l_name[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(80, 20,  $designation[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(70, 20,  $mob_number[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(50, 20,  $pendingA[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $bill_amountA[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $paymentA[$i], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $balnceA[$i], 'TLR', 0, 'C', $fill);
		$this->Ln();
		$fill = !$fill;
	}
		$this->Cell(20, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(80, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(70, 20,  'Total', 'LRB', 0, 'C', $fill);
		$this->Cell(50, 20,  $totalprevS, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $total9s, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $totalps, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $totalbS, 'LRB', 0, 'C', $fill);
		$this->Ln();
		$fill = !$fill;
		$this->SetX(367);
		
		if($f_nameC > 32){
			
		}else{
		$f_nameLN =  32 - $f_nameC;
		for ($i = 0; $i < $f_nameLN; $i++) {
				$this->Ln();
		}
		}
}	 
	
	
function Generate_TableM($Sno,$loc_nameM,$f_nameM,$l_nameM, $designationM,$mob_numberM,$pendingM, $bill_amountM,$paymentM,$balnceM,$totalprevM,$total2m,$totalpm,$totalbM) {
	$this->SetTextColor(0);
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
			
		$this->Ln();
		
	 $f_nameCC = count($f_nameM);
	for ($j = 0; $j < count($f_nameM); $j++) {
		$this->Cell(20, 20,  $Sno[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20, $loc_nameM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20, $f_nameM[$j].''.$l_nameM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(80, 20,  $designationM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(70, 20,  $mob_numberM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(50, 20,  $pendingM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $bill_amountM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $paymentM[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $balnceM[$j], 'TLR', 0, 'C', $fill);
		$this->Ln();
		$fill = !$fill;
	}
		$this->Cell(20, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(80, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(70, 20,  'Total', 'LRB', 0, 'C', $fill);
		$this->Cell(50, 20,  $totalprevM, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $total2m, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $totalpm, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $totalbM, 'LRB', 0, 'C', $fill);
		$this->Ln();
		$this->SetX(367);
		
		if($f_nameCC > 32){
		}else{
		$f_nameLN =  32 - $f_nameCC;
		for ($i = 0; $i < $f_nameLN; $i++) {
				$this->Ln();
		}
		}
		
}	
 	
function Generate_TableP($SP,$loc_nameP,$f_nameP,$l_nameP, $designationP,$mob_numberP,$pendingP,$bill_amountP,$paymentP,$balnceP,$totalprev2ARR,$bill_amountNP,$totalBlnceNP,$bill_paymentP,$pendingPSend,$bill_amountPSend,$paymentPSend,$balncePSend) {
	$this->SetTextColor(0);
	$this->SetFont('Arial', '',8);
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
	$fill = false;
	
	$this->Ln();
	 
	array_push($loc_nameP,$loc_name1);	
	$loc_array = array_unique($loc_nameP);	
	for ($i = 0; $i < count($loc_nameP); $i++) {
		if($loc_nameP[$i] == $loc_array[$i]){
			$countP = 1;
			array_push($SP,$countP);	
			 $countP++;	
		}
		else{
			array_push($SP,$countP);		
			 $countP++;	
			
		}
	}
	
	$status = 0;
	$f_nameCCC = count($f_nameP);
	for ($j = 0; $j < count($f_nameP); $j++) {
		if($SP[$j] == 1){
			if($status == 1){
			$this->Cell(20, 20,  '', 'LRB', 0, 'C', $fill);
			$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
			$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
			$this->Cell(80, 20,  '', 'LRB', 0, 'C', $fill);
			$this->Cell(70, 20,  'Total', 'LRB', 0, 'C', $fill);
			$this->Cell(50, 20,  $totalprev2ARR[$j-($j-1)], 'LRB', 0, 'C', $fill);
			$this->Cell(40, 20,  $bill_amountNP[$j-($j-1)], 'LRB', 0, 'C', $fill);
			$this->Cell(40, 20,  $bill_paymentP[$j-($j-1)], 'LRB', 0, 'C', $fill);
			$this->Cell(40, 20,  $totalBlnceNP[$j-($j-1)], 'LRB', 0, 'C', $fill);
			$this->SetX(367);
		}
		$this->Ln();
		$this->Ln();
		}
		$this->Cell(20, 20,  $SP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20, $loc_nameP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(100, 20, $f_nameP[$j].''.$l_nameP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(80, 20,  $designationP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(70, 20,  $mob_numberP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(50, 20,  $pendingP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $bill_amountP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $paymentP[$j], 'TLR', 0, 'C', $fill);
		$this->Cell(40, 20,  $balnceP[$j], 'TLR', 0, 'C', $fill);
		$this->Ln();
		$fill = !$fill;
		
		$status = 1;
	}
		
		$this->Cell(20, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(100, 20, '', 'LRB', 0, 'C', $fill);
		$this->Cell(80, 20,  '', 'LRB', 0, 'C', $fill);
		$this->Cell(70, 20,  'Total', 'LRB', 0, 'C', $fill);
		$this->Cell(50, 20,  $pendingPSend, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $bill_amountPSend, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $paymentPSend, 'LRB', 0, 'C', $fill);
		$this->Cell(40, 20,  $balncePSend, 'LRB', 0, 'C', $fill);
		$this->SetX(367);
		
		if($f_nameCCC > 32){
		}else{
		$f_nameLN =  32 - $f_nameCCC;
		for ($i = 0; $i < $f_nameLN; $i++) {
				$this->Ln();
		}
		}
		
}	 
	
	
}

	
$pdf = new PDF_result();
$pdf->AddPage();
$pdf->SetFont('Arial', 'I');
//$pdf->SetAutoPageBreak(true);
$pdf->Generate_Table($comp_name,$from,$to,$loc_nameA,$f_name,$l_name, $designation,$mob_number,$pendingA,$bill_amountA,$paymentA,$balnceA,$totalprevS,$total9s,$totalps,$totalbS);
$pdf->Generate_TableM($Sno,$loc_nameM,$f_nameM,$f_nameM, $designationM,$mob_numberM,$pendingM, $bill_amountM,$paymentM,$balnceM,$totalprevM,$total2m,$totalpm,$totalbM);
$pdf->Generate_TableP($SP,$loc_nameP,$f_nameP,$l_nameP, $designationP,$mob_numberP,$pendingP, $bill_amountP,$paymentP,$balnceP,$totalprev2ARR,$bill_amountNP,$totalBlnceNP,$bill_paymentP,$pendingPSend,$bill_amountPSend,$paymentPSend,$balncePSend);
$pdf->Output('bill_record.pdf', 'F');



$dir= "$dir_path/Generate_pdf/";
$filename= "bill_record.pdf";
$pdf ->Output($dir.$filename); 




 
if(file_exists($dir)){
$to = $location_emailG;
$subject = "Your Bill record";
$from = "admin@mobbill.com";
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n"
  ."Content-Type: multipart/mixed; boundary=\"1a2a3a\"";
 
$message .= "If you can see this MIME than your client doesn't accept MIME types!\r\n"
  ."--1a2a3a\r\n";
 
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"
  ."Content-Transfer-Encoding: 7bit\r\n\r\n"
  ."<p>please find the attachment for bill record</p> \r\n"
  ."--1a2a3a\r\n";
 
$file = file_get_contents("bill_record.pdf");
 
$message .= "Content-Type: image/jpg; name=\"bill_record.pdf\"\r\n"
  ."Content-Transfer-Encoding: base64\r\n"
  ."Content-disposition: attachment; file=\"bill_record.pdf\"\r\n"
  ."\r\n"
  .chunk_split(base64_encode($file))
  ."--1a2a3a--";
 
$success = mail($to,$subject,$message,$headers);
   if (!$success) {
	echo "Mail to " . $to . " failed .";
   }
   else {
	echo "Success : Mail was send to " . $to ;
	 	 /* $file = "$dir_path/pdf/bill_record.pdf";
		if (!unlink($file))
			{ echo ("Error deleting $file"); }
		else
		{ echo ("Deleted $file"); }    */
   }

} 
?>