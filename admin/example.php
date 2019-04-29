
<?php
error_reporting(0);
include "config.php";

include_once('admin_header.php');
if(isset($_POST['search']))
{
    $post=$_POST['sear'];
    $select="SELECT *  FROM notification WHERE nid=$post";
	$row=mysql_Query($select);
    $rc=mysql_num_rows($row);
	while($ro=mysql_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
}
else
{
	$select="SELECT *  FROM notification WHERE date_ex >= DATE_FORMAT(NOW(),'%Y-%m-%d')";
	$row=mysql_Query($select);
    $rc=mysql_num_rows($row);
	if($rc>0)
	{
	$select="SELECT *  FROM notification WHERE date_ex >= DATE_FORMAT(NOW(),'%Y-%m-%d')";
	$row=mysql_Query($select);
    $rc=mysql_num_rows($row);
	while($ro=mysql_fetch_array($row))
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
	$row=mysql_Query($select);
    $rc=mysql_num_rows($row);
	while($ro=mysql_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
		
	}
	
}
	$select1="select gender from personal_details where Notification='$rw'";
	$row=mysql_query($select1);
	$my=mysql_num_rows($row);
	$Male=0;
$Female=0;
	while($r=mysql_fetch_array($row))
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
	
	
/* $select1="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'English'" ;
$result1=mysql_query($select1);
$eng=mysql_num_rows($result1);

$select2="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Hindi'";
$result2=mysql_query($select2);
$Hindi=mysql_num_rows($result2);
 
$select3="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Punjabi'";
$result3=mysql_query($select3);
$Punjabi=mysql_num_rows($result3);

$select4="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Assamese'";
$result4=mysql_query($select4);
$Assamese=mysql_num_rows($result4);

$select5="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Bengali'";
$result5=mysql_query($select5);
$Bengali=mysql_num_rows($result5);

$select6="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Kannada'";
$result6=mysql_query($select6);
 $Kannada=mysql_num_rows($result6);

$select7="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Marathi'";
$result7=mysql_query($select7);
$Marathi=mysql_num_rows($result7);

$select8="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Telugu'";
$result8=mysql_query($select8);
$Telugu=mysql_num_rows($result8);

$select9="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Urdu'";
$result9=mysql_query($select9);
$Urdu=mysql_num_rows($result9);

$select10="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Malayalam'";
$result10=mysql_query($select10);
$Malayalam=mysql_num_rows($result10);

$select11="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Odia'";
$result11=mysql_query($select11);
$Odia=mysql_num_rows($result11);

$select12="select DISTINCT (a.id),b.id,b.Notification from acadmic_detail a,personal_details b where b.Notification='$rw' and a.id=b.id and a.medium_of_insruction Like 'Other'";
$result12=mysql_query($select12);
$Other=mysql_num_rows($result12);
  */
     
$select="select eligibilty from personal_details where Notification='$rw'";
$result=mysql_query($select);
$ta=mysql_num_rows($result);
$ele=0;
$non=0;
$nr=0;

while($row=mysql_fetch_array($result))
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
	$row1=mysql_Query($select1);
    $rc11=mysql_num_rows($row1);
	
	$language = array();
while( $row_req1 = mysql_fetch_array($row1))
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
//$dates = getDatesFromRange('2016-01-01','2016-02-15');
$lan=array();
for($i=0;$i<count($dates);$i++)
{
	    $n= $dates[$i];
	    $select="select count(id) AS idd from personal_details where DATE_FORMAT(dt_created,'%Y-%m-%d')='$n' ";
	   $se=mysql_query($select);
       while($row=mysql_fetch_array($se))
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
		$res_req1 = mysql_Query($curr_req1);
		if(mysql_num_rows($res_req1)>0){
		while($row_req1 = mysql_fetch_array($res_req1)){
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
	$row2=mysql_Query($select2);
    $language1 = array();
while( $row_req2 = mysql_fetch_array($row2))
 { 
		$demo=$row_req2['title'];
		
	 $curr_req = "SELECT  count(id) as 'request' FROM personal_details where post_applied = '$demo' And Notification='$rw'";
		$res_req = mysql_Query($curr_req);
		if(mysql_num_rows($res_req)>0){
		while($row_req = mysql_fetch_array($res_req)){
		 
		
		
		    
		   array_push($language1,$row_req['request']);
		}
	  	}
		else
		{
			
			$dots2 .= '%0';
		}
 }
	
	
	
	
?>


		
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="barChart.css" />

		<style>
			* {
			 
			    font: normal 100% sans-serif;
			}

			
           
           
		</style>

	


		<div id="chart" style="width:50%;height:50%"></div>

		<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="barChart.jquery.js"></script>

		<script>

			$(document).ready(function(){

				$('#chart').barChart({
					height : 200,
					bars : [
						{ 
							name : '',
							values : [<?php for ($i=0; $i<count($dates); $i++) 
							{
							if($i%2==0)
							{	
			 ?>
            [
               <?php $demo=date('M,d',strtotime($dates[$i]));
echo "'$demo'";
			   ?>,
              <?php echo $lan[$i]; ?>
			 ],<?php }
							

else
{
	?>
	[
               <?php $demo=date('M,d',strtotime($dates[$i]));
echo "'$demo'";
			   ?>,
              <?php echo $lan[$i]; ?>
			 ],
	<?php 
							}	}?>
							
							
						
												

							
	]
						}
					]
				});

			});

		</script>

	<script>
	$(document).ready(function(){
		
$("div.bar-title:odd").css("display",'none');
$("div.bar-value-sum").each(function(){
	if($(this).html()=='0')
	{
		$(this).hide();
	}
})
});
</script>
</html>
