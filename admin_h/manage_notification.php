<!DOCTYPE html>
<?php 

error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php');
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 
 ?>
 <style>
 .algn-dwn { padding: 9px 25px; position: absolute; right: 15px; top: 16%;z-index:99999;}
 </style>
<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal"></button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
		<div class="row">
			<div class="col-md-6"><h1 class="page-header">Manage Notifications</h1></div>
			<div class="col-md-6" style="margin-top:40px;">
			<!--<a href="add_new_notification.php"><button type="button" class="btn algn-dwn btn-lg srch pull-right">ADD NEW NOTIFICATION</button></a>-->
			</div>
		</div>
		<?php
		$sele1="SELECT * FROM notification WHERE date_ex >= '$exchn_date'";
		$qu1=mysql_query($sele1);
		$q2=mysql_num_rows($qu1);
		while($row=mysql_fetch_array($qu1))
		{
$rr=$row['title'];
		}
		if(isset($_POST['sub']))
			{
			$title = $_POST['test'];
            $id = $_POST['idd'];
	
$sql="UPDATE notification SET detail='$title' WHERE nid=$id";
 $row=mysql_query($sql);
 

 
					}
					?>

<!--<button type="button" style="font-size:14px;" class="btn  btn-lg srch pull-right btn-lg add algn-dwn" data-toggle="modal" data-target="#myModal">Add New Notification</button>
		  <button type="button" id="popup" style="display:none" class="btn  btn-lg srch pull-right btn-lg algn-dwn" data-toggle="modal" data-target="#myModal1">Add New Notification</button>
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog">
      <div class="modal-content" style="padding:32px; ">
     Notification (<?php //echo $rr; ?>) is active at the moment.So no more notification can be active at same time.
    </div>
   </div>
 </div>--> 
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  <div class="messag" id="testdiv" style="display:none"> Notification Detail Updated Successfully.</div>
        <div class="modal-header">
        </div>
        <div class="modal-body">
		
        <div id="sample">
	  <input type="hidden" id="notif_id"/>
	   
               <textarea name="area3" id='notif_text' style="width:550px; height: 100px;">        
               </textarea>
			   <br>
			   <button type="button" class="submit btn-primary" style="float:right;">Save</button>
			 <br>
        </div>
		 


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close
		  </button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
 
			
		<div class="clearfix"></div>
		<div class="row">
		<div class="show-rcord col-md-12">
			<!--<form class="form-inline" action="" method="post">
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="title"  value="" id="" placeholder="Search by title....">
			  </div>
			  <button type="submit" class="btn srch" name="search">Search</button>
			</form>-->
			  <div class="table-responsive no-scroll">
			  
			<table class="table table-strip table-bordered show-data datatable table-res" id="example">
				
				
				<thead>
				<th>S.No</th>
				<th align="center" style="text-align:center;">Notification Title</th>
				<th align="center" style="text-align:center;">Created</th>
				<th align="center" style="text-align:center;">Start</th>
				<th align="center" style="text-align:center;">Expiry</th>
				<th align="center" style="text-align:center;">Status</th>
				<th align="center" style="text-align:center;">Enable/Disable</th>
			<!-- <th align="center" style="text-align:center;">Notification Detail</th> -->
				<th align="center" style="text-align:center;width:10%;">Action</th>
				</thead>
				
				<tbody>
				<?php 
				if(isset($_POST['search'])){
					$job = $_POST['title'];
					$get_jobs="SELECT * FROM jobs WHERE title LIKE '%$job%' ";
				}
				else{
					$get_jobs="SELECT * FROM notification";
				}
				$start_from1=$start_from;
				$result_jobs=mysql_query($get_jobs);
				if(mysql_num_rows($result_jobs) > 0) 
				{
					$count=0;
				 while($row = mysql_fetch_assoc($result_jobs)) {
						$a_id=$row['nid'];
				 $count ++;?>
				<tr class="record"> 
				
				
				<td align="center"><?php echo ++$start_from1; ?></td>
				<td align="center"><?php echo $row['title']; ?> </td>
				<td align="center" ><?php $date222= $row['created'];


$to_arr = explode(" ",$date222);

 $r8=$to_arr[0];
 $r81=$to_arr[1];
 $ff=substr($r81,0,5);
 echo $conca=$r8.' '.$ff;


				?></td>
				<td align="center" ><?php echo $st_date=$row['start_date'];


$to_arr = explode(" ",$st_date);

 $r8=$to_arr[0];



				?></td>
				<td align="center" ><?php echo $date22=$row['date_ex'];


$to_arr = explode(" ",$date22);

 $r8=$to_arr[0];



				?></td>
				<!--<td  align="center">
				<div class="txt-area">
				 <?php// echo $row['detail']; ?>
				 </div>
				</td>-->
				<td align="center"><?php if($row['status']=='0'){echo "Inactive";} else {echo "Active";}; ?></td>
				<?php
							if($row['en_status']=='1')
							{?>
							
							<td align="center"><input type="checkbox" data="<?php echo $a_id;?>" name="foo" value="1" class="check"checked /></td>
							<?php
							}
							else
							{
								?>
								<td align="center"><input type="checkbox" data="<?php echo $a_id;?>" name="foo" value="1" class="check"></td>
								<?php
							}
							
							
							?>
				<td align="center">
				<a href="edit_notification.php?nid=<?php echo $row['nid']; ?>"><button type="button" class="btn btn-default btn-sm " ><span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></span></button></a>	
					
				<button class="btn btn-default btn-sm job_del" id="<?php echo $row['nid']; ?>"><i class="fa fa-trash"></i></button>
				
				
				</td>
				</tr>
				
				<?php } } else{
					 echo "No record found";
				 } ?>
				 
				</tbody>
			
				</table>
		
				</div>
				<div class="col-md-12 row">
				 <b>Note:</b> Showing notification under which jobs are added.</div> 
		</div>
		</div>
		
		<div class="clearfix"></div>
	
		</div>
		</div>
				 
		  <?php include_once('admin_footer.php');?>
		  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function (e) {
    $('.submit').click(function(e) {
        e.preventDefault();
       var id = $('#notif_id').val();
	   var data = $('.nicEdit-main').html();
		
        $.ajax({
            type:'POST',
            url:'add_notii.php',
            data:{id:id,data:data},
            success:function(data){
 $('#testdiv').show();
setTimeout(function() { $("#testdiv").fadeOut(1500); }, 5000);

    
            },
			
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    });

   
});

</script>

<script type='text/javascript'>
										$(document).ready(function(){
											$('.add').click(function(e) {
									
										setTimeout(function(){
   window.location.reload(1);
}, 5000);
										});
										});
										</script>
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
$('.check').click(function() {
    var checked = $(this).is(':checked');
var id = $(this).attr('data');
var post ="post";
    $.ajax({
        type: "POST",
        url: "set_status.php",
          data: { checked : checked ,id1:id,post1:post},
        success: function(data) {
           alert("Notification Status Updated Successfully.");
		   location.reload();
        },
        error: function() {
            alert('it broke');
        },
      
    });
});
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
        url: "delete_noti.php",
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
<script>
$(document).ready(function(){
	$('.open_popup').click(function(e){
		e.preventDefault();
		var id = $(this).attr('data');
		var data = $(this).html();
		$('.nicEdit-main').html(data);
		$('#notif_id').val(id);
		$('#popup').trigger('click');
		
	})
})
</script>
<script type="text/javascript">
/*$(function() {
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
}); */
</script>
		
   
