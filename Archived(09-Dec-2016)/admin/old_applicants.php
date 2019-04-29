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
$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
?>
 <style>
 .algn-dwn { padding: 16px 25px; position: absolute; right: 15px; top: 16%;z-index:1;}
 </style>
<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
					</button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
		<div class="row">
		<div class="col-md-6">
			<h1 class="page-header">Select Notification</h1>
		</div>
		 <div class="col-md-6" style="margin-top:40px;">
		 <div class="algn-dwn">
			<form class="form-inline" action="" method="post" >
			  <div class="form-group">
				<label class="sr-only" for="search">Search</label>
				  <input type="text" class="form-control" name="title"  value="<?php echo htmlentities($job) ?>" id="inputkeyword" placeholder="Search by title...."  onkeyup="clearnow()">
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
			</div>
			</div>
		<div class="clearfix"></div>
		<div class="row">
		<div class="show-rcord">
		  
			
			
			
  <?php 
  if(isset($_POST['submit']))
  {
	$title =$_POST['job'];
	$teaching =$_POST['teaching'];
	$post=$_POST['post'];
  $sql="INSERT INTO jobs(`title`, `nid`, `teching`) VALUES ('$title','$post','$teaching')";
  $row=mysqli_query($sql);
  if($row){
	  echo "Job addded Successfully";
  }
  else{
	  echo "Something went wrong!";
  }
  }
  ?>
  
  
  <!-- Form to add jobs-->

			
			<div class="col-md-12">
			  <div class="table-responsive no-scroll">
				 <table class="table table-strip table-bordered show-data datatable table-res" id="example">
				<thead>
				<th>S.No</th>
				<th align="center" style="text-align:center;">Notification Title</th>
				<th align="center" style="text-align:center;">Start Date</th>
				<th align="center" style="text-align:center;">Expiry Date</th>
				
				
				
			
				</thead>
				<tbody>
				<?php 
				if(isset($_POST['search'])){
					$job = $_POST['title'];
					$get_jobs="SELECT * FROM notification WHERE title LIKE '%$job%' ";
				}
				else{
					$get_jobs="SELECT * FROM notification WHERE date_ex < '$exchn_date' LIMIT $start_from, $num_rec_per_page";
					//$get_jobs="select * from jobs LIMIT $start_from, $num_rec_per_page";
				}
$start_from1=$start_from;
				$result_jobs=mysqli_query($get_jobs);
				if(mysqli_num_rows($result_jobs) > 0) 
				{
				 while($row = mysqli_fetch_assoc($result_jobs)) { 
				
				 
				 
				 ?>
				<tr class="record"> 
				<td style="text-align:center"><?php echo ++$start_from1; ?></td>
				<th scope="row"><p align="center"><a  href="old_noti_appli.php?nn=<?php echo $nid=$row['nid']; ?>&page=1"><?php echo $row['title']; ?></a></p></th>
				<td style="text-align:center"><?php echo $row['start_date']; ?></td>
				<td style="text-align:center"><?php echo $row['date_ex'] ; ?></td>
				
				
				
				
				
				
				</tr>
				<?php } } else{
						?>
			    <tr> 
				<td colspan="2" style="font-size:16px;text-align:center;margin-top:20px;">
					<?php echo "No record found";?>
				 </td>
				 </tr>
			<?php	  } ?>
				</tbody>
				</table>
				</div>
				</div>
		</div>
		<div class="col-md-12">
			<?php 
				$sel = "SELECT nid FROM notification WHERE date_ex < '$exchn_date' LIMIT $start_from, $num_rec_per_page"; 
				
				//$sel = "select * from jobs"; 
				$rs_result = mysqli_query($sel); //run the query
				$total_records = mysqli_num_rows($rs_result);  //count number of records
				$total_pages = ceil($total_records / $num_rec_per_page);
				$page=$_REQUEST["page"]; 
					$limit=5 ;
				$next_btn=$page+1;
				$pre_btn=$page-1;
				if(total_records>0)
{
				if($pre_btn < 1)
				
{
	echo "<a class='pad not-active' href='old_applicants.php?page=$pre_btn'>".'< Previous'."</a> "; 
}
else
{
	echo "<a class='pad' href='old_applicants.php?page=$pre_btn'>".'< Previous'."</a> "; // Goto 1st page  
}
if ($total_pages >=1 && $page <= $total_pages)
    {
        $counter = 1;
        $link = "";
        if ($page > ($limit/2))
           { 
		   $link .= "<a class='pad' href=\"?page=1\">1 </a> ... ";
		   }
        for ($x=$page; $x<=$total_pages;$x++)
        {
			if ($x == $page)
				{
				 $link .="<a class='pad active-num' href=old_applicants.php?page=" .$x."\">".$x." </a> "; 
				}
            else if($counter < $limit)
                $link .= "<a class='pad' href=old_applicants.php?page=" .$x."\">".$x." </a>";

            $counter++;
        }
        if ($page < $total_pages - ($limit/2))
         { $link .= "... " . "<a class='pad' href=old_applicants.php?page=" .$total_pages."\">".$total_pages." </a>"; }
    }

if($page==$total_pages)
{
	echo "<a class='pad not-active' href='old_applicants.php?page=$next_btn'>".'Next >'."</a> ";
}
else
{
	echo "<a class='pad' href='old_applicants.php?page=$next_btn'>".'Next >'."</a> "; // Goto last page
}
}
			?>
		</div>
		</div>
		</div>
		<div class="clearfix"></div>
		</div>
		<br/><br/><br/><br/><br/><br/>
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