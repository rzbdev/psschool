<!DOCTYPE html>
<?php 
error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php');
$select="SELECT *  FROM notification WHERE status='1'";
	$row=mysql_Query($select);
    $rc=mysql_num_rows($row);
	while($ro=mysql_fetch_array($row))
	{
		 $rw=$ro['title'];
		$i=$ro['nid'];
	}
	
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 


 ?>

 
 <style>
h1.hel{margin:0; padding:0;}
h1.hel a{color: #000; font-size: 20px;}
.algn-dwn { padding: 40px 25px; position: absolute; right: 15px; top: 16%;z-index:99999;}
 </style>
	<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
					</button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
	<div class="row">
	<div class="col-md-6">
			
			<h1>Notifications</h1>
		</div>	
		    <div class="col-md-6" style="margin-top:40px;">
			 <div class="algn-dwn">
			<form class="form-inline" action="" method="post">
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="post_applied"  value="<?php echo htmlentities($post_applied) ?>" id="inputkeyword" placeholder="Search by post applied...." onkeyup="clearnow()">
			  </div>
			  <button type="submit" class="btn srch btn-my" name="search">Search</button>
			   <?php 
						if(isset($_POST['search'])){
$post_applied = $_POST['post_applied']; ?>							
						<input class="btn srch" type="submit" value ="Clear" name="clear">
						 <?php
						 } else {?>
						 	<input class="btn srch" style="display:none" type="submit" value = "Clear" name="clear" id="clear">
						
						 <?php } ?>
			</form>
			</div>
			</div>
			</div>
			
			
				<?php
				$select2="SELECT *  FROM notification WHERE date_ex >= '$exchn_date'";
	$row2=mysql_Query($select2);
    $rc=mysql_num_rows($row2);
	while($ro=mysql_fetch_array($row2))
	{
		
		?>

<!--<h1 class="pull-right hel"><a style="font-size:16px;"href="download1.php"  class="btn srch">Download All</a></h1>-->
	<?php
	}
	?>

			 <!-- <button type="button" class="btn  btn-lg srch pull-right" data-toggle="modal" data-target="#myModal">ADD JOBS</button> -->


  
  <?php 
  if(isset($_POST['submit']))
  {
	$title =$_POST['job'];
	$teaching =$_POST['teaching'];
	$date=$_POST['date'];
  $sql="INSERT INTO jobs(`title`, `expiredate`, `teching`) VALUES ('$title','$date','$teaching')";
  $row=mysql_query($sql);
  if($row){
	  echo "Job addded Successfully"; 
  }
  else{
	  echo "Something went wrong!";
  }
  }
  ?>
  
  <!-- Form to add jobs-->
<form method="POST"  name="form">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD JOBS</h4>-->
        </div>
        <div class="modal-body">
          <div class="form-group">
  <label for="usr">JOB TITLE:</label>
  <input type="text" class="form-control" id="usr" name="job">
</div>

<div class="form-group">
  <label for="usr">EXPIRE DATE:</label>
  <input type="text" class="form-control" id="datepicker" name="date">
</div>
<label class="radio-inline"><input type="radio" name="teaching" value="teaching">TEACHING</label>
<label class="radio-inline"><input type="radio" name="teaching" value="non-teaching">NON-TEACHING</label>
<br>
<div class="form-group">
<button type="submit" class="btn btn-default" name="submit">Submit</button>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </form>
		
			<div class="row">
		<div class="show-rcord">
			<div class="col-md-12">
			
			
			   <div class="table-responsive no-scroll">
			  
			<table class="table table-strip table-bordered show-data datatable table-res" id="example">
				<thead>
				<th>S.No</th>
				<th>Applied For</th>
				<th>Applicant</th>
				<th align="center" style="text-align:center;">Action</th>
				</thead>
				<tbody>
				
				<?php 
				if(isset($_POST['search'])){
					$post_applied = $_POST['post_applied'];
				$get_jobs="SELECT * FROM personal_details where (Notification= '$rw' AND post_applied LIKE '%$post_applied%' )";
				} else{
				 $get_jobs="SELECT * FROM personal_details where  Notification= '$rw'";
				}
				$result_jobs=mysql_query($get_jobs);
				if(mysql_num_rows($result_jobs) > 0) 
				{
				$start_from1=$start_from;
				 while($row = mysql_fetch_assoc($result_jobs)) { ?>
				 
					<tr class="record">
					<th scope="row"><?php echo ++$start_from1; ?></th>
					
					<th scope="row"><?php echo $row['post_applied']; ?></th>
					<th scope="row"><?php echo $row['first_name']; ?></th>
					<?php  $download_id =  $row['id']; 
						
					?>
					<td><a href="download.php?a=<?php echo $download_id; ?>" class="btn btn-default">Download</a></td>
					</tr>
				</form>
				
			
				<?php 
				} 
				
				
				?>
					<?php
				}
				else{
					?>
					<tr>
					<td colspan="4" align="center">
					<?php
					 echo "No record found";
					 ?>
					  </td>
				 </tr><?php
				 } 
				 
				 
				 ?>
				
				</tbody>
				</table>
				</div>
				</div>
		</div>
						<div class="col-md-12 margin-top">
				 <b>Note</b>: Showing jobs with applicants who applied to different posts.</div> 
		</div>
		</div>
		</div>
		
<div class="clearfix"></div>
<br><br><br><br><br>
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
$(document).ready(function(){
  $('#download').click(function(){
	  
		//var language=document.getElementById("language").value;
	  window.location.href = "download_noti.php";
  })
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