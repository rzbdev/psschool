<!DOCTYPE html>
<?php 

error_reporting(0);
session_start();
include_once('config.php');
$notification=$_GET['a'];
$page=$_GET['page'];
include_once('admin_header.php');
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
}  


?>

<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
					</button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
		<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">OLD JOBS</h1>
		</div>
		<div class="clearfix"></div>
		<div class="show-rcord">
		    <div class="col-md-6">
			<form class="form-inline" action="" method="post">
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="title"  value="<?php echo htmlentities($job) ?>" id="inputkeyword" placeholder="Search by title...." onkeyup="clearnow()">
			  </div>
			  <button type="submit" class="btn srch" name="search">Search</button>
			  <?php 
						if(isset($_POST['search'])){
$job = $_POST['title']; ?>							
						<input class="btn srch" type="submit" value ="Clear" name="clear">
						 <?php
						 } else {?>
						 	<input class="btn srch" style="display:none" type="submit" value = "Clear" name="clear" id="clear">
						
						 <?php } ?>
			</form>
			</div>
			<div class="col-md-6">
			<!--<a href="old_jobs.php?page=1"  class="btn  btn-lg srch pull-right">OLD JOBS</a>-->
			<button type="button" class="btn  btn-lg srch pull-right" data-toggle="modal" data-target="#myModal">ADD JOBS</button>
  <?php 
  if(isset($_POST['submit']))
  {
	$title =$_POST['job'];
	$teaching =$_POST['teaching'];
	$post=$_POST['post'];
  $sql="INSERT INTO jobs(`title`, `nid`, `teching`) VALUES ('$title','$post','$teaching')";
  $row=mysql_query($sql);
  if($row){

	  ?>
	  <script>
	  alert("Job Added Successfully");
			 $('#preloader').hide();
</script>
	  <?php
  }
  else{
	  echo "Something went wrong!";
  }
  }
  ?>
  
  <!-- Form to add jobs-->
<form method="POST"  name="form">
  <div class="modal fade add-job-popup" id="myModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
		<div class="form-group">
  <label for="usr">Notification:</label>
  <select class="form-control required jobs" id="apply_post" name="post" placeholder="">
							
							<option value="">Select Notification</option>
							
							<?php 
							
							$select="SELECT * FROM notification WHERE date_ex < $exchn_date";
							$rows=mysql_query($select);
							echo $r=mysql_num_rows($rows);
							while($row=mysql_fetch_array($rows))
							{
							?>
							<option value="<?php echo $row['nid'];?>"><?php echo $row['title']; ?></option>
							<?php 
							}  
							?>
							</select>
</div>
          <div class="form-group">
  <label for="usr">JOB TITLE:</label>
  <input type="text" class="form-control" id="usr" name="job">
</div>
 <div class="col-md-12">
<label class="radio-inline"><input type="radio" name="teaching" value="teaching">TEACHING</label>
<label class="radio-inline"><input type="radio" name="teaching" value="non-teaching">NON-TEACHING</label>
</div>
<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
<br>
<div class="form-group">
<button type="submit" class="btn btn-blue load" name="submit">Submit</button>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </form>

			</div>	
			<div class="col-md-12">
			   <div class="table-responsive no-scroll">
			  
			<table class="table table-strip table-bordered show-data datatable table-res" id="example">
				<thead>
				<th align="center" style="text-align:center;">S.No</th>
				<th>Job Title</th>
				
				<th align="center" style="text-align:center;">Notification Title</th>
				<th align="center" style="text-align:center;">Applied For</th>
				<th align="center" style="text-align:center;">Action</th>
				</thead>
				<tbody>
				<?php 
				if(isset($_POST['search'])){
					$job = $_POST['title'];
					$get_jobs="SELECT * FROM jobs WHERE title LIKE '%$job%' OR teching LIKE '%$job%' and nid='$notification' ";
				}
				else{
					$get_jobs="select * from jobs where nid='$notification' ";
				}
$start_from1=$start_from;
				$result_jobs=mysql_query($get_jobs);
				if(mysql_num_rows($result_jobs) > 0) 
				{
				 while($row = mysql_fetch_assoc($result_jobs)) { 
				
				 
				 
				 ?>
				<tr class="record"> 
				<td align="center"><?php echo ++$start_from1; ?></td>
				<th scope="row"><?php echo $row['title']; ?></th>
				
				<?php $nid=$row['nid']; ?>
				<?php 
				$get="SELECT `nid`, `title`, `date_ex`, `detail` FROM `notification` WHERE nid=$nid";
				$resu=mysql_query($get);
				if($rows = mysql_fetch_array($resu))
				{
					
					$title=$rows['title'];
				}
				?>
				<td align="center"><?php echo $title; ?> </td>
				<td align="center"><?php echo $row['teching']; ?></td>
				<td align="center">
				<a href="edit_job1.php?jobid=<?php echo $row['jobs_id']; ?>&page=<?php echo $page; ?>&n=<?php echo $notification ?>"><button type="button" class="btn btn-default btn-sm " ><span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></span></button></a>	
					
				<button class="btn btn-default btn-sm job_del" id="<?php echo $row['jobs_id']; ?>"><i class="fa fa-trash"></i></button></td>
				</tr>
				<?php } } 
				
				else{
						?>
			    <tr> 
				<td colspan="4" style="font-size:16px;text-align:center;margin-top:20px;">
					<?php echo "No record found";?>
				 </td>
				 </tr>
			<?php	  } ?>
				</tbody>
				</table>
				</div>
				</div>
		</div>
		<div class="col-md-12 margin-top">
				 <p><b>Note</b>:Showing list of jobs put under expired notification.</p></div>		<br/>
		<div class="clearfix"></div>
		</div>
		</div>
		</div>
		 <br/> <br/> <br/> <br/> <br/> 
  <?php include_once('admin_footer.php');?>
   <script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js "></script>
		<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('#example').dataTable();
	 });
	 })(jQuery);
</script>
<script>
$(function() {
$(".job_del").click(function(){
var element = $(this);
var job_id = element.attr("id");
var info = 'job_id=' + job_id;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "POST",
        url: "delete_jobs.php",
        data: info,
        success: function(data)
          {   
            
          }
});
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
}
return false;
});
});
</script>
<script type="text/javascript">
$(function() {
	$(".load").click(function(){	
$('#preloader').show();
});
$(".pop_up_open").click(function(){
var element = $(this);
var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "edit_job.php",
        data: {id:id},
        success: function(data)
          {   
		  if($("#myModal").html(data))
		  {
			$("#pop").trigger('click');
          }
	}
});
   
return false;
});
});
$(function() {
		$('#clear').click(function(e){
	e.preventDefault();
	$('#inputkeyword').val('');
			$('#clear').hide();
			
			
});
});	
</script>
<script type="text/javascript">

function clearnow(){
	var date2 = $('#inputkeyword').val();
	if(date2!="")
	{
		$('#clear').show();
	}
	else{
		$('#clear').hide();
	}
}
clearnow();
</script>	
		
  