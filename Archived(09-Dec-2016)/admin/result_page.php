<?php
error_reporting(0);
include "config.php";

include_once('admin_header.php');
$super=$_SESSION['admin'];
$super_admin=$_SESSION['super_admin'];
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 

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
		$stdate=$ro['start_date'];
		$created=$ro['created'];
	}
}
else
{
	 $select="SELECT *  FROM notification WHERE status='1'";
	$row=mysqli_Query($select);
     $rc=mysqli_num_rows($row);
	if($rc>0)
	{
	$select="SELECT *  FROM notification WHERE status='1'";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	while($ro=mysqli_fetch_array($row))
	{
		$rw=$ro['title'];
		$rrr=$ro['nid'];
		$stdate=$ro['start_date'];
		$exp=$ro['date_ex'];
		$created=$ro['created'];
	}
	}
	else
	{
  $select="SELECT *  FROM notification where date_ex < '$current_date' order by date_ex desc";
	$row=mysqli_Query($select);
    $rc=mysqli_num_rows($row);
	if($ro=mysqli_fetch_array($row))
	{
		
	 $rw=$ro['title'];
		$rrr=$ro['nid'];
		$exp=$ro['date_ex'];
		$stdate=$ro['start_date'];
		$created=$ro['created'];
	}
		
	}
	
}
	
?>


<html>
      <head>
		<style>
		 .dataTables_length { display: none;}
		 .dataTables_filter { display: none;}
body {
    padding-right:0px !important;
    margin-right:0px !important;
}

