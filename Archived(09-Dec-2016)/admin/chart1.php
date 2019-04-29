

<?php
error_reporting(0);
include "config.php";

include_once('admin_header.php');
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


<html>
      <head>
        <!--Load the AJAX API-->
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="barChart.css" />

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
		<script>
	var lineChartData = {
			labels : [<?php for ($i=0; $i<count($language); $i++){ $str=explode("(",$language[$i]);$str1=explode("TEACHER",$str[0]); echo '"'.$str1[0].'"';  echo ',';} ?>],
			datasets : [
			
				{
					//label: "Number Of Applicants",
					fillColor : "rgba(12, 187, 164, 0.2)",
					strokeColor : "rgba(12, 194, 170, 1)",
					pointColor : "rgba(0, 152, 203, 0.4)",
					pointStrokeColor : "#000dbb",
					pointHighlightFill : "#000dbb",
					pointHighlightStroke : "rgba(255, 134, 220, 1)",
					
					data : [<?php for ($j=0; $j<count($language1); $j++){ echo $language1[$j];  echo ',';} ?>]
				}
				  
			]

		}
	
	window.onload = function(){
		
		
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
		
		
		var myPieChart = new Chart(ctx).Line(lineChartData);
		var legend = myPieChart.generateLegend();
            $('#legend').append(legend);	
		
			
			
	}
	</script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'Slices');
            data.addRows([
             ['Eligible Candidates', <?php echo $ele; ?>],
          ['In-Eligible Candidates', <?php echo $non; ?>], 
		  ['Pending Candidates', <?php echo $nr; ?>]
            ]);
			
			
			
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
           data2.addColumn('number', 'Slices');
            data2.addRows([
            ['Male', <?php echo $Male; ?>],
         ['Female', <?php echo $Female; ?>]
		  ]); 

    var data3 = new google.visualization.DataTable();
           data3.addColumn('string', 'Year');
          data3.addColumn('number', 'Sales');
          data3.addColumn('number', 'Expenses');
          data3.addRows([
           ['2004', 1000, 400],
           ['2005', 1170, 460],
              ['2006',  860, 580],
              ['2007', 1030, 540]
            ]);

            // Set chart options
            var options = {
                           'width':450,
                           'height':240
						     };
            // Set chart options
            var options2 = {
                           'width':440,
                           'height':240};
            // Set chart options
           /* var options3 = {'title':'Line chart',
                           'width':400,
                           'height':300};*/

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
                    }
        </script>
		
      </head>
        <body>
		
	    <div class="container-fluid">
		   <div class="row brdr">
	    <div class="col-md-6 col-sm-6 margin">
			<h3 class="m-b-0 _300"><?php echo $rw;?> (<?php echo $newDate = date("d-m-Y", strtotime($created));?> to <?php echo $newDate = date("d-m-Y", strtotime($exp));?>)</h3>
		</div>
		<div class="col-md-6 col-sm-6 mrng">
			<form class="" action="" method="post">
			  <div class="form-group col-md-8 col-sm-8">
				<label class="sr-only" for="search">Search</label>
				 <select class="form-control" name="sear">
				 <option value="">Select Notification</option>
				 <?php 
				 $select="SELECT * FROM notification";
							$rows=mysqli_query($select);
							echo $r=mysqli_num_rows($rows);
							while($row=mysqli_fetch_array($rows))
							{
							?>
<option value="<?php echo $row['nid'];?>"><?php echo $row['title']; ?></option>
						
<?php 
							}
							?>

				 </select>
				 </div>
				 <div class="col-md-4 col-sm-4">
				 <button type="submit" class="btn srch" name="search">Search</button>
			  </div>
		    </form>
		</div>
		</div>
		
	 <div class="row">	
