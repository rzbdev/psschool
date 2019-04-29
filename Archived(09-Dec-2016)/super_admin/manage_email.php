<?php 
error_reporting(0);
session_start();
include_once('../admin/admin_header.php');
include_once('config.php');
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="../admin/login.php"';
	echo '</script>';
} 
?>  
<style>
.dst{margin-right:10px !important;}
</style>
	<div class="container-fluid">     
	<div class="row">    
	<div class="col-md-12">    	 
			<h1 class="page-header">Manage Email Notifications</h1>
		</div>
		  <div class="col-md-12 margn-btm">   
          <div class="row"> 		  
		  <div class="col-md-5">
			<form class="form-inline" action="" method="post">
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="title"  value="<?php echo htmlentities($email) ?>" id="inputkeyword" placeholder="Search by title...." onkeyup="clearnow()">
			  </div>
			  <button type="submit" class="btn srch" name="search">Search</button>
			  <?php 
						if(isset($_POST['search'])){
$email=$_POST['title']; ?>							
						<input class="btn srch" type="submit" value ="Clear" name="clear">
						 <?php
						 } else {?>
						 	<input class="btn srch" style="display:none" type="submit" value = "Clear" name="clear" id="clear">
						
						 <?php } ?>
			</form>
			</div>
			<div class="col-md-7">	
			<div class=" nav-btnn add-col pull-right">	
				<!--<a href="add_email.php" class="nav-btn">Add Email</a>-->
			</div>
			</div>
			</div>
			</div>
		</div>
		</div>
	<div class="container-fluid">

			<div class="table-responsive no-scroll">
				<table class="table show-data datatable table-strip table-bordered table-res" id="example">
					<thead>
						<tr>
						<th style="width:50px;">S.No</th>
						
						<th style="width:200px;">Name</th>
							
							<th style="width:300px;">Email</th>
							<th style="width:150px;">Job Notification</th>
						<th style="width:200px;">Eligibility Notification</th>
							<th style="width:250px;">Active/Inactive</th>
							<th style="width:100px;">Actions</th>
						</tr>
					</thead>
					<tbody>
					
					
						<?php
						
							if(isset($_POST['search']))
						{
							 $email=$_POST['title'];
							 $sql_admin="SELECT * FROM `manage_email` where email LIKE '%$email%' OR name LIKE '%$email%'";
							
						}
						else
						{
						$sql_admin="SELECT * FROM `manage_email`";
						
						}
						$result_admin = mysqli_query($sql_admin);
						$a=0;
						while($result = mysqli_fetch_array($result_admin)){
							$a_id = $result['id'];
						    $name = $result['name'];
							$email = $result['email'];
							$status = $result['status'];
							$post = $result['post'];
							$email_send = $result['email_send'];
							$send_email = $result['send_email'];
							
							 ?>
							<tr class="odd gradeX record">
							
							<td align="center"><?php echo ++$a; ?></td>
							
								
						
								<td><?php echo $name; ?></td>
								<td><?php echo $email; ?></td>
								<?php
							if($post=='true')
							{?>
							
							<td><input type="checkbox" data="<?php echo $a_id;?>" name="foo" value="1" class="check"checked /></td>
							<?php
							}
							else
							{
								?>
								<td><input type="checkbox" data="<?php echo $a_id;?>" name="foo" value="1" class="check"></td>
								<?php
							}
							
							
							?>
							<?php
							if($email_send=='true')
							{?>
							
							<td><input type="checkbox" data="<?php echo $a_id;?>" name="foo1" value="1" class="check1" checked /></td>
							<?php
							}
							else
							{
								?>
								<td><input type="checkbox" data="<?php echo $a_id;?>" name="foo1" value="1" class="check1"></td>
								<?php
							}
							
							
							?>
							
								<td>
									<span data="<?php echo $a_id;?>" name="<?php echo $name; ?> " class="status_checks btn btn btn-default btn-sm
								<?php echo ($status)?'sm-bt success': 'sm-bt error'?>"><?php echo ($status)? '<i class="fa fa-check"></i> Active' : '<i class="fa fa-remove"></i> Inactive'?></span>
								</td>
								<td>
								<a href="edit_email.php?id=<?php echo $a_id; ?>" class="success sm-bt btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
								<a id="<?php  echo $a_id; ?>" name="<?php echo $name; ?> " class="sm-bt delbutton btn btn-default btn-sm" href="#"><i class="fa fa-trash"></i></a>
								
								</td>
							</tr>
							
							<?php }  ?>
					</tbody>
                </table>
					
							
            </div>
			<div class="row">
			<div class="col-md-8">
			<div style="margin-top:-15px;display:block;margin-bottom:15px;">
				<h4><b>Send Acknowledgement Email : </b></h4>
			</div>
				<div class="checkbox">
							  <label>
							  <?php
							  if($send_email=='true')
														{?>
							   <input type="checkbox" data="" name="sendmail" value="1" class="check_email dst" checked/>
							   <?php
														}
														else
														{
															?>
											<input type="checkbox" data="" name="sendmail" value="1" class="check_email dst">
															<?php
														}
														?>
								&nbsp;&nbsp;&nbsp;Select the checkbox if an acknowledgement email needs to be sent to the applicant.
							  </label>
                            </div>
			</div>
			</div>
							<div class="col-md-12 row margin-top">
				 <b>Note </b>:Selecting the job notification checkbox will send an email to the user regarding the applicant applying to the job and if Eligibility notification is checked then if the status of applicant is changed, user gets notified for the same .</div> 
            			</div>
            			</div>
<br/><br/><br/><br/>
			<?php 

include_once('../admin/admin_footer.php');
?>
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js "></script>
<script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var del_name = element.attr("name");
var info = 'id=' + del_id + '&name='+ del_name ;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "GET",
        url: "delete_email.php",
        data: info,
        success: function(data)
          {   
		 
            location.reload();
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
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Do you want to "+ msg+" User.")){
        var current_element = $(this);
		 var a_name = $(this);
        url = "ajax1.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status,u_name:$(a_name).attr('name')},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
$(function() {
		$('#clear').click(function(e){
	e.preventDefault();
	$('#inputkeyword').val('');
			$('#clear').hide();
			
			
});
});	
</script>
<script>
$('.check').click(function() {
    var checked = $(this).is(':checked');
var id = $(this).attr('data');
var post ="post";
    $.ajax({
        type: "POST",
        url: "post_job.php",
          data: { checked : checked ,id1:id,post1:post},
        success: function(data) {
           alert("Information Updated Successfully.");
        },
        error: function() {
            alert('it broke');
        },
      
    });
});
</script>
<script>
$('.check1').click(function() {
    var checked = $(this).is(':checked');
var id = $(this).attr('data');
var post ="post1";
    $.ajax({
        type: "POST",
        url: "post_job.php",
          data: { checked : checked ,id1:id,post1:post},
        success: function(data) {
           alert("Information Updated Successfully.");
        },
        error: function() {
            
        },
      
    });
});
</script>
<script>
$('.check_email').click(function() {
    var checked = $(this).is(':checked');
var id = $(this).attr('data');
var post ="post2";
    $.ajax({
        type: "POST",
        url: "post_job.php",
          data: { checked : checked ,id1:id,post1:post},
        success: function(data) {
			alert("Information Updated Successfully.");
           
        },
        error: function() {
            alert('it broke');
        },
      
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
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('#example').dataTable();
	 });
	 })(jQuery);
</script>