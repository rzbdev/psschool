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

<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal">
					</button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
		<div class="col-md-12">
			<h1 class="page-header">Manage Old Applicants</h1>
		</div>
		<div class="clearfix"></div>
		<div class="show-rcord">
		   
			<div class="col-md-6">
			
			
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

			</div>	
			<div class="col-md-12">
			  <div class="table-responsive">
				<table class="table table-strip table-res table-bordered">
				<thead>
				<th>S.NO.</th>
				
				
				<th align="center" style="text-align:center;">Notification Title</th>
			
				</thead>
				<tbody>
				<?php 
				if(isset($_POST['search'])){
					$job = $_POST['title'];
					$get_jobs="SELECT * FROM jobs WHERE title LIKE '%$job%' ";
				}
				else{
					$get_jobs="SELECT * FROM notification WHERE date_ex < DATE_FORMAT(NOW(),'%Y-%m-%d') LIMIT $start_from, $num_rec_per_page";
					//$get_jobs="select * from jobs LIMIT $start_from, $num_rec_per_page";
				}
$start_from1=$start_from;
				$result_jobs=mysqli_query($get_jobs);
				if(mysqli_num_rows($result_jobs) > 0) 
				{
				 while($row = mysqli_fetch_assoc($result_jobs)) { 
				
				 
				 
				 ?>
				<tr class="record"> 
				<td><?php echo ++$start_from1; ?></td>
				<th scope="row"><p align="center"><a  href="old_noti_appli1.php?nn=<?php echo $nid=$row['nid']; ?>&page=1"><?php echo $row['title']; ?></a></p></th>
				
				
				
				
				
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
				$sel = "SELECT nid FROM notification WHERE date_ex < DATE_FORMAT(NOW(),'%Y-%m-%d') LIMIT $start_from, $num_rec_per_page"; 
				
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
		<div class="clearfix"></div>
		<br/><br/><br/><br/><br/><br/>
  <?php include_once('admin_footer.php');?>