<div class="col-md-4 col-sm-12"> 
<div class="row">
	<div class="col-md-6 col-sm-6 pdng-rght pdrht"> 
	<div class="box p-a text-center">
		<div class="text-muted">Total Jobs</div>
		<h4 class="m-a-0 text-md _600"><?php echo $rc11;?></h4>
	</div>
	</div>
	<div class="col-md-6 col-sm-6 pdng-rght"> 
	<div class="box p-a text-center">
		<div class="text-muted">Total Applicants</div>
		<h4 class="m-a-0 text-md _600"><?php echo $ta;?></h4>
	</div>
	</div>
	
	<div class="col-md-6 col-sm-6 pdng-rght pdrht"> 
	<div class="box p-a text-center">
		<div class="text-muted">Eligible Candidates</div>
		<h4 class="m-a-0 text-md _600"><?php echo $ele;?></h4>
	</div>
	</div>
	
	
	<div class="col-md-6 col-sm-6 pdng-rght"> 
	<div class="box p-a text-center">
		<div class="text-muted">Pending Candidates</div>
		<h4 class="m-a-0 text-md _600"><?php echo $nr;?></h4>
	</div>
	</div>
	
<div class="col-md-6 col-sm-6 pdng-rght"> 
	<div class="box p-a text-center">
		<div class="text-muted">In-Eligible Candidates</div>
		<h4 class="m-a-0 text-md _600"><?php echo $non;?></h4>
	</div>
	</div>

	<div class="col-md-6 col-sm-6 pdng-rght"> 
	<div class="box p-a text-center">
		<div class="text-muted">Notification To Expire In</div>
		<h4 class="m-a-0 text-md _600"><?php   $demo=ceil($datediff/(60*60*24));
		if($demo <= 0)
		{
			echo "<font color='red'>Expired</font>";
		}
		
		else{
			 echo $demo;
		}
		
		
		?></h4>
	</div>
	</div>
	
	</div><!----row--->
</div><!----col-md-4--->
  <div class="col-md-8 col-sm-12" >
  <div class="row">
   <div class="col-md-6 col-sm-6 pdng-rght pdrht">
   <div class="row-col box dark bg ht">
   <h2>According to Eligibility</h2>
	<div id="chart_div"></div>
    </div>
  </div>
		<div class="col-md-6 col-sm-6">
<div class="row-col box dark bg ht">
<h2>According to Gender</h2>
			<div id="chart_div2"></div>
		</div>
		</div>
		</div>
			</div><!----col-md-5-->
			</div><!---row--->
			<div class="row">
			<div class="col-md-6 col-sm-12 pdng-rght pdrht">
				<div class="col-md-12 col-sm-12 box hght" >
	 <h2>No. of Applicants Post Wise</h2>
	        <h6 class="htt">The Following Graph Depicts Number of Applicants Applying to Different Posts in the Current Active Notification. </h6>
	   <!--  <h5>Number of Applicants</h5>-->
	    <div class="graph-1">
					      <div id="legend"></div>	
						   <canvas id="canvas" height="400" width="804" class="can-graph"></canvas>
						    <div class="back-graph"></div>
						<!--	<div class="back-graph" style="text-align:center;margin-top:-53px;color:#238EE0;"><h4>Post Name</h4></div>-->
						</div>
				
				</div>
	
				</div>
			<div class="col-md-6 col-sm-12">
			
				<div class="col-md-12 col-sm-12 box hght">
				
				
		 <h2>No. of Applicants on Daily Basis</h2>
		 <h6>	The Following Graph Depicts Number of Applicants Applying On Daily Basis. </h6>
		<!-- <h5>Number of Applicants</h5>-->
	
	   <div id="chart_bar"></div>
						
						
				</div>
				</div>
				</div>
		</div>
	    </body>
    </html>
	<br>
	<br>
	
<?php include_once('admin_footer.php');?>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
      
    function drawChart() {
      var jsonData = $.ajax({
          url: "getData.php",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_bar'));
      chart.draw(data, {width: 0, height: 360});
    }

    </script>