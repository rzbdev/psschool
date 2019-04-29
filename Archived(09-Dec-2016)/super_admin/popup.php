<?php   
error_reporting(0);
session_start();
include_once('../config.php');
echo $id = $_REQUEST['id'];

	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">User Information</h4>
		</div>
      <div class="modal-body" style="height:200px;">
		<div class="col-md-12">
	  <div class="table-responsive"> 
	  <table class="table table-bordered">
<?php 
$query="select * from admin_login where 1=1 and alid = '$id'";
$row1=mysqli_query($query);

		  while($result=mysqli_fetch_array($row1))
		  {
			
			$id = $result['alid'];
			$email = $result['email'];
			
				
		  }
			  
?>
    <tbody>
	 
     
      <tr> <td>Email</td> <td><?php echo $email; ?></td> </tr>
    
      
	   
	   
	   
	   </td> </tr>
	 
	  
		</tbody>
	  </table>
      </div> 
	  </div>
    </div>
	 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
   </div>