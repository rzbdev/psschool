
<?php 
error_reporting(0);
session_start();
include_once('../admin/admin_header.php');
include_once('config.php');
if(!isset($_SESSION["super_admin"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="../admin/login.php"';
	echo '</script>';
} 
?>
<style>
.wid{ width: 300px;}
.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {border-bottom:1px none !important;border-left:0 none !important;border-right:0 none !important;}
</style>
<div class="container-fluid main contain">
	   <div class="row brdr-btm">     
		  <div class="col-md-12" style="margin-bottom:10px;">    		 
					<h1 class="page-header">Logging Activity</h1>
		  </div>
		 <!--  <div class="col-md-12 margn-btm">    
		 <div class="col-md-6 col-xs-12">
			<form class="form-inline" action="" method="post">
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="title"  value="" id="" placeholder="Search by title....">
			  </div>
			  <button type="submit" class="btn srch" name="search">Search</button>
			</form>
			</div>
		
			</div>-->
		</div>
		<div class="main-content">
	
		</div>
	<div class="container-fluid">
	<div class="row">
			<div class="table-responsive no-scroll">
				<table class="table table-strip table-bordered show-data datatable table-res" id="example">
					<thead>
						<tr>
						<th>SNo.</th>
						<th style="width:12%;">Name</th>
							<th style="width:30%;">Activity</th>
							<th style="width:20%;">User</th>
							<th class="wid">Date</th>
							
						</tr>
					</thead>
					<tbody>
					
						<?php
							$sql_admin="select * from log_eligible_table ORDER BY log_id DESC";
						$result_admin = mysql_query($sql_admin);
						$a=0;
						while($result = mysql_fetch_array($result_admin)){
					
							$name = $result['name'];
							$user = $result['user_name'];
							$dt_created = $result['dt_created'];
							$comment = $result['comment'];
							$status = $result['eligible_status'];
							$ipaddress = $result['ipaddress'];
							 ?>
							<tr class="odd gradeX record">
						
							<td><?php echo ++$a; ?></td>
							<td><?php echo $name; ?></td>
							
							<?php 
							if($comment==1)
							{
							
							?>
							<td><?php echo "changed the eligibility email notification option for" ;?></td>
							<?php 
							}
							else if($comment==11)
							{
							
							?>
							<td><?php echo "changed the job email notification option for" ;?></td>
							<?php 
							}
						else if($comment==2)
							{
							
							?>
							<td><?php echo "edit email address of " ;?></td>
							<?php 
							}
								else if($comment==3)
							{
							
							?>
							<td><?php echo "deleted the email address of " ;?></td>
							<?php 
							}
							else if($comment==4)
							{
							
							?>
							<td><?php echo "add new email address of " ;?></td>
							<?php 
							}
							else if($comment==5)
							{
							
							?>
							<td><?php echo "add new admin " ;?></td>
							<?php 
							}	
							else if($comment==6)
							{
							
							?>
							<td><?php echo "edit admin " ;?></td>
							<?php 
							}
							else if($comment==7)
							{
							
							?>
							<td><?php echo "delete admin " ;?></td>
							<?php 
							}
									else if($status=="Absent From Interview" || $status=="Rejected In Telephonic"|| $status=="rejected"|| $status=="Hired")
							{
							
							?>
							<td><?php echo "changed the final status of " ;?></td>
							<?php 
							}
								else if($comment==9)
							{
							
							?>
							<td><?php echo "delete the applicant " ;?></td>
							<?php 
							}
							else if($comment==15)
							{
							
							?>
							<td><?php echo "Login into the system with IP Address ".$ipaddress.""  ;?></td>
							<?php 
							}
							else if($comment==8)
							{
							
							?>
							<td><?php echo "Change the active/Inactive status of ";?></td>
							<?php 
							}
							else if($comment==12)
							{
							
							?>
							<td><?php echo "Add new notification on";?></td>
							<?php 
							}
							else if($comment==13)
							{
							
							?>
							<td><?php echo "Update notification details on";?></td>
							<?php 
							}
							else if($comment==14)
							{
							
							?>
							<td><?php echo "Delete notification on";?></td>
							<?php 
							}
							else if($comment==16)
							{
							
							?>
							<td><?php echo "Add new job under notification on";?></td>
							<?php 
							}
							else if($comment==17)
							{
							
							?>
							<td><?php echo "Delete job from notification on";?></td>
							<?php 
							}
							else if($comment==18)
							{
							
							?>
							<td><?php echo "Edit job details of notification on";?></td>
							<?php 
							}
							else if($comment==19)
							{
							
							?>
							<td><?php echo "Edit the enable/disable option of notification on";?></td>
							<?php 
							}
							else
							{
								?>
									<td><?php echo "updated comment and changed status of" ;?></td>
								<?php 
							}
							?>
							
							
								<td><?php echo $user; ?></td>
								<td><?php echo $dt_created; ?></td>
							
							</tr>
							<?php }  ?>
					</tbody>
                </table>
            </div>
			<div class="row">
				<div class="col-md-12">
				 <b>Note</b>: Showing logs for activities being performed.</div> 
        </div>
        </div>
        </div>
		
		<div class="clearfix"></div><br/><br/>
		</div>
		<br/>
		<?php 
include_once('../admin/admin_footer.php');
?>
<div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal"></button>
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js "></script>

<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('#example').dataTable();
	 });
	 })(jQuery);
</script>



