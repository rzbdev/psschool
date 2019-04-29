<?php
include_once('config.php');


 $title = $_POST['data'];
 $id = $_POST['id'];
	
 $sql="UPDATE notification SET detail='$title' WHERE nid=$id";
 $row=mysqli_query($sql);
  ?>