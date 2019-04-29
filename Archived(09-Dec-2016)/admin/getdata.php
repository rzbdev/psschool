

<?php

error_reporting(0);
include "config.php";
date_default_timezone_set('Asia/Kolkata');
$exchn_date= date("Y-m-d H:i:s"); 
	ob_start();		

if(isset($_POST['search']))
{
    $post=$_POST['sear'];
    $select="SELECT *  FROM notification WHERE nid=$post";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	while($ro=mysqli_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
}
else
{
	$select="SELECT *  FROM notification WHERE date_ex >= '$exchn_date'";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	if($rc>0)
	{
	$select="SELECT *  FROM notification WHERE date_ex >= '$exchn_date'";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	while($ro=mysqli_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
	}
	else
	{
	$select="SELECT *  FROM notification WHERE nid =1";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	while($ro=mysqli_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
		
	}
	
}
	$select1="select gender from personal_details where Notification='$rw'";
	$row=mysqli_query($select1);
	$my=mysqli_num_rows($row);
	$Male=0;
$Female=0;
	while($r=mysqli_fetch_array($row))
	{
	 $ro=$r['gender'];
		if($ro=='Male')
		{
			
			++$Male;
		}
		else if($ro=='Female')
		{
			++$Female;
			
		}
		
		
	}
	
	
     
$select="select eligibilty from personal_details where Notification='$rw'";
$result=mysqli_query($select);
$ta=mysqli_num_rows($result);
$ele=0;
$non=0;
$nr=0;

while($row=mysqli_fetch_array($result))
	{
	$r=$row['eligibilty'];
	
	if($r=='E')
	{
		++$ele;
		
	}
		else if($r=='NE')
		{
			
			++$non;	
		}	
			else if($r=='NR')
			{
				
					++$nr;
			}
	
	
    }
	//////////////////////////////
	
    $select1="SELECT *  FROM jobs WHERE nid='$rrr'";
	$row1=mysqli_Query($select1);
    $rc11=mysqli_num_rows($row1);
	
	$language = array();
while( $row_req1 = mysqli_fetch_array($row1))
 { 
 $row_req1['title'];
 array_push($language,$row_req1['title']);
 
 } 
 
 function getDatesFromRange($start, $end) {
    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(
         new DateTime($start),
         $interval,
         $realEnd
    );
    foreach($period as $date) { 
        $array[] = $date->format('Y-m-d'); 
    }
    return $array;
}

$dates = getDatesFromRange($created,$exp);
  $date = "$exp";
$date1 = str_replace('-', '/', $date);
$tomorrow = date('d-m-Y',strtotime($date1 . "+1 days"));

 $tomorrow;
//$dates = getDatesFromRange('2016-01-01','2016-02-15');
$lan=array();
for($i=0;$i<count($dates);$i++)
{
	    $n= $dates[$i];
	    $select="select count(id) AS idd from personal_details where DATE_FORMAT(dt_created,'%Y-%m-%d')='$n' ";
	   $se=mysqli_query($select);
       while($row=mysqli_fetch_array($se))
	{
		 $ss=$row['idd'];
		array_push($lan,$ss);
	}
	
}

 
 
 
 
 
 
 
 
 
 
 

  /*

		$dots2="";
		for($i =29; $i >=-1; $i--){
			
	 	$before_month = date('m-d-Y', strtotime('today - '.$i.' days'));
		
		   $curr_req1 = "SELECT DATE_FORMAT(dt_created,'%m-%d-%Y'), count(DATE_FORMAT(dt_created,'%m-%d-%Y')) as 'request' FROM personal_details where DATE_FORMAT(dt_created,'%m-%d-%Y') = '$before_month'";
		$res_req1 = mysqli_Query($curr_req1);
		if(mysqli_num_rows($res_req1)>0){
		while($row_req1 = mysqli_fetch_array($res_req1)){
		 $cur_date = $row_req1['dt_created'];
		
		
		   $request = $row_req1['request'];   
	
		  $dots2 .= '%'.$row_req1['request'];
		}
	  	}
		else{
			
			$dots2 .= '%0';
		}
			
		}			
	$value = explode('%',$dots2);	
    $date_now = date('d M');
	$date = strtotime($date_now);
	$date_one = strtotime("-7 day", $date);
	$date_two = strtotime("-14 day", $date);
	$date_three = strtotime("-21 day", $date);
	$date_four = strtotime("-28 day", $date);
	$date_first = date('d M', $date_one);
	$date_second = date('d M', $date_two);
	$date_third = date('d M', $date_three);
	$date_fourth = date('d M', $date_four); 
	*/
	
	
	

      $to_array1 = explode("-",$exp);
     $r1=$to_array1[0]."-".$to_array1[1]."-".$to_array1[2];	




     $now = time(); // or your date as well
     $your_date = strtotime("$r1");
     $datediff = ($your_date-$now);
   



$select2="SELECT *  FROM jobs WHERE nid='$rrr'";
	$row2=mysqli_Query($select2);
    $language1 = array();
while( $row_req2 = mysqli_fetch_array($row2))
 { 
		$demo=$row_req2['title'];
		
	 $curr_req = "SELECT  count(id) as 'request' FROM personal_details where post_applied = '$demo' And Notification='$rw'";
		$res_req = mysqli_Query($curr_req);
		if(mysqli_num_rows($res_req)>0){
		while($row_req = mysqli_fetch_array($res_req)){
		 
		
		
		    
		   array_push($language1,$row_req['request']);
		}
	  	}
		else
		{
			
			$dots2 .= '%0';
		}
 }
	
	
	
	
?>

<?php 

// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

$string = '{
  "cols": [
        {"id":"","label":"","pattern":"","type":"string"},
        {"id":"","label":"","pattern":"","type":"number"}
      ],
  "rows": [';
  for ($i=0; $i<count($dates); $i++) 
	{
				
					$string .= '{"c":[{"v":"'.date('M,d',strtotime($dates[$i])).'","f":null},{"v":'.$lan[$i].',"f":null}]},';
					
				
    }    
	
 $string .=']
}';
echo $string;

// Instead you can query your database and parse into JSON etc etc

?> 