body.modal-open { padding-right: 16px !important; }
		</style>
      </head>
        <body>
		
	    <div class="container-fluid">
		   <div class="row">
	    <div class="col-md-6 col-sm-6 margin">
			<h3 class="m-b-0 _300"><?php echo $rw;?> (<?php echo $newDate = date("d-m-Y", strtotime($stdate));?> to <?php echo $newDate = date("d-m-Y", strtotime($exp));?>)</h3>
		</div>
		<div class="col-md-6 col-sm-6 mrng">
			<form class="" action="" method="post">
				<label class="sr-only" for="search">Search</label>
				<button type="submit" class="btn srch pull-right" name="search">Search</button>
				 <select class="form-control notif-srch pull-right" name="sear">
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

		    </form>
		</div>
		</div>
			<div class="container-fluid">
			<div class="row">
			 <div class="clearfix"></div>
			<div class="table-responsive no-scroll">
		
					
						<?php
						 $jobs_name = array();
						 $view_locc="SELECT * FROM jobs where nid = '$rrr'";
						$result_view_locc = mysqli_query($view_locc); 
				while($compLc = mysqli_fetch_array($result_view_locc))
				{
				$jobs_id = $compLc['jobs_id'];
			$jobs_name1 = $compLc['title'];
				$jobs_name = array_merge($jobs_name, explode("|",$compLc['title']));
				?><?php
				}
				 $locationc=array_unique($jobs_name);
	
	foreach ($locationc as $value) {
		?>
             <h3 style="margin-bottom:10px;"><?php echo $value; ?></h3><?php
			  $sql_data = mysqli_query("select * from personal_details where Notification='$rw' AND post_applied='$value' AND eligibilty='E'");
					$a=1;
               if(mysqli_num_rows($sql_data)){
			 ?>
			   				<table class="table table-strip table-bordered show-data datatable table-res example">
							<thead>
				<tr>
				<th><strong>#<strong></th>
				<th><strong>Name<strong></th>
				<th><strong>Gender<strong></th>
				<th><strong>Post Applied For<strong></th>
				<th><strong>Experience<strong></th>
				<th><strong>Repeat<strong></th>
				<th><strong>Medium<strong></th>
				<th><strong>Lowest %<strong></th>
				<th><strong>Date<strong></th>
				<th><strong>Action<strong></th>
				</tr>
				</thead>
				<tbody>
			   <?php
			   
                   while($result_data = mysqli_fetch_array($sql_data)){
					   $id=$result_data['id'];
					   $fresher_exp=$result_data['fresher_exp'];
					   //==============lowest percentage=============================
					   $query_per = "SELECT ROUND(min((marks_obtain/max_marks)*100),2) as 'marks' FROM acadmic_detail where id='$id'";
					   $query=mysqli_query($query_per);
					  $result_data1 = mysqli_fetch_array($query);
					  $marks=$result_data1['marks'];
					  //====================medium===============================
					  	$query_pe= "SELECT DISTINCT (medium_of_insruction) as 'medium' FROM acadmic_detail where id='$id'";
						  $query11=mysqli_query($query_pe);
					  $result_data11 = mysqli_fetch_array($query11);
					  $medium=$result_data11['medium'];
					  //=================teaching experience===================================
					   $query1="select * from teaching_experience_detail where id='$id'";
							 $rowt=mysqli_query($query1);
							 $total_years=0;
							 $total_months=0;
						while($row=mysqli_fetch_array($rowt))
						{
							
								    $from1 =  $row['period_from'];
								    $from_array = explode("/",$from1);
								   
								    $to =   $row['period_to'];
    
									$to_array1 = explode("/",$to);
									
									 $year_differ1 = $to_array1[2]-$from_array[2];
									
								if($year_differ1>=0)
									{
										if($from_array[1]<$to_array1[1])
										{
											$months1 = $to_array1[1]-$from_array[1];
											if($year_differ1!=0)
											{
												$years=$year_differ1;
											}
											else{
												$years=0;
											}
										}
										else if($from_array[1]==$to_array1[1]){
											$months1 = 0;
											$years=$year_differ1;
										}
										else{
											$months1 = (12-($from_array[1]-$to_array1[1]));
											$years=$year_differ1-1;
										}
									}
									  $total_months = $total_months+$months1;
									  $total_years = $total_years+$years;
						}
							 if($total_months>=12)
							 {
								   $total_years = ($total_years + floor($total_months/12));
								  $total_months = ($total_months%12);
								
							 }
					  //===============================non-teching exp ================================
					  	 $query2222="select * from nonteaching_staff_exp where id='$id'";
							 $rowtt=mysqli_query($query2222);
							 $total_years1=0;
							 $total_months1=0;
							while($row11=mysqli_fetch_array($rowtt))
							{
								    $from =  $row11['period_from'];
								    $from_array1 = explode("/",$from);
								   
								    $to1 =   $row11['period_to'];
    
									$to_array = explode("/",$to1);
									
									 $year_differ = $to_array[2]-$from_array1[2];
									
									if($year_differ>=0)
									{
										if($from_array1[1]<$to_array[1])
										{
											$months = $to_array[1]-$from_array1[1];
											if($year_differ!=0)
											{
												$years1=$year_differ;
											}
											else{
												$years1=0;
											}
										}
										else if($from_array1[1]==$to_array[1]){
											$months = 0;
											$years1=$year_differ;
										}
										else{
											$months = (12-($from_array1[1]-$to_array[1]));
											$years1=$year_differ-1;
										}
									}
									  $total_months1 = $total_months1+$months;
								
									  $total_years1 = $total_years1+$years1;
							}
							 if($total_months1>=12)
							 {
								  $total_years1 = ($total_years1 + (floor($total_months1/12)));
								   $total_months1 = ($total_months1%12);
							 }
							 			 if($total_years=='0' && $total_months=='0')
	{
	 $totalexp1 = "TE: Nil";
	}
	else
	{
  $totalexp1 = "TE: ".$total_years . "  Y " . $total_months . " M ";
	}
	 if($total_years1==0 && $total_months1==0)
	{
	 $totalexp11 = "NTE: Nil";
	}
	else
	{
  $totalexp11= "NTE: ".$total_years1. "  Y " . $total_months1 . " M ";
	}
							 if($fresher_exp!='')
							 {
								 $exp=$fresher_exp;
							 }
							 else
							 {
								 $exp=$totalexp1.'<br>'.$totalexp11;
							 }
					  //==============================================================================
                   ?><tr><td><?php echo $a++?></td>
				   <td><a href="applicant_info.php?id=<?php echo $id;?>" ><?php echo $result_data['first_name'].' '.$result_data['last_name'];?></a></td>
				   <td><?php echo $result_data['gender'];?></td>
				   <td><?php echo $result_data['post_applied'];?></td>
				   <td><?php echo $exp;?></td>
				   <td><?php $res= $result_data['eariler_applied_employement_ps']; $res1=explode(",",$res); echo $res1[0];?></td>
				   <td><?php echo $medium;?></td>
				   <td><?php echo $marks.'%';?></td>
				   <td><?php echo $result_data['dt_created'];?></td>
				   <td><a href="#" class="btn btn-default btn-sm pop_up_open" data-id="<?php echo $id; ?>" ><span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></span></a><a data-id="" class="btn btn-default btn-sm " href="download2.php?id=<?php echo $id; ?>"><span><i class="fa fa-file-excel-o"></i></span></a><a data-id="" class="btn btn-default btn-sm " href="htmlToPdf/actionpdf.php?id=<?php echo $id; ?>"><span><i class="fa fa-file-pdf-o"></i></span></a><a data-id="<?php echo $id; ?>" class="btn btn-default btn-sm delbutton1" href="#"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
				   </tr><?php
                    }
                   ?>
				      </tbody>
          </table>
		  <?php
				   }
				   else
				   {
					  ?><table class="table table-strip table-bordered show-data table-res">
					  <tr>
				<th><strong>#<strong></th>
				<th><strong>Name<strong></th>
				<th><strong>Gender<strong></th>
				<th><strong>Post Applied For<strong></th>
				<th><strong>Experience<strong></th>
				<th><strong>Repeat<strong></th>
				<th><strong>Medium<strong></th>
				<th><strong>Lowest %<strong></th>
				<th><strong>Date<strong></th>
				<th><strong>Action<strong></th>
				</tr>
					  <tr><td colspan="11">No record Found</td></tr>
					  </table>
				   <?php }?>
				
	
		
			  <?php 
}										
?>
</div>
</div>
</div>
<div class="clearfix"></div><br/><br/>
</div>
<br/>
		<?php 
include_once('admin_footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		</div>
		<div class="clearfix"></div>
		<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
		</button>
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js "></script>
	<script type="text/javascript">
	 $(function() {
$(".delbutton1").click(function(){
var element = $(this);
var del_id = element.attr("data-id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "GET",
        url: "delete.php",
        data: info,
               success: function(data) {
		   location.reload();
        },
        error: function() {
//            alert('it broke');
        },
		
});
      
	
}
return false;
});
});

$(function() {
$(".pop_up_open").click(function(){
	 $('#preloader').show();
var element = $(this);
var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "popup.php",
        data: {id:id},
        success: function(data)
          {   
		   $('#preloader').hide();
		  if($("#myModal").html(data))
		  {
			$("#pop").trigger('click');
          }
	}
});
   
return false;
});
});
</script>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('.example').dataTable( {
    language: {
        searchPlaceholder: "Quick Search..."
    }
} )
	 });
	 })(jQuery);
</script>
