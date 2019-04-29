
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
.algn-dwn {
    position: absolute;
    right: 30px;
	 padding:6px 25px;
}
</style>
<div class="container-fluid main contain">
	   <div class="row brdr-btm">     
		  <div class="col-md-12" style="margin-bottom:15px;"> 	 
					<h1 class="page-header">Manage User</h1>
		  </div>
		</div>
					<div class="nav-btnn add-col">
					 <!--  <a href="add_admin.php" class="nav-btn algn-dwn">Add User</a>-->	
					</div>
		<div class="main-content">
			<!---<div class="grey-bg row">
				<div class="col-md-5 col-sm-4 col-xs-12">
					<span class="shwn"><h4>List of Users</h4></span>
				</div>
				</div>---->
		</div>
	<div class="container-fluid">
	<div class="row">
				 <div class="clearfix"></div>
			<div class="table-responsive no-scroll">
				<table class="table table-strip table-bordered show-data datatable table-res" id="example">
					<thead>
						<tr>
						<th>S.No</th>
						<th class="wid">Name</th>
							<th class="wid">Email</th>
							<th class="wid">User Type</th>
							<th class="wid">Active/Inactive</th>
							<th class="wid">Date Added</th>
								<th class="wid" style="width:9%;">Actions</th>
						</tr>
					</thead>
					<tbody>
					
						<?php
						
						if(isset($_POST['search']))
						{
							$email=$_POST['title'];
							$sql_admin="SELECT * FROM admin_login WHERE email LIKE '%$email%' OR name LIKE '%email%'  ";
						}
						else
						{
							$sql_admin="SELECT * FROM admin_login";
						}
						
						
						
						$result_admin = mysql_query($sql_admin);
						$a=0;
						while($result = mysql_fetch_array($result_admin)){
							$a_id = $result['alid'];
						$password = $result['password'];
							$email = $result['email'];
							$name = $result['name'];
							$usertype = $result['user_type'];
							$status = $result['status'];
							$date_created = $result['dt_created'];
							 ?>
							<tr class="odd gradeX record">
						
							<td align="center"><?php echo ++$a; ?></td>
							<!--<td><?//php echo $a_id; ?></td>-->
							<td><?php echo $name; ?></td>
								<td><?php echo $email; ?></td>
								<td><?php if($usertype==2){echo 'Super Admin';} else {echo 'Admin';} ?></td>
								<td>
								<span data="<?php echo $a_id;?>" name="<?php echo $name; ?> " class="status_checks btn btn-default btn-sm
								<?php echo ($status)?'sm-bt success': 'sm-bt error'?>"><?php echo ($status)? '<i class="fa fa-check"></i> Active' : '<i class="fa fa-remove"></i> Inactive'?></span>
								</td>
								<td><?php


$to_arr = explode(" ",$date_created);

echo $r8=$to_arr[0];



				?></td>
								<td>
								<a href="edit_admin.php?id=<?php echo $a_id; ?>" class="success sm-bt btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
								<a id="<?php  echo $a_id; ?>" name="<?php echo $name; ?> " class="sm-bt delbutton btn btn-default btn-sm" href="#"><i class="fa fa-trash"></i></a>
								
								</td>
							</tr>
							<?php }  ?>
					</tbody>
                </table>
            </div>
		
			<div class="row">
			<div class="col-md-12">
				<p> <b>Note</b>: Showing list of users who have admin access to Recruitment System. User account can be activated or deactivated. Also, New user can be added by pressing  add user button.</p>
				 </div> 
				 </div> 
        </div>
		
		<div class="clearfix"></div><br/><br/>
		</div>
		</div>
		</div>
		<br>
		<?php 
include_once('../admin/admin_footer.php');
?>
<div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>
<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal"></button>
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
        url: "delete_admin.php",
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
$(function() {
		$('#clear').click(function(e){
	e.preventDefault();
	$('#inputkeyword').val('');
			$('#clear').hide();
			
			
});

$(".pop_up_open").click(function(){
var element = $(this);
var id = element.attr("data-id");
    $.ajax({
        type: "GET",
        url: "popup.php",
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


</script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Do you want to "+ msg+" this User.")){
        var current_element = $(this);
        var a_name = $(this);
        url = "ajax.php";
